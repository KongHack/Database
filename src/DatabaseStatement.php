<?php
namespace GCWorld\Database;

use GCWorld\Interfaces\Database\DatabaseStatementInterface;
use PDO;
use PDOException;
use PDOStatement;
use ReturnTypeWillChange;

/**
 * Class DatabaseStatement
 */
class DatabaseStatement extends PDOStatement implements DatabaseStatementInterface
{
    protected int $debugLevel;

    protected array         $bound      = [];
    protected ?Database     $borrowedDB = null;
    protected ?PDOStatement $delegate   = null;

    /**
     * @param Database $dbh
     * @param DatabasePool $pool
     */
    protected function __construct(
        protected Database $dbh,
        protected DatabasePool $pool
    ) {
        $this->setDebuggingLevel($this->dbh->getDebugLevel());
    }

    /**
     * @param int $level
     * @return void
     */
    public function setDebuggingLevel(int $level): void
    {
        $this->debugLevel = $level;
    }

    /**
     * @param $param
     * @param $value
     * @param $type
     * @return bool
     */
    public function bindValue($param, $value, $type = PDO::PARAM_STR): bool
    {
        $this->bound[$param] = [$value, $type, null, null];
        return parent::bindValue($param, $value, $type);
    }

    /**
     * @param $param
     * @param $var
     * @param $type
     * @param $maxLength
     * @param $driverOptions
     * @return bool
     */
    public function bindParam($param, &$var, $type = PDO::PARAM_STR, $maxLength = null, $driverOptions = null): bool
    {
        $this->bound[$param] = [&$var, $type, $maxLength, $driverOptions, true];
        return parent::bindParam($param, $var, $type, $maxLength ?? 0, $driverOptions ?? null);
    }

    /**
     * @param array|null $params
     * @return bool
     * @throws \Throwable
     */
    public function execute(?array $params = null): bool
    {
        // First attempt: run on the home connection
        try {
            return $this->executeInternal($params);
        } catch (PDOException $e) {
            if (!$this->shouldFailover($e)) {
                throw $e;
            }
        }

        // Failover path: borrow a fresh connection and re-prepare
        $this->borrowedDB = $this->pool->get();

        try {
            $sql = $this->queryString; // PDOStatement has this property

            $stmt = $this->borrowedDB->prepare($sql, [
                // Typically we want the inner query buffered to avoid yet another lock
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            ]);

            // Re-apply bound params
            foreach ($this->bound as $k => $b) {
                if (!empty($b[4])) { // bound by reference
                    $stmt->bindParam($k, $b[0], $b[1], $b[2] ?? 0, $b[3] ?? null);
                } else {
                    $stmt->bindValue($k, $b[0], $b[1]);
                }
            }

            // Execute with either the passed parameters or the originally bound ones
            $ok             = $stmt->executeInternal($input_parameters ?? null);
            $this->delegate = $stmt;
            return $ok;
        } catch (\Throwable $t) {
            // If failover also dies, make sure to return the conn to the pool
            $this->releaseBorrowed();
            throw $t;
        }
    }

    /**
     * @param null|array $params
     * @return bool
     * @throws PDOException
     */
    protected function executeInternal(?array $params = null): bool
    {
        $result  = false;
        $retries = 0;
        $start   = 0;
        $end     = 0;
        $cConfig = Config::getInstance();
        $slowLog = $cConfig->getSlowQueryLog();

        if ($this->debugLevel >= Database::DEBUG_BASIC || $slowLog) {
            $start = microtime(true);
        }

        while (true) {
            try {
                $result = parent::execute();
                break;
            } catch (PDOException $e) {
                $msg = $e->getMessage();

                if (stristr($msg, 'deadlock') !== false) {
                    if ($retries < $this->dbh->getDeadlockRetries()) {
                        usleep($this->dbh->getDeadlockUSleep());
                        ++$retries;
                        continue;
                    }

                    throw $e;
                }

                if (stristr($msg, 'server has gone away') !== false) {
                    $this->dbh->reconnect();
                    $result = parent::execute($params);
                    break;
                }

                throw $e;
            }
        }

        if ($this->debugLevel >= Database::DEBUG_BASIC || $slowLog) {
            $end = microtime(true);
        }
        if ($this->debugLevel >= Database::DEBUG_BASIC) {
            $this->dbh->addDebugTimingEntry($this->queryString, $params, ($end - $start));
        }

        if($slowLog) {
            $dur  = $end - $start;
            $ms   = $dur * 1000;
            $call = $cConfig->getSlowQueryLogCallable();
            if($ms >= $cConfig->getSlowQueryLogMs()
                && !empty($call)
                && is_callable($call)
            ) {
                call_user_func_array($call, [
                    'sql'    => $this->queryString,
                    'params' => $params,
                    'dur_ms' => $ms,
                    'trace'  => debug_backtrace(),
                ]);
            }
        }

        return $result;
    }

