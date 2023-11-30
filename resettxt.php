<?php
$content = file_get_contents('C:\\Users\lishengwei\\Downloads\\live.txt');
$array   = explode(PHP_EOL, $content);
$hander  = fopen('zijian2.txt', 'w+');
$items   = [];
foreach ($array as $item) {
    if (empty($item)) {
        continue;
    }
    list($name, $url) = explode(',', $item);

    if (strpos($name,'省内频道') !== false) {
        break;
    }
    if ($url == '#genre#') {
        echo $name . PHP_EOL;
        continue;
    }

    $items[] = $item;
}
sort($items);

foreach ($items as $item) {
    fputs($hander, $item . PHP_EOL);
}

fclose($hander);
echo '转换完成';