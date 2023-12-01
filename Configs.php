<?php

class Configs
{
    /**
     * 从外部的txt文件中，抓取内容
     * 仅抓取内容，不做数据格式的验证
     * @param $url
     * @return array
     */
    public static function getContent($url)
    {
        $content = file_get_contents($url);
        $array   = array_filter(explode(PHP_EOL, $content));
        $items   = [];
        foreach ($array as $item) {
            $item = trim($item);
            if (empty($item)) {
                continue;
            }
            $arr = explode(',', $item);
            if (empty($arr)) {
                continue;
            }
            $name = isset($arr[0]) ? trim($arr[0]) : '';
            $url  = isset($arr[1]) ? trim($arr[1]) : '';
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

    public static function isStay($name)
    {
        $keys      = [
            'CCTV', '卫视', 'CHC', 'CETV'
        ];
        $blockKeys = ['凤凰卫视', '西藏卫视(藏语)', 'CCTV4欧洲', '香港卫视', '三沙卫视', '安多卫视', '大湾区卫视', '农林卫视', '延边卫视', '康巴卫视', '澳亚卫视', '兵团卫视', '蒙古语卫视'];
        foreach ($blockKeys as $blockKey) {
            if (strpos($name, $blockKey) !== false) {
                return false;
            }
        }
        foreach ($keys as $key) {
            if (strpos($name, $key) !== false) {
                return true;
            }
        }
        return false;
    }

    public static function getBlockHosts()
    {
        return [
            'iptv.luas.edu.cn' => 'iptv.luas.edu.cn',
        ];
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

        // 检查响应状态码和内容
        if ($httpCode == 200) {
            // 检查M3U8文件是否包含 #EXTM3U 标记
            if (strpos($response, '#EXTM3U') !== false) {
                return true; // M3U8文件可用
            } else {
                throw new Exception("M3U8文件格式不正确", -1);
            }
        } else if ($httpCode == 302) {
            if (!empty($curlInfo['redirect_url'])) {
                return self::isM3U8Playable($curlInfo['redirect_url']);
            }
            throw new Exception("M3U8响应302且文件不存在", -1);
        } else {
            throw new Exception("HTTP请求失败，状态码：" . $httpCode, -1);
        }
    }
}