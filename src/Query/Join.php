<?php

namespace GCWorld\Database\Query;

use GCWorld\Database\Query\Exception\QueryBuilderException;

/**
 * Immutable JOIN definition.
 */
final readonly class Join
{
    private const SUPPORTED_TYPES = [
        'INNER',
        'LEFT',
    ];

    public string $type;
    public string $table;
    public ?string $alias;
    public string $on;

    public function __construct(string $type, string $table, ?string $alias, string $on)
    {
        $type  = strtoupper(trim($type));
        $table = trim($table);
        $alias = $alias !== null ? trim($alias) : null;
        $on    = trim($on);

        if (!in_array($type, self::SUPPORTED_TYPES, true)) {
            throw new QueryBuilderException('Unsupported JOIN type "' . $type . '"');
        }
        if ($table === '') {
            throw new QueryBuilderException('JOIN table cannot be empty');
        }
        if ($alias === '') {
            throw new QueryBuilderException('JOIN alias cannot be empty');
        }
        if ($on === '') {
            throw new QueryBuilderException('JOIN condition cannot be empty');
        }

        $this->type  = $type;
        $this->table = $table;
        $this->alias = $alias;
        $this->on    = $on;
    }

    /**
     * A join is addressed by its alias, falling back to its table expression.
     */
    public function identity(): string
    {
        return $this->alias ?? $this->table;
    }

    public function sameDefinition(self $other): bool
    {
        return $this->type === $other->type
            && $this->table === $other->table
            && $this->alias === $other->alias
            && $this->on === $other->on;
    }

    public function render(): string
    {
        $table = $this->table;
        if ($this->alias !== null) {
            $table .= ' ' . $this->alias;
        }

        return $this->type . ' JOIN (' . $table . ') ON (' . $this->on . ')';
    }
}
