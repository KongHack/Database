<?php
namespace GCWorld\Database;

use Composer\Script\Event;

/**
 * Class ComposerInstaller
 * @package GCWorld\Database
 */
class ComposerInstaller
{
    const CONFIG_FILE_NAME = 'GCWorld_Database.ini';

    /**
     * @param \Composer\Script\Event $event
     * @return bool
     */
    public static function setupConfig(Event $event)
    {
        $separator = DIRECTORY_SEPARATOR;
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        $myDir     = dirname(__FILE__);

        // Determine if config folder already exists.
        $iniPath = realpath($vendorDir.$separator.'..'.$separator.'config').$separator;

        if (!is_dir($iniPath)) {
            @mkdir($iniPath);
            if (!is_dir($iniPath)) {
                echo 'WARNING:: Cannot create config folder in application root:: '.$iniPath;
                return false;   // Silently Fail.
            }
        }
        if (!file_exists($iniPath.self::CONFIG_FILE_NAME)) {
            $example = file_get_contents($myDir.$separator.'..'.$separator.'config'.$separator.'config.example.ini');
            file_put_contents($iniPath.self::CONFIG_FILE_NAME, $example);
        }
        file_put_contents($myDir.$separator.'..'.$separator.'config'.$separator.'config.ini', 'config_path='.$iniPath.self::CONFIG_FILE_NAME);
        return true;
    }
}
