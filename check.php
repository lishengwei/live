<?php
$standardNames = [];
$sort          = [];
include_once 'config.php';
include_once LOCAL_DIR . '/Configs.php';
$urls = <<<EOF
直播,#genre#
CCTV13,https://live-play.cctvnews.cctv.com/cctv/merge_cctv13_mud.m3u8
河南卫视,http://media.hndyjyfw.gov.cn/live/jz-hnweishi/live.m3u8
河南都市,http://media.hndyjyfw.gov.cn/live/jz-henandushi/live.m3u8

cctv2,http://audiovisual.vsd.gehua.net.cn:80/live/CCTV2HD_1200.m3u8
cctv7,http://audiovisual.vsd.gehua.net.cn:80/live/CCTV7HD_1200.m3u8
cctv10,http://audiovisual.vsd.gehua.net.cn:80/live/CCTV10HD_1200.m3u8
cctv13,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/CCTV13HD/ipcdn,CCTV13HD_1200K_live.m3u8
cctv17,http://audiovisual.vsd.gehua.net.cn:80/live/CCTV17HD_1200.m3u8
cgtn,http://audiovisual.vsd.gehua.net.cn:80/live/CGTN_800.m3u8
北京卫视,http://audiovisual.vsd.gehua.net.cn:80/live/BTV1HD_1200.m3u8
天津卫视,http://audiovisual.vsd.gehua.net.cn/live/TianJinHD_1200.m3u8
河北卫视,http://audiovisual.vsd.gehua.net.cn/live/ipcdn/HeBeiHD/ipcdn,HeBeiHD_1200K_live.m3u8
山西卫视,http://audiovisual.vsd.gehua.net.cn/live/ShanXi_800.m3u8
深圳卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ShenZhenHD_1200.m3u8
内蒙古卫视,http://audiovisual.vsd.gehua.net.cn/live/NeiMengGu_800.m3u8
辽宁卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/LiaoNingHD/ipcdn,LiaoNingHD_1200K_live.m3u8
吉林卫视,http://audiovisual.vsd.gehua.net.cn:80/live/JiLinWeiShiHD_1200.m3u8
吉林卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/JiLinWeiShiHD/ipcdn,JiLinWeiShiHD_1200K_live.m3u8
黑龙江卫视,http://audiovisual.vsd.gehua.net.cn:80/live/HeiLongJiangHD_1200.m3u8
东方卫视,http://audiovisual.vsd.gehua.net.cn:80/live/DongFangHD_1200.m3u8
江苏卫视,http://audiovisual.vsd.gehua.net.cn:80/live/JiangSuHD_1200.m3u8
浙江卫视,http://audiovisual.vsd.gehua.net.cn/live/ZheJiangHD_1200.m3u8
安徽卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/AnHuiHD/ipcdn,AnHuiHD_1200K_live.m3u8
东南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/FuJianDongNanHD/ipcdn,FuJianDongNanHD_1200K_live.m3u8
厦门卫视,http://audiovisual.vsd.gehua.net.cn:80/live/XiaMen_800.m3u8
江西卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/JiangXiHD/ipcdn,JiangXiHD_1200K_live.m3u8
山东卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ShanDongHD_1200.m3u8
河南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/HeNanHD/ipcdn,HeNanHD_1200K_live.m3u8
湖北卫视,http://audiovisual.vsd.gehua.net.cn:80/live/HuBeiHD_1200.m3u8
湖南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/HuNanHD_1200.m3u8
金鹰卫视,http://audiovisual.vsd.gehua.net.cn:80/live/JYKaton_800.m3u8
广东卫视,http://audiovisual.vsd.gehua.net.cn:80/live/GuangDongHD_1200.m3u8
广西卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/GuangXiHD/ipcdn,GuangXiHD_1200K_live.m3u8
海南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/LvYouWeiShiHD_1200.m3u8
海南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/LvYouWeiShiHD/ipcdn,LvYouWeiShiHD_1200K_live.m3u8
三沙卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/SanSha/ipcdn,SanSha_800K_live.m3u8
重庆卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/ChongQingHD/ipcdn,ChongQingHD_1200K_live.m3u8
四川卫视,http://audiovisual.vsd.gehua.net.cn/live/ipcdn/SiChuanHD/ipcdn,SiChuanHD_1200K_live.m3u8
贵州卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/GuiZhouHD/ipcdn,GuiZhouHD_1200K_live.m3u8
云南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/YunNanHD/ipcdn,YunNanHD_1200K_live.m3u8
西藏卫视,http://audiovisual.vsd.gehua.net.cn:80/live/XiZang_800.m3u8
陕西卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/ShanXiiHD/ipcdn,ShanXiiHD_1200K_live.m3u8
甘肃卫视,http://audiovisual.yun.gehua.net.cn:80/live/ipcdn/GanSuHD/ipcdn,GanSuHD_1200K_live.m3u8
青海卫视,http://audiovisual.vsd.gehua.net.cn:80/live/QingHai_800.m3u8
宁夏卫视,http://audiovisual.vsd.gehua.net.cn:80/live/NingXia_800.m3u8
新疆卫视,http://audiovisual.vsd.gehua.net.cn:80/live/XinJiang_800.m3u8
兵团卫视,http://audiovisual.vsd.gehua.net.cn:80/live/BTTV_800.m3u8
山东教育,http://audiovisual.vsd.gehua.net.cn:80/live/CETVsd_800.m3u8
cetv1,http://audiovisual.vsd.gehua.net.cn/live/CETV1HD_1200.m3u8

