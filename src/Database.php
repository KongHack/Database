<?php
namespace GCWorld\Database;

use GCWorld\Interfaces\Database\DatabaseInterface;
use GCWorld\Interfaces\Database\DatabaseStatementInterface;
use PDO;
use PDOException;

/**
 * Class Database
 * @package GCWorld\Database
 */
class Database extends PDO implements DatabaseInterface
{
    const DEBUG_OFF      = 0;
    const DEBUG_BASIC    = 1;
    const DEBUG_ADVANCED = 2;

    /**
     * Borrowing strings from here:
     * https://stackoverflow.com/questions/22932723/error-while-sending-stmt-prepare-packet-pid-2
     */
    const RECONNECT_STRINGS = [
        'server has gone away',
        'no connection to the server',
        'Lost connection',
        'is dead or not enabled',
        'Error while sending',
        'decryption failed or bad record mac',
        'SSL connection has been closed unexpectedly',
        'Connection reset by peer'
    ];

    protected array $connection_details   = [];
    protected int   $deadlock_retries     = 0;
    protected int   $deadlock_retries_max = 10;
    protected int   $deadlock_usleep      = 1000;
    protected int   $general_retries      = 0;
    protected int   $general_retries_max  = 10;
    protected int   $debugLevel    = 0;

    /** @var Controller|null */
    protected $controller    = null;
    protected $controller_id = null;
    protected $debugTiming   = [];
    protected $trackPath     = false;

    /**
     * Database constructor.
     * @param string  $dsn
     * @param ?string $username
     * @param ?string $password
     * @param ?array  $options
     */
    public function __construct(string $dsn, ?string $username = null, ?string $password = null, ?array $options = null)
    {
        $this->connection_details['dsn']      = $dsn;
        $this->connection_details['username'] = $username;
        $this->connection_details['password'] = $password;
        $this->connection_details['options']  = $options;

        $config = Config::getInstance()->getConfig();
        $this->deadlock_retries_max = isset($config['deadlock_retries']) ? $config['deadlock_retries'] : $this->deadlock_retries_max;
        $this->deadlock_usleep      = isset($config['deadlock_usleep']) ? $config['deadlock_usleep'] : $this->deadlock_usleep;

        parent::__construct($dsn, $username, $password, $options);
    }

    /**
     * @param \GCWorld\Database\Controller $controller
     * @param string                       $identifier
     * @return $this
     */
    public function attachController(Controller $controller, string $identifier)
    {
        $this->controller    = $controller;
        $this->controller_id = $identifier;

        return $this;
    }

    /**
     * @return null|Controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return bool
     */
    public function ping(): bool
    {
        try {
            $this->query('SELECT 1');
        } catch (PDOException) {
            return false;
        }

        return true;
    }

    /**
     * @param string $table
     * @return bool
     */
    public function tableExists(string $table): bool
    {
        $tmp  = explode('.',$table);
        if(count($tmp) == 2) {
            $db = $tmp[0];
            $table = $tmp[1];
        } else {
            $db = $this->getWorkingDatabaseName();
        }

        $sql = 'SELECT * 
                FROM information_schema.tables
                WHERE table_schema = :db
                  AND table_name = :table
                LIMIT 1;';
        $query = $this->prepare($sql);
        $query->execute([
            ':db'   => $db,
            ':table' => $table,
        ]);
        $row = $query->fetch();
        $query->closeCursor();

        return is_array($row);
    }

    /**
     * @return string
     */
    public function getWorkingDatabaseName(): string
    {
        $stmt = $this->query('select database()');
        $name = $stmt->fetchColumn();
        $stmt->closeCursor();

        return $name;
    }

    /**
     * @param string $table
     * @param string $schema
     * @return bool|string
     */
    public function getTableComment(string $table, string $schema = null)
    {
        if(strpos($table,'.')!==false){
            $tmp = explode('.',$table);
            $table = $tmp[1];
            $schema = $tmp[0];
        }
        if($schema == null) {
            $schema = $this->getWorkingDatabaseName();
        }

        $sql  = 'SELECT TABLE_COMMENT AS comment
                 FROM information_schema.TABLES
                 WHERE TABLE_NAME = :table
                 AND TABLE_SCHEMA = :schema';
        $stmt = $this->prepare($sql);
        $stmt->execute([':table' => $table, ':schema' => $schema]);
        $row = $stmt->fetch();
        $stmt->closeCursor();
        if (is_array($row)) {
            return $row['comment'];
        }

        return false;
    }

    /**
     * Note: This is injectible!  Use with caution!
     * @param string $table
     * @param string $comment
     * @return $this
     */
    public function setTableComment(string $table, string $comment)
    {
        // Apparently this cannot be prepared.  Straight exec.
        $sql = 'ALTER TABLE '.$table.' COMMENT = '.$this->quote($comment);
        $this->exec($sql);

        return $this;
    }

