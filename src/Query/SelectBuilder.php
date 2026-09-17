<?php

namespace GCWorld\Database\Query;

use GCWorld\Database\Database;
use GCWorld\Database\DatabaseStatement;
use GCWorld\Database\Query\Exception\DuplicateJoinConflictException;
use GCWorld\Database\Query\Exception\DuplicateParameterConflictException;
use GCWorld\Database\Query\Exception\QueryBuilderException;

/**
 * Fluent builder for trusted MySQL/MariaDB SELECT query structure.
 */
final class SelectBuilder
{
    protected ?Database $db;
    protected bool $distinct = false;

    /** @var list<string> */
    protected array $columns = [];

    protected ?string $fromTable = null;
    protected ?string $fromAlias = null;

    /** @var list<Join> */
    protected array $joins = [];

    /** @var array<string, Join> */
    protected array $joinsByIdentity = [];

    protected PredicateGroup $where;

    /** @var list<string> */
    protected array $groupBy = [];

    protected PredicateGroup $having;

    /** @var list<string> */
    protected array $orderBy = [];

    protected ?int $limit  = null;
    protected ?int $offset = null;

    /** @var array<string, mixed> */
    protected array $params = [];

    public function __construct(?Database $db = null)
    {
        $this->db     = $db;
        $this->where  = new PredicateGroup();
        $this->having = new PredicateGroup();
    }

    public function distinct(bool $distinct = true): static
    {
        $this->distinct = $distinct;

        return $this;
    }

    /**
     * Replace the selected columns. Calling select() with no arguments restores SELECT *.
     */
    public function select(string ...$columns): static
    {
        $this->columns = [];

        return $this->addSelect(...$columns);
    }

    /**
     * Append columns to the selection.
     */
    public function addSelect(string ...$columns): static
    {
        foreach ($columns as $column) {
            $this->columns[] = $this->requireFragment($column, 'SELECT expression');
        }

        return $this;
    }

    public function from(string $table, ?string $alias = null): static
    {
        $this->fromTable = $this->requireFragment($table, 'FROM table');
        $this->fromAlias = $this->normalizeOptionalAlias($alias, 'FROM alias');

        return $this;
    }

    public function innerJoin(string $table, ?string $alias, string $on): static
    {
        return $this->addJoin(new Join('INNER', $table, $alias, $on));
    }

    public function leftJoin(string $table, ?string $alias, string $on): static
    {
        return $this->addJoin(new Join('LEFT', $table, $alias, $on));
    }

    public function hasJoin(string $aliasOrTable): bool
    {
        return isset($this->joinsByIdentity[trim($aliasOrTable)]);
    }

    public function getJoin(string $aliasOrTable): ?Join
    {
        return $this->joinsByIdentity[trim($aliasOrTable)] ?? null;
    }

    /**
     * @return list<Join>
     */
    public function getJoins(): array
    {
        return $this->joins;
    }

    /**
     * Replace the WHERE clause.
     */
    public function where(string $condition): static
    {
        $this->where->where($condition);

        return $this;
    }

    public function andWhere(string $condition): static
    {
        $this->where->andWhere($condition);

        return $this;
    }

    public function orWhere(string $condition): static
    {
        $this->where->orWhere($condition);

        return $this;
    }

    /**
     * @param callable(PredicateGroup): void $callback
     */
    public function whereGroup(callable $callback): static
    {
        $this->where->whereGroup($callback);

        return $this;
    }

    /**
     * @param callable(PredicateGroup): void $callback
     */
    public function andWhereGroup(callable $callback): static
    {
        $this->where->andWhereGroup($callback);

        return $this;
    }

    /**
     * @param callable(PredicateGroup): void $callback
     */
    public function orWhereGroup(callable $callback): static
    {
        $this->where->orWhereGroup($callback);

        return $this;
    }

    /**
     * Replace the GROUP BY expressions. Calling groupBy() with no arguments clears them.
     */
    public function groupBy(string ...$expressions): static
    {
        $this->groupBy = [];

        return $this->addGroupBy(...$expressions);
    }

    public function addGroupBy(string ...$expressions): static
    {
        foreach ($expressions as $expression) {
            $this->groupBy[] = $this->requireFragment($expression, 'GROUP BY expression');
        }

        return $this;
    }

    /**
     * Replace the HAVING clause.
     */
    public function having(string $condition): static
    {
        $this->having->where($condition);

        return $this;
    }

    public function andHaving(string $condition): static
    {
        $this->having->andWhere($condition);

        return $this;
    }

    public function orHaving(string $condition): static
    {
        $this->having->orWhere($condition);

        return $this;
    }

    /**
     * @param callable(PredicateGroup): void $callback
     */
    public function havingGroup(callable $callback): static
    {
        $this->having->whereGroup($callback);

        return $this;
    }

    /**
     * @param callable(PredicateGroup): void $callback
     */
    public function andHavingGroup(callable $callback): static
    {
        $this->having->andWhereGroup($callback);

        return $this;
    }

    /**
     * @param callable(PredicateGroup): void $callback
     */
    public function orHavingGroup(callable $callback): static
    {
        $this->having->orWhereGroup($callback);

        return $this;
    }

