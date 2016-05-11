<?php
namespace GCWorld\Database;

use Exception;

class Config
{
    /**
     * @var array
     */
    protected $config = [];

    public function __construct()
    {
        $file = rtrim(dirname(__FILE__), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
        $file .= 'config'.DIRECTORY_SEPARATOR.'config.ini';
        if (!file_exists($file)) {
            throw new Exception('Config File Not Found');
        }
        $config = parse_ini_file($file, true);
        if (isset($config['config_path'])) {
            $file   = $config['config_path'];
            $config = parse_ini_file($file);
        }
        if (!isset($config['common'])) {
            throw new Exception('Config does not contain "common" value!');
        }

        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }
}
