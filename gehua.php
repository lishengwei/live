<?php

error_reporting(0);
$id      = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n       = [
    //央视
    'cctv1'     => 'CCTV1SD_1200', //CCTV1综合
    'cctv1hd'   => 'CCTV1HD_6000', //CCTV1综合HD
    'cctv1hd2'  => 'CCTV1HDPortal_1500', //CCTV1综合HD2
    'cctv2'     => 'CCTV2SD_1200', //CCTV2财*
    'cctv2hd'   => 'CCTV2HD_6000', //CCTV2财*HD
    'cctv3'     => 'CCTV3SD_1200', //CCTV3综艺
    'cctv3hd'   => 'CCTV3HD_6000', //CCTV3综艺HD
    'cctv4'     => 'CCTV4SD_1200', //CCTV4中文国际
    'cctv4hd'   => 'CCTV4HD_6000', //CCTV4中文国际HD
    'cctv5'     => 'CCTV5SD_1200', //CCTV5体育
    'cctv5hd'   => 'CCTV5HD_6000', //CCTV5体育HD
    'cctv5p'    => 'CCTV5plusSD_1200', //CCTV5+体育赛事
    'cctv5phd'  => 'CCTV5plusHD_6000', //CCTV5+体育赛事HD
    'cctv6'     => 'CCTV6SD_1200', //CCTV6电影
    'cctv6hd'   => 'CCTV6HD_6000', //CCTV6电影HD
    'cctv7'     => 'CCTV7SD_1200', //CCTV7国防军事
    'cctv7hd'   => 'CCTV7HD_6000', //CCTV7国防军事HD
    'cctv8'     => 'CCTV8SD_1200', //CCTV8电视剧
    'cctv8hd'   => 'CCTV8HD_6000', //CCTV8电视剧HD
    'cctv9'     => 'CCTV9SD_1200', //CCTV9纪录
    'cctv9hd'   => 'CCTV9HD_6000', //CCTV9纪录HD
    'cctv10'    => 'CCTV10SD_1200', //CCTV10科教
    'cctv10hd'  => 'CCTV10HD_6000', //CCTV10科教HD
    'cctv11'    => 'CCTV11SD_800', //CCTV11戏曲
    'cctv11hd'  => 'CCTV11HD_2000', //CCTV11戏曲HD
    'cctv11hd2' => 'CCTV11HD2_6000', //CCTV11戏曲HD2
    'cctv12'    => 'CCTV12SD_1200', //CCTV12社会与法
    'cctv12hd'  => 'CCTV12HD_6000', //CCTV12社会与法HD
    'cctv13'    => 'CCTV13SD_800', //CCTV13新闻
    'cctv13hd'  => 'CCTV13HD_2000', //CCTV13新闻HD
    'cctv13hd2' => 'CCTV13HD2_6000', //CCTV13新闻HD2
    'cctv14'    => 'CCTV14SD_1200', //CCTV14少儿
    'cctv14hd'  => 'CCTV14HD_6000', //CCTV14少儿HD
    'cctv15'    => 'CCTVmusicSD_800', //CCTV15音乐
    'cctv15hd'  => 'CCTVmusicHD_2000', //CCTV15音乐HD
    'cctv16'    => 'CCTV16SD_1200', //CCTV16奥林匹克
    'cctv16hd'  => 'CCTV16HD_6000', //CCTV16奥林匹克HD
    'cctv17'    => 'CCTV17SD_1200', //CCTV17农业农村
    'cctv17hd'  => 'CCTV17HD_6000', //CCTV17农业农村HD
    'fxzl'      => 'FaXianZhiLvSD_800', //种养新影-发现之旅
    'fxzlhd'    => 'FaXianZhiLvHD_2000', //种养新影-发现之旅HD
    'lgs'       => 'LaoGuShiSD_800', //种养新影-老故事
    'lgshd'     => 'LaoGuShiHD_2000', //种养新影-老故事HD
    'yggw'      => 'YangShiGouWuSD_800', //CCTV央广购物
    'yggwhd'    => 'YangShiGouWuHD_2000', //CCTV央广购物HD
    'zsgw'      => 'ZhongShiGouWuSD_800', //CCTV中视购物
    'zsgwhd'    => 'ZhongShiGouWuHD_2000', //CCTV中视购物HD
    'cgtn'      => 'CCTVnewsSD_800', //CGTN
    'cgtnhd'    => 'CCTVnewsHD_2000', //CGTN HD
    'sh'        => 'ShuHuaPinDaoSD_800', //书画频道
    'shhd'      => 'ShuHuaPinDaoHD_2000', //书画频道HD
    'zgtq'      => 'ChinaQiXiangPinDaoSD_800', //中国天气
    'zgtqhd'    => 'ChinaQiXiangPinDaoHD_2000', //中国天气HD
    //中国教育电视台
    'cetv1'     => 'CETV1SD_1200', //CETV1中教1台
    'cetv1hd'   => 'CETV1HD_6000', //CETV1中教1台HD
    'cetv3'     => 'CETV3SD_800', //CETV3中教3台
    'cetv3hd'   => 'CETV3HD_2000', //CETV3中教3台HD
    'cetv4'     => 'CETV4SD_800', //CETV4中教4台
    'cetv4hd'   => 'CETV4HD_2000', //CETV4中教4台HD
    'zqjy'      => 'ZaoQiJiaoYuSD_800', //CETV早期教育
    'zqjyhd'    => 'ZaoQiJiaoYuHD_2000', //CETV早期教育HD
    //CHC系列
    'chcgq'     => 'CHCSD2_1200', //CHC高清电影
    'chcgqhd'   => 'CHCHD2_6000', //CHC高清电影HD
    'chcdz'     => 'MotionSD_800', //CHC动作电影
    'chcdzhd'   => 'MotionHD_2000', //CHC动作电影HD
    'chcjt'     => 'CHCSD_800', //CHC家庭影院
    'chcjthd'   => 'CHCHD_2000', //CHC家庭影院HD
    //卫视
    'bjws'      => 'BTV1SD_1200', //北京卫视
    'bjhd'      => 'BTV1HD_6000', //北京卫视HD
    'bjhd2'     => 'BTV1HDPortal_1500', //北京卫视HD
    'dfws'      => 'DongFangSD_1200', //东方卫视
    'dfhd'      => 'DongFangHD_6000', //东方卫视HD
    'tjws'      => 'TianJinSD_1200', //天津卫视
    'tjhd'      => 'TianJinHD_6000', //天津卫视HD
    'cqws'      => 'ChongQingSD_1200', //重庆卫视
    'cqhd'      => 'ChongQingHD_6000', //重庆卫视HD
    'hljws'     => 'HeiLongJiangSD_1200', //黑龙江卫视
    'hljhd'     => 'HeiLongJiangHD_6000', //黑龙江卫视HD
    'jlws'      => 'JiLinWeiShiSD_1200', //吉林卫视
    'jlhd'      => 'JiLinWeiShiHD_6000', //吉林卫视HD
    'lnws'      => 'LiaoNingSD_1200', //辽宁卫视
    'lnhd'      => 'LiaoNingHD_6000', //辽宁卫视HD
    'nmws'      => 'NeiMengGuSD_800', //内蒙古卫视
    'nmhd'      => 'NeiMengGuHD_2000', //内蒙古卫视HD
    'nxws'      => 'NingXiaSD_800', //宁夏卫视
    'nxhd'      => 'NingXiaHD_2000', //宁夏卫视HD
    'gsws'      => 'GanSuSD_800', //甘肃卫视
    'gshd'      => 'GanSuHD_2000', //甘肃卫视HD
    'gshd2'     => 'GanSuHD2_6000', //甘肃卫视HD2
    'qhws'      => 'QingHaiSD_800', //青海卫视
    'qhhd'      => 'QingHaiHD_2000', //青海卫视HD
    'sxws'      => 'ShannXiSD_800', //陕西卫视
    'sxhd'      => 'ShannXiHD_2000', //陕西卫视HD
    'sxhd2'     => 'ShanXiHD2_6000', //陕西卫视HD2
    'hbws'      => 'HeBeiSD_1200', //河北卫视
    'hbhd'      => 'HeBeiHD_6000', //河北卫视HD
    'sxiws'     => 'ShanXiSD_800', //山西卫视
    'sxihd'     => 'ShanXiHD_2000', //山西卫视HD
    'sdws'      => 'ShanDongSD_1200', //山东卫视
    'sdhd'      => 'ShanDongHD_6000', //山东卫视HD
    'ahws'      => 'AnHuiSD_1200', //安徽卫视
    'ahhd'      => 'AnHuiHD_6000', //安徽卫视HD
    'hnws'      => 'HeNanSD_1200', //河南卫视
    'hnhd'      => 'HeNanHD__6000', //河南卫视HD
    'hubws'     => 'HuBeiSD_1200', //湖北卫视
    'hubhd'     => 'HuBeiHD_6000', //湖北卫视HD
    'hunws'     => 'HuNanSD_1200', //湖南卫视
    'hunhd'     => 'HuNanHD_6000', //湖南卫视HD
    'jxws'      => 'JiangXiSD_1200', //江西卫视
    'jxhd'      => 'JiangXiHD_6000', //江西卫视HD
    'jsws'      => 'JiangSuSD_1200', //江苏卫视
    'jshd'      => 'JiangSuHD_6000', //江苏卫视HD
    'zjws'      => 'ZheJiangSD_1200', //浙江卫视
    'zjhd'      => 'ZheJiangHD_6000', //浙江卫视HD
    'dnws'      => 'FuJianSD_1200', //东南卫视
    'dnhd'      => 'FuJianHD_6000', //东南卫视HD
    'xmws'      => 'XiaMenSD_800', //厦门卫视
    'xmhd'      => 'XiaMenHD_2000', //厦门卫视HD
    'gdws'      => 'GuangDongSD_1200', //广东卫视
    'gdhd'      => 'GuangDongHD_6000', //广东卫视HD
    'szws'      => 'ShenZhenSD_1200', //深圳卫视
    'szhd'      => 'ShenZhenHD_6000', //深圳卫视HD
    'gxws'      => 'GuangXiSD_1200', //广西卫视
    'gxhd'      => 'GuangXiHD_6000', //广西卫视HD
    'ynws'      => 'YunNanSD_800', //云南卫视
    'ynhd'      => 'YunNanHD_2000', //云南卫视HD
    'ynhd2'     => 'YunNanHD2_6000', //云南卫视HD2
    'gzws'      => 'GuiZhouSD_800', //贵州卫视
    'gzhd'      => 'GuiZhouHD_2000', //贵州卫视HD
    'scws'      => 'SiChuanSD_1200', //四川卫视
    'schd'      => 'SiChuanHD_6000', //四川卫视HD
    'xjws'      => 'XinJiangSD_800', //新疆卫视
    'xjhd'      => 'XinJiangHD_2000', //新疆卫视HD
    'btws'      => 'BTTVSD_800', //兵团卫视
    'bthd'      => 'BTTVHD_2000', //兵团卫视HD
    'xzws'      => 'XiZangSD_800', //西藏卫视
    'xzhd'      => 'XiZangHD_2000', //西藏卫视HD
    'hinws'     => 'LvYouWeiShiSD_1200', //海南卫视
    'hinhd'     => 'LvYouWeiShiHD_6000', //海南卫视HD
    'ssws'      => 'SanShaSD_800', //三沙卫视
    'sshd'      => 'SanShaHD_2000', //三沙卫视HD
    'sshd2'     => 'SanShaHD2_6000', //三沙卫视HD2
    //北京
    'bjwy'      => 'BTVwenyiSD_1200', //北京文艺HD
    'bjwyhd'    => 'BTVwenyiHD_6000', //北京文艺HD
    'bjjskj'    => 'BTV3SD_800', //北京纪实科教
    'bjjskjhd'  => 'BTV3HD_2000', //北京纪实科教HD
    'bjys'      => 'BTV4SD_1200', //北京影视
    'bjyshd'    => 'BTV4HD_6000', //北京影视HD
    'bjcj'      => 'BTV5SD_800', //北京财*
    'bjcjhd'    => 'BTV5HD_2000', //北京财*HD
    'bjtyxx'    => 'BTVjishiSD_1200', //北京体育休闲
    'bjtyxxhd'  => 'BTVjishiHD_6000', //北京体育休闲HD
    'bjsh'      => 'BTV7SD_800', //北京生活
    'bjsh2'     => 'BTVShengHuoSD_1200', //北京生活2
    'bjshhd'    => 'BTV7HD_2000', //北京生活HD
    'bjshhd2'   => 'BTVShengHuoHD_6000', //北京生活HD2
    'bjxw'      => 'BTV9SD_1200', //北京新闻
    'bjxw2'     => 'BTVxinwenSD_1200', //北京新闻2
    'bjxwhd'    => 'BTV9HD_6000', //北京新闻HD
    'bjxwhd2'   => 'BTVxinwenHD_6000', //北京新闻HD2
    'bjkk'      => 'BTV-KaKuSD_1200', //北京卡酷
    'bjkkhd'    => 'BTV-KaKuHD_6000', //北京卡酷HD
    'shdy'      => 'SiHaiDiaoYuSD_800', //四海钓鱼
    'shdyhd'    => 'SiHaiDiaoYuHD_2000', //四海钓鱼HD
    'jsjc'      => 'JinShiJuChangSD_800', //京视剧场
    'jsjchd'    => 'JinShiJuChangHD_2000', //京视剧场HD
    'ytcq'      => 'YiTanChunQiuSD_800', //弈坛春秋
    'ytcqhd'    => 'YiTanChunQiuHD_2000', //弈坛春秋HD
    'hqqg'      => 'HuanQiuQiGuanSD_800', //环球奇观
    'hqqghd'    => 'HuanQiuQiGuanHD_2000', //环球奇观HD
    'hqly'      => 'HuanQiuLvYouSD_800', //环球旅游
    'hqlyhd'    => 'HuanQiuLvYouHD_2000', //环球旅游HD
    'yybb'      => 'YouYouBaoBeiSD_800', //优优宝贝
    'yybbhd'    => 'YouYouBaoBeiHD_2000', //优优宝贝HD
    'sthj'      => 'XinYuLeSD_800', //生态环境
    'sthjhd'    => 'XinYuLeHD_2000', //生态环境HD
    'zypd'      => 'ZhiYePinDaoSD_800', //置业频道
    'zypdhd'    => 'ZhiYePinDaoHD_2000', //置业频道HD
    'zhtc'      => 'KaoShiZaiXianSD_800', //中华特产
    'zhtchd'    => 'KaoShiZaiXianHD_2000', //中华特产HD
    'jshqjx'    => 'GHSSD_1200', //聚鲨环球精选
    'jshqjxhd'  => 'GHSHD_6000', //聚鲨环球精选HD
    'ghds'      => 'GeHuadaoshiSD_1200', //歌华导视
    'ghdshd'    => 'GeHuadaoshiHD_6000', //歌华导视HD
    'ghdshd2'   => 'GehuadaoshiHDPortal_1500', //歌华导视HD2
    'dgyy'      => 'DongGanYinYueSD_800', //动感音乐
    'dgyyhd'    => 'DongGanYinYueHD_2000', //动感音乐HD
    'pgxw'      => 'PingGuQuXianXinWenSD_800', //平谷新闻
    'pgxwhd'    => 'PingGuQuXianXinWenHD_2000', //平谷新闻HD
    'mtgxw'     => 'MenTouGouQuXianXinWenSD_800', //门头沟新闻
    'mtgxwhd'   => 'MenTouGouQuXianXinWenHD_2000', //门头沟新闻HD
    //上海
    'jsrw'      => 'ShangHaiJiShiSD_1200', //上海纪实人文
    'jsrwhd'    => 'ShangHaiJiShiHD_6000', //上海纪实人文HD
    'shss'      => 'ShengHuoShiShangSD_1200', //生活时尚
    'shsshd'    => 'ShengHuoShiShangHD_6000', //生活时尚HD
    'dsjc'      => 'DuShiJuChangSD_1200', //都市剧场
    'dsjchd'    => 'DuShiJuChangHD_6000', //都市剧场HD
    'jsxt'      => 'JinSePinDaoSD_800', //金色学堂
    'jsxthd'    => 'JinSePinDaoHD_2000', //金色学堂HD
    'dmxc'      => 'DongManXiuChangSD_1200', //动漫秀场
    'dmxchd'    => 'DongManXiuChangHD_6000', //动漫秀场HD
    'cmpd'      => 'QiChePinDaoSD_800', //车迷频道
    'cmpdhd'    => 'QiChePinDaoHD_2000', //车迷频道HD
    'fztd'      => 'FaZhiTianDiSD_800', //法治天地
    'fztdhd'    => 'FaZhiTianDiHD_2000', //法治天地HD
    'mlzq'      => 'MeiLiYinYueSD_1200', //魅力足球
    'mlzqhd'    => 'MeiLiYinYueHD_6000', //魅力足球HD
    'ly'        => 'QuanJiShiSD_1200', //乐游
    'lyhd'      => 'QuanJiShiHD_6000', //乐游HD
    'jbty'      => 'JinBaoTiYuSD_1200', //劲爆体育
    'jbtyhd'    => 'JinBaoTiYuHD_6000', //劲爆体育HD
    'yxfy'      => 'YouXiFengYunSD_1200', //游戏风云
    'yxfyhd'    => 'YouXiFengYunHD_6000', //游戏风云HD
    //重庆
    'ssgw'      => 'ShiShangGouWuSD_800', //时尚购物
    'ssgwhd'    => 'ShiShangGouWuHD_2000', //时尚购物HD
    //吉林
    'jygw'      => 'JiaYouGouWuSD_800', //家有购物
    'jygwhd'    => 'JiaYouGouWuHD_2000', //家有购物HD
    //辽宁
    'jtlc'      => 'JiaTinLiCaiSD_800', //家庭理财
    'jtlchd'    => 'JiaTinLiCaiHD_2000', //家庭理财HD
    //内蒙
    'zqpd'      => 'ZuQiuSD_1200', //足球
    'zqpdhd'    => 'ZuQiuHD_6000', //足球HD
    //山西
    'ygw'       => 'YouGouWuSD_800', //优购物
    'ygwhd'     => 'YouGouWuHD_2000', //优购物HD
    //山东
    'sdjy'      => 'CETVSD_800', //山东教育卫视
    'sdjyhd'    => 'CETVHD_2000', //山东教育卫视HD
    'sctx'      => 'ShouCangTianXiaSD_800', //收藏天下
    'sctxhd'    => 'ShouCangTianXiaHD_2000', //收藏天下HD
    'zhms'      => 'ZhongHuaMeiShiSD_800', //中华美食
    'zhmshd'    => 'ZhongHuaMeiShiHD_2000', //中华美食HD
    //安徽
    'jjgw'      => 'JiaJiaGouWuSD_800', //家家购物
    'jjgwhd'    => 'JiaJiaGouWuHD_2000', //家家购物HD
    //湖南
    'cpd'       => 'ChaPinDaoSD_800', //茶频道
    'cpdhd'     => 'ChaPinDaoHD_2000', //茶频道HD
    'jykt'      => 'JYKatonSD_800', //金鹰卡通
    'jykthd'    => 'JYKatonHD_2000', //金鹰卡通HD
    //江西
    'fsgw'      => 'FengShangGouWuSD_800', //风尚购物
    'fsgwhd'    => 'FengShangGouWuHD_2000', //风尚购物HD
    //江苏
    'cftx'      => 'CaiFuTianXiaSD_800', //财富天下
    'cftxhd'    => 'CaiFuTianXiaHD_2000', //财富天下HD
    'hxgw'      => 'HaoXiangGouWuSD_800', //好享购物
    'hxgwhd'    => 'HaoXiangGouWuHD_2000', //好享购物HD
    //贵州
    'tywq'      => 'TianYuanWeiQiSD_800', //天元围棋
    'tywqhd'    => 'TianYuanWeiQiHD_2000', //天元围棋HD
    //空中课堂
    'kzktx1'    => 'KZKT-Xiao1SD_800', //空中课堂一年级
    'kzktx1hd'  => 'KZKT-Xiao1HD_2000', //空中课堂一年级HD
    'kzktx2'    => 'KZKT-Xiao2SD_800', //空中课堂二年级
    'kzktx2hd'  => 'KZKT-Xiao2HD_2000', //空中课堂二年级HD
    'kzktx3'    => 'KZKT-Xiao3SD_800', //空中课堂三年级
    'kzktx3hd'  => 'KZKT-Xiao3HD_2000', //空中课堂三年级HD
    'kzktx4'    => 'KZKT-Xiao4SD_800', //空中课堂四年级
    'kzktx4hd'  => 'KZKT-Xiao4HD_2000', //空中课堂四年级HD
    'kzktx5'    => 'KZKT-Xiao5SD_800', //空中课堂五年级
    'kzktx5hd'  => 'KZKT-Xiao5HD_2000', //空中课堂五年级HD
    'kzktx6'    => 'KZKT-Xiao6SD_800', //空中课堂六年级
    'kzktx6hd'  => 'KZKT-Xiao6HD_2000', //空中课堂六年级HD
    'kzktc1'    => 'KZKT-Chu1SD_800', //空中课堂初一
    'kzktc1hd'  => 'KZKT-Chu1HD_2000', //空中课堂初一HD
    'kzktc2'    => 'KZKT-Chu2SD_800', //空中课堂初二
    'kzktc2hd'  => 'KZKT-Chu2HD_2000', //空中课堂初二HD
    'kzktc3'    => 'KZKT-Chu3SD_800', //空中课堂初三
    'kzktc3hd'  => 'KZKT-Chu3HD_2000', //空中课堂初三HD
    'kzktg1'    => 'KZKT-Gao1SD_800', //空中课堂高一
    'kzktg1hd'  => 'KZKT-Gao1HD_2000', //空中课堂高一HD
    'kzktg2'    => 'KZKT-Gao2SD_800', //空中课堂高二
    'kzktg2hd'  => 'KZKT-Gao2HD_2000', //空中课堂高二HD
    'kzktg3'    => 'KZKT-Gao3SD_800', //空中课堂高三
    'kzktg3hd'  => 'KZKT-Gao3HD_2000', //空中课堂高三HD
];
$stream  = "http://audiovisual.vsd.gehua.net.cn/live/ipcdn,{$n[$id]}K/";
$ts      = intval((time() - 60) / 6);
$current = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-TARGETDURATION:6\n#EXT-X-MEDIA-SEQUENCE:{$ts}\n";
for ($i = 0; $i < 6; $i++) {
    $s       = rtrim(chunk_split($ts, 3, "/"), "/");
    $current .= "#EXTINF:6.000\n$stream$s.ts\n";
    $ts      = $ts + 1;
}
header("Content-Type: application/vnd.apple.mpegurl");
echo $current;
