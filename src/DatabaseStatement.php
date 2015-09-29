<?php
namespace GCWorld\Database;

use PDOStatement;

class DatabaseStatement extends PDOStatement
{
    private $debug = false;
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
     * @param array|null $input_parameters
     */
    public function execute(array $input_parameters = null)
    {
        $start = 0;
        if ($this->debug) {
            $start = microtime(true);
        }

        if (is_array($input_parameters)) {
            $result = parent::execute($input_parameters);
        }else {
            $result = parent::execute();
        }

        if ($this->debug) {
            $end = microtime(true);

            return array('result' => $result, 'time' => ($end - $start));
        }

        return $result;
    }
}
