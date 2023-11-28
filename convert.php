<?php
$content = file_get_contents('./zijian.m3u8');
$array   = explode('#EXTM3U', $content);
$hander  = fopen('zijian.txt', 'w');
fputs($hander, '直播,#genre#'. PHP_EOL);
foreach ($array as $item) {
    if (empty($item)) {
        continue;
    }
    $info = array_values(array_filter(explode("\r\n", $item)));
    list($other, $name) = explode(',', $info[0]);
    fputs($hander, $name . ',' . $info[1] . PHP_EOL);
}

fclose($hander);