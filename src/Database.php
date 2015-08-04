<?php
namespace GCWorld\Database;

use PDO;
use PDOException;

class Database extends PDO
{

    /**
     * @return bool
     */
    public function ping() {
        try {
            $this->query('SELECT 1');
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }

    /**
     * @param string $table
     * @return bool
     */
    public function tableExists($table) {
        try {
            $result = $this->query('SELECT 1 FROM '.$table.' LIMIT 1');
        } catch (PDOException $e) {
            return false;
        }
        $good = ($result !== false);
        $result->closeCursor();
        return $good;
    }
}
