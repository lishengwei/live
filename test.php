<?php
include 'Configs.php';

// 示例使用
$m3u8Url = "https://cfyy.cc/api/ysp/cctv1.m3u8";
if (Configs::isM3U8Playable($m3u8Url)) {
    echo "M3U8地址可播放";
} else {
    echo "M3U8地址不可用";
}
