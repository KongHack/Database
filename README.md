# GCWorld Database

The GCWorld database system was originally a simple extension of PDO, but has grown into a much larger product.

## Features

  - Additional functions
    - ping (Simple select 1 to keep a connection alive)
    - table exists (Check to see if a table exists)
    - get working database name (Get the name of the current database)
    - get table comment (Get the comment of a table)
    - set table comment (Set the comment of a table)
    - set defaults (Switch to exception mode, default to fetch assoc, disable emulated prepares, ensure we will be returning our own db statement)
  - Deadlock Protection (retries and usleep)
  - New controller to remap reads and writes to different connections
    - Note: This feature only applies to prepared statements
  - Lightweight MySQL/MariaDB SELECT query builder
    - Named parameter support for PDO
    - Join de-duplication by explicit key or normalized join signature
    - Conflict detection for duplicate joins or parameter names with different values

## Query Builder

The query builder is intentionally small and focused on `SELECT` generation for MySQL/MariaDB use cases.

Example:

```php
use GCWorld\Database\Query\SelectBuilder;

$qb = (new SelectBuilder())
    ->select('u.id', 'u.email')
    ->from('users', 'u')
    ->leftJoin('table_a', 'ta', 'ta.user_id = u.id', 'user_table_a')
    ->where('u.status = :status')
    ->setParam('status', 'active')
    ->orderBy('u.id DESC')
    ->limit(50);

$sql    = $qb->getSql();
$params = $qb->getParams();

$stmt = $db->prepare($sql);
$stmt->execute($params);
```

Or, with the optional `Database` convenience:

```php
$qry = $db->selectBuilder()
    ->select('u.id', 'u.email')
    ->from('users', 'u')
    ->where('u.status = :status')
    ->setParam('status', 'active')
    ->prepareAndExecute();
```

Duplicate joins are emitted once when the same key or normalized definition is reused. Conflicting definitions raise an exception instead of silently changing query structure.

Named parameters are stored internally without the leading `:` so the output of `getParams()` can be passed directly to PDO `execute()`.

## Development

The repository includes a Docker Compose environment based on the same PHP image used in CI:

```bash
./dc up -d
./dc exec php composer install
./dc exec php composer check
```

Copy `docker-compose.override.yml.example` to `docker-compose.override.yml` when local Composer credentials or SSH access are required. The override file is ignored by Git.

The Composer quality suite runs PHP syntax checks, PHPStan level 6, PHPCS with PSR-12, and PHPUnit tests. GitHub Actions runs the suite on PHP 8.4 and 8.5. Semantic-version tags also validate the version metadata and create GitHub releases from the matching changelog entry.

### Version
2.7.8
