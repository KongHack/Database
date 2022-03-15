<?php
namespace GCWorld\Database;

use GCWorld\Interfaces\Database\DatabaseStatementInterface;
use PDO;
use PDOException;
use PDOStatement;

/**
 * Class DatabaseStatement
 */
class DatabaseStatement extends PDOStatement implements DatabaseStatementInterface
{
    /**
     * @var int
     */
    protected $debugLevel = 0;

    /**
     * @var Database
     */
    protected $dbh = null;

    /**
     * DatabaseStatement constructor.
     * @param Database $dbh
     */
    protected function __construct(Database $dbh)
    {
        $this->dbh = $dbh;
        $this->setDebuggingLevel($this->dbh->getDebugLevel());
    }

    /**
     * @param int $level
     * @return void
     */
    public function setDebuggingLevel(int $level)
    {
        $this->debugLevel = $level;
    }

    /**
     * @param null|array $input_parameters
     * @return array|bool
     * @throws PDOException
     */
    public function execute($input_parameters = null)
    {
        $result  = null;
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
                if (is_array($input_parameters)) {
                    $result = parent::execute($input_parameters);
                    break;
                }
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
                    if (is_array($input_parameters)) {
                        $result = parent::execute($input_parameters);
                        break;
                    }
                    $result = parent::execute();
                    break;
                }

                throw $e;
            }
        }

        if ($this->debugLevel >= Database::DEBUG_BASIC || $slowLog) {
            $end = microtime(true);
        }
        if ($this->debugLevel >= Database::DEBUG_BASIC) {
            $this->dbh->addDebugTimingEntry($this->queryString, $input_parameters, ($end - $start));
        }

        if ($this->debugLevel >= Database::DEBUG_ADVANCED) {
            return [
                'result' => $result,
                'time'   => ($end - $start),
            ];
        }
        if($slowLog) {
            $dur = $end - $start;
            $ms  = $dur * 1000;
            if($ms >= $cConfig->getSlowQueryLogMs()) {
                call_user_func_array($cConfig->getSlowQueryLogCallable(),[
                    'sql'    => $this->queryString,
                    'params' => $input_parameters,
                    'dur_ms' => $ms,
                    'trace'  => debug_backtrace(),
                ]);
            }
        }

        return $result;
    }

    /**
     * @param int   $mode
     * @param mixed ...$args
     * @return array|null
     */
    public function fetchAllNullable($mode = PDO::FETCH_ASSOC, ...$args)
    {
        if(empty($args)) {
            $return = parent::fetchAll($mode);
        } else {
            $return = parent::fetchAll($mode, $args);
        }

        if(!$return) {
            return null;
        }

        return $return;
    }

    /**
     * @param int   $mode
     * @param mixed ...$args
     * @return array
     */
    public function fetchAllArray($mode = PDO::FETCH_ASSOC, ...$args): array
    {
        if(empty($args)) {
            $return = parent::fetchAll($mode);
        } else {
            $return = parent::fetchAll($mode, $args);
        }

        if(!$return) {
            return [];
        }

        return $return;
    }
}
