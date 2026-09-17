<?php

namespace GCWorld\Database\Query;

use GCWorld\Database\Query\Exception\QueryBuilderException;

/**
 * A composable group of trusted SQL predicates.
 */
final class PredicateGroup
{
    /** @var list<array{operator: 'AND'|'OR', predicate: string|self}> */
    private array $predicates = [];

    public function where(string $predicate): static
    {
        $this->predicates = [];

        return $this->addPredicate('AND', $predicate);
    }

    public function andWhere(string $predicate): static
    {
        return $this->addPredicate('AND', $predicate);
    }

    public function orWhere(string $predicate): static
    {
        return $this->addPredicate('OR', $predicate);
    }

    /**
     * @param callable(self): void $callback
     */
    public function whereGroup(callable $callback): static
    {
        $this->predicates = [];

        return $this->addGroup('AND', $callback);
    }

    /**
     * @param callable(self): void $callback
     */
    public function andWhereGroup(callable $callback): static
    {
        return $this->addGroup('AND', $callback);
    }

    /**
     * @param callable(self): void $callback
     */
    public function orWhereGroup(callable $callback): static
    {
        return $this->addGroup('OR', $callback);
    }

    public function isEmpty(): bool
    {
        return $this->predicates === [];
    }

    public function render(): string
    {
        $parts = [];

        foreach ($this->predicates as $index => $clause) {
            $predicate = $clause['predicate'];
            $sql       = $predicate instanceof self
                ? '(' . $predicate->render() . ')'
                : $predicate;

            $parts[] = $index === 0
                ? $sql
                : $clause['operator'] . ' ' . $sql;
        }

        return implode(' ', $parts);
    }

    /**
     * @param 'AND'|'OR' $operator
     */
    private function addPredicate(string $operator, string $predicate): static
    {
        $predicate = trim($predicate);
        if ($predicate === '') {
            throw new QueryBuilderException('Predicate cannot be empty');
        }

        $this->predicates[] = [
            'operator'  => $operator,
            'predicate' => $predicate,
        ];

        return $this;
    }

    /**
     * @param 'AND'|'OR' $operator
     * @param callable(self): void $callback
     */
    private function addGroup(string $operator, callable $callback): static
    {
        $group = new self();
        $callback($group);

        if ($group->isEmpty()) {
            throw new QueryBuilderException('Predicate group cannot be empty');
        }

        $this->predicates[] = [
            'operator'  => $operator,
            'predicate' => $group,
        ];

        return $this;
    }
}