    /**
     * Replace the ORDER BY expressions. Calling orderBy() with no arguments clears them.
     */
    public function orderBy(string ...$expressions): static
    {
        $this->orderBy = [];

        return $this->addOrderBy(...$expressions);
    }

    public function addOrderBy(string ...$expressions): static
    {
        foreach ($expressions as $expression) {
            $this->orderBy[] = $this->requireFragment($expression, 'ORDER BY expression');
        }

        return $this;
    }

    public function limit(?int $limit): static
    {
        if ($limit !== null && $limit < 0) {
            throw new QueryBuilderException('LIMIT cannot be negative');
        }

        $this->limit = $limit;

        return $this;
    }

    public function offset(?int $offset): static
    {
        if ($offset !== null && $offset < 0) {
            throw new QueryBuilderException('OFFSET cannot be negative');
        }

        $this->offset = $offset;

        return $this;
    }

    public function setParam(string $name, mixed $value): static
    {
        $name = $this->normalizeParamName($name);
        if (array_key_exists($name, $this->params) && $this->params[$name] !== $value) {
            throw new DuplicateParameterConflictException(
                'Conflicting value provided for named parameter ":' . $name . '"'
            );
        }

        $this->params[$name] = $value;

        return $this;
    }

    /**
     * @param array<string, mixed> $params
     */
    public function setParams(array $params): static
    {
        foreach ($params as $name => $value) {
            if (!is_string($name)) {
                throw new QueryBuilderException('Parameter names must be strings');
            }

            $this->setParam($name, $value);
        }

        return $this;
    }

    public function hasParam(string $name): bool
    {
        return array_key_exists($this->normalizeParamName($name), $this->params);
    }

    /**
     * @return array<string, mixed>
     */
    public function getParams(): array
    {
        return $this->params;
    }

    public function setDatabase(?Database $db): static
    {
        $this->db = $db;

        return $this;
    }

    public function getDatabase(): ?Database
    {
        return $this->db;
    }

    public function prepare(?Database $db = null): DatabaseStatement
    {
        $resolvedDb = $db ?? $this->db;
        if ($resolvedDb === null) {
            throw new QueryBuilderException('No Database instance is available for prepare()');
        }

        $stmt = $resolvedDb->prepare($this->getSql());
        if ($stmt === false) {
            throw new QueryBuilderException('Failed to prepare generated SQL');
        }

        return $stmt;
    }

    public function prepareAndExecute(?Database $db = null): DatabaseStatement
    {
        $stmt = $this->prepare($db);
        if (!$stmt->execute($this->getParams())) {
            throw new QueryBuilderException('Failed to execute generated SQL');
        }

        return $stmt;
    }

    public function getSql(): string
    {
        if ($this->fromTable === null) {
            throw new QueryBuilderException('Cannot build SELECT without a FROM table');
        }
        if ($this->offset !== null && $this->limit === null) {
            throw new QueryBuilderException('OFFSET requires LIMIT for MySQL/MariaDB queries');
        }

        $sql = 'SELECT ';
        if ($this->distinct) {
            $sql .= 'DISTINCT ';
        }

        $sql .= $this->columns === [] ? '*' : implode(', ', $this->columns);
        $sql .= ' FROM ' . $this->fromTable;

        if ($this->fromAlias !== null) {
            $sql .= ' ' . $this->fromAlias;
        }

        foreach ($this->joins as $join) {
            $sql .= ' ' . $join->render();
        }

        if (!$this->where->isEmpty()) {
            $sql .= ' WHERE ' . $this->where->render();
        }

        if ($this->groupBy !== []) {
            $sql .= ' GROUP BY ' . implode(', ', $this->groupBy);
        }

        if (!$this->having->isEmpty()) {
            $sql .= ' HAVING ' . $this->having->render();
        }

        if ($this->orderBy !== []) {
            $sql .= ' ORDER BY ' . implode(', ', $this->orderBy);
        }

        if ($this->limit !== null) {
            $sql .= ' LIMIT ' . $this->limit;
        }

        if ($this->offset !== null) {
            $sql .= ' OFFSET ' . $this->offset;
        }

        return $sql;
    }

    protected function addJoin(Join $join): static
    {
        $identity = $join->identity();
        $existing = $this->joinsByIdentity[$identity] ?? null;

        if ($existing !== null) {
            if (!$existing->sameDefinition($join)) {
                throw new DuplicateJoinConflictException(
                    'Conflicting JOIN definition for alias/table "' . $identity . '"'
                );
            }

            return $this;
        }

        $this->joins[]                    = $join;
        $this->joinsByIdentity[$identity] = $join;

        return $this;
    }

    protected function normalizeParamName(string $name): string
    {
        $name = trim($name);
        if (str_starts_with($name, ':')) {
            $name = substr($name, 1);
        }

        if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/D', $name)) {
            throw new QueryBuilderException('Invalid named parameter "' . $name . '"');
        }

        return $name;
    }

    protected function requireFragment(string $fragment, string $description): string
    {
        $fragment = trim($fragment);
        if ($fragment === '') {
            throw new QueryBuilderException($description . ' cannot be empty');
        }

        return $fragment;
    }

    protected function normalizeOptionalAlias(?string $alias, string $description): ?string
    {
        if ($alias === null) {
            return null;
        }

        return $this->requireFragment($alias, $description);
    }
}
