<?php
namespace GCWorld\Database;

use GCWorld\Interfaces\Common;

/**
 * Class Controller
 * @package GCWorld\Database
 */
class Controller
{
    const MODE_SINGLE = 1;
    const MODE_SPLIT = 2;

    const IDENTIFIER_READ = 'R';
    const IDENTIFIER_WRITE = 'W';
    const IDENTIFIER_BOTH = 'B';

    private static $instances = [];
    private static $config    = null;
    /** @var Common */
    private static $common = null;

    protected $mode      = 0;
    protected $databases = [];

    /**
     * @param $instanceName
     * @return self
     * @throws \Exception
     */
    public static function getInstance($instanceName)
    {
        if (!array_key_exists($instanceName, self::$instances)) {

            if (self::$config == null) {
                $cConfig      = new Config();
                self::$config = $cConfig->getConfig();
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

            $db = new Database($dsn, $databaseArray['user'], $databaseArray['pass'],
                [Database::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $db->setDefaults();
            // Do not attach the controller, since single mode will act as a passthru
            $this->databases[self::IDENTIFIER_READ]  = $db;
            $this->databases[self::IDENTIFIER_WRITE] = $db;
        } else {
            $this->mode = self::MODE_SPLIT;
            $key        = $config['read'];

            if (!array_key_exists($key, $databases)) {
                throw new \Exception('Database definition not found in primary config!');
            }

            $dbArray = $databases[$key];
            $dsn     = 'mysql:host='.$dbArray['host'].';dbname='.$dbArray['name'].
                (isset($dbArray['port']) ? ';port='.$dbArray['port'] : '');
            $db      = new Database($dsn, $dbArray['user'], $dbArray['pass'],
                [Database::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $db->setDefaults();
            $db->attachController($this, self::IDENTIFIER_READ);
            $this->databases[self::IDENTIFIER_READ] = $db;


            $key = $config['write'];
            if (!array_key_exists($key, $databases)) {
                throw new \Exception('Database definition not found in primary config!');
            }
            $dbArray = $databases[$key];
            $dsn     = 'mysql:host='.$dbArray['host'].';dbname='.$dbArray['name'].(isset($dbArray['port']) ? ';port='.$dbArray['port'] : '');
            $db      = new Database($dsn, $dbArray['user'], $dbArray['pass'],
                [Database::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $db->setDefaults();
            $db->attachController($this, self::IDENTIFIER_WRITE);
            $this->databases[self::IDENTIFIER_WRITE] = $db;
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
     * @param $key
     * @return Database
     * @throws \Exception
     */
    public function getDatabase($key)
    {
        if (array_key_exists($key, $this->databases)) {
            return $this->databases[$key];
        }
        throw new \Exception('Invalid Key Passed');
    }
}
