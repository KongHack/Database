# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased](https://gitlab.konghack.com/GCWorld/Database)



## [2.6.5](https://github.com/KongHack/Database/releases/tag/2.6.5)
- @GameCharmer Update Composer Dependencies



## [2.6.4](https://github.com/KongHack/Database/releases/tag/2.6.4)
- @GameCharmer Update composer/composer



## [2.6.3](https://github.com/KongHack/Database/releases/tag/2.6.3)
- @GameCharmer Update composer dependencies (Dependabot)



## [2.6.2](https://github.com/KongHack/Database/releases/tag/2.6.2)
- @GameCharmer Update composer installers dependency



## [2.6.1](https://github.com/KongHack/Database/releases/tag/2.6.1)
- @GameCharmer Prevent implicit conversion from float



## [2.6.0](https://github.com/KongHack/Database/releases/tag/2.6.0)
- @GameCharmer PHP 8.1 Compatibility


## [2.5.5](https://github.com/KongHack/Database/releases/tag/2.5.5)
 - @GameCharmer Deal with Interfaces



## [2.5.4](https://github.com/KongHack/Database/releases/tag/2.5.4)
 - @GameCharmer Add setter methods to Config 



## [2.5.2](https://github.com/KongHack/Database/releases/tag/2.5.2)
 - @GameCharmer Cleanup, PHPStan Update



## [2.5.1](https://github.com/KongHack/Database/releases/tag/2.5.1)
 - @GameCharmer Adjustment to Config



## [2.5.0](https://github.com/KongHack/Database/releases/tag/2.5.0)
 - @GameCharmer Update Minimum PHP to 8.0
 - @GameCharmer Implement new Database Interface
 - @GameCharmer NEW Slow Query Log System



## [2.4.3](https://github.com/KongHack/Database/releases/tag/2.4.3)
 - @GameCharmer `fetchAllArray` additional method to assist with fixed typing



## [2.4.2](https://github.com/KongHack/Database/releases/tag/2.4.2)
 - @GameCharmer Avoid overloading fetchAll and instead go with `fetchAllNullable`



## [2.4.1](https://github.com/KongHack/Database/releases/tag/2.4.1)
 - @GameCharmer of course PDO would have an issue with `...$args` that PHPStorm auto-generated
   Adding an extra if/else layer on empty args



## [2.4.0](https://github.com/KongHack/Database/releases/tag/2.4.0)
 - @GameCharmer Override FetchAll to return null instead of false



## [2.3.17](https://github.com/KongHack/Database/releases/tag/2.3.17)
 - @GameCharmer Update Composer Dependencies



## [2.3.16](https://github.com/KongHack/Database/releases/tag/2.3.16)
 - @GameCharmer Upgrade exception handling from PDO Exception to full Exception
 - @GameCharmer Composer Update



## [2.3.15](https://github.com/KongHack/Database/releases/tag/2.3.15)
 - @GameCharmer Cleanup and optimize prepare retry system
   - ***NOT TESTED WITH CONTROLLERS***, but it should work



