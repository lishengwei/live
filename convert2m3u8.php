<?php
include_once 'config.php';
$url     = $argv[1] ?? '';
if (empty($url)) {
    $url = '/live.txt';
}
if (strpos($url,'http') === false) {
    $url = LOCAL_DIR . $url;
}
$content = file_get_contents($url);
$array   = explode(PHP_EOL, $content);
$hander  = fopen(LOCAL_DIR . '/live.m3u8', 'w');
echo '开始转换txt -> m3u8' . PHP_EOL;
echo '文件存储至' . LOCAL_DIR . '/live.m3u8' . PHP_EOL;
foreach ($array as $item) {
    if (empty($item)) {
        continue;
    }
    list($name, $url) = explode(',', $item);
    if ($url == '#genre#') {
        continue;
    }
    fputs($hander, '#EXTM3U' . PHP_EOL);
    fputs($hander, '#EXTINF:-1,' . $name . PHP_EOL);
    fputs($hander, $url . PHP_EOL);
}

fclose($hander);
echo '转换完成';