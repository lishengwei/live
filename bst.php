<?php
//设置默认时区
date_default_timezone_set("Asia/Shanghai");
//定义内置$ip_arr数组
$ip_arr = [
    //        '58.216.22.221/liveplay-kk.rtxapp.com',
    //        'fjbciptv.live.bestvcdn.com.cn',
    //        'live-gitv-xj-yh.189smarthome.com',
    //        'ts-gitv-hb-yh.189smarthome.com',
    '58.216.22.206/liveplay-kk.rtxapp.com',
];//其中live也可换成ts
//$ip参数引入
$ip = empty($_GET['ip']) ? "0" : trim($_GET['ip']);//为空时默认为0,否则处理两边的空白符(如有)
//$ip参数预处理(只是为了原生兼容自定义源标签)
if (preg_match('/^\?.*|^\$.*/', $ip)) {//处理ip=\?.*或ip=\$.*的情况
    $ip = '0';
} else if (preg_match('/\?.*|\$.*/', $ip)) {//处理ip=.*\?.*或ip=.*\$.*的情况
    $ip = preg_replace('/\?.*|\$.*/', '', $ip);
}
//$ip参数合法性判断
if (isset($ip_arr[$ip])) {
    $ip = $ip_arr[$ip];//$ip_arr数组中已定义,取数组中对应的值
} else if (!preg_match("/[a-zA-Z]/i", $ip)) {
    $ip = "$ip/liveplay-kk.rtxapp.com";//$ip_arr数组中未定义且不含字母,当作ip地址
}

