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
                    <a class="" href="channels.php">IPTV</a>
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
                    <form class="layui-form" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">名称</label>
                            <div class="layui-input-inline layui-input-wrap" style="width: 300px">
                                <input type="text" name="group_name" lay-verify="required" placeholder="请输入"
                                       autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="layui-btn" lay-submit lay-filter="demo1">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>
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

        form.on('submit(demo1)', function (data) {
            // ajax
            $.ajax({
                url: 'api/group-save.php',
                type: 'post',
                data: data.field,
                dataType: 'json',
                success: function (res) {
                    if (res.code === 0) {
                        layer.msg('设置成功');
                        location.href='channels.php'
                    } else {
                        layer.msg('设置失败');
                    }
                },
                error: function () {
                    layer.msg('设置失败');
                }
            });

            return false; // 阻止默认 form 跳转
        });
    });
</script>
</body>
</html>