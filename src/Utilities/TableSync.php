<?php
namespace GCWorld\Database\Utilities;

use Exception;
use GCWorld\Database\Database;
use PDO;
use PDOException;

/**
 * TableSync Class.
 */
class TableSync
{
    protected array $alterations  = [];
    protected array $sourceSchema = [];
    protected array $targetSchema = [];

    /**
     * @param Database $sourceDB
     * @param Database $targetDB
     * @param string   $sourceTable
     * @param string   $targetTable
     *
     * @throws Exception
     */
    public function __construct(
        protected Database $sourceDB,
        protected Database $targetDB,
        protected string $sourceTable,
        protected string $targetTable
    ) {
        if (!$this->sourceDB->tableExists($this->sourceTable)) {
            throw new Exception('Source Table Does Not Exist');
        }
    }

    /**
     * @param bool $dryRun If true, will only generate SQL without executing it
     *
     * @return array Result information including SQL statements and execution status
     */
    public function synchronize(bool $dryRun = true): array
    {
        if (!$this->targetDB->tableExists($this->targetTable)) {
            $sql = 'SHOW CREATE TABLE `'.$this->sourceTable.'`';
            $qry = $this->sourceDB->prepare($sql);
            $qry->execute();
            $row = $qry->fetch();
            $qry->closeCursor();
            $create = $row['Create Table'];
            $create = \str_replace('`'.$this->sourceTable.'`', '`'.$this->targetTable.'`', $create);

            if (!$dryRun) {
                $this->targetDB->exec($create);
            }

            return [
                'alterations' => [],
                'sql'         => $create,
                'executed'    => !$dryRun,
                'message'     => 'Target table does not exist, creating instead',
            ];
        }

        $this->loadSchemas();
        $this->compareColumns();
        $this->compareIndexes();

        $result = [
            'alterations' => $this->alterations,
            'sql'         => null,
            'executed'    => false,
            'message'     => '',
        ];

        if (empty($this->alterations)) {
            $result['message'] = 'No schema differences found. Tables are already synchronized.';

            return $result;
        }

        $result['sql'] = "ALTER TABLE `{$this->targetTable}` ".\implode(', ', $this->alterations);

        if (!$dryRun) {
            try {
                $this->targetDB->exec($result['sql']);
                $result['executed'] = true;
                $result['message']  = 'Schema synchronization completed successfully.';
            } catch (PDOException $e) {
                $result['message'] = 'Error during schema synchronization: '.$e->getMessage();
            }
        } else {
            $result['message'] = 'Dry run completed. SQL statement generated but not executed.';
        }

        return $result;
    }

    /**
     * Load schema information for both tables.
     *
     * @return void
     */
    protected function loadSchemas(): void
    {
        $this->sourceSchema = $this->getTableSchema($this->sourceDB, $this->sourceTable);
        $this->targetSchema = $this->getTableSchema($this->targetDB, $this->targetTable);
    }

    /**
     * @param Database $cDB
     * @param string   $tableName
     *
     * @return array Schema information
     */
    protected function getTableSchema(Database $cDB, string $tableName): array
    {
        // Get column information
        $columnsStmt = $cDB->query("SHOW FULL COLUMNS FROM `{$tableName}`");
        $columns     = $columnsStmt->fetchAll(PDO::FETCH_ASSOC);

        // Get index information
        $indexesStmt = $cDB->query("SHOW INDEX FROM `{$tableName}`");
        $indexes     = $indexesStmt->fetchAll(PDO::FETCH_ASSOC);

        // Get create table statement for additional details
        $createStmt  = $cDB->query("SHOW CREATE TABLE `{$tableName}`");
        $createTable = $createStmt->fetch(PDO::FETCH_ASSOC);

        // Prepare column mapping for easier lookup
        $columnsMap = [];
        foreach ($columns as $column) {
            $columnsMap[$column['Field']] = $column;
        }

        // Prepare index mapping
        $indexGroups = [];
        foreach ($indexes as $index) {
            $indexGroups[$index['Key_name']][] = $index;
        }

        return [
            'columns'     => $columns,
            'columnsMap'  => $columnsMap,
            'indexes'     => $indexes,
            'indexGroups' => $indexGroups,
            'createTable' => $createTable['Create Table'],
        ];
    }