//定义内置$id_arr数组
$id_arr = [
    'cctv1'    => 'cctv1hd8m/8000000',//CCTV1
    'cctv2'    => 'cctv2hd8m/8000000',//CCTV2
    'cctv3'    => 'cctv38m/8000000',//CCTV3
    'cctv4'    => 'cctv4hd8m/8000000',//CCTV4
    'cctv5'    => 'cctv58m/8000000',//CCTV5
    'cctv6'    => 'cctv6hd8m/8000000',//CCTV6
    'cctv7'    => 'cctv7hd8m/8000000',//CCTV7
    'cctv8'    => 'cctv8hd8m/8000000',//CCTV8
    'cctv9'    => 'cctv9hd8m/8000000',//CCTV9
    'cctv10'   => 'cctv10hd8m/8000000',//CCTV10
    'cctv11'   => 'cctv11hd8m/8000000',//CCTV11
    'cctv12'   => 'cctv12hd8m/8000000',//CCTV12
    'cctv13'   => 'cctv13xwhd8m/8000000',//CCTV13
    'cctv14'   => 'cctvsehd8m/8000000',//CCTV14
    'cctv15'   => 'cctv15hd8m/8000000',//CCTV15
    'cctv16'   => 'cctv16hd8m/8000000',//CCTV16
    'cctv164k' => 'cctv16hd4k/15000000',//CCTV16
    'cctv17'   => 'cctv17hd8m/8000000',//CCTV17
    'cctv5p'   => 'cctv5phd8m/8000000',//CCTV5+
    'cctv5p2'  => 'cctv5hd8m/8000000',//CCTV5+
    'cctv4k'   => 'cctv4k/15000000',//CCTV4K
    'cgtn'     => 'ottcctvnews/1300000',//CGTN
    'zgjy1'    => 'zgjy1t8m/8000000',//中国教育1台
    'zgjy2'    => 'cetv2/2500000',//中国教育2台
    'zgjy4'    => 'zgjy4hd8m/8000000',//中国教育4台
    'gxws'     => 'gxwshd8m/8000000',//广西卫视
    'gdws'     => 'gdwshd8m/8000000',//广东卫视
    'szws'     => 'szwshd8m/8000000',//深圳卫视
    'hainan'   => 'hainanwshd8m/8000000',//海南卫视
    'ssws'     => 'sswshd8m/8000000',//三沙卫视
    'ynws'     => 'ynwshd8m/8000000',//云南卫视
    'gzws'     => 'gzwshd8m/8000000',//贵州卫视
    'dnws'     => 'dnwshd8m/8000000',//东南卫视
    'xmws'     => 'xmws/1300000',//厦门卫视
    'jxws'     => 'jxws8m/8000000',//江西卫视
    'ahws'     => 'ahwshd8m/8000000',//安徽卫视
    'hunan'    => 'hunanwshd8m/8000000',//湖南卫视
    'hubei'    => 'hubeiws8m/8000000',//湖北卫视
    'hnws'     => 'hnwshd8m/8000000',//河南卫视
    'hbws'     => 'hbwshd8m/8000000',//河北卫视
    'cqws'     => 'cqws8m/8000000',//重庆卫视
    'scws'     => 'scwshd/8000000',//四川卫视
    'zjws'     => 'zjwshd8m/8000000',//浙江卫视
    'jsws'     => 'jswshd8m/8000000',//江苏卫视
    'dfws'     => 'dfwshd8m/8000000',//东方卫视
    'zqpd'     => 'zqpd8m/8000000',//东方卫视
    'sdws'     => 'sdws8m/8000000',//山东卫视
    'bjws'     => 'bjwshd8m/8000000',//北京卫视
    'tjws'     => 'tjwshd8m/8000000',//天津卫视
    'lnws'     => 'lnwshd8m/8000000',//辽宁卫视
    'jlws'     => 'jlwshd8m/8000000',//吉林卫视
    'hljws'    => 'hljwshd8m/8000000',//黑龙江卫视
    'sxws'     => 'sxws/1300000',//陕西卫视
    'shanxi'   => 'shanxiws/1300000',//山西卫视
    'gsws'     => 'gswshd8m/8000000',//甘肃卫视
    'nxws'     => 'nxws/1300000',//宁夏卫视
    'qhws'     => 'qhws/1300000',//青海卫视
    'xzws'     => 'xzws/2500000',//西藏卫视
    'xjws'     => 'xjws/1300000',//新疆卫视
    'btws'     => 'btws/1300000',//兵团卫视
    'nmgws'    => 'nmgws/1300000',//内蒙古卫视
    'kbws'     => 'kbws/2500000',//康巴卫视
    'kkse'     => 'kkse8m/8000000',//卡酷少儿
    'jykt'     => 'jykt/1300000',//金鹰卡通
    'hhxd'     => 'hhxd8m/8000000',//哈哈炫动
    'jjkt'     => 'jjkt/1300000',//嘉佳卡通
    'zgtq'     => 'zgqx/1300000',//中国天气
    'cftx'     => 'cftx/2500000',//财富天下
    'cpd'      => 'cpdhdavs8m/8000000',//茶频道
    'klcd'     => 'klcd8m/8000000',//快乐垂钓
    'hxjc'     => 'hxjc8m/8000000',//欢笑剧场4K
    'hxjc4k'   => 'hxjc4k/15000000',//欢笑剧场4K
    'dsjc'     => 'dsjc8m/8000000',//都市剧场
    'dmxc'     => 'dmxc8m/8000000',//动漫秀场
    'leyou'    => 'qjshd8m/8000000',//乐游
    'yxfy'     => 'yxfy8m/8000000',//游戏风云
    'jbty'     => 'jbtyhd8m/8000000',//劲爆体育
    'mlzq'     => 'mlyyhd8m/8000000',//魅力足球
    'xsj'      => 'xsjhd8m/8000000',//新视觉
    'fztd'     => 'fztd8m/8000000',//法治天地
    'jsxt'     => 'jingsepd8m/8000000',//金色学堂
    'qcxj'     => 'qcxjhd8m/8000000',//七彩戏剧
    'shss'     => 'shss8m/8000000',//生活时尚
    'dfcj'     => 'dfcjhd8m/8000000',//东方财经
    'xgyy'     => 'xgyy8m/8000000',//星光影院
    'dzjc'     => 'dzjc8m/8000000',//谍战剧场
    'hyyy'     => 'hyyy8m/8000000',//华语影院
    'qqdp'     => 'qqdp8m/8000000',//全球大片
    'rmjc'     => 'rmjc8m/8000000',//热门剧场
    'qcdm'     => 'qcdm8m/8000000',//青春动漫
    'bbdh'     => 'bbdh8m/8000000',//宝宝动画
    'djtt'     => 'djtt8m/8000000',//电竞天堂
    'rmzy'     => 'rmzy8m/8000000',//热门综艺
    'jkys'     => 'jkys8m/8000000',//健康养生
    'xqjx'     => 'xqjx8m/8000000',//戏曲精选
    'bbkt'     => 'bbkt8m/8000000',//百变课堂
    'ktxjx'    => 'ktxjx8m/8000000',//看天下精选
    'dfys'     => 'dfyshd8m/8000000',//东方影视
    'jsrw'     => 'jspdhd/4000000',//纪实人文
    'jyjs'     => 'jyjs8m/8000000',//金鹰纪实
    'bjjskj'   => 'dajs8m/8000000',//北京纪实科教
    'wxty'     => 'wxtyhd8m/8000000',//五星体育
    'dycj'     => 'dycjhd8m/8000000',//第一财经
    'hxws'     => 'hxwshd4m/4000000',//海峡卫视
    'dfgw'     => 'dfgwsxhd8m/8000000',//东方购物
    'fjdsj'    => 'fjdsjhd4m/4000000',//福建电视剧
    'fjjy'     => 'fjjypdhd4m/4000000',//福建教育
    'fjjj'     => 'fjjjshhd4m/4000000',//福建经济
    'fjly'     => 'fjlyhd4m/4000000',//福建旅游
    'fjse'     => 'fjsehd4m/4000000',//福建少儿
    'fjwt'     => 'fjtyhd4m/4000000',//福建文体
    'fjgg'     => 'fjgghd4m/4000000',//福建乡村振兴公共
    'fjxw'     => 'fjxwhd8m/8000000',//福建新闻
    'fjzh'     => 'fjzhhd4m/4000000',//福建综合
    'pudong'   => 'hhse/2500000',//浦东电视台
    'shics'    => 'icshd8m/8000000',//上海ICS
    'shds'     => 'dshd8m/8000000',//上海都市
    'shjy'     => 'setvhd/8000000',//上海教育
    'shxwzh'   => 'xwzhhd8m/8000000',//上海新闻综合
    'xzzy'     => 'xzwszy/2500000',//西藏藏语
    'kzkt1'    => 'kkyinj/1300000',//空中课堂一年级
    'kzkt2'    => 'kkernj/1300000',//空中课堂二年级
    'kzkt3'    => 'kksannj/1300000',//空中课堂三年级
    'kzkt4'    => 'kksinj/1300000',//空中课堂四年级
    'kzkt5'    => 'kkwunj/1300000',//空中课堂五年级
    'kzkt6'    => 'kkliunj/1300000',//空中课堂六年级
    'kzkt7'    => 'kkqinj/1300000',//空中课堂七年级
    'kzkt8'    => 'kkbanj/1300000',//空中课堂八年级
    'kzkt9'    => 'kkjiunj/1300000',//空中课堂九年级
    'kzktg1'   => 'kkgaoyinj/1300000',//空中课堂高一
    'kzktg2'   => 'kkgaoernj/1300000',//空中课堂高二
    'kzktg3'   => 'kkgaosannj/1300000',//空中课堂高三
];
//$id参数引入
$id = empty($_GET['id']) ? "cctv1" : trim($_GET['id']);//为空时默认为cctv1,否则处理两边的空白符(如有)
//$id = "hxwshd4m/4000000";
//$id参数预处理(只是为了原生兼容自定义源标签)
if (preg_match('/^\?.*|^\$.*/', $id)) {//处理id=\?.*或id=\$.*的情况
    $id = 'cctv1';
} else if (preg_match('/\?.*|\$.*/', $id)) {//处理id=.*\?.*或id=.*\$.*的情况
    $id = preg_replace('/\?.*|\$.*/', '', $id);
}
$file  = dirname(__FILE__) . '/' . $id.'.txt';
if (!file_exists($file)) {
    fputs(fopen($file, 'w'), 0);
}
//$id参数合法性判断
if (isset($id_arr[$id])) {
    $id = $id_arr[$id];//$id_arr数组中已定义,取数组中对应的值
}

