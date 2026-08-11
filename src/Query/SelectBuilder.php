<?php
namespace GCWorld\Database\Query;

use GCWorld\Database\Database;
use GCWorld\Database\DatabaseStatement;
use GCWorld\Database\Query\Exception\DuplicateJoinConflictException;
use GCWorld\Database\Query\Exception\DuplicateParameterConflictException;
use GCWorld\Database\Query\Exception\QueryBuilderException;

/**
 * SelectBuilder Final Class.
 */
final class SelectBuilder
{
    protected ?Database $db = null;
    protected array $columns      = [];
    protected ?string $fromTable  = null;
    protected ?string $fromAlias  = null;
    protected array $joins        = [];
    protected array $joinsByKey   = [];
    protected array $joinsByAlias = [];
    protected array $where        = [];
    protected array $groupBy      = [];
    protected array $orderBy      = [];
    protected ?int $limit         = null;
    protected ?int $offset        = null;
    protected array $params       = [];

    /**
     * @param Database|null $db
     */
    public function __construct(?Database $db = null)
    {
        $this->db = $db;
    }

    /**
     * @param string ...$columns
     * @return $this
     */
    public function select(string ...$columns): static
    {
        foreach($columns as $column) {
            $column = trim($column);
            if($column !== '') {
                $this->columns[] = $column;
            }
        }

        return $this;
    }

    /**
     * @param string $table
     * @param string|null $alias
     * @return $this
     */
    public function from(string $table, ?string $alias = null): static
    {
        $table = trim($table);
        if($table === '') {
            throw new QueryBuilderException('FROM table cannot be empty');
        }

        $alias = $alias !== null ? trim($alias) : null;

        $this->fromTable = $table;
        $this->fromAlias = $alias !== '' ? $alias : null;

        return $this;
    }

    /**
     * @param string $table
     * @param string|null $alias
     * @param string $on
     * @param string|null $key
     * @return $this
     */
    public function innerJoin(string $table, ?string $alias, string $on, ?string $key = null): static
    {
        return $this->addJoin(new Join('INNER', $table, $alias, $on, $key));
    }

    /**
     * @param string $table
     * @param string|null $alias
     * @param string $on
     * @param string|null $key
     * @return $this
     */
    public function leftJoin(string $table, ?string $alias, string $on, ?string $key = null): static
    {
        return $this->addJoin(new Join('LEFT', $table, $alias, $on, $key));
    }

    /**
     * @param string $condition
     * @return $this
     */
    public function where(string $condition): static
    {
        return $this->addWhereClause(empty($this->where) ? 'ROOT' : 'AND', $condition);
    }

    /**
     * @param string $condition
     * @return $this
     */
    public function andWhere(string $condition): static
    {
        return $this->addWhereClause(empty($this->where) ? 'ROOT' : 'AND', $condition);
    }

    /**
     * @param string $condition
     * @return $this
     */
    public function orWhere(string $condition): static
    {
        return $this->addWhereClause(empty($this->where) ? 'ROOT' : 'OR', $condition);
    }

    /**
     * @param string ...$expressions
     * @return $this
     */
    public function groupBy(string ...$expressions): static
    {
        foreach($expressions as $expression) {
            $expression = trim($expression);
            if($expression !== '') {
                $this->groupBy[] = $expression;
            }
        }

        return $this;
    }

