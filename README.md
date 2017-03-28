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


### Version
2.2.1

### Additional Information

* [GCWorld Public Gitlab](https://gitlab.konghack.com/groups/GCWorld)
