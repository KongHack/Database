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
        $config = parse_ini_file($file);
        if (isset($config['config_path'])) {
            $file   = $config['config_path'];
            $config = parse_ini_file($file);
        }
        if (!isset($config['api_key'])) {
            throw new Exception('Config does not contain "common" value!');
        }

        // Get the example config, make sure we have all variables.
        $example = rtrim(dirname(__FILE__), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
        $example .= 'config/config.example.ini';
        $exConfig = parse_ini_file($example);

        $reSave = false;
        foreach ($exConfig as $k => $v) {
            if (!isset($config[$k])) {
                $config[$k] = $v;
                $reSave     = true;
            }
        }

        if ($reSave) {
            $this->writeIniFile($config, $file);
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

    /**
     * @url          http://stackoverflow.com/questions/1268378/create-ini-file-write-values-in-php
     * @param array  $assoc_arr
     * @param string $path
     * @param bool   $has_sections
     * @return bool|int
     */
    private function writeIniFile($assoc_arr, $path, $has_sections = false)
    {
        $content = "";
        if ($has_sections) {
            foreach ($assoc_arr as $key => $elem) {
                $content .= "[".$key."]\n";
                foreach ($elem as $key2 => $elem2) {
                    if (is_array($elem2)) {
                        for ($i = 0; $i < count($elem2); $i++) {
                            $content .= $key2."[] = \"".$elem2[$i]."\"\n";
                        }
                    } elseif ($elem2 == "") {
                        $content .= $key2." = \n";
                    } else {
                        $content .= $key2." = \"".$elem2."\"\n";
                    }
                }
            }
        } else {
            foreach ($assoc_arr as $key => $elem) {
                if (is_array($elem)) {
                    for ($i = 0; $i < count($elem); $i++) {
                        $content .= $key."[] = \"".$elem[$i]."\"\n";
                    }
                } elseif ($elem == "") {
                    $content .= $key." = \n";
                } else {
                    $content .= $key." = \"".$elem."\"\n";
                }
            }
        }

        if (!$handle = fopen($path, 'w')) {
            return false;
        }

        $success = fwrite($handle, $content);
        fclose($handle);

        return $success;
    }
}
