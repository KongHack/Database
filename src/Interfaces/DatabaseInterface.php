<?php
namespace GCWorld\Database\Interfaces;

/**
 * Interface DatabaseInterface
 */
interface DatabaseInterface
{
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
