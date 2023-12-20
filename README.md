# 项目说明
本项目是通过抓取别人的直播源，通过筛选，最终生成一份自己的直播源文件
# 文件说明
1. php版本>=7.3
2. 复制.env.example 为.env文件
3. configs/urls.php 配置的是外部的直播源
4. configs/block_hosts.php 用于屏蔽一些确定失效的http
5. configs/block_keys.php 用于屏蔽一些不使用的频道
6. configs/standard_names.php 是将乱七八糟的第三方频道转换为标准频道，目前大部分的频道都无需设置，直接转换为标准频道
7. configs/search_keys.php 用于配置筛选，包含这些keys的可以保留

 
# 执行
1. 修改iptv.sh
2. 将PHP的执行路径修改为自己机器的路径
3. 执行 iptv.sh
4. 最终会生成zijian2.txt 和 zijian_convert.m3u8两个文件
5. 也可以直接php collect_iptv_to_txt.php




