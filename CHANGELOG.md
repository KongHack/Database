# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased](https://gitlab.konghack.com/GCWorld/Database)



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