    /**
     * Compare columns between source and target tables.
     *
     * @return void
     */
    protected function compareColumns(): void
    {
        $sourceColumns = $this->sourceSchema['columnsMap'];
        $targetColumns = $this->targetSchema['columnsMap'];

        // Check for columns to add or modify
        foreach ($sourceColumns as $columnName => $sourceColumn) {
            if (!isset($targetColumns[$columnName])) {
                // Column doesn't exist in target table - add it
                $this->alterations[] = $this->generateAddColumnSQL($columnName, $sourceColumn);
            } else {
                // Column exists - check if it needs modification
                $targetColumn = $targetColumns[$columnName];
                if ($this->columnNeedsModification($sourceColumn, $targetColumn)) {
                    $this->alterations[] = $this->generateModifyColumnSQL($columnName, $sourceColumn);
                }
            }
        }

        // Check for columns to drop
        foreach ($targetColumns as $columnName => $targetColumn) {
            if (!isset($sourceColumns[$columnName])) {
                $this->alterations[] = "DROP COLUMN `{$columnName}`";
            }
        }
    }

    /**
     * @param array $sourceColumn
     * @param array $targetColumn
     *
     * @return bool True if modification is needed
     */
    protected function columnNeedsModification(array $sourceColumn, array $targetColumn): bool
    {
        return $sourceColumn['Type'] !== $targetColumn['Type']
            || $sourceColumn['Null'] !== $targetColumn['Null']
            || $sourceColumn['Default'] !== $targetColumn['Default']
            || $sourceColumn['Extra'] !== $targetColumn['Extra']
            || $sourceColumn['Comment'] !== $targetColumn['Comment'];
    }

    /**
     * Generate SQL for adding a column.
     *
     * @param string $columnName Column name
     * @param array  $columnDef  Column definition
     *
     * @return string SQL statement
     */
    protected function generateAddColumnSQL(string $columnName, array $columnDef): string
    {
        $sql = $this->generateColumnDefinitionSQL($columnName, $columnDef);

        // Determine position
        $position          = '';
        $sourceColumnNames = \array_keys($this->sourceSchema['columnsMap']);
        $sourceColumnIndex = \array_search($columnName, $sourceColumnNames);

        if ($sourceColumnIndex > 0) {
            $prevColumnName = $sourceColumnNames[$sourceColumnIndex - 1];
            if (isset($this->targetSchema['columnsMap'][$prevColumnName])) {
                $position = " AFTER `{$prevColumnName}`";
            }
        } elseif (0 === $sourceColumnIndex) {
            $position = ' FIRST';
        }

        return "ADD COLUMN {$sql}{$position}";
    }

    /**
     * @param string $columnName Column name
     * @param array  $columnDef  Column definition
     *
     * @return string SQL statement
     */
    protected function generateModifyColumnSQL(string $columnName, array $columnDef): string
    {
        $sql = $this->generateColumnDefinitionSQL($columnName, $columnDef);

        return "MODIFY COLUMN {$sql}";
    }

    /**
     * @param string $columnName Column name
     * @param array  $columnDef  Column definition
     *
     * @return string SQL statement
     */
    protected function generateColumnDefinitionSQL(string $columnName, array $columnDef): string
    {
        $sql = "`{$columnName}` {$columnDef['Type']}";

        if ('NO' === $columnDef['Null']) {
            $sql .= ' NOT NULL';
        } else {
            $sql .= ' NULL';
        }

        if (null !== $columnDef['Default']) {
            $sql .= ' DEFAULT '.('CURRENT_TIMESTAMP' === $columnDef['Default'] ?
                    'CURRENT_TIMESTAMP' :
                    "'{$columnDef['Default']}'");
        }

        if (!empty($columnDef['Extra'])) {
            $sql .= " {$columnDef['Extra']}";
        }

        if (!empty($columnDef['Comment'])) {
            $sql .= " COMMENT '{$columnDef['Comment']}'";
        }

        return $sql;
    }

