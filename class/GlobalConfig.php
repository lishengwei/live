<?php

class GlobalConfig
{
    private static $tableName = 'global_config';
    public static function get()
    {
        $default = [];
        $configs = FileDb::get(self::$tableName);
        if (empty($configs[0])) {
            return $default;
        }
        $config = $configs[0];
        foreach ($default as $key => $value) {
            if (!isset($config[$key])) {
                $config[$key] = $value;
            }
        }
        return $config;
    }

    public static function set($config)
    {
        return FileDb::set(self::$tableName, [$config]);
    }

    public static function isIpv6()
    {
        $url = 'http://v6.ipv6-test.com/api/myip.php';
        $resp = (new Http())->send($url);
        return strpos($resp, ':');
    }
}