## [2.3.14](https://github.com/KongHack/Database/releases/tag/2.3.14)
 - @GameCharmer Composer Update
 
 - composer/installers updated from v1.6.0 to v1.7.0  
   See changes: https://github.com/composer/installers/compare/v1.6.0...v1.7.0  
   Release notes: https://github.com/composer/installers/releases/tag/v1.7.0

 - gcworld/interfaces updated from 3.2.0 to 3.3.1  
   See changes: https://github.com/KongHack/Interfaces/compare/3.2.0...3.3.1  
   Release notes: https://github.com/KongHack/Interfaces/releases/tag/3.3.1

 - symfony/process updated from v4.1.5 to v4.4.0
   See changes: https://github.com/symfony/process/compare/v4.1.5...v4.4.0  
   Release notes: https://github.com/symfony/process/releases/tag/v4.4.0

 - symfony/finder updated from v3.4.17 to v3.4.35  
   See changes: https://github.com/symfony/finder/compare/v3.4.17...v3.4.35  
   Release notes: https://github.com/symfony/finder/releases/tag/v3.4.35

 - symfony/polyfill-ctype updated from v1.9.0 to v1.12.0  
   See changes: https://github.com/symfony/polyfill-ctype/compare/v1.9.0...v1.12.0  
   Release notes: https://github.com/symfony/polyfill-ctype/releases/tag/v1.12.0

 - symfony/filesystem updated from v4.1.5 to v4.4.0  
   See changes: https://github.com/symfony/filesystem/compare/v4.1.5...v4.4.0  
   Release notes: https://github.com/symfony/filesystem/releases/tag/v4.4.0

 - symfony/polyfill-mbstring updated from v1.9.0 to v1.12.0  
   See changes: https://github.com/symfony/polyfill-mbstring/compare/v1.9.0...v1.12.0  
   Release notes: https://github.com/symfony/polyfill-mbstring/releases/tag/v1.12.0

 - psr/log updated from 1.0.2 to 1.1.2  
   See changes: https://github.com/php-fig/log/compare/1.0.2...1.1.2  
   Release notes: https://github.com/php-fig/log/releases/tag/1.1.2

 - symfony/debug updated from v4.1.5 to v4.4.0  
   See changes: https://github.com/symfony/debug/compare/v4.1.5...v4.4.0  
   Release notes: https://github.com/symfony/debug/releases/tag/v4.4.0

 - symfony/service-contracts installed in version v2.0.0  
   Release notes: https://github.com/symfony/service-contracts/releases/tag/v2.0.0

 - symfony/console updated from v3.4.17 to v3.4.35  
   See changes: https://github.com/symfony/console/compare/v3.4.17...v3.4.35  
   Release notes: https://github.com/symfony/console/releases/tag/v3.4.35

 - seld/jsonlint updated from 1.7.1 to 1.7.2  
   See changes: https://github.com/Seldaek/jsonlint/compare/1.7.1...1.7.2  
   Release notes: https://github.com/Seldaek/jsonlint/releases/tag/1.7.2

 - justinrainbow/json-schema updated from 5.2.7 to 5.2.9  
   See changes: https://github.com/justinrainbow/json-schema/compare/5.2.7...5.2.9  
   Release notes: https://github.com/justinrainbow/json-schema/releases/tag/5.2.9

 - composer/xdebug-handler updated from 1.3.0 to 1.4.0  
   See changes: https://github.com/composer/xdebug-handler/compare/1.3.0...1.4.0  
   Release notes: https://github.com/composer/xdebug-handler/releases/tag/1.4.0

 - composer/spdx-licenses updated from 1.4.0 to 1.5.2  
   See changes: https://github.com/composer/spdx-licenses/compare/1.4.0...1.5.2  
   Release notes: https://github.com/composer/spdx-licenses/releases/tag/1.5.2

 - composer/semver updated from 1.4.2 to 1.5.0  
   See changes: https://github.com/composer/semver/compare/1.4.2...1.5.0  
   Release notes: https://github.com/composer/semver/releases/tag/1.5.0

 - composer/ca-bundle updated from 1.1.2 to 1.2.4  
   See changes: https://github.com/composer/ca-bundle/compare/1.1.2...1.2.4  
   Release notes: https://github.com/composer/ca-bundle/releases/tag/1.2.4

 - composer/composer updated from 1.7.2 to 1.9.1  
   See changes: https://github.com/composer/composer/compare/1.7.2...1.9.1  
   Release notes: https://github.com/composer/composer/releases/tag/1.9.1

 - symfony/dependency-injection updated from v4.1.5 to v4.4.0  
   See changes: https://github.com/symfony/dependency-injection/compare/v4.1.5...v4.4.0  
   Release notes: https://github.com/symfony/dependency-injection/releases/tag/v4.4.0

 - symfony/config updated from v4.1.5 to v4.4.0  
   See changes: https://github.com/symfony/config/compare/v4.1.5...v4.4.0  
   Release notes: https://github.com/symfony/config/releases/tag/v4.4.0

 - phpmd/phpmd updated from 2.6.0 to 2.7.0  
   See changes: https://github.com/phpmd/phpmd/compare/2.6.0...2.7.0  
   Release notes: https://github.com/phpmd/phpmd/releases/tag/2.7.0

 - squizlabs/php_codesniffer updated from 2.9.1 to 2.9.2  
   See changes: https://github.com/squizlabs/PHP_CodeSniffer/compare/2.9.1...2.9.2  
   Release notes: https://github.com/squizlabs/PHP_CodeSniffer/releases/tag/2.9.2

 - nette/utils updated from v2.5.3 to v3.0.2  
   See changes: https://github.com/nette/utils/compare/v2.5.3...v3.0.2  
   Release notes: https://github.com/nette/utils/releases/tag/v3.0.2

 - nette/schema installed in version v1.0.1  
   Release notes: https://github.com/nette/schema/releases/tag/v1.0.1

 - nette/finder updated from v2.4.2 to v2.5.1  
   See changes: https://github.com/nette/finder/compare/v2.4.2...v2.5.1  
   Release notes: https://github.com/nette/finder/releases/tag/v2.5.1

 - nette/robot-loader updated from v3.1.0 to v3.2.0  
   See changes: https://github.com/nette/robot-loader/compare/v3.1.0...v3.2.0  
   Release notes: https://github.com/nette/robot-loader/releases/tag/v3.2.0

 - nette/php-generator updated from v3.0.5 to v3.3.1  
   See changes: https://github.com/nette/php-generator/compare/v3.0.5...v3.3.1  
   Release notes: https://github.com/nette/php-generator/releases/tag/v3.3.1

 - nette/neon updated from v2.4.3 to v3.0.0  
   See changes: https://github.com/nette/neon/compare/v2.4.3...v3.0.0  
   Release notes: https://github.com/nette/neon/releases/tag/v3.0.0

 - nette/di updated from v2.4.14 to v3.0.1  
   See changes: https://github.com/nette/di/compare/v2.4.14...v3.0.1  
   Release notes: https://github.com/nette/di/releases/tag/v3.0.1

 - nette/bootstrap updated from v2.4.6 to v3.0.1  
   See changes: https://github.com/nette/bootstrap/compare/v2.4.6...v3.0.1  
   Release notes: https://github.com/nette/bootstrap/releases/tag/v3.0.1

 - nette/caching updated from v2.5.8 to v3.0.1  
   See changes: https://github.com/nette/caching/compare/v2.5.8...v3.0.1  
   Release notes: https://github.com/nette/caching/releases/tag/v3.0.1



