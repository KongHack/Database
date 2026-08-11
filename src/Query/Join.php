<?php
namespace GCWorld\Database\Query;

/**
 * Join Final Class
 */
final readonly class Join
{
    public string $type;
    public string $table;
    public ?string $alias;
    public string $on;
    public ?string $key;

    /**
     * @param string $type
     * @param string $table
     * @param string|null $alias
     * @param string $on
     * @param string|null $key
     */
    public function __construct(
        string $type,
        string $table,
        ?string $alias,
        string $on,
        ?string $key = null
    ) {
        $table = trim($table);
        $alias = $alias !== null ? trim($alias) : null;
        $on    = self::normalizeSqlFragment($on);
        $key   = $key !== null ? trim($key) : null;

        $this->type  = strtoupper(trim($type));
        $this->table = $table;
        $this->alias = $alias !== '' ? $alias : null;
        $this->on    = $on;
        $this->key   = $key !== '' ? $key : null;
    }

    /**
     * @return string
     */
    public function signature(): string
    {
        return implode('|', [
            $this->type,
            $this->table,
            $this->alias ?? '',
            $this->on,
        ]);
    }

    /**
     * @param Join $other
     * @return bool
     */
    public function sameDefinition(self $other): bool
    {
        return $this->type === $other->type
            && $this->table === $other->table
            && $this->alias === $other->alias
            && $this->on === $other->on;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $sql = $this->type.' JOIN '.$this->table;
        if($this->alias !== null) {
            $sql .= ' '.$this->alias;
        }

        return $sql.' ON '.$this->on;
    }

    /**
     * @param string $sql
     * @return string
     */
    protected static function normalizeSqlFragment(string $sql): string
    {
        return preg_replace('/\s+/', ' ', trim($sql)) ?? trim($sql);
    }
}
