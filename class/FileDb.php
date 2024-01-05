<?php

class FileDb
{
    public static function getPath()
    {
        if (!is_dir(LOCAL_DIR . '/.db')) {
            mkdir(LOCAL_DIR . '/.db');
        }
        return LOCAL_DIR . '/.db';
    }

    public static function set($table, $value)
    {
        $file = self::getPath() . '/' . $table;
        return file_put_contents($file, json_encode($value));
    }

    public static function get($table)
    {
        $file = self::getPath() . '/' . $table;
        if (!file_exists($file)) {
            return [];
        }
        return json_decode(file_get_contents($file), true);
    }
}