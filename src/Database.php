<?php
namespace GCWorld\Database;

use PDO;
use PDOException;

class Database extends PDO implements \GCWorld\Interfaces\Database
{
    private $connection_details = [];

    /**
     * Database constructor.
     * @param string $dsn
     * @param string $username
     * @param string $passwd
     * @param array $options
     */
    public function __construct($dsn, $username, $passwd, $options)
    {
        $this->connection_details['dsn'] = $dsn;
        $this->connection_details['username'] = $username;
        $this->connection_details['passwd'] = $passwd;
        $this->connection_details['options'] = $options;

        parent::__construct($dsn, $username, $passwd, $options);
    }

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
        $stmt = $this->prepare($sql);
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
        // Apparently this cannot be prepared.  Straight exec.
        $sql = 'ALTER TABLE `'.$table.'` COMMENT = '.$this->quote($comment);
        $this->exec($sql);
    }

    public function setDefaults()
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('\\GCWorld\\Database\\DatabaseStatement', array($this)));
    }

    /**
     * @param string $statement
     * @param array  $driver_options
     * @return DatabaseStatement
     * @throws \Exception
     */
    public function prepare($statement, $driver_options = null)
    {
        if($driver_options == null) {
            $driver_options = [];
        }

        try {
            $return = parent::prepare($statement, $driver_options);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if(strstr($msg, 'MySQL server has gone away')) {
                $this->reconnect();
                $return = parent::prepare($statement, $driver_options);
            } else {
                throw $e;
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

}
