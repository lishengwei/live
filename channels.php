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
    <link href="//unpkg.com/layui@2.9.3/dist/css/layui.css" rel="stylesheet">
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

                    <table class="layui-table" id="global_configs" lay-filter="global_configs"></table>
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
    </div>
</div>
<script type="text/html" id="toolEvent">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script src="//unpkg.com/layui@2.9.3/dist/layui.js"></script>
<script>
    //JS
    layui.use(function () {
        var $ = layui.$;
        var table = layui.table;
        table.render({
            elem: '#global_configs'
            , url: 'api/group-list.php' //数据接口
            , page: false //开启分页
            , cols: [[ //表头
                {field: 'group_name', title: '名称'}
                , {title: '操作', toolbar: '#toolEvent'}
            ]]
        });
        table.on('tool(global_configs)', function (obj) {
            var data = obj.data;

            if (obj.event === 'del') {
                layer.confirm('真的删除么', function (index) {
                    $.ajax({
                        url: 'api/group-delete.php',
                        type: 'post',
                        data: {group_name: data.group_name},
                        dataType: 'json',
                        success: function (res) {
                            if (res.code === 0) {
                                location.reload();
                            } else {
                                layer.msg('删除失败');
                            }
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