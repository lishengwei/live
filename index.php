<?php

include_once dirname(__FILE__) . '/config.php';

$globalConfig = GlobalConfig::get();
$globalConfig['ipv6'] = GlobalConfig::isIpv6();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IPTV管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.staticfile.org/layui/2.9.3/css/layui.css" rel="stylesheet">
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-hide-xs layui-bg-black">IPTV管理系统</div>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-this"><a href="javascript:;">全局配置</a></li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">IPTV</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">menu 1</a></dd>
                        <dd><a href="javascript:;">menu 2</a></dd>
                        <dd><a href="javascript:;">menu 3</a></dd>
                        <dd><a href="javascript:;">the links</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <blockquote class="layui-elem-quote layui-text">
                全局配置
            </blockquote>
            <div class="layui-card layui-panel">
                <form class="layui-form" action="">
                    <table class="layui-table">
                        <colgroup>
                            <col width="250">
                            <col width="">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>项目</th>
                            <th>值</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>本地环境是否支持IPV6</td>
                            <td>
                                <?php if ($globalConfig['ipv6']) {echo '是';} else {echo '否';}?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <br><br>
        </div>
    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
    </div>
</div>

<script src="//cdn.staticfile.org/layui/2.9.3/layui.js"></script>
<script>
    //JS
    layui.use(['element', 'form', 'layer', 'util'], function () {
        var element = layui.element;
        var form = layui.form;
        var layer = layui.layer;
        var util = layui.util;
        var $ = layui.$;

        //头部事件
        util.event('lay-header-event', {
            menuLeft: function (othis) { // 左侧菜单事件
                layer.msg('展开左侧菜单的操作', {icon: 0});
            },
            menuRight: function () {  // 右侧菜单事件
                layer.open({
                    type: 1,
                    title: '更多',
                    content: '<div style="padding: 15px;">处理右侧面板的操作</div>',
                    area: ['260px', '100%'],
                    offset: 'rt', // 右上角
                    anim: 'slideLeft', // 从右侧抽屉滑出
                    shadeClose: true,
                    scrollbar: false
                });
            }
        });

        // form.on('switch(switchTest)', function (data) {
        //     // 发送ajax
        //     $.ajax({
        //         url: 'api/config.php',
        //         type: 'post',
        //         data: {
        //             ipv6: this.checked ? 1 : 0
        //         },
        //         dataType: 'json',
        //         success: function (res) {
        //             if (res.code === 0) {
        //                 layer.msg('设置成功');
        //             } else {
        //                 layer.msg('设置失败');
        //             }
        //         },
        //         error: function () {
        //             layer.msg('设置失败');
        //         }
        //     });
        // });
    });
</script>
</body>
</html>