## [2.3.13](https://github.com/KongHack/Database/releases/tag/2.3.13)
 - @GameCharmer add additional strings to retry on


## [2.3.12](https://github.com/KongHack/Database/releases/tag/2.3.12)
 - @GameCharmer add a retry max of 10 to prevent infinite loops.  This is separate from the deadlock retries.


## [2.3.11](https://github.com/KongHack/Database/releases/tag/2.3.11)
 - @GameCharmer added a retry for 'connection reset by peer'



## [2.3.10](https://github.com/KongHack/Database/releases/tag/2.3.10)
 - @GameCharmer update Controller for options



## [2.3.9](https://github.com/KongHack/Database/releases/tag/2.3.9)
 - @GameCharmer convert config pathing to relative



## [2.3.8](https://github.com/KongHack/Database/releases/tag/2.3.8)
 - @GameCharmer new functions for debugging! `setTrackPath(true)` will enable in-line comments of the calling file and line number



## [2.3.7](https://github.com/KongHack/Database/releases/tag/2.3.7)
 - seld/cli-prompt removed (installed version was 1.0.3)

 - composer/installers updated from v1.3.0 to v1.6.0
   See changes: https://github.com/composer/installers/compare/v1.3.0...v1.6.0
   Release notes: https://github.com/composer/installers/releases/tag/v1.6.0

 - gcworld/interfaces updated from 3.1.1 to 3.2.0
   See changes: https://github.com/KongHack/Interfaces/compare/3.1.1...3.2.0
   Release notes: https://github.com/KongHack/Interfaces/releases/tag/3.2.0

 - symfony/process updated from v3.2.8 to v4.1.5
   See changes: https://github.com/symfony/process/compare/v3.2.8...v4.1.5
   Release notes: https://github.com/symfony/process/releases/tag/v4.1.5

 - symfony/finder updated from v3.2.8 to v3.4.17
   See changes: https://github.com/symfony/finder/compare/v3.2.8...v3.4.17
   Release notes: https://github.com/symfony/finder/releases/tag/v3.4.17

 - symfony/polyfill-ctype installed in version v1.9.0
   Release notes: https://github.com/symfony/polyfill-ctype/releases/tag/v1.9.0

 - symfony/filesystem updated from v3.2.8 to v4.1.5
   See changes: https://github.com/symfony/filesystem/compare/v3.2.8...v4.1.5
   Release notes: https://github.com/symfony/filesystem/releases/tag/v4.1.5

 - symfony/polyfill-mbstring updated from v1.3.0 to v1.9.0
   See changes: https://github.com/symfony/polyfill-mbstring/compare/v1.3.0...v1.9.0
   Release notes: https://github.com/symfony/polyfill-mbstring/releases/tag/v1.9.0

 - symfony/debug updated from v3.2.8 to v4.1.5
   See changes: https://github.com/symfony/debug/compare/v3.2.8...v4.1.5
   Release notes: https://github.com/symfony/debug/releases/tag/v4.1.5

 - symfony/console updated from v3.2.8 to v3.4.17
   See changes: https://github.com/symfony/console/compare/v3.2.8...v3.4.17
   Release notes: https://github.com/symfony/console/releases/tag/v3.4.17

 - seld/jsonlint updated from 1.6.0 to 1.7.1
   See changes: https://github.com/Seldaek/jsonlint/compare/1.6.0...1.7.1
   Release notes: https://github.com/Seldaek/jsonlint/releases/tag/1.7.1

 - justinrainbow/json-schema updated from 5.2.0 to 5.2.7
   See changes: https://github.com/justinrainbow/json-schema/compare/5.2.0...5.2.7
   Release notes: https://github.com/justinrainbow/json-schema/releases/tag/5.2.7

 - composer/xdebug-handler installed in version 1.3.0
   Release notes: https://github.com/composer/xdebug-handler/releases/tag/1.3.0

 - composer/spdx-licenses updated from 1.1.6 to 1.4.0
   See changes: https://github.com/composer/spdx-licenses/compare/1.1.6...1.4.0
   Release notes: https://github.com/composer/spdx-licenses/releases/tag/1.4.0

 - composer/ca-bundle updated from 1.0.7 to 1.1.2
   See changes: https://github.com/composer/ca-bundle/compare/1.0.7...1.1.2
   Release notes: https://github.com/composer/ca-bundle/releases/tag/1.1.2

 - composer/composer updated from 1.4.1 to 1.7.2
   See changes: https://github.com/composer/composer/compare/1.4.1...1.7.2
   Release notes: https://github.com/composer/composer/releases/tag/1.7.2

 - squizlabs/php_codesniffer updated from 2.9.0 to 2.9.1
   See changes: https://github.com/squizlabs/PHP_CodeSniffer/compare/2.9.0...2.9.1
   Release notes: https://github.com/squizlabs/PHP_CodeSniffer/releases/tag/2.9.1

 - gcworld/code_sniffer_contrib updated from 1.0.0 to 1.0.6
   See changes: https://github.com/GameCharmer/CodeSnifferContrib/compare/1.0.0...1.0.6
   Release notes: https://github.com/GameCharmer/CodeSnifferContrib/releases/tag/1.0.6

 - psr/container installed in version 1.0.0
   Release notes: https://github.com/php-fig/container/releases/tag/1.0.0

 - symfony/dependency-injection updated from v3.2.8 to v4.1.5
   See changes: https://github.com/symfony/dependency-injection/compare/v3.2.8...v4.1.5
   Release notes: https://github.com/symfony/dependency-injection/releases/tag/v4.1.5

 - symfony/config updated from v3.2.8 to v4.1.5
   See changes: https://github.com/symfony/config/compare/v3.2.8...v4.1.5
   Release notes: https://github.com/symfony/config/releases/tag/v4.1.5

 - pdepend/pdepend updated from 2.5.0 to 2.5.2
   See changes: https://github.com/pdepend/pdepend/compare/2.5.0...2.5.2
   Release notes: https://github.com/pdepend/pdepend/releases/tag/2.5.2

 - nette/utils updated from v2.4.6 to v2.5.3
   See changes: https://github.com/nette/utils/compare/v2.4.6...v2.5.3
   Release notes: https://github.com/nette/utils/releases/tag/v2.5.3

 - nette/php-generator updated from v3.0.0 to v3.0.5
   See changes: https://github.com/nette/php-generator/compare/v3.0.0...v3.0.5
   Release notes: https://github.com/nette/php-generator/releases/tag/v3.0.5

 - nette/neon updated from v2.4.1 to v2.4.3
   See changes: https://github.com/nette/neon/compare/v2.4.1...v2.4.3
   Release notes: https://github.com/nette/neon/releases/tag/v2.4.3

 - nette/di updated from v2.4.8 to v2.4.14
   See changes: https://github.com/nette/di/compare/v2.4.8...v2.4.14
   Release notes: https://github.com/nette/di/releases/tag/v2.4.14

 - nette/bootstrap updated from v2.4.3 to v2.4.6
   See changes: https://github.com/nette/bootstrap/compare/v2.4.3...v2.4.6
   Release notes: https://github.com/nette/bootstrap/releases/tag/v2.4.6

 - nette/finder updated from v2.4.0 to v2.4.2
   See changes: https://github.com/nette/finder/compare/v2.4.0...v2.4.2
   Release notes: https://github.com/nette/finder/releases/tag/v2.4.2

 - nette/caching updated from v2.5.3 to v2.5.8
   See changes: https://github.com/nette/caching/compare/v2.5.3...v2.5.8
   Release notes: https://github.com/nette/caching/releases/tag/v2.5.8

 - nette/robot-loader updated from v3.0.0 to v3.1.0
   See changes: https://github.com/nette/robot-loader/compare/v3.0.0...v3.1.0
   Release notes: https://github.com/nette/robot-loader/releases/tag/v3.1.0

 - nikic/php-parser updated from v3.0.5 to v3.1.5
   See changes: https://github.com/nikic/PHP-Parser/compare/v3.0.5...v3.1.5
   Release notes: https://github.com/nikic/PHP-Parser/releases/tag/v3.1.5


