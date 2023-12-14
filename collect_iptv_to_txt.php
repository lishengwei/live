<?php
$urls          = [];
$searchKeys    = [];
$blockKeys     = [];
$blockHosts    = [];
$standardNames = [];
include_once 'config.php';
include_once LOCAL_DIR . '/Configs.php';

$sort            = [];
$uniqueNames     = [];
$uniqueCCTVNames = [
    'CCTV2', 'CCTV02', 'CCTV3', 'CCTV03', 'CCTV4', 'CCTV04', 'CCTV6', 'CCTV06', 'CCTV7', 'CCTV07',
    'CCTV8', 'CCTV08', 'CCTV9', 'CCTV09', 'CCTV10', 'CCTV11', 'CCTV12', 'CCTV13', 'CCTV14', 'CCTV15',
    'CCTV16', 'CCTV17', 'CCTV-2', 'CCTV-02', 'CCTV-3', 'CCTV-03', 'CCTV-4', 'CCTV-04', 'CCTV-6', 'CCTV-06',
    'CCTV-7', 'CCTV-07', 'CCTV-8', 'CCTV-08', 'CCTV-9', 'CCTV-09', 'CCTV-10', 'CCTV-11', 'CCTV-12',
    'CCTV-13', 'CCTV-14', 'CCTV-15', 'CCTV-16', 'CCTV-17',
    'CCTV01',
];
foreach ($standardNames as $standardName) {
    $sort[] = $standardName;
    if (strpos($standardName, '卫视') !== false) {
        $uniqueNames[] = $standardName;
    }
}
$sort        = array_values(array_unique($sort));
$allChannels = [];
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
        if (!$stay) {
            continue;
        }
        // 如果没搜索到，试试判断卫视名称，因为卫视名称比较唯一
        if (empty($standardName) && strpos($name, '卫视') !== false) {
            foreach ($uniqueNames as $uniqueName) {
                if (strpos($name, $uniqueName) !== false) {
                    $standardName = $uniqueName;
                    break;
                }
            }
        }
        // cctv的名称搜索，出了cctv1和cctv5
        if (empty($standardName) && strpos($name, 'CCTV') !== false) {
            foreach ($uniqueCCTVNames as $uniqueName) {
                if (strpos($name, $uniqueName) !== false) {
                    $standardName = $standardNames[$uniqueName];
                    break;
                }
            }
        }
        // 目前是ipv4的，所以过滤掉ipv6地址
        if (strpos($url, '[') !== false) {
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
    echo '退出，以下频道名称没有标准名称：' . PHP_EOL;
    foreach ($noNames as $name) {
        echo "'" . $name . "' => ''," . PHP_EOL;
    }
    exit();
}

echo '数据抓取完毕，开始检查有效性' . PHP_EOL;
$error      = fopen(LOCAL_DIR . '/error.txt', 'w+');
$validInfos = [];
foreach ($infos as $host => $channels) {
    $check = false;
    try {
        $check = Configs::isM3U8Playable($channels[0]['url']);
        foreach ($channels as $channel) {
            $validInfos[$channel['name']][] = $channel;
        }
    } catch (Exception $e) {
        foreach ($channels as $channel) {
            fwrite($error, $channel['name'] . ',' . $channel['url'] . ',' . $e->getMessage() . PHP_EOL);
        }
    }
    echo $host . ' - ' . ($check ? '可用' : '不可用') . "\n";
}

$all = [];
foreach ($sort as $sortName) {
    if (empty($validInfos[$sortName])) {
        continue;
    }
    $all = array_merge($all, $validInfos[$sortName]);
}

$handler = fopen(LOCAL_DIR . '/zijian2.txt', 'w+');
fwrite($handler, '聚合直播,#genre#' . PHP_EOL);
foreach ($all as $item) {
    fwrite($handler, $item['name'] . ',' . $item['url'] . PHP_EOL);
}
fclose($handler);
echo '转换完成，文件存储至：' . LOCAL_DIR . '/zijian2.txt' . PHP_EOL;