<?php
$standardNames = [];
$sort          = [];
include_once 'config.php';
include_once LOCAL_DIR . '/Configs.php';
$url = 'http://39.134.24.166/dbiptv.sn.chinamobile.com/PLTV/88888890/224/3221226205/index.m3u8';
try {
    $check = Configs::isM3U8Playable($url);
    var_dump($check);
} catch (Exception $e) {
    var_dump($e);
}