## [2.3.6](https://github.com/KongHack/Database/releases/tag/2.3.6)
 - @GameCharmer properly handle checking to see if table exists


## [2.3.5](https://github.com/KongHack/Database/releases/tag/2.3.5)
 - @GameCharmer Upgrade to config, support for deadlock settings in the config.ini file, single config loading


## [2.3.4](https://github.com/KongHack/Database/releases/tag/2.3.4)
 - @GameCharmer Fix Backticks


## [2.3.3](https://github.com/KongHack/Database/releases/tag/2.3.3)
 - @GameCharmer Improved table handling in the getComment function


## [2.3.2](https://github.com/KongHack/Database/releases/tag/2.3.2)
 - @GameCharmer composer update


## [2.3.1](https://github.com/KongHack/Database/releases/tag/2.3.1)
 - @GameCharmer resolve issue with config files


## [2.3.0](https://github.com/KongHack/Database/releases/tag/2.3.0)
 - @GameCharmer Upgraded to 7.1 features, implemented clean code standards


## [2.2.3](https://github.com/KongHack/Database/releases/tag/2.2.3)
 - @GameCharmer Oh WTF PHP.  
 // Declaration of GCWorld\Database\Database::prepare($statement, array $driver_options = Array) should be compatible with PDO::prepare($statement, $options = NULL)  



## [2.2.2](https://github.com/KongHack/Database/releases/tag/2.2.2)
 - @GameCharmer switched some stristr to stripos
 - @GameCharmer switched driver_options over to matching PDO declaration
 - @GameCharmer added @var notes for resolution


## [2.2.1](https://github.com/KongHack/Database/releases/tag/2.2.1)
 - @GameCharmer improved disconnect method!


## [2.2.0](https://github.com/KongHack/Database/releases/tag/2.2.0)
 - @GameCharmer disconnect method for the controller


## [2.1.2](https://github.com/KongHack/Database/releases/tag/2.1.2)
 - @GameCharmer add safe write lock testing functions to the database class.


## [2.1.1](https://github.com/KongHack/Database/releases/tag/2.1.1)
 - @GameCharmer another attempt at auto-reconnecting dropped mysql connections


## [2.1.0](https://github.com/KongHack/Database/releases/tag/2.1.0)
 - @GameCharmer new debugging features that function globally
 - @GameCharmer Started ChangeLog