CCTV1,http://58.63.64.146:8888/udp/239.77.1.17:5146
CCTV1,http://58.63.64.146:8888/udp/239.77.1.144:5146
CCTV1,http://58.63.64.146:8888/udp/239.77.0.86:5146
CCTV1,http://58.63.64.146:8888/udp/239.77.0.129:5146
CCTV2,http://58.63.64.146:8888/udp/239.77.1.158:5146
CCTV2,http://58.63.64.146:8888/udp/239.253.43.17:5146
CCTV2,http://58.63.64.146:8888/udp/239.77.0.137:5146
CCTV3,http://58.63.64.146:8888/udp/239.77.0.169:5146
CCTV3,http://58.63.64.146:8888/udp/239.77.0.175:5146
CCTV4,http://58.63.64.146:8888/udp/239.77.1.163:5146
CCTV4,http://58.63.64.146:8888/udp/239.77.1.166:5146
CCTV4,http://58.63.64.146:8888/udp/239.77.0.78:5146
CCTV5,http://58.63.64.146:8888/udp/239.77.0.170:5146
CCTV5,http://58.63.64.146:8888/udp/239.77.0.177:5146
CCTV5+,http://58.63.64.146:8888/udp/239.77.0.87:5146
CCTV5+,http://58.63.64.146:8888/udp/239.77.1.31:5146
CCTV5+,http://58.63.64.146:8888/udp/239.77.1.147:5146
CCTV6,http://58.63.64.146:8888/udp/239.77.0.171:5146
CCTV6,http://58.63.64.146:8888/udp/239.77.0.178:5146
CCTV7,http://58.63.64.146:8888/udp/239.77.1.159:5146
CCTV7,http://58.63.64.146:8888/udp/239.77.1.167:5146
CCTV7,http://58.63.64.146:8888/udp/239.77.0.138:5146
CCTV8,http://58.63.64.146:8888/udp/239.77.0.172:5146
CCTV8,http://58.63.64.146:8888/udp/239.77.0.181:5146
CCTV9,http://58.63.64.146:8888/udp/239.77.1.160:5146
CCTV9,http://58.63.64.146:8888/udp/239.77.1.168:5146
CCTV9,http://58.63.64.146:8888/udp/239.77.0.135:5146
CCTV10,http://58.63.64.146:8888/udp/239.77.1.113:5146
CCTV10,http://58.63.64.146:8888/udp/239.77.1.169:5146
CCTV10,http://58.63.64.146:8888/udp/239.77.0.134:5146
CCTV11,http://58.63.64.146:8888/udp/239.77.1.238:5146
CCTV12,http://58.63.64.146:8888/udp/239.77.1.109:5146
CCTV12,http://58.63.64.146:8888/udp/239.77.1.170:5146
CCTV12,http://58.63.64.146:8888/udp/239.77.0.136:5146
CCTV13,http://58.63.64.146:8888/udp/239.77.0.188:5146
CCTV13,http://58.63.64.146:8888/udp/239.253.43.196:5146
CCTV14,http://58.63.64.146:8888/udp/239.77.1.161:5146
CCTV14,http://58.63.64.146:8888/udp/239.77.1.171:5146
CCTV14,http://58.63.64.146:8888/udp/239.77.0.133:5146
CCTV15,http://58.63.64.146:8888/udp/239.77.1.239:5146
CCTV16,http://58.63.64.146:8888/udp/239.77.0.165:5146
CCTV16,http://58.63.64.146:8888/udp/239.77.1.76:5146
CCTV16,http://58.63.64.146:8888/udp/239.77.1.98:5146
CCTV17,http://58.63.64.146:8888/udp/239.77.1.121:5146
CCTV17,http://58.63.64.146:8888/udp/239.77.0.198:5146

