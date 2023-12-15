<?php
define("LOCAL_DIR", dirname(__FILE__));
// 配置代理host，有些地址需要代理才能访问
const PROXY_HOST = '127.0.0.1';
const PROXY_PORT = '7890';
$configs       = include_once LOCAL_DIR . '/.env';
$urls          = include_once LOCAL_DIR . '/configs/urls.php';
$standardNames = include_once LOCAL_DIR . '/configs/standard_names.php';
$searchKeys    = include_once LOCAL_DIR . '/configs/search_keys.php';
$blockKeys     = include_once LOCAL_DIR . '/configs/block_keys.php';
$blockHosts    = include_once LOCAL_DIR . '/configs/block_hosts.php';