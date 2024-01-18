<?php
$urls          = [];
$searchKeys    = [];
$blockKeys     = [];
$blockHosts    = [];
$standardNames = [];
$configs       = [];
include_once 'config.php';

$sort        = array_values(array_unique(array_values($standardNames)));
$allChannels = [];
$noNames     = [];
$infos       = [];
foreach ($urls as $urlInfo) {
    $hosts = $urlInfo['hosts'] ?? [];
    if (strpos($urlInfo['url'], 'http') === false) {
        $urlInfo['url'] = LOCAL_DIR . '/' . $urlInfo['url'];
    }
    $items = Configs::getContent($urlInfo);
    foreach ($items as $item) {
        $name = mb_strtoupper($item['name']);
        $url  = $item['url'];
        $stay = Configs::isStay($name, $searchKeys, $blockKeys);
        if (!$stay) {
            continue;
        }
        $standardName = Configs::getStandName($name, $standardNames);
        // 如果配置不支持ipv6，则过滤掉ipv6地址
        if (!$configs['ipv6'] && strpos($url, '[') !== false) {
            continue;
        }
        if (empty($standardName)) {
            $noNames[$name] = $name;
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
        if (isset($allChannels[$line])) {
            continue;
        }
        echo '检查 ' . $name . '----->>>>------' . $standardName . '----->>>>------' . $url . ' -- end' . PHP_EOL;
        $allChannels[$line] = $line;

        // infos 需要下面进行有效性检查
        $infos[$host][] = [
            'name' => $standardName,
            'url'  => $url,
        ];
    }
}

if (!empty($noNames)) {
    echo 'WARNING 以下频道名称没有标准名称：' . PHP_EOL;
    foreach ($noNames as $name) {
        echo "'" . $name . "' => ''," . PHP_EOL;
    }
}

$error      = fopen(LOCAL_DIR . '/error.txt', 'w+');
$validInfos = [];
foreach ($infos as $host => $channels) {
    $check = false;
    try {
        if ($configs['check_url']) {
            $check = Configs::isM3U8Playable($channels[0]['url']);
        } else {
            $check = true;
        }
        foreach ($channels as $channel) {
            $validInfos[$channel['name']][] = $channel;
        }
    } catch (Exception $e) {
        foreach ($channels as $channel) {
            fwrite($error, $channel['name'] . ',' . $channel['url'] . ',' . $e->getMessage() . PHP_EOL);
        }
    }
    if ($configs['check_url']) {
        echo $host . ' - ' . ($check ? '可用' : '不可用') . "\n";
    }
}

$all = [];
foreach ($sort as $sortName) {
    if (empty($validInfos[$sortName])) {
        continue;
    }
    $all = array_merge($all, $validInfos[$sortName]);
}

$handler = fopen(LOCAL_DIR . '/live.txt', 'w+');
fwrite($handler, '聚合直播,#genre#' . PHP_EOL);
foreach ($all as $item) {
    fwrite($handler, $item['name'] . ',' . $item['url'] . PHP_EOL);
}
fclose($handler);
echo '转换完成，文件存储至：' . LOCAL_DIR . '/live.txt' . PHP_EOL;