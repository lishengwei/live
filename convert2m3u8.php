<?php
include_once 'config.php';
$content = file_get_contents(LOCAL_DIR . '/zijian2.txt');
var_dump($content);
$array   = explode(PHP_EOL, $content);
$hander  = fopen(LOCAL_DIR . '/zijian_convert.m3u8', 'w');
echo '开始转换txt -> m3u8' . PHP_EOL;
echo '文件存储至' . LOCAL_DIR . '/zijian_convert.m3u8' . PHP_EOL;
foreach ($array as $item) {
    if (empty($item)) {
        continue;
    }
    list($name, $url) = explode(',', $item);
    if ($url == '#genre#') {
        continue;
    }
    echo '转换：' . $name . PHP_EOL;
    fputs($hander, '#EXTM3U' . PHP_EOL);
    fputs($hander, '#EXTINF:-1,' . $name . PHP_EOL);
    fputs($hander, $url . PHP_EOL);
}

fclose($hander);
echo '转换完成';