<?php

class Configs
{
    /**
     * 从外部的txt文件中，抓取内容
     * 仅抓取内容，不做数据格式的验证
     * @param array $urlInfo
     *      string $urlInfo ['url']
     *      bool   $urlInfo ['proxy'] 是否使用代理
     *      array  $urlInfo ['headers'] 是否需要传输header
     * @return array
     */
    public static function getContent($urlInfo)
    {
        $url     = $urlInfo['url'];
        $proxy   = $urlInfo['proxy'] ?? false;
        $headers = $urlInfo['headers'] ?? ['User-Agent: VLC/3.0.20 LibVLC/3.0.20'];
        if (strpos($url, 'http') !== false) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 设置超时时间，单位为秒
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 跳过证书检查
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            if ($proxy && !empty(PROXY_HOST) && !empty(PROXY_PORT)) {
                curl_setopt($ch, CURLOPT_PROXY, PROXY_HOST);
                curl_setopt($ch, CURLOPT_PROXYPORT, PROXY_PORT);
            }
            $content = curl_exec($ch);
            curl_close($ch);
        } else {
            $content = file_get_contents($url);
        }
        $isM3u8 = false;
        if (strpos($content, '#EXTINF') !== false) {
            $isM3u8 = true;
        }
        $array = array_values(array_filter(explode(PHP_EOL, $content)));
        $items = [];
        $i     = 0;
        while (true) {
            if (!isset($array[$i])) {
                break;
            }
            $item = trim($array[$i]);
            $i++;
            if (empty($item)) {
                continue;
            }
            if ($isM3u8) {
                $name = $url = '';
                if (strpos($item, '#EXTINF') !== false) {
                    $names = explode(',', $item);
                    $name  = $names[count($names) - 1];
                }
                if (isset($array[$i]) && strpos(trim($array[$i]), 'http') !== false) {
                    $url = $array[$i];
                }
            } else {
                $arr = explode(',', $item);
                if (empty($arr)) {
                    continue;
                }
                $name = isset($arr[0]) ? trim($arr[0]) : '';
                $url  = isset($arr[1]) ? trim($arr[1]) : '';
            }
            if ($url == '#genre#') {
                continue;
            }
            if (empty($name) || empty($url)) {
                continue;
            }
            $items[] = [
                'name' => $name,
                'url'  => $url,
            ];
        }
        return $items;
    }

    public static function isStay($name, $searchKeys, $blockKeys)
    {
        foreach ($blockKeys as $blockKey) {
            if (strpos($name, $blockKey) !== false) {
                return false;
            }
        }
        foreach ($searchKeys as $key) {
            if (strpos($name, $key) !== false) {
                return true;
            }
        }
        return false;
    }

    public static function isM3U8Playable($url)
    {
        // 使用cURL库初始化一个请求
        $ch = curl_init($url);

        // 设置cURL选项
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 设置超时时间，单位为秒
        // 忽略 SSL 证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: VLC/3.0.20 LibVLC/3.0.20'
        ]);
        // 执行请求并获取响应
        $response = curl_exec($ch);
        $curlInfo = curl_getinfo($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // 检查cURL是否执行成功
        if ($response === false) {
            throw new Exception("cURL Error: " . curl_error($ch), -1);
        }

        // 关闭cURL资源
        curl_close($ch);

        if (!empty($response)) {
            if (strpos($response, '#EXTM3U') !== false) {
                return true; // M3U8文件可用
            }
        }

        // 检查响应状态码和内容
        if ($httpCode == 200) {
            // 检查M3U8文件是否包含 #EXTM3U 标记
            if (strpos($response, '#EXTM3U') !== false) {
                return true; // M3U8文件可用
            } else {
                throw new Exception("M3U8文件格式不正确", -1);
            }
        } else if ($httpCode == 302 || $httpCode == 301) {
            if (!empty($curlInfo['redirect_url'])) {
                return self::isM3U8Playable($curlInfo['redirect_url']);
            }
            throw new Exception("M3U8响应302且文件不存在", -1);
        } else {
            throw new Exception("HTTP请求失败，状态码：" . $httpCode, -1);
        }
    }
}