    /**
     * @param int      $mode
     * @param mixed ...$args
     * @return array|null
     */
    public function fetchAllNullable(int $mode = PDO::FETCH_ASSOC, ...$args): ?array
    {
        $return = $this->fetchAll($mode, $args);

        if(!$return) {
            return null;
        }

        return $return;
    }

    /**
     * @param int      $mode
     * @param mixed ...$args
     * @return array
     */
    public function fetchAllArray(int $mode = PDO::FETCH_ASSOC, ...$args): array
    {
        $return = $this->fetchAll($mode, $args);

        if(!$return) {
            return [];
        }

        return $return;
    }

    /**
     * @param $mode
     * @param $cursorOrientation
     * @param $cursorOffset
     * @return mixed
     */
    #[ReturnTypeWillChange]
    public function fetch($mode = null, $cursorOrientation = PDO::FETCH_ORI_NEXT, $cursorOffset = 0): mixed
    {
        return $this->delegate
            ? $this->delegate->fetch($mode ?? PDO::FETCH_ASSOC, $cursorOrientation, $cursorOffset)
            : parent::fetch($mode ?? PDO::FETCH_ASSOC, $cursorOrientation, $cursorOffset);
    }

    /**
     * @param $mode
     * @param ...$args
     * @return array|mixed
     */
    #[ReturnTypeWillChange]
    public function fetchAll($mode = null, ...$args): mixed
    {
        return $this->delegate
            ? ($mode === null ? $this->delegate->fetchAll() : $this->delegate->fetchAll($mode, ...$args))
            : ($mode === null ? parent::fetchAll() : parent::fetchAll($mode, ...$args));
    }

    /**
     * @param int $column
     * @return mixed
     */
    #[ReturnTypeWillChange]
    public function fetchColumn(int $column = 0): mixed
    {
        return $this->delegate
            ? $this->delegate->fetchColumn($column)
            : parent::fetchColumn($column);
    }

    /**
     * @return bool
     */
    public function closeCursor(): bool
    {
        try {
            return $this->delegate ? $this->delegate->closeCursor() : parent::closeCursor();
        } finally {
            $this->releaseBorrowed();
        }
    }

    /**
     * @return void
     */
    protected function releaseBorrowed(): void
    {
        if ($this->borrowedDB) {
            $this->pool->put($this->borrowedDB);
            $this->borrowedDB = null;
            $this->delegate    = null;
        }
    }

    /**
     * @param PDOException $e
     * @return bool
     */
    protected function shouldFailover(PDOException $e): bool
    {
        // The classic message for unbuffered lock; catch broadly but conservatively.
        $msg = $e->getMessage();
        if (stripos($msg, 'unbuffered queries are active') !== false) {
            return true;
        }
        // Some drivers emit HY000 / 2014 “Commands out of sync” in similar cases
        if (stripos($msg, 'Commands out of sync') !== false) {
            return true;
        }

        return false;
    }

    /**
     * Additional safety to ensure no lingering references
     */
    public function __destruct()
    {
        $this->releaseBorrowed();
        $this->bound = [];
    }
}
