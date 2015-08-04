<?php
namespace GCWorld\Database;

use PDO;
use PDOException;

class Database extends PDO
{

    /**
     * @return bool
     */
    public function ping()
    {
        try {
            $this->query('SELECT 1');
        } catch (PDOException $e) {
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
        try {
            $result = $this->query('SELECT 1 FROM '.$table.' LIMIT 1');
        } catch (PDOException $e) {
            return false;
        }
        $good = ($result !== false);
        $result->closeCursor();
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

        $sql = 'SELECT TABLE_COMMENT AS comment
                FROM information_schema.TABLES
                WHERE TABLE_NAME = :table
                AND TABLE_SCHEMA = :schema';
        $stmt = $this->query($sql);
        $stmt->execute(array(':table'=>$table, ':schema'=>$schema));
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
        $sql = 'ALTER TABLE '.$table.' COMMENT = :comment';
        $stmt = $this->query($sql);
        $stmt->execute(array(':table'=>$table, ':comment'=>$comment));
        $stmt->closeCursor();
    }

    public function setDefaults()
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
