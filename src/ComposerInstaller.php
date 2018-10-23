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
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        return self::doConfig($vendorDir);
    }

    /**
     * @param string $vendorDir
     * @return bool
     */
    public static function doConfig(string $vendorDir)
    {
        $separator = DIRECTORY_SEPARATOR;
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

        $tmpIni = explode($separator, $iniPath);
        $tmpMy  = explode($separator, $myDir);
        $loops  = max(count($tmpMy),count($tmpIni));

        array_pop($tmpIni); // Remove the trailing slash

        for($i=0;$i<$loops;++$i) {
            if(!isset($tmpIni[$i]) || !isset($tmpMy[$i])) {
                break;
            }
            if($tmpIni[$i] === $tmpMy[$i]) {
                unset($tmpIni[$i]);
                unset($tmpMy[$i]);
            }
        }


        $relPath = str_repeat('..'.$separator,count($tmpMy));
        $relPath .= implode($separator, $tmpIni);
        $iniPath = $relPath.$separator.self::CONFIG_FILE_NAME;

        file_put_contents($myDir.$separator.'..'.$separator.'config'.$separator.'config.ini', 'config_path='.$iniPath);
        return true;
    }
}