CCTV1,http://111.13.111.242/000000001000PLTV/88888888/224/3221236219/1.m3u8?HlsProfileId=
CCTV2,http://111.13.111.242/000000001000PLTV/88888888/224/3221235743/1.m3u8?HlsProfileId=
CCTV3,http://58.63.64.146:8888/udp/239.77.0.169:5146
CCTV4,http://111.13.111.242/000000001000PLTV/88888888/224/3221236202/1.m3u8?HlsProfileId=
CCTV5,https://node1.olelive.com:6443/live/CCTV5HD/hls.m3u8
CCTV6,http://58.63.64.146:8888/udp/239.77.0.171:5146
CCTV7,http://111.13.111.242/000000001000PLTV/88888888/224/3221235759/1.m3u8?HlsProfileId=
CCTV8,https://node1.olelive.com:6443/live/CCTV8HD/hls.m3u8
CCTV9,http://111.13.111.242/000000001000PLTV/88888888/224/3221235767/1.m3u8?HlsProfileId=
CCTV10,https://node1.olelive.com:6443/live/CCTV10HD/hls.m3u8
CCTV11,http://111.13.111.242/000000001000PLTV/88888888/224/3221236200/1.m3u8?HlsProfileId=
CCTV12,http://111.13.111.242/000000001000PLTV/88888888/224/3221235735/1.m3u8?HlsProfileId=
CCTV13,https://live-play.cctvnews.cctv.com/cctv/merge_cctv13.m3u8
CCTV13,http://111.13.111.242/000000001000PLTV/88888888/224/3221236187/1.m3u8?HlsProfileId=
CCTV14,http://111.13.111.242/000000001000PLTV/88888888/224/3221235776/1.m3u8?HlsProfileId=
CCTV15,http://111.13.111.242/000000001000PLTV/88888888/224/3221236203/1.m3u8?HlsProfileId=
CCTV16,http://58.63.64.146:8888/udp/239.77.0.165:5146
CCTV17,http://111.13.111.242/000000001000PLTV/88888888/224/3221236190/1.m3u8?HlsProfileId=

北京卫视,http://live.sjsrm.com/bjsjs/sd/live.m3u8
东方卫视,http://110.16.65.6:8888/newlive/live/hls/20/live.m3u8
重庆卫视,https://sjlivecdn9.cbg.cn/204912315959/app_2/_definst_/ls_2.stream/chunklist.m3u8
天津卫视,http://audiovisual.vsd.gehua.net.cn/live/TianJinHD_1200.m3u8
黑龙江卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020281749ed995f2824759051fa.m3u8?bitrate=2300&pt=5
辽宁卫视,http://cyz32.livehbindex.hbcatv.cn/live/5000002019d84b0ba201007677bbf28c.m3u8?bitrate=2300&pt=5
吉林卫视http://cyz32.livehbindex.hbcatv.cn/live/500000205c15461b956f19f9b6896ad6.m3u8?bitrate=2300&pt=5
河北卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020d6be4c4ba70a4e3261b14544.m3u8?bitrate=2300&pt=5
河北农民,http://cyz32.livehbindex.hbcatv.cn/live/500000202fa64c9bac01e09eaf06afd8.m3u8?bitrate=2300&pt=5
河南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/HeNanHD/ipcdn,HeNanHD_1200K_live.m3u8
山东卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ShanDongHD_1200.m3u8
山西卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020ed0a4b74afc7e496c1bcc45c.m3u8?bitrate=2300&pt=5
湖北卫视,http://222.134.240.136:9901/tsfile/live/0132_1.m3u8?url=tvzb.com
湖南卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020c9ea4ce4bf3cfbbb7f8b8bb7.m3u8?bitrate=2300&pt=5
浙江卫视,http://cyz32.livehbindex.hbcatv.cn/live/5000002045414da0bcca7fb08fd34c8a.m3u8?bitrate=2300&pt=5
江苏卫视,http://cyz32.livehbindex.hbcatv.cn/live/500000201708473e9f4e1dbb0361de6b.m3u8?bitrate=2300&pt=5
江西卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020728a439baf65ce94f8cf3e30.m3u8?bitrate=2300&pt=5
安徽卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020d0ab40578faaa8a023ce4d5c.m3u8?bitrate=2300&pt=5
广东卫视,http://cyz32.livehbindex.hbcatv.cn/live/500000206bc6413cb38dc9ca586ffe3f.m3u8?bitrate=2300&pt=5
深圳卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020289041678b7585eb32637331.m3u8?bitrate=2300&pt=5
广西卫视,http://live.gxrb.com.cn/tv/gxtvlive03/index.m3u8
贵州卫视,hhttp://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/GuiZhouHD/ipcdn,GuiZhouHD_1200K_live.m3u8
云南卫视,http://audiovisual.vsd.gehua.net.cn:80/live/ipcdn/YunNanHD/ipcdn,YunNanHD_1200K_live.m3u8
四川卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020407a4a109f5dfc6f26dbf5eb.m3u8?bitrate=2300&pt=5
东南卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020c18c4f03a2107aa78ced8fff.m3u8?bitrate=2300&pt=5
海峡卫视,http://101.33.17.11/liveplay-kk.rtxapp.com/live/program/live/hxwshd4m/4000000/mnf.m3u8
厦门卫视,http://222.134.240.136:9901/tsfile/live/0129_1.m3u8?url=tvzb.com
海南卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020741c4046820cd89d5ecbd401.m3u8?bitrate=2300&pt=5
三沙卫视,https://pullsstv90080111.ssws.tv/live/SSTV20220729.m3u8
内蒙古卫视,http://cyz32.livehbindex.hbcatv.cn/live/50000020eeba44449d4f4913a2897e4e.m3u8?bitrate=2300&pt=5
陕西卫视,http://cyz32.livehbindex.hbcatv.cn/live/5000002019984c0fa29ae0d57380da3a.m3u8?bitrate=2300&pt=5
农林卫视,http://39.134.24.166/dbiptv.sn.chinamobile.com/PLTV/88888890/224/3221226229/index.m3u8
甘肃卫视,http://cyz32.livehbindex.hbcatv.cn/live/500000206da44fde810a98a3d7848f82.m3u8?bitrate=2300&pt=5
宁夏卫视,http://cyz32.livehbindex.hbcatv.cn/live/500000205dfa4e06bf7243e30e5182c8.m3u8?bitrate=2300&pt=5
新疆卫视,http://cyz32.livehbindex.hbcatv.cn/live/500000201e484cbeb064a31201e3dd05.m3u8?bitrate=2300&pt=5
青海卫视,http://stream.qhbtv.com/qhws/sd/live.m3u8
西藏卫视,http://222.134.240.136:9901/tsfile/live/0111_1.m3u8?url=tvzb.com

