<?php
namespace GCWorld\Database;

use Exception;

/**
 * Class Config
 * @package GCWorld\Database
 */
class Config
{
    /**
     * @var array
     */
    protected $config = [];
    protected static $instance = null;

    /**
     * Config constructor.
     * @throws Exception
     */
    protected function __construct()
    {
        $file  = rtrim(dirname(__FILE__), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
        $file .= 'config'.DIRECTORY_SEPARATOR.'config.ini';
        if (!file_exists($file)) {
            throw new Exception('Config File Not Found');
        }
        $config = parse_ini_file($file, true);
        if (isset($config['config_path'])) {
            $file   = $config['config_path'];
            $config = parse_ini_file($file, true);
        }
        if (!isset($config['common'])) {
            throw new Exception('Config does not contain "common" value!');
        }

        $this->config = $config;
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if(self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return array
     */
    public static function getConfig()
    {
        return self::getInstance()->config;
    }
}
