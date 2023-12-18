<?php
define("LOCAL_DIR", dirname(__FILE__));
// 配置代理host，有些地址需要代理才能访问
$configs       = include_once LOCAL_DIR . '/.env';
$urls          = include_once LOCAL_DIR . '/configs/urls.php';
$standardNames = include_once LOCAL_DIR . '/configs/standard_names.php';
$searchKeys    = include_once LOCAL_DIR . '/configs/search_keys.php';
$blockKeys     = include_once LOCAL_DIR . '/configs/block_keys.php';
$blockHosts    = include_once LOCAL_DIR . '/configs/block_hosts.php';

spl_autoload_register('autoLoad');
function autoLoad($class)
{
    $class = str_replace('\\', '/', $class);
    $file  = LOCAL_DIR . '/class/' . $class . '.php';

    if (file_exists($file)) {
        include_once $file;
    }
}