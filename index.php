<?php

include_once dirname(__FILE__) . '/config.php';
$globalConfig         = GlobalConfig::get();
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
    <link href="layui/css/layui.css" rel="stylesheet">
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
                <li class="layui-nav-item layui-this"><a href="index.php">全局配置</a></li>
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
                    <table class="layui-table" lay-filter="global_configs">
                        <colgroup>
                            <col width="250">
                            <col width="">
                            <col width="150">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>项目</th>
                            <th>值</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>本地环境是否支持IPV6</td>
                            <td>
                                <?php if ($globalConfig['ipv6']) {
                                    echo '是';
                                } else {
                                    echo '否';
                                } ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>代理设置</td>
                            <td>
                                <?php
                                $proxy = $globalConfig['proxy'] ?? [];
                                if (!empty($proxy['host']) && !empty($proxy['port'])) {
                                    echo $proxy['host'] . ':' . $proxy['port'];
                                } else {
                                    echo '无';
                                }
                                ?>
                            </td>
                            <td>
                                <button type="button" class="layui-btn" lay-event="edit_proxy">编辑</button>
                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                            </td>
                        </tr>
                        <tr>
                            <td>外部链接</td>
                            <td>
                                <?php
                                $urls = $globalConfig['urls'] ?? [];
                                if (empty($urls)) {
                                    echo '暂无';
                                } else {
                                    foreach ($urls as $url) {
                                        echo $url . '<br>';
                                    }
                                }
                                ?>
                            </td>
                            <td>编辑</td>
                        </tr>
                        <tr>
                            <td>电视台</td>
                            <td>
                                <?php
                                $channels = $globalConfig['channels'] ?? [];
                                if (empty($channels)) {
                                    echo '暂无';
                                } else {
                                    foreach ($channels as $channel) {
                                        echo $channel . '<br>';
                                    }
                                }
                                ?>
                            </td>
                            <td>编辑</td>
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

<script src="layui/layui.js"></script>
<script>
    //JS
    layui.use([ 'table'], function () {
        const table = layui.table;
        console.log(1111);
        table.on('tool(global_configs)', function (obj) {
            console.log(222);
            var data = obj.data;
            if (obj.event === 'edit') {
                layer.prompt({
                    formType: 2,
                    value: data.proxy,
                    title: '编辑代理地址',
                    area: ['800px', '350px'] //自定义文本域宽高
                }, function (value, index, elem) {
                    // 发送ajax
                    $.ajax({
                        url: 'api/config.php',
                        type: 'post',
                        data: {
                            proxy: value
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.code === 0) {
                                layer.msg('设置成功');
                            } else {
                                layer.msg('设置失败');
                            }
                        },
                        error: function () {
                            layer.msg('设置失败');
                        }
                    });
                    layer.close(index);
                });
            }
        });
    });
</script>
</body>
</html>