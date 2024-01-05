<?php

include_once dirname(__FILE__) . '/config.php';

$channelsGroups = ChannelsGroup::getAll();

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
                <li class="layui-nav-item"><a href="index.php">全局配置</a></li>
                <li class="layui-nav-item layui-this">
                    <a class="" href="javascript:;">IPTV</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <blockquote class="layui-elem-quote layui-text">
                配置列表
            </blockquote>
            <div class="layui-card layui-panel">
                <div class="layui-card-body">
                    <div style="padding-bottom: 10px;">
                        <a class="layui-btn layuiadmin-btn-list" data-type="add" href="add.php">添加</a>
                    </div>

                    <table class="layui-table" lay-filter="global_configs">
                        <colgroup>
                            <col width="250">
                            <col width="">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>项目</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (empty($channelsGroups)) {
                            ?>
                            <tr>
                                <td>暂无配置</td>
                                <td></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($channelsGroups as $group) {
                                ?>
                                <tr>
                                    <td><?php echo $group; ?></td>
                                    <td>

                                    </td>
                                    <td></td>
                                </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
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
    layui.use(['table', 'util', 'layer', 'form'], function () {
        var $ = layui.$;
        var layer = layui.layer;
        var util = layui.util;
        var form = layui.form;

    });
</script>
</body>
</html>