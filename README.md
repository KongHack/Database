# GCWorld Database

![Packagist](https://img.shields.io/packagist/dm/gcworld/database.svg)
![Packagist](https://img.shields.io/packagist/dt/gcworld/database.svg)

![Packagist PHP](https://img.shields.io/packagist/php-v/gcworld/database.svg)
![Packagist](https://img.shields.io/packagist/v/gcworld/database.svg)
![GitHub](https://img.shields.io/github/tag/konghack/database.svg)

GCWorld Database is a MySQL/MariaDB data-access library built on PDO. It adds
connection defaults, retry and reconnect behavior, prepared-statement
failover, lightweight connection pooling, schema synchronization, and a
composable select query builder.

The package trusts developer-authored SQL structure. Dynamic or untrusted
values belong in prepared-statement parameters and must never be interpolated
into SQL fragments.

### Version
2.8.0

## Requirements

- PHP 8.4 or newer
- Composer 2
- PDO with the MySQL driver
- MySQL or MariaDB

## Installation

Install the package with Composer:

```console
composer require gcworld/database
```

The Composer `post-autoload-dump` hook creates
`config/GCWorld_Database.ini` in the consuming project when that file does not
already exist. Existing configuration is preserved.

## Configuration

The generated INI file contains connection-routing values used by GCWorld
applications and these settings consumed directly by this package:

```ini
common=\Fully\Qualified\Class\Name
common_loading=1

deadlock_retries=10
deadlock_usleep=2500

slow_query_log=false
slow_query_log_ms=1000
slow_query_log_callable=""
```

`deadlock_retries` controls how many times prepared operations may be retried.
`deadlock_usleep` is the delay between attempts in microseconds.

When slow-query logging is enabled, `slow_query_log_callable` must resolve to a
callable accepting the generated SQL, parameter array, duration in
milliseconds, and debug backtrace.

## Basic usage

Create a connection and apply the package defaults:

```php
<?php

use GCWorld\Database\Database;

$database = (new Database(
    'mysql:host=database;dbname=application;charset=utf8mb4',
    'application',
    'secret',
))->setDefaults();
```

`setDefaults()` enables exception mode, associative-array fetching, native
prepares, and `DatabaseStatement` as the prepared-statement class.

Use named parameters for dynamic values:

```php
$statement = $database->prepare(
    'SELECT id, email FROM users WHERE status = :status',
);
$statement->execute(['status' => 'active']);

$users = $statement->fetchAllArray();
```

`fetchAllArray()` always returns an array. `fetchAllNullable()` returns `null`
when no rows are available.

## Select query builder

`SelectBuilder` composes trusted MySQL/MariaDB `SELECT` structure and keeps
dynamic values separate as named parameters:

```php
$query = $database->selectBuilder()
    ->distinct()
    ->select('u.id', 'u.email')
    ->from('users', 'u')
    ->leftJoin('profiles', 'p', 'p.user_id = u.id')
    ->where('u.status = :status')
    ->andWhere('p.visible = :visible')
    ->orderBy('u.id DESC')
    ->limit(50)
    ->setParams([
        'status' => 'active',
        'visible' => true,
    ]);

$statement = $query->prepareAndExecute();
$users = $statement->fetchAllArray();
```

`getSql()` and `getParams()` are available for inspection and logging.
Production execution can remain within the DBAL through `prepare()` or
`prepareAndExecute()`.

Table names, aliases, selected columns, join conditions, predicates, grouping,
and ordering are trusted SQL fragments. The builder does not parse or quote
them. Parameter values are passed to `DatabaseStatement::execute()` and are
never interpolated into the generated SQL.

## Composable filters and joins

Joins are identified by their alias, falling back to the table expression when
no alias is supplied. Repeating the same definition is a no-op, allowing
independent filters to declare their dependencies without shared boolean
flags:

```php
$query->leftJoin(
    'members',
    'student',
    'student.id = shared.student_id',
);

// A second identical declaration is emitted only once.
$query->leftJoin(
    'members',
    'student',
    'student.id = shared.student_id',
);
```

Use distinct aliases when the same table has multiple roles:

```php
$query
    ->leftJoin(
        'members',
        'student',
        'student.id = shared.student_id',
    )
    ->leftJoin(
        'members',
        'administrator',
        'administrator.id = shared.administrator_id',
    );
```

`hasJoin()`, `getJoin()`, and `getJoins()` provide read-only inspection when a
filter needs to query the current composition:

```php
if ($query->hasJoin('student')) {
    $studentJoin = $query->getJoin('student');
}
```

Reusing an identity with a different table, join type, or `ON` condition raises
`DuplicateJoinConflictException`. Rendered joins use explicit grouping for
readable traces:

```sql
LEFT JOIN (members student) ON (student.id = shared.student_id)
```

## Predicates and clause composition

`where()`, `having()`, `select()`, `groupBy()`, and `orderBy()` replace their
respective clauses. Their `and*`, `or*`, and `add*` counterparts append to the
current clause.

Use `PredicateGroup` callbacks when boolean precedence requires parentheses:

```php
use GCWorld\Database\Query\PredicateGroup;

$query
    ->where('shared.active = :active')
    ->andWhereGroup(static function (PredicateGroup $group): void {
        $group
            ->where('student.enabled = :enabled')
            ->orWhere('administrator.enabled = :enabled');
    })
    ->setParams([
        'active' => true,
        'enabled' => true,
    ]);
```

This produces:

```sql
WHERE shared.active = :active
  AND (student.enabled = :enabled OR administrator.enabled = :enabled)
```

Groups may be nested and are also available for `HAVING`. The builder supports
`SELECT DISTINCT`, `GROUP BY`, `HAVING`, `ORDER BY`, `LIMIT`, and `OFFSET`.
Because MySQL and MariaDB reject a standalone `OFFSET`, an offset requires a
configured limit.

Named parameter identifiers may be supplied with or without a leading colon.
Repeating a parameter with the same value is a no-op; assigning a different
value to the same identifier raises `DuplicateParameterConflictException`.

## Connection behavior

`Database` retains PDO's query and transaction APIs while adding:

- configurable deadlock retries;
- reconnect attempts for recognized dropped-connection errors;
- optional query timing and call-site tracking;
- slow-query callbacks; and
- `ping()`, table inspection, and table-comment helpers.

`DatabaseStatement` retries deadlocks and can borrow a connection from its
pool when a prepared statement encounters an active unbuffered query. Borrowed
connections are returned when the statement cursor closes or the statement is
destroyed.

`DatabasePool::with()` provides scoped access to a pooled connection:

```php
use GCWorld\Database\Database;
use GCWorld\Database\DatabasePool;

$pool = new DatabasePool(
    'mysql:host=database;dbname=application;charset=utf8mb4',
    'application',
    'secret',
);

$result = $pool->with(static function (Database $database): array {
    $statement = $database->prepare(
        'SELECT id FROM jobs WHERE status = :status',
    );
    $statement->execute(['status' => 'queued']);

    return $statement->fetchAllArray();
});
```

## Schema synchronization

`Utilities\TableSync` compares a source table with a target table and generates
the required MySQL/MariaDB column and index alterations. Synchronization is a
dry run by default:

```php
use GCWorld\Database\Utilities\TableSync;

$preview = (new TableSync(
    $sourceDatabase,
    $targetDatabase,
    'source_table',
    'target_table',
))->synchronize();

$result = (new TableSync(
    $sourceDatabase,
    $targetDatabase,
    'source_table',
    'target_table',
))->synchronize(dryRun: false);
```

Table names are trusted identifiers and schema changes can be destructive.
Review generated SQL and use the dry-run result before enabling execution.

## Local development

The supported development environment uses the public KongHack PHP 8.4 image:

```console
./dc up -d
./dc exec php composer install
./dc exec php composer check
```

The committed Compose configuration mounts only this repository. Developers
who need private Composer authentication can copy
`docker-compose.override.yml.example` to the ignored
`docker-compose.override.yml`. That override exposes local Composer credentials
and SSH keys to container processes and should only be enabled when required.

The quality suite includes syntax checks, PHPStan level 6, PSR-12, and PHPUnit.
Run individual checks with `composer lint`, `composer phpstan`, `composer phpcs`,
or `composer test`.

## Releases

Releases use bare semantic-version tags such as `2.7.8`. Before tagging a
release:

1. Add grouped release notes beneath the matching version heading in
   `CHANGELOG.md`.
2. Update `VERSION` and the value immediately below `### Version` in this file.
3. Push the release commit and matching tag.

GitHub Actions validates the version metadata and PHP 8.4/8.5 quality matrix
before creating a GitHub Release from the matching changelog section. Release
tags must not be moved or reused.

## License

This package is licensed under the MIT License.
