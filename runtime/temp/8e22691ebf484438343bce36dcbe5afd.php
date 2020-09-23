<?php /*a:1:{s:72:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\welcome.html";i:1600671602;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
</head>

<body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo htmlentities(app('session')->get('admin')); ?></span> ! 当前时间：<span id="nowtime"></span></blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim=""
                                lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">

                                        <li class="layui-col-xs2">
                                            <a href="<?php echo url('/show_member_list'); ?>" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($count['user_count']); ?></cite></p>
                                            </a>
                                        </li>

                                        <li class="layui-col-xs2">
                                            <a href="<?php echo url('/show_watch_list'); ?>" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($count['watch_count']); ?></cite></p>
                                            </a>
                                        </li>

                                        <li class="layui-col-xs2">
                                            <a href="<?php echo url('/show_order_list'); ?>" class="x-admin-backlog-body">
                                                <h3>订单数</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($count['order_count']); ?></cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <th>服务器地址</th>
                        <td><?php echo htmlentities($info['server_ip']); ?></td>
                        </tr>
                        <tr>
                            <th>操作系统</th>
                            <td><?php echo htmlentities($info['system_os']); ?></td>
                        </tr>
                        <tr>
                            <th>运行环境</th>
                            <td><?php echo htmlentities($info['env_version']); ?></td>
                        </tr>
                        <tr>
                            <th>PHP版本</th>
                            <td><?php echo htmlentities($info['php_version']); ?></td>
                        </tr>
                        <tr>
                            <th>PHP运行方式</th>
                            <td><?php echo htmlentities($info['run_method']); ?></td>
                        </tr>
                        <tr>
                            <th>MYSQL版本</th>
                            <td><?php echo htmlentities($info['mysql_version']); ?></td>
                        </tr>
                        <tr>
                            <th>ThinkPHP</th>
                            <td><?php echo htmlentities($info['tp_version']); ?></td>
                        </tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td><?php echo htmlentities($info['upload_limit']); ?></td>
                        </tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td><?php echo htmlentities($info['run_time']); ?></td>
                        </tr>
                        <tr>
                            <th>剩余空间</th>
                            <td><?php echo htmlentities($info['su_space']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <td>
                            <a class="x-a" href="/" target="_blank">网上手表商城 Watch League 正式营业</a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
</body>

<script>
    //页面加载调用
    window.onload = function () {
        //每1秒刷新时间
        setInterval("NowTime()", 1000);
    }

    function NowTime() {
        var myDate = new Date();
        var y = myDate.getFullYear();
        var M = myDate.getMonth() + 1; //获取当前月份(0-11,0代表1月)
        var d = myDate.getDate(); //获取当前日(1-31)
        var h = myDate.getHours(); //获取当前小时数(0-23)
        var m = myDate.getMinutes(); //获取当前分钟数(0-59)
        var s = myDate.getSeconds(); //获取当前秒数(0-59)

        //检查是否小于10
        M = check(M);
        d = check(d);
        h = check(h);
        m = check(m);
        s = check(s);
        var timestr = y + "-" + M + "-" + d + "  " + h + ":" + m + ":" + s;
        document.getElementById("nowtime").innerHTML = timestr;
    }
    //时间数字小于10，则在之前加个“0”补位。
    function check(i) {
        var num = (i < 10) ? ("0" + i) : i;
        return num;
    }
</script>

</html>