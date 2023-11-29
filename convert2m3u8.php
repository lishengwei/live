<?php
$content = file_get_contents('./zijian.txt');
$array   = explode(PHP_EOL, $content);
$hander  = fopen('zijian_convert.m3u8', 'w');
foreach ($array as $item) {
    if (empty($item)) {
        continue;
    }
    list($name, $url) = explode(',', $item);
    if ($url == '#genre#') {
        continue;
    }
    fputs($hander, '#EXTM3U' . PHP_EOL);
    fputs($hander, '#EXTINF:-1,'. $name. PHP_EOL);
    fputs($hander, $url. PHP_EOL);
}

fclose($hander);
echo '转换完成';