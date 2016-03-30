<?php
namespace GCWorld\Database;

use PDOStatement;

class DatabaseStatement extends PDOStatement
{
    private $debug = false;
    /** @var Database */
    private $dbh   = null;

    protected function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    /**
     * @param bool|true $bool
     */
    public function enableDebugging($bool = true)
    {
        $this->debug = $bool;
    }

    /**
     * @param null|array $input_parameters
     * @return array|bool
     * @throws \Exception
     */
    public function execute($input_parameters = null)
    {
        $start = 0;
        if ($this->debug) {
            $start = microtime(true);
        }


        try{
            if (is_array($input_parameters)) {
                $result = parent::execute($input_parameters);
            } else {
                $result = parent::execute();
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
           if(strstr($msg, 'MySQL server has gone away')) {
                $this->dbh->reconnect();
                if (is_array($input_parameters)) {
                    $result = parent::execute($input_parameters);
                } else {
                    $result = parent::execute();
                }
            } else {
                throw $e;
            }
        }

        if ($this->debug) {
            $end = microtime(true);

            return array('result' => $result, 'time' => ($end - $start));
        }

        return $result;
    }
}
