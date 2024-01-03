<?php

class FileDb
{
    private static function _getPath()
    {
        if (!is_dir(LOCAL_DIR . '/.db')) {
            mkdir(LOCAL_DIR . '/.db');
        }
        return LOCAL_DIR . '/.db';
    }

    public static function set($table, $value)
    {
        $file = self::_getPath() . '/' . $table . '.json';
        return file_put_contents($file, json_encode($value));
    }

    public static function get($table)
    {
        $file = self::_getPath() . '/' . $table . '.json';
        if (!file_exists($file)) {
            return [];
        }
        return json_decode(file_get_contents($file), true);
    }
}