    /**
     * @return $this
     */
    public function setDefaults()
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, ['\\GCWorld\\Database\\DatabaseStatement', [$this]]);

        return $this;
    }

    /**
     * @param mixed $query
     * @param mixed $options
     * @return DatabaseStatementInterface
     * @throws \Exception
     */
    public function prepare(string $query, $options  = null): DatabaseStatement|false
    {
        if($this->trackPath) {
            $trace = debug_backtrace();
            if(count($trace) > 1) {
                $last = $trace[0];
                // @phpstan-ignore-next-line
                if(substr($last['file'],-12)== 'Database.php' && count($trace) > 1) {
                    $last = $trace[1];
                }
                $msg = 'F: '.$last['file'].' | L: '.$last['line'];
                $msg = '/*!999999 '.$msg.' */ ';
                $query = $msg.$query;
            }
        }

        if ($this->controller != null) {
            if ($this->controller->getMode() == Controller::MODE_SPLIT) {
                if ($this->controller->isWriteLocked()) {
                    if ($this->controller_id != Controller::IDENTIFIER_WRITE) {
                        return $this->controller->getDatabase(Controller::IDENTIFIER_WRITE)
                            ->prepare($query, $options );
                    }
                } else {
                    // Check the statement
                    $token = strtoupper(substr(trim($query), 0, 6));
                    if ($token == 'SELECT') {                                        // If we are reading...
                        if ($this->controller_id != Controller::IDENTIFIER_READ) {   // But this isn't the read db
                            return $this->controller->getDatabase(Controller::IDENTIFIER_READ)
                                ->prepare($query, $options );
                        }
                    } else {                                                        // If we are writing...
                        if ($this->controller_id != Controller::IDENTIFIER_WRITE) {  // But this isn't the write db
                            return $this->controller->getDatabase(Controller::IDENTIFIER_WRITE)
                                ->prepare($query, $options );
                        }
                    }
                }
            }
        }

        if ($options  == null) {
            $options  = [];
        }

        try {
            /** @var DatabaseStatement $return */
            $return = parent::prepare($query, $options );
            return $return;
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if($this->general_retries >= $this->general_retries_max
                || $this->deadlock_retries >= $this->deadlock_retries_max
            ) {
                throw $e;
            }
            if (stripos($msg, 'deadlock') !== false) {
                ++$this->deadlock_retries_max;
                usleep($this->deadlock_usleep);
                return $this->prepare($query, $options );
            }
            foreach(self::RECONNECT_STRINGS as $string) {
                if(stripos($msg,$string)!==false) {
                    ++$this->general_retries;
                    usleep(250);
                    $this->reconnect();
                    usleep(250);

                    return $this->prepare($query, $options );
                }
            }
            throw $e;
        }

    }

    /**
     * Attempts to reconnect to the DB
     * @return void
     */
    public function reconnect()
    {
        $this->__construct(
            $this->connection_details['dsn'],
            $this->connection_details['username'],
            $this->connection_details['password'],
            $this->connection_details['options']
        );
    }

    /**
     * @param int $retries
     * @return void
     */
    public function setDeadlockRetriesMax(int $retries = 0)
    {
        $this->deadlock_retries_max = $retries;
    }

    /**
     * @param int $usleep_time
     * @return void
     */
    public function setDeadlockUSleep(int $usleep_time = 1000)
    {
        $this->deadlock_usleep = $usleep_time;
    }

    /**
     * @return int
     */
    public function getDeadlockRetries()
    {
        return $this->deadlock_retries;
    }

    /**
     * @return int
     */
    public function getDeadlockRetriesMax()
    {
        return $this->deadlock_retries_max;
    }

    /**
     * @return int
     */
    public function getDeadlockUSleep()
    {
        return $this->deadlock_usleep;
    }

    /**
     * @param null|string $name
     * @return string|false
     */
    public function lastInsertId(?string $name = null): string|false
    {
        if ($this->controller != null) {
            if ($this->controller->getMode() == Controller::MODE_SPLIT) {
                if ($this->controller_id != Controller::IDENTIFIER_WRITE) {
                    return $this->controller->getDatabase(Controller::IDENTIFIER_WRITE)->lastInsertId();
                }
            }
        }

        return parent::lastInsertId($name);
    }

    /**
     * @param int $level
     * @return $this
     */
    public function setDebugLevel(int $level = self::DEBUG_OFF)
    {
        $this->debugLevel = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getDebugLevel()
    {
        return $this->debugLevel;
    }

    /**
     * @return array
     */
    public function getDebugTiming()
    {
        return $this->debugTiming;
    }

    /**
     * @param string $query
     * @param mixed  $params
     * @param float  $time
     * @return bool
     */
    public function addDebugTimingEntry(string $query, $params, float $time)
    {
        $hash                     = md5($query);
        $this->debugTiming[$hash] = [
            'query' => $query,
            'times' => [],
        ];

        $this->debugTiming[$hash]['times'][] = [
            'params' => $params,
            'time'   => $time,
        ];

        return true;
    }

    /**
     * @return void
     */
    public function startWriteLockSafely()
    {
        if ($this->getController() !== null) {
            $this->getController()->startWriteLock();
        }
    }

    /**
     * @return void
     */
    public function endWriteLockSafely()
    {
        if ($this->getController() !== null) {
            $this->getController()->endWriteLock();
        }
    }

    /**
     * @return bool
     */
    public function isWriteLocked()
    {
        if ($this->getController() !== null) {
            return $this->getController()->isWriteLocked();
        }

        return false;
    }

    /**
     * @return bool
     */
    public function disconnect(): bool
    {
        $query = 'SHOW PROCESSLIST -- '.uniqid('pdo_mysql_close ', 1);
        try {
            $list = $this->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException) {
            return true;
        }
        foreach ($list as $thread) {
            if ($thread['Info'] === $query) {
                try {
                    $this->query('KILL '.$thread['Id']);
                } catch (\PDOException) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param bool $track
     */
    public function setTrackPath(bool $track)
    {
        $this->trackPath = $track;
    }

    /**
     * @return bool
     */
    public function getTrackPath()
    {
        return $this->trackPath;
    }
}