    /**
     * @param string ...$expressions
     * @return $this
     */
    public function orderBy(string ...$expressions): static
    {
        foreach($expressions as $expression) {
            $expression = trim($expression);
            if($expression !== '') {
                $this->orderBy[] = $expression;
            }
        }

        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): static
    {
        if($limit < 0) {
            throw new QueryBuilderException('LIMIT cannot be negative');
        }

        $this->limit = $limit;

        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function offset(int $offset): static
    {
        if($offset < 0) {
            throw new QueryBuilderException('OFFSET cannot be negative');
        }

        $this->offset = $offset;

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setParam(string $name, mixed $value): static
    {
        $name = $this->normalizeParamName($name);
        if(array_key_exists($name, $this->params) && $this->params[$name] !== $value) {
            throw new DuplicateParameterConflictException(
                'Conflicting value provided for named parameter ":'.$name.'"'
            );
        }

        $this->params[$name] = $value;

        return $this;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params): static
    {
        foreach($params as $name => $value) {
            if(!is_string($name) || trim($name) === '') {
                throw new QueryBuilderException('Parameter names must be non-empty strings');
            }

            $this->setParam($name, $value);
        }

        return $this;
    }

    /**
     * @param string $keyOrSignature
     * @return bool
     */
    public function hasJoin(string $keyOrSignature): bool
    {
        return isset($this->joinsByKey[$keyOrSignature]);
    }

    /**
     * @param Database|null $db
     * @return $this
     */
    public function setDatabase(?Database $db): static
    {
        $this->db = $db;

        return $this;
    }

    /**
     * @return Database|null
     */
    public function getDatabase(): ?Database
    {
        return $this->db;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param Database|null $db
     * @return DatabaseStatement
     */
    public function prepare(?Database $db = null): DatabaseStatement
    {
        $resolvedDb = $db ?? $this->db;
        if($resolvedDb === null) {
            throw new QueryBuilderException('No Database instance is available for prepare()');
        }

        $stmt = $resolvedDb->prepare($this->getSql());
        if($stmt === false) {
            throw new QueryBuilderException('Failed to prepare generated SQL');
        }

        return $stmt;
    }

    /**
     * @param Database|null $db
     * @return DatabaseStatement
     */
    public function prepareAndExecute(?Database $db = null): DatabaseStatement
    {
        $stmt = $this->prepare($db);
        $stmt->execute($this->getParams());

        return $stmt;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        if($this->fromTable === null) {
            throw new QueryBuilderException('Cannot build SELECT without a FROM table');
        }

        $sql = 'SELECT '.(empty($this->columns) ? '*' : implode(', ', $this->columns));
        $sql .= ' FROM '.$this->fromTable;
        if($this->fromAlias !== null) {
            $sql .= ' '.$this->fromAlias;
        }

        foreach($this->joins as $join) {
            $sql .= ' '.$join->render();
        }

        if(!empty($this->where)) {
            $sql .= ' WHERE '.$this->renderWhere();
        }

        if(!empty($this->groupBy)) {
            $sql .= ' GROUP BY '.implode(', ', $this->groupBy);
        }

        if(!empty($this->orderBy)) {
            $sql .= ' ORDER BY '.implode(', ', $this->orderBy);
        }

        if($this->limit !== null) {
            $sql .= ' LIMIT '.$this->limit;
        }

        if($this->offset !== null) {
            $sql .= ' OFFSET '.$this->offset;
        }

        return $sql;
    }

    /**
     * @param Join $join
     * @return $this
     */
    protected function addJoin(Join $join): static
    {
        $joinLookupKey = $join->key ?? $join->signature();

        if(isset($this->joinsByKey[$joinLookupKey])) {
            if(!$this->joinsByKey[$joinLookupKey]->sameDefinition($join)) {
                throw new DuplicateJoinConflictException(
                    'Join key/signature conflict detected for "'.$joinLookupKey.'"'
                );
            }

            return $this;
        }

        $aliasKey = $join->alias ?? $join->table;
        if(isset($this->joinsByAlias[$aliasKey]) && !$this->joinsByAlias[$aliasKey]->sameDefinition($join)) {
            throw new DuplicateJoinConflictException(
                'Join alias/table conflict detected for "'.$aliasKey.'"'
            );
        }

        $this->joins[]                  = $join;
        $this->joinsByKey[$joinLookupKey] = $join;
        $this->joinsByAlias[$aliasKey]  = $join;

        return $this;
    }

    /**
     * @param string $type
     * @param string $condition
     * @return $this
     */
    protected function addWhereClause(string $type, string $condition): static
    {
        $condition = trim($condition);
        if($condition === '') {
            throw new QueryBuilderException('WHERE condition cannot be empty');
        }

        $this->where[] = [
            'type' => $type,
            'sql'  => $condition,
        ];

        return $this;
    }

    /**
     * @return string
     */
    protected function renderWhere(): string
    {
        $parts = [];
        foreach($this->where as $index => $clause) {
            if($index === 0 || $clause['type'] === 'ROOT') {
                $parts[] = $clause['sql'];
                continue;
            }

            $parts[] = $clause['type'].' '.$clause['sql'];
        }

        return implode(' ', $parts);
    }

    /**
     * @param string $name
     * @return string
     */
    protected function normalizeParamName(string $name): string
    {
        $name = ltrim(trim($name), ':');
        if($name === '') {
            throw new QueryBuilderException('Parameter name cannot be empty');
        }

        return $name;
    }
}
