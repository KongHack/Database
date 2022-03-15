<?php
namespace GCWorld\Database;

use GCWorld\Interfaces\CommonInterface;
use GCWorld\Interfaces\Database\DatabaseInterface;

/**
 * Class Controller
 * @package GCWorld\Database
 */
class Controller
{
    const MODE_SINGLE = 1;
    const MODE_SPLIT  = 2;

    const IDENTIFIER_READ  = 'R';
    const IDENTIFIER_WRITE = 'W';
    const IDENTIFIER_BOTH  = 'B';

    private static $instances = [];
    private static $config    = null;
    /** @var CommonInterface */
    private static $common = null;

    protected $mode           = 0;
    protected $databases      = [];
    protected $writeLockLevel = 0;

    /**
     * @param string $instanceName
     * @return self
     * @throws \Exception
     */
    public static function getInstance(string $instanceName)
    {
        if (!array_key_exists($instanceName, self::$instances)) {
            if (self::$config == null) {
                self::$config = Config::getInstance()->getConfig();
            }
            if (self::$common == null) {
                if (!array_key_exists('common', self::$config)) {
                    throw new \Exception('Common is not defined!');
                }
                /** @var mixed $fullyQualifiedClassName */
                $fullyQualifiedClassName = self::$config['common'];
                if (!class_exists($fullyQualifiedClassName)) {
                    throw new \Exception('Common class defined in config does not exist!');
                }
                self::$common = $fullyQualifiedClassName::getInstance();
            }

            if (!array_key_exists($instanceName, self::$config)) {
                throw new \Exception('Requested instance "'.$instanceName.'" does not exist in config');
            }

            $instance                       = new self(self::$config[$instanceName]);
            self::$instances[$instanceName] = $instance;
        }

        return self::$instances[$instanceName];
    }

    /**
     * Controller constructor.
     * @param array $config
     * @throws \Exception
     */
    private function __construct(array $config)
    {
        $databases = self::$common->getConfig('database');

        if (array_key_exists('single', $config)) {
            $this->mode = self::MODE_SINGLE;
            $key        = $config['single'];

            if (!array_key_exists($key, $databases)) {
                throw new \Exception('Database definition not found in primary config!');
            }

            $databaseArray = $databases[$key];

            $dsn = 'mysql:host='.$databaseArray['host'].';dbname='.$databaseArray['name'].
                (isset($databaseArray['port']) ? ';port='.$databaseArray['port'] : '');

            $options = [];
            if(isset($databaseArray['ssl_key'])) {
                $options[Database::MYSQL_ATTR_SSL_KEY] = $databaseArray['ssl_key'];
            }
            if(isset($databaseArray['ssl_cert'])) {
                $options[Database::MYSQL_ATTR_SSL_CERT] = $databaseArray['ssl_cert'];
            }
            if(isset($databaseArray['ssl_ca'])) {
                $options[Database::MYSQL_ATTR_SSL_CA] = $databaseArray['ssl_ca'];
            }

            $database = new Database(
                $dsn,
                $databaseArray['user'],
                $databaseArray['pass'],
                $options
            );
            $database->setDefaults();
            // Do not attach the controller, since single mode will act as a passthru
            $this->databases[self::IDENTIFIER_READ]  = $database;
            $this->databases[self::IDENTIFIER_WRITE] = $database;
        } else {
            $this->mode = self::MODE_SPLIT;
            $key        = $config['read'];

            if (!array_key_exists($key, $databases)) {
                throw new \Exception('Database definition not found in primary config!');
            }

            $databaseArray  = $databases[$key];
            $dsn      = 'mysql:host='.$databaseArray['host'].';dbname='.$databaseArray['name'].
                (isset($databaseArray['port']) ? ';port='.$databaseArray['port'] : '');

            $options = [];
            if(isset($databaseArray['ssl_key'])) {
                $options[Database::MYSQL_ATTR_SSL_KEY] = $databaseArray['ssl_key'];
            }
            if(isset($databaseArray['ssl_cert'])) {
                $options[Database::MYSQL_ATTR_SSL_CERT] = $databaseArray['ssl_cert'];
            }
            if(isset($databaseArray['ssl_ca'])) {
                $options[Database::MYSQL_ATTR_SSL_CA] = $databaseArray['ssl_ca'];
            }

            $database = new Database(
                $dsn,
                $databaseArray['user'],
                $databaseArray['pass'],
                $options
            );
            $database->setDefaults();
            $database->attachController($this, self::IDENTIFIER_READ);
            $this->databases[self::IDENTIFIER_READ] = $database;


            $key = $config['write'];
            if (!array_key_exists($key, $databases)) {
                throw new \Exception('Database definition not found in primary config!');
            }
            $databaseArray  = $databases[$key];
            $dsn      = 'mysql:host='.$databaseArray['host'].
                        ';dbname='.$databaseArray['name'].
                        (isset($databaseArray['port']) ? ';port='.$databaseArray['port'] : '');

            $options = [];
            if(isset($databaseArray['ssl_key'])) {
                $options[Database::MYSQL_ATTR_SSL_KEY] = $databaseArray['ssl_key'];
            }
            if(isset($databaseArray['ssl_cert'])) {
                $options[Database::MYSQL_ATTR_SSL_CERT] = $databaseArray['ssl_cert'];
            }
            if(isset($databaseArray['ssl_ca'])) {
                $options[Database::MYSQL_ATTR_SSL_CA] = $databaseArray['ssl_ca'];
            }

            $database = new Database(
                $dsn,
                $databaseArray['user'],
                $databaseArray['pass'],
                $options
            );
            $database->setDefaults();
            $database->attachController($this, self::IDENTIFIER_WRITE);
            $this->databases[self::IDENTIFIER_WRITE] = $database;
        }
    }

    /**
     * @return int
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $key
     * @return DatabaseInterface
     * @throws \Exception
     */
    public function getDatabase(string $key)
    {
        if (array_key_exists($key, $this->databases)) {
            return $this->databases[$key];
        }
        throw new \Exception('Invalid Key Passed');
    }

    /**
     * @return $this
     */
    public function startWriteLock()
    {
        $this->writeLockLevel++;

        return $this;
    }

    /**
     * @return $this
     */
    public function endWriteLock()
    {
        $this->writeLockLevel--;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWriteLocked()
    {
        return ($this->writeLockLevel > 0);
    }

    /**
     * @return bool
     */
    public function disconnectAll()
    {
        foreach ($this->databases as $identifier => $pdo) {
            /** @var Database $pdo */

            if ($pdo->disconnect()) {
                unset($this->databases[$identifier]);
            }
        }

        return (count($this->databases) == 0);
    }
}
