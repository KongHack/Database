<?php
namespace GCWorld\Database\Interfaces;

use GCWorld\Database\DatabaseStatement;

/**
 * Interface DatabaseInterface
 */
interface DatabaseInterface
{
    /**
     * @param string      $dsn
     * @param string|null $username
     * @param string|null $password
     * @param array|null  $options
     */
    public function __construct(string $dsn, ?string $username = null, ?string $password = null, ?array $options = null);

    /** @return bool */
    public function beginTransaction();

    /** @return bool */
    public function commit();

    /** @return string|null */
    public function errorCode();

    /** @return array */
    public function errorInfo();

    /** @return int|false */
    public function exec(string $statement);

    /** @return bool|int|string|array|null */
    public function getAttribute(int $attribute);

    /** @return array */
    public static function getAvailableDrivers();

    /** @return bool */
    public function inTransaction();

    /** @return string|false */
    public function lastInsertId(?string $name = null);

    /** @return \PDOStatement|DatabaseStatement|false */
    public function prepare(string $query, array $options = []);

    /** @return \PDOStatement|DatabaseStatement|false */
    public function query(string $query, ?int $fetchMode = null, mixed ...$fetchModeArgs);

    /** @return string|false */
    public function quote(string $string, int $type = \PDO::PARAM_STR);

    /** @return bool */
    public function rollBack();

    /**
     * @param int   $attribute
     * @param mixed $value
     * @return mixed
     */
    public function setAttribute(int $attribute, mixed $value);

    /**
     * @return bool
     */
    public function ping(): bool;

    /**
     * @param string $table
     * @return bool
     */
    public function tableExists(string $table): bool;

    /**
     * @return string
     */
    public function getWorkingDatabaseName(): string;

    /**
     * @param string $table
     * @return mixed
     */
    public function getTableComment(string $table);

    /**
     * @param string $table
     * @param string $comment
     * @return mixed
     */
    public function setTableComment(string $table, string $comment);

    /**
     * @return bool
     */
    public function disconnect(): bool;

}
