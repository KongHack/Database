<?php
namespace GCWorld\Database;

use PDOStatement;

/**
 * Class DatabaseStatement
 * @package GCWorld\Database
 */
class DatabaseStatement extends PDOStatement
{
    private $debugLevel = 0;
    /** @var Database */
    private $dbh = null;

    /**
     * DatabaseStatement constructor.
     * @param \GCWorld\Database\Database $dbh
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
     * @throws \Exception
     */
    public function execute($input_parameters = null)
    {
        $result  = null;
        $done    = false;
        $retries = 0;

        $start = 0;
        $end   = 0;

        if ($this->debugLevel >= Database::DEBUG_BASIC) {
            $start = microtime(true);
        }

        while (!$done) {
            try {
                if (is_array($input_parameters)) {
                    $result = parent::execute($input_parameters);
                    $done   = true;
                } else {
                    $result = parent::execute();
                    $done   = true;
                }
            } catch (\Exception $e) {
                $msg = $e->getMessage();
                if (stristr($msg, 'deadlock')) {
                    if ($retries < $this->dbh->getDeadlockRetries()) {
                        usleep($this->dbh->getDeadlockUSleep());
                        $done = false;
                        ++$retries;
                    } else {
                        $done = true;
                        throw $e;
                    }
                } elseif (stristr($msg, 'server has gone away') !== false) {
                    $this->dbh->reconnect();
                    if (is_array($input_parameters)) {
                        $result = parent::execute($input_parameters);
                        $done   = true;
                    } else {
                        $result = parent::execute();
                        $done   = true;
                    }
                } else {
                    $done = true;
                    throw $e;
                }
            }
        }

        if ($this->debugLevel >= Database::DEBUG_BASIC) {
            $end = microtime(true);
            $this->dbh->addDebugTimingEntry($this->queryString, $input_parameters, ($end - $start));
        }

        if ($this->debugLevel >= Database::DEBUG_ADVANCED) {
            return array('result' => $result, 'time' => ($end - $start));
        }

        return $result;
    }
}