CCTV1-综合,http://222.134.240.136:9901/tsfile/live/0001_1.m3u8?url=tvzb.com
CCTV2-财经,http://222.134.240.136:9901/tsfile/live/0002_1.m3u8?url=tvzb.com
CCTV3-综艺,http://222.134.240.136:9901/tsfile/live/0003_1.m3u8?url=tvzb.com
CCTV4-国际,http://222.134.240.136:9901/tsfile/live/0004_1.m3u8?url=tvzb.com
CCTV5-体育,http://222.134.240.136:9901/tsfile/live/0005_1.m3u8?url=tvzb.com
CCTV6-电影,http://222.134.240.136:9901/tsfile/live/0006_1.m3u8?url=tvzb.com
CCTV7-军农,http://222.134.240.136:9901/tsfile/live/0007_1.m3u8?url=tvzb.com
CCTV8-电视剧,http://222.134.240.136:9901/tsfile/live/0008_1.m3u8?url=tvzb.com
CCTV9-纪录,http://222.134.240.136:9901/tsfile/live/0009_1.m3u8?url=tvzb.com
CCTV10-科教,http://222.134.240.136:9901/tsfile/live/0010_1.m3u8?url=tvzb.com
CCTV11-戏曲,http://222.134.240.136:9901/tsfile/live/0011_1.m3u8?url=tvzb.com
CCTV12-社会与法,http://222.134.240.136:9901/tsfile/live/0012_1.m3u8?url=tvzb.com
CCTV13-新闻,http://222.134.240.136:9901/tsfile/live/0013_1.m3u8?url=tvzb.com
CCTV14-少儿,http://222.134.240.136:9901/tsfile/live/0014_1.m3u8?url=tvzb.com
CCTV15-音乐,http://222.134.240.136:9901/tsfile/live/0015_1.m3u8?url=tvzb.com
CCTV5+体育赛事,http://222.134.240.136:9901/tsfile/live/0016_1.m3u8?url=tvzb.com
山东少儿,http://222.134.240.136:9901/tsfile/live/1000_1.m3u8?url=tvzb.com
山东影视,http://222.134.240.136:9901/tsfile/live/1001_1.m3u8?url=tvzb.com
山东综艺,http://222.134.240.136:9901/tsfile/live/1002_1.m3u8?url=tvzb.com
山东生活,http://222.134.240.136:9901/tsfile/live/1003_1.m3u8?url=tvzb.com
山东体育,http://222.134.240.136:9901/tsfile/live/1073_1.m3u8?url=tvzb.com
山东农科,http://222.134.240.136:9901/tsfile/live/1005_1.m3u8?url=tvzb.com
山东公共,http://222.134.240.136:9901/tsfile/live/1004_1.m3u8?url=tvzb.com
山东齐鲁,http://222.134.240.136:9901/tsfile/live/1006_1.m3u8?url=tvzb.com
山东卫视,http://222.134.240.136:9901/tsfile/live/0131_1.m3u8?url=tvzb.com
山东国际,http://222.134.240.136:9901/tsfile/live/1007_1.m3u8?url=tvzb.com
东营公共,http://222.134.240.136:9901/tsfile/live/1008_1.m3u8?url=tvzb.com
东营综合,http://222.134.240.136:9901/tsfile/live/1009_1.m3u8?url=tvzb.com
辽宁卫视,http://222.134.240.136:9901/tsfile/live/0121_1.m3u8?url=tvzb.com
深圳卫视,http://222.134.240.136:9901/tsfile/live/0126_2.m3u8?url=tvzb.com
湖北卫视,http://222.134.240.136:9901/tsfile/live/0132_1.m3u8?url=tvzb.com
吉林卫视,http://222.134.240.136:9901/tsfile/live/0116_1.m3u8?url=tvzb.com
江西卫视,http://222.134.240.136:9901/tsfile/live/0138_1.m3u8?url=tvzb.com
陕西卫视,http://222.134.240.136:9901/tsfile/live/0136_1.m3u8?url=tvzb.com
四川卫视,http://222.134.240.136:9901/tsfile/live/0123_1.m3u8?url=tvzb.com
贵州卫视,http://222.134.240.136:9901/tsfile/live/0120_1.m3u8?url=tvzb.com
宁夏卫视,http://222.134.240.136:9901/tsfile/live/0112_1.m3u8?url=tvzb.com
东南卫视,http://222.134.240.136:9901/tsfile/live/0137_1.m3u8?url=tvzb.com
山西卫视,http://222.134.240.136:9901/tsfile/live/0118_1.m3u8?url=tvzb.com
北京卫视,http://222.134.240.136:9901/tsfile/live/0122_1.m3u8?url=tvzb.com
黑龙江卫视,http://222.134.240.136:9901/tsfile/live/0143_1.m3u8?url=tvzb.com
广东卫视,http://222.134.240.136:9901/tsfile/live/0125_1.m3u8?url=tvzb.com
重庆卫视,http://222.134.240.136:9901/tsfile/live/0142_1.m3u8?url=tvzb.com
天津卫视,http://222.134.240.136:9901/tsfile/live/0135_1.m3u8?url=tvzb.com
河北卫视,http://222.134.240.136:9901/tsfile/live/0117_1.m3u8?url=tvzb.com
旅游卫视,http://222.134.240.136:9901/tsfile/live/0114_1.m3u8?url=tvzb.com
青海卫视,http://222.134.240.136:9901/tsfile/live/0140_1.m3u8?url=tvzb.com
西藏卫视,http://222.134.240.136:9901/tsfile/live/0111_1.m3u8?url=tvzb.com
兵团卫视,http://222.134.240.136:9901/tsfile/live/0115_1.m3u8?url=tvzb.com
内蒙古卫视,http://222.134.240.136:9901/tsfile/live/0109_1.m3u8?url=tvzb.com
新疆卫视,http://222.134.240.136:9901/tsfile/live/0110_1.m3u8?url=tvzb.com
湖南卫视,http://222.134.240.136:9901/tsfile/live/0128_1.m3u8?url=tvzb.com
江苏卫视,http://222.134.240.136:9901/tsfile/live/0127_1.m3u8?url=tvzb.com
浙江卫视,http://222.134.240.136:9901/tsfile/live/0124_1.m3u8?url=tvzb.com
安徽卫视,http://222.134.240.136:9901/tsfile/live/0130_1.m3u8?url=tvzb.com
厦门卫视,http://222.134.240.136:9901/tsfile/live/0129_1.m3u8?url=tvzb.com
东方卫视,http://222.134.240.136:9901/tsfile/live/0107_1.m3u8?url=tvzb.com
CETV,http://222.134.240.136:9901/tsfile/live/1010_1.m3u8?url=tvzb.com
海看热播,http://222.134.240.136:9901/tsfile/live/1011_1.m3u8?url=tvzb.com
海看演艺,http://222.134.240.136:9901/tsfile/live/1012_1.m3u8?url=tvzb.com
海看爱宠,http://222.134.240.136:9901/tsfile/live/1013_1.m3u8?url=tvzb.com
海看剧场,http://222.134.240.136:9901/tsfile/live/1014_1.m3u8?url=tvzb.com
海看大片,http://222.134.240.136:9901/tsfile/live/1015_1.m3u8?url=tvzb.com
IPTV3+,http://222.134.240.136:9901/tsfile/live/1016_1.m3u8?url=tvzb.com
IPTV5+,http://222.134.240.136:9901/tsfile/live/1017_1.m3u8?url=tvzb.com
IPTV6+,http://222.134.240.136:9901/tsfile/live/1018_1.m3u8?url=tvzb.com
IPTV8+,http://222.134.240.136:9901/tsfile/live/1019_1.m3u8?url=tvzb.com
少儿动漫,http://222.134.240.136:9901/tsfile/live/1020_1.m3u8?url=tvzb.com
炫动卡通,http://222.134.240.136:9901/tsfile/live/1023_1.m3u8?url=tvzb.com
优漫卡通,http://222.134.240.136:9901/tsfile/live/1025_1.m3u8?url=tvzb.com
嘉佳卡通,http://222.134.240.136:9901/tsfile/live/1026_1.m3u8?url=tvzb.com
动画,http://222.134.240.136:9901/tsfile/live/1027_1.m3u8?url=tvzb.com
中国交通,http://222.134.240.136:9901/tsfile/live/1028_1.m3u8?url=tvzb.com
海看电竞世界,http://222.134.240.136:9901/tsfile/live/1029_1.m3u8?url=tvzb.com
CCTV17,http://222.134.240.136:9901/tsfile/live/1030_1.m3u8?url=tvzb.com
测试,http://222.134.240.136:9901/tsfile/live/1031_1.m3u8?url=tvzb.com
精选,http://222.134.240.136:9901/tsfile/live/1032_1.m3u8?url=tvzb.com
足球,http://222.134.240.136:9901/tsfile/live/1033_1.m3u8?url=tvzb.com
台球,http://222.134.240.136:9901/tsfile/live/1034_1.m3u8?url=tvzb.com
高网,http://222.134.240.136:9901/tsfile/live/1035_1.m3u8?url=tvzb.com
早教,http://222.134.240.136:9901/tsfile/live/1036_1.m3u8?url=tvzb.com
鉴赏,http://222.134.240.136:9901/tsfile/live/1037_1.m3u8?url=tvzb.com
经典电影,http://222.134.240.136:9901/tsfile/live/1039_1.m3u8?url=tvzb.com
喜剧,http://222.134.240.136:9901/tsfile/live/1040_1.m3u8?url=tvzb.com
三沙卫视,http://222.134.240.136:9901/tsfile/live/1041_1.m3u8?url=tvzb.com
CETV1,http://222.134.240.136:9901/tsfile/live/1042_1.m3u8?url=tvzb.com
山东教育卫视,http://222.134.240.136:9901/tsfile/live/1043_1.m3u8?url=tvzb.com
热播剧场,http://222.134.240.136:9901/tsfile/live/1044_1.m3u8?url=tvzb.com
法制,http://222.134.240.136:9901/tsfile/live/1045_1.m3u8?url=tvzb.com
家庭影院,http://222.134.240.136:9901/tsfile/live/1046_1.m3u8?url=tvzb.com
谍战剧场,http://222.134.240.136:9901/tsfile/live/1047_1.m3u8?url=tvzb.com
相声小品,http://222.134.240.136:9901/tsfile/live/1050_1.m3u8?url=tvzb.com
武侠剧场,http://222.134.240.136:9901/tsfile/live/1048_1.m3u8?url=tvzb.com
动作影院,http://222.134.240.136:9901/tsfile/live/1051_1.m3u8?url=tvzb.com
古装剧场,http://222.134.240.136:9901/tsfile/live/1052_1.m3u8?url=tvzb.com
军事,http://222.134.240.136:9901/tsfile/live/1053_1.m3u8?url=tvzb.com
爱看4K,http://222.134.240.136:9901/tsfile/live/1054_1.m3u8?url=tvzb.com
城市剧场,http://222.134.240.136:9901/tsfile/live/1081_1.m3u8?url=tvzb.com
军旅剧场,http://222.134.240.136:9901/tsfile/live/1056_1.m3u8?url=tvzb.com
美人,http://222.134.240.136:9901/tsfile/live/1057_1.m3u8?url=tvzb.com
戏曲,http://222.134.240.136:9901/tsfile/live/1058_1.m3u8?url=tvzb.com
武术,http://222.134.240.136:9901/tsfile/live/1059_1.m3u8?url=tvzb.com
美妆,http://222.134.240.136:9901/tsfile/live/1060_1.m3u8?url=tvzb.com
财富天下,http://222.134.240.136:9901/tsfile/live/1061_1.m3u8?url=tvzb.com
国学,http://222.134.240.136:9901/tsfile/live/1062_1.m3u8?url=tvzb.com
星影,http://222.134.240.136:9901/tsfile/live/1063_1.m3u8?url=tvzb.com
光影,http://222.134.240.136:9901/tsfile/live/1064_1.m3u8?url=tvzb.com
爱生活,http://222.134.240.136:9901/tsfile/live/1065_1.m3u8?url=tvzb.com
墨宝,http://222.134.240.136:9901/tsfile/live/1067_1.m3u8?url=tvzb.com
CETV4,http://222.134.240.136:9901/tsfile/live/1069_1.m3u8?url=tvzb.com
CETV2,http://222.134.240.136:9901/tsfile/live/1072_1.m3u8?url=tvzb.com
魅力时尚,http://222.134.240.136:9901/tsfile/live/1071_1.m3u8?url=tvzb.com
金鹰纪实,http://222.134.240.136:9901/tsfile/live/1074_1.m3u8?url=tvzb.com
测试-高清电影,http://222.134.240.136:9901/tsfile/live/1075_1.m3u8?url=tvzb.com
测试-动作电影,http://222.134.240.136:9901/tsfile/live/1076_1.m3u8?url=tvzb.com
测试-兵羽,http://222.134.240.136:9901/tsfile/live/1077_1.m3u8?url=tvzb.com
测试-新动漫,http://222.134.240.136:9901/tsfile/live/1079_1.m3u8?url=tvzb.com
河南卫视,http://222.134.240.136:9901/tsfile/live/0139_1.m3u8?url=tvzb.com
CCTV新科动漫,http://222.134.240.136:9901/tsfile/live/1085_1.m3u8?url=tvzb.com
四海钓鱼,http://222.134.240.136:9901/tsfile/live/1086_1.m3u8?url=tvzb.com
胜利影视,http://222.134.240.136:9901/tsfile/live/1087_1.m3u8?url=tvzb.com
东营区,http://222.134.240.136:9901/tsfile/live/1088_1.m3u8?url=tvzb.com
东营区-2,http://222.134.240.136:9901/tsfile/live/1089_1.m3u8?url=tvzb.com
胜利综合,http://222.134.240.136:9901/tsfile/live/1090_1.m3u8?url=tvzb.com
河口区台,http://222.134.240.136:9901/tsfile/live/1091_1.m3u8?url=tvzb.com