    /**
     * Compare indexes between source and target tables.
     *
     * @return void
     */
    protected function compareIndexes(): void
    {
        $sourceIndexGroups = $this->sourceSchema['indexGroups'];
        $targetIndexGroups = $this->targetSchema['indexGroups'];

        // Drop indexes that don't exist in source or are different
        foreach ($targetIndexGroups as $indexName => $indexGroup) {
            if ('PRIMARY' === $indexName) {
                continue; // Handle primary keys separately
            }

            if (!isset($sourceIndexGroups[$indexName])
                || !$this->compareIndexDefinitions($sourceIndexGroups[$indexName], $indexGroup)) {
                $this->alterations[] = "DROP INDEX `{$indexName}`";
            }
        }

        // Add indexes from source that don't exist in target or are different
        foreach ($sourceIndexGroups as $indexName => $indexGroup) {
            if ('PRIMARY' === $indexName) {
                continue; // Handle primary keys separately
            }

            if (!isset($targetIndexGroups[$indexName])
                || !$this->compareIndexDefinitions($indexGroup, $targetIndexGroups[$indexName])) {
                $this->alterations[] = $this->generateAddIndexSQL($indexName, $indexGroup);
            }
        }

        // Handle primary key if needed
        $sourcePrimaryKey = $sourceIndexGroups['PRIMARY'] ?? [];
        $targetPrimaryKey = $targetIndexGroups['PRIMARY'] ?? [];

        if (!$this->compareIndexDefinitions($sourcePrimaryKey, $targetPrimaryKey)) {
            // Drop existing primary key if it exists
            if (!empty($targetPrimaryKey)) {
                $this->alterations[] = 'DROP PRIMARY KEY';
            }

            // Add new primary key if source has one
            if (!empty($sourcePrimaryKey)) {
                $this->alterations[] = $this->generatePrimaryKeySQL($sourcePrimaryKey);
            }
        }
    }

    /**
     * Compare two index definitions.
     *
     * @param array $index1 First index definition
     * @param array $index2 Second index definition
     *
     * @return bool True if indexes are identical
     */
    protected function compareIndexDefinitions(array $index1, array $index2): bool
    {
        if (\count($index1) !== \count($index2)) {
            return false;
        }

        for ($i = 0; $i < \count($index1); ++$i) {
            if ($index1[$i]['Column_name'] !== $index2[$i]['Column_name']
                || $index1[$i]['Sub_part'] !== $index2[$i]['Sub_part']
                || $index1[$i]['Non_unique'] !== $index2[$i]['Non_unique']) {
                return false;
            }
        }

        return true;
    }

    /**
     * Generate SQL for adding an index.
     *
     * @param string $indexName  Index name
     * @param array  $indexGroup Index definition
     *
     * @return string SQL statement
     */
    protected function generateAddIndexSQL(string $indexName, array $indexGroup): string
    {
        $indexDef = '';
        if (0 == $indexGroup[0]['Non_unique']) {
            $indexDef = 'UNIQUE ';
        }

        $indexDef    .= "INDEX `{$indexName}` (";
        $indexColumns = [];
        foreach ($indexGroup as $index) {
            $length         = !empty($index['Sub_part']) ? "({$index['Sub_part']})" : '';
            $indexColumns[] = "`{$index['Column_name']}`{$length}";
        }
        $indexDef .= \implode(', ', $indexColumns).')';

        return "ADD {$indexDef}";
    }

    /**
     * Generate SQL for adding a primary key.
     *
     * @param array $primaryKey Primary key definition
     *
     * @return string SQL statement
     */
    protected function generatePrimaryKeySQL(array $primaryKey): string
    {
        $pkColumns = [];
        foreach ($primaryKey as $index) {
            $pkColumns[] = "`{$index['Column_name']}`";
        }

        return 'ADD PRIMARY KEY ('.\implode(', ', $pkColumns).')';
    }
}
