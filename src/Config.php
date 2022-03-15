<?php
namespace GCWorld\Database;

use Exception;

/**
 * Class Config
 * @package GCWorld\Database
 */
class Config
{
    protected static ?self $instance = null;
    protected array        $config = [];

    protected bool  $slow_query_log          = false;
    protected int   $slow_query_log_ms       = 1000;
    protected mixed $slow_query_log_callable = null;

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
            $config = parse_ini_file(__DIR__.DIRECTORY_SEPARATOR.$file, true);
        }
        if (!isset($config['common'])) {
            throw new Exception('Config does not contain "common" value!');
        }

        if(!isset($config['slow_query_log'])
            || $config['slow_query_log'] === false
            || strtolower($config['slow_query_log']) === 'false'
        ) {
            $config['slow_query_log']          = false;
            $config['slow_query_log_ms']       = false;
            $config['slow_query_log_callable'] = '';
        }

        $this->slow_query_log          = (bool) $config['slow_query_log'];
        $this->slow_query_log_ms       = (int) $config['slow_query_log_ms'];
        $this->slow_query_log_callable = $config['slow_query_log_callable'] ?? null;

        if($config['slow_query_log']) {
            if(!is_callable($config['slow_query_log_callable'])) {
                throw new \Exception('Slow Query Log Callable is not callable');
            }
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

    /**
     * @return bool
     */
    public function getSlowQueryLog()
    {
        return $this->slow_query_log;
    }

    /**
     * @return mixed|string|null
     */
    public function getSlowQueryLogCallable()
    {
        return $this->slow_query_log_callable;
    }

    /**
     * @return int
     */
    public function getSlowQueryLogMs()
    {
        return $this->slow_query_log_ms;
    }
}