未来电视：
NewTV超级综艺,http://111.13.111.242/000000001000PLTV/88888888/224/3221235747/1.m3u8?HlsProfileId=
NewTV超级电影,http://111.13.111.242/000000001000PLTV/88888888/224/3221235755/1.m3u8?HlsProfileId=
NewTV超级电视剧,http://111.13.111.242/000000001000PLTV/88888888/224/3221235788/1.m3u8?HlsProfileId=
NewTV炫舞未来,http://111.13.111.242/000000001000PLTV/88888888/224/3221235764/1.m3u8?HlsProfileId=
NewTV潮妈辣婆,http://111.13.111.242/000000001000PLTV/88888888/224/3221236059/1.m3u8?HlsProfileId=
NewTV农业致富,http://111.13.111.242/000000001000PLTV/88888888/224/3221236147/1.m3u8?HlsProfileId=
NewTV精品纪录,http://111.13.111.242/000000001000PLTV/88888888/224/3221236204/1.m3u8?HlsProfileId=
NewTV精品大剧,http://111.13.111.242/000000001000PLTV/88888888/224/3221236205/1.m3u8?HlsProfileId=
NewTV动作电影,http://111.13.111.242/000000001000PLTV/88888888/224/3221236207/1.m3u8?HlsProfileId=
NewTV怡伴健康,http://111.13.111.242/000000001000PLTV/88888888/224/3221236209/1.m3u8?HlsProfileId=
NewTV海外剧场,http://111.13.111.242/000000001000PLTV/88888888/224/3221236211/1.m3u8?HlsProfileId=
NewTV古装剧场,http://111.13.111.242/000000001000PLTV/88888888/224/3221236213/1.m3u8?HlsProfileId=
NewTV军事评论,http://111.13.111.242/000000001000PLTV/88888888/224/3221236210/1.m3u8?HlsProfileId=
NewTV家庭剧场,http://111.13.111.242/000000001000PLTV/88888888/224/3221236206/1.m3u8?HlsProfileId=
NewTV军旅剧场,http://111.13.111.242/000000001000PLTV/88888888/224/3221236212/1.m3u8?HlsProfileId=
NewTV中国功夫,http://111.13.111.242/000000001000PLTV/88888888/224/3221236214/1.m3u8?HlsProfileId=
NewTV爱情喜剧,http://111.13.111.242/000000001000PLTV/88888888/224/3221236215/1.m3u8?HlsProfileId=
NewTV武搏世界,http://111.13.111.242/000000001000PLTV/88888888/224/3221236216/1.m3u8?HlsProfileId=
NewTV精品体育,http://111.13.111.242/000000001000PLTV/88888888/224/3221236208/1.m3u8?HlsProfileI
NewTV超级体育,http://111.13.111.242/000000001000PLTV/88888888/224/3221235751/1.m3u8?HlsProfileId=