//拼接地址前半部分
$url = "http://{$ip}/live/program/live/{$id}/";
//$playseek和$starttime参数判空

$exist = file_get_contents($file);
$begin = substr(time(), 0, 9) - 30;//取前9位,即取到十秒位,回退300秒
if ($exist && (time() - $exist * 10 < 360)) {
    $begin = (int)$exist + 1;
}
//生成m3u8列表前4行
$m3u8 = "#EXTM3U" . PHP_EOL .
        "#EXT-X-VERSION:3" . PHP_EOL .
        "#EXT-X-TARGETDURATION:10" . PHP_EOL .
        "#EXT-X-MEDIA-SEQUENCE:" . $begin . PHP_EOL;

for ($i = 0; $i < 6; $i++) {
    $time = ($begin + $i) * 10;
    $date = date('YmdH', $time);//$time转换成年月日时的格式,如2023091920,存到$date参数中
    $m3u8 .= "#EXTINF:10," . PHP_EOL .
             $url . $date . "/" . intval($time / 10) . ".ts" . PHP_EOL;//生成m3u8列表后2行
}
file_put_contents($file, $begin);
//设置HTTP响应头,指定媒体响应类型为苹果HLS流媒体格式文件
header("Content-Type: application/vnd.apple.mpegURL");
//在浏览器中打开,默认文件名为index.m3u8
header("Content-Disposition: inline; filename=mnf.m3u8");
//输出拼接好后的m3u8列表
echo $m3u8;
exit();
