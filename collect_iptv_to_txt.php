<?php
$searchKeys = [];
$blockKeys  = [];
include_once 'config.php';
include_once LOCAL_DIR . '/Configs.php';
$urls = [
    'https://ddns.10086.fund:23350/iptv.m3u'                    => [],
    'https://raw.gitmirror.com/lishengwei/live/main/zijian.txt' => [],
    'https://www.huichunniao.cn/xh/lib/live.txt'                => [],
    'https://www.huichunniao.cn/vip/ysc/lib/live.txt'           => [],
    'http://8.210.232.168/xclive.txt'                           => ['tvmvip.com'],
];

$allChannles = [];
$noNames     = [];
foreach ($urls as $url => $hosts) {
    $items = Configs::getContent($url);
    foreach ($items as $item) {
        $name         = $item['name'];
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
        if (!empty(Configs::getBlockHosts()[$host])) {
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
        $msg = 'end';
        //        try {
        //            $res = Configs::isM3U8Playable($url);
        //            $msg = '成功';
        //        } catch (\Exception $e) {
        //            $msg = '失败,' . $e->getMessage();
        //            continue;
        //        }
        echo '检查 ' . $name . '----->>>>------' . $standardName . '----->>>>------' . $url . ' -- ' .  $msg . PHP_EOL;
        $allChannles[$line] = $line;
    }
}
if (!empty($noNames)) {
    echo '退出，以下频道名称没有标准名称：' . PHP_EOL;
    foreach ($noNames as $name) {
        echo "'" . $name . "' => ''," . PHP_EOL;
    }
    exit();
}
$allChannles = array_values($allChannles);
sort($allChannles, SORT_NATURAL);
$hander = fopen(LOCAL_DIR . '/zijian2.txt', 'w+');
fwrite($hander, '聚合直播,#genre#' . PHP_EOL);
foreach ($allChannles as $item) {
    fwrite($hander, $item . PHP_EOL);
}
fclose($hander);
echo '转换完成';