百视TV：

百视TV1,https://bp-caster.bestv.com.cn/954/3/video.m3u8
百视TV2,https://bp-caster.bestv.com.cn/926/3/video.m3u8
百视TV3,https://bp-caster.bestv.com.cn/945/3/video.m3u8
百视TV4,https://bp-caster.bestv.com.cn/900/3/video.m3u8
百视TV5,https://bp-caster.bestv.com.cn/956/3/video.m3u8
百视TV6,https://bp-caster.bestv.com.cn/947/3/video.m3u8
百视TV7,https://bp-caster.bestv.com.cn/941/3/video.m3u8
百视TV8,https://bp-caster.bestv.com.cn/953/3/video.m3u8
百视TV9,https://bp-caster.bestv.com.cn/939/3/video.m3u8
百视TV10,https://bp-caster.bestv.com.cn/938/3/video.m3u8
百视TV11,https://bp-caster.bestv.com.cn/937/3/video.m3u8
百视TV12,https://bp-caster.bestv.com.cn/943/3/video.m3u8
百视TV14,https://bp-caster.bestv.com.cn/934/3/video.m3u8
百视独播1,https://bp-caster.bestv.com.cn/946/3/video.m3u8
百视独播2,https://bp-caster.bestv.com.cn/955/3/video.m3u8
百视独播3,https://bp-caster.bestv.com.cn/940/3/video.m3u8
百视独播4,https://bp-caster.bestv.com.cn/944/3/video.m3u8
百视自制,https://bp-caster.bestv.com.cn/723/3/video.m3u8
独家直播,https://bp-caster.bestv.com.cn/936/3/video.m3u8



 静态源：电视直播源搜索引擎

 电影：ye23.vip  河南：hndyjyfw.gov.cn  浙江：cztv.com  石家庄：sjzntv.cn  青海：qhbtv.com  延边：ybtvyun.com   三沙：ssws.tv  掌点财经：aniu.tv  外国台：streamlock.net  外国台：cloudfront.net  FM音乐电台：hndt.com  重庆：cbg.cn  西藏：vtibet.cn  云南：ynradio.com  山东：iqilu.com

