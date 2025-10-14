<?php
namespace GCWorld\Database;

/**
 * DatabasePool Class
 */
class DatabasePool
{
    protected array $free = [];
    protected \SplObjectStorage $inUse;
    protected int $max;

    /**
     * @param string $dsn
     * @param string|null $username
     * @param string|null $password
     * @param array|null $options
     * @param int $maxSize
     */
    public function __construct(
        protected readonly string $dsn,
        protected readonly ?string $username = null,
        protected readonly ?string $password = null,
        protected readonly ?array $options = null,
        int $maxSize = 8
    ) {
        $this->inUse = new \SplObjectStorage();
        $this->max   = max(1, $maxSize);
    }

    /**
     * @return Database
     */
    public function get(): Database
    {
        if($out = array_pop($this->free)) {
            $this->inUse->attach($out);
            return $out;
        }
        if(count($this->inUse) >= $this->max) {
            throw new \RuntimeException('Database pool exhausted for this request');
        }

        $cDB = new Database($this->dsn, $this->username, $this->password, $this->options);
        $this->inUse->attach($cDB);

        return $cDB;
    }

    /**
     * @param Database $cDB
     * @return void
     */
    public function put(Database $cDB): void
    {
        if($this->inUse->contains($cDB)) {
            $this->inUse->detach($cDB);
            $this->free[] = $cDB;
        }
    }

    /**
     * @param callable $fn
     * @return mixed
     */
    public function with(callable $fn): mixed
    {
        $cDB = $this->get();
        try {
            return $fn($cDB);
        } finally {
            $this->put($cDB);
        }
    }
}