<?php

class ChannelsGroup
{
    private static function _tableName($key)
    {
        return 'channels_group/' . $key;
    }

    public static function get($key)
    {
        if (empty($key)) {
            return [];
        }
        return FileDb::get(self::_tableName($key));
    }

    public static function set($key, $group)
    {
        if (empty($group)) {
            return false;
        }
        return FileDb::set(self::_tableName($key), $group);
    }

    public static function getAll()
    {
        $path = FileDb::getPath() . '/channels_group';
        if (!is_dir($path)) {
            mkdir($path);
        }
        // 读取文件夹下所有文件
        $files = scandir(FileDb::getPath() . '/channels_group');
        if (empty($files)) {
            return  [];
        }
        $resp = [];
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $resp[] = $file;
        }
        return $resp;
    }

    public static function delete($key)
    {
        if (empty($key)) {
            return false;
        }
        $file = FileDb::getPath() . '/' . self::_tableName($key);
        if (!file_exists($file)) {
            return false;
        }
        return unlink($file);
    }
}