河北移动：hbcatv.cn  日本东京都：101.33.17

国际频道：

纬来日本,http://50.7.238.114:8278/videolandjapan/playlist.m3u8?tid=MBAB7250273772502737&ct=19344&tsum=2b580b485643235654de4a1bbc9639cb

日语新闻台,https://n24-cdn-live.ntv.co.jp/ch01/index_high.m3u8
韩国国防TV,http://mediaworks.dema.mil.kr:1935/live_edge/cudo.sdp/playlist.m3u8
新加坡亚太台,https://d2e1asnsl7br7b.cloudfront.net/7782e205e72f43aeb4a48ec97f66ebbe/index_4.m3u8
StarHD,http://livestar.siliconweb.com/media/star1/star1.m3u8
泰国ASTV,http://news1.live14.com/stream/news1_hi.m3u8
朝鲜KCTV,http://119.77.96.184:1935/chn05/chn05/chunklist_w644291506.m3u8

ABC新闻,http://cms-wowza.lunabyte.io/wbrz-live-1/_definst_/smil:wbrz-live.smil/chunklist_b1300000.m3u8



 电影：
星卫电影,http://50.7.238.114:8278/xingwei_movie/playlist.m3u8?tid=MBAB2096754620967546&ct=18392&tsum=2c800c1f0b6cc98d2404608c294dcbc2
龙祥电影,http://50.7.238.114:8278/lungxiangtime_twn/playlist.m3u8?tid=MADA6805114368051143&ct=18392&tsum=d6a1f02ca9abd5368d2a365e40247ae8


EOF;

$us      = explode("\n", $urls);
$infos   = array_merge([
    'CCTV13,https://live-play.cctvnews.cctv.com/cctv/merge_cctv13_mud.m3u8',
    '河南卫视,http://media.hndyjyfw.gov.cn/live/jz-hnweishi/live.m3u8',
    '河南都市,http://media.hndyjyfw.gov.cn/live/jz-henandushi/live.m3u8'
], $us);
$handler = fopen('zijian.txt', 'w');

foreach ($infos as $url) {
    $pos = strpos($url, 'http');
    if ($pos === false) {
        continue;
    }
    $u = substr($url, $pos);
    try {
        $s = time();
        $check = Configs::isM3U8Playable($u);
        fputs($handler, $url . PHP_EOL);
        echo $url . ' success' . PHP_EOL;
        if (time() - $s < 5) {
            sleep(1);
        }
    } catch (Exception $e) {
        echo $url . ' error : ' . $e->getMessage() . PHP_EOL;
    }
}
