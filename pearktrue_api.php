<?php
$standardNames = [];
include_once 'config.php';

$names = [];
foreach ($standardNames as $standardName) {
    $names[$standardName] = $standardName;
}
$url     = 'https://api.pearktrue.cn/api/tv/search.php';
$handler = fopen(LOCAL_DIR . '/api.txt', 'w');
foreach ($names as $name) {
    $page = 1;
    while (true) {
        echo $name . '--->>>' . $page . PHP_EOL;
        $params  = [
            'name' => $name,
            'page' => $page,
        ];
        if ($name == 'CCTV-5+') {
            $params['name'] = 'CCTV5p';
        }
        $content = file_get_contents($url . '?' . http_build_query($params));
        $info    = json_decode($content, true);
        if (empty($info)) {
            echo $name . ' get empty content' . PHP_EOL;
            break;
        }
        $endPage = $info['end_page'] ?? 1;
        if ($endPage <= $page) {
            break;
        }
        $page++;
        foreach ($info['data'] as $item) {
            $line = $item['videoname'] . ',' . $item['link'];
            fwrite($handler, $line . PHP_EOL);
        }
    }
}
fclose($handler);
