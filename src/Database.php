<?php
namespace GCWorld\Database;

use PDO;
use PDOException;

class Database extends PDO implements \GCWorld\Interfaces\Database
{
    const DEBUG_OFF = 0;
    const DEBUG_BASIC = 1;
    const DEBUG_ADVANCED = 2;


    private $connection_details = [];
    private $deadlock_retries   = 0;
    private $deadlock_usleep    = 1000;
    /** @var Controller|null */
    private $controller    = null;
    private $controller_id = null;
    private $debugLevel    = 0;
    private $debugTiming   = [];

    /**
     * Database constructor.
     * @param string $dsn
     * @param string $username
     * @param string $passwd
     * @param array  $options
     */
    public function __construct($dsn, $username, $passwd, $options)
    {
        $this->connection_details['dsn']      = $dsn;
        $this->connection_details['username'] = $username;
        $this->connection_details['passwd']   = $passwd;
        $this->connection_details['options']  = $options;

        parent::__construct($dsn, $username, $passwd, $options);
    }

    /**
     * @param \GCWorld\Database\Controller $controller
     * @param string                       $id
     */
    public function attachController(Controller $controller, $id)
    {
        $this->controller    = $controller;
        $this->controller_id = $id;
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
    public function ping()
    {
        try{
            $this->query('SELECT 1');
        } catch(PDOException $e){
            return false;
        }

        return true;
    }

    /**
     * Note: This is injectible!  Use with caution!
     * @param string $table
     * @return bool
     */
    public function tableExists($table)
    {
        try{
            $result = $this->query('SELECT 1 FROM '.$table.' LIMIT 1');
        } catch(PDOException $e){
            return false;
        }
        $good = ($result !== false);

        return $good;
    }

    /**
     * @return string
     */
    public function getWorkingDatabaseName()
    {
        $stmt = $this->query('select database()');
        $name = $stmt->fetchColumn();
        $stmt->closeCursor();

        return $name;
    }

    /**
     * @param string $table
     * @return bool|string
     */
    public function getTableComment($table)
    {
        $schema = $this->getWorkingDatabaseName();

        $sql  = 'SELECT TABLE_COMMENT AS comment
                FROM information_schema.TABLES
                WHERE TABLE_NAME = :table
                AND TABLE_SCHEMA = :schema';
        $stmt = $this->prepare($sql);
        $stmt->execute(array(':table' => $table, ':schema' => $schema));
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
     */
    public function setTableComment($table, $comment)
    {
        // Apparently this cannot be prepared.  Straight exec.
        $sql = 'ALTER TABLE `'.$table.'` COMMENT = '.$this->quote($comment);
        $this->exec($sql);
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
     * @param string $statement
     * @param array  $driver_options
     * @return DatabaseStatement
     * @throws \Exception
     */
    public function prepare($statement, $driver_options = null)
    {
        if ($this->controller != null) {
            if ($this->controller->getMode() == Controller::MODE_SPLIT) {
                if ($this->controller->isWriteLocked()) {
                    if ($this->controller_id != Controller::IDENTIFIER_WRITE) {
                        return $this->controller->getDatabase(Controller::IDENTIFIER_WRITE)
                            ->prepare($statement, $driver_options);
                    }
                } else {
                    // Check the statement
                    $token = strtoupper(substr(trim($statement), 0, 6));
                    if ($token == 'SELECT') {                                        // If we are reading...
                        if ($this->controller_id != Controller::IDENTIFIER_READ) {   // But this isn't the read db
                            return $this->controller->getDatabase(Controller::IDENTIFIER_READ)
                                ->prepare($statement, $driver_options);
                        }
                    } else {                                                        // If we are writing...
                        if ($this->controller_id != Controller::IDENTIFIER_WRITE) {  // But this isn't the write db
                            return $this->controller->getDatabase(Controller::IDENTIFIER_WRITE)
                                ->prepare($statement, $driver_options);
                        }
                    }
                }
            }
        }

        $return  = null;    // Oh boy!
        $done    = false;
        $retries = 0;

        if ($driver_options == null) {
            $driver_options = [];
        }

        while (!$done) {
            try{
                $return = parent::prepare($statement, $driver_options);
                $done   = true;

            } catch(\Exception $e){
                $msg = $e->getMessage();
                if (stristr($msg, 'deadlock')) {
                    if ($retries < $this->deadlock_retries) {
                        usleep($this->deadlock_usleep);
                        $done = false;
                        ++$retries;
                    } else {
                        $done = true;
                        throw $e;
                    }
                } elseif (stristr($msg, 'MySQL server has gone away')) {
                    $this->reconnect();
                    $done   = true;
                    $return = parent::prepare($statement, $driver_options);
                } else {
                    $done = true;
                    throw $e;
                }
            }
        }

        return $return;
    }

    public function reconnect()
    {
        $this->__construct($this->connection_details['dsn'],
            $this->connection_details['username'],
            $this->connection_details['passwd'],
            $this->connection_details['options']);
    }

    /**
     * @param int $retries
     */
    public function setDeadlockRetries($retries = 0)
    {
        $this->deadlock_retries = $retries;
    }

    /**
     * @param int $usleep_time
     */
    public function setDeadlockUSleep($usleep_time = 1000)
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
    public function getDeadlockUSleep()
    {
        return $this->deadlock_usleep;
    }

    /**
     * @param null $name
     * @return string
     * @throws \Exception
     */
    public function lastInsertId($name = null)
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
    public function setDebugLevel($level = self::DEBUG_OFF)
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
     * @param $query
     * @param $params
     * @param $time
     * @return bool
     */
    public function addDebugTimingEntry($query, $params, $time)
    {
        $hash = md5($query);
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
}
