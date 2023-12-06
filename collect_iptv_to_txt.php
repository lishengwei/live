<?php
$urls          = [];
$searchKeys    = [];
$blockKeys     = [];
$blockHosts    = [];
$standardNames = [];
include_once 'config.php';
include_once LOCAL_DIR . '/Configs.php';

$sort = [];
foreach ($standardNames as $standardName) {
    $sort[] = $standardName;
}
$sort = array_values(array_unique($sort));
$allChannles = [];
$noNames     = [];
$infos       = [];
foreach ($urls as $urlInfo) {
    $hosts = $urlInfo['hosts'];
    $items = Configs::getContent($urlInfo['url'], $urlInfo['proxy'] ?? false);
    foreach ($items as $item) {
        $name         = mb_strtoupper($item['name']);
        $url          = $item['url'];
        $standardName = $standardNames[$name] ?? '';
        $stay         = Configs::isStay($name, $searchKeys, $blockKeys);
        if (empty($standardName) && $stay) {
            $noNames[$name] = $name;
            continue;
        }
        if (!$stay) {
            continue;
        }
        // 过滤ipv6地址
        if (strpos($url, '[') !== false) {
            continue;
        }
        // 获取url的host
        $host = parse_url($url, PHP_URL_HOST);
        // 过滤掉host在黑名单中的
        if (!empty($blockHosts[$host])) {
            continue;
        }
        // 只保留host在白名单中的
        if (!empty($hosts) && !in_array($host, $hosts)) {
            continue;
        }
        // 过滤掉已经存在的
        $line = $standardName . ',' . $url;
        if (isset($allChannles[$line])) {
            continue;
        }
        echo '检查 ' . $name . '----->>>>------' . $standardName . '----->>>>------' . $url . ' -- end' . PHP_EOL;
        $allChannles[$line] = $line;
        $infos[$standardName][]     = [
            'name' => $standardName,
            'url'  => $url,
        ];
    }
}

if (!empty($noNames)) {
    echo '退出，以下频道名称没有标准名称：' . PHP_EOL;
    foreach ($noNames as $name) {
        echo "'" . $name . "' => ''," . PHP_EOL;
    }
    exit();
}

$all = [];
foreach ($sort as $sortName) {
    if (empty($infos[$sortName])) {
        continue;
    }
    $all = array_merge($all, $infos[$sortName]);
}

$hander = fopen(LOCAL_DIR . '/zijian2.txt', 'w+');
fwrite($hander, '聚合直播,#genre#' . PHP_EOL);
foreach ($all as $item) {
    fwrite($hander, $item['name'] . ',' . $item['url'] . PHP_EOL);
}
fclose($hander);
echo '转换完成，文件存储至：' . LOCAL_DIR . '/zijian2.txt' . PHP_EOL;