<?php /*a:1:{s:73:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\resetPWD.html";i:1601192430;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>重置管理员密码</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <link rel="stylesheet" href="/public/static/admin/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/bootstrap-3.3.7-dist/js/bootstrap.js"></script>

    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>

</head>

<body class="layui-anim layui-anim-up">
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a href="javascript:void(0);" style="text-decoration:none;">密码重置</a>
            <a href="javascript:void(0);" style="text-decoration:none;">密码重置</a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body" style="padding-left:600px">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="password" class="layui-form-label" style="width:100px">
                    <span class="x-red">*</span>新密码
                </label>
                <div class="layui-input-inline">
                    <input type="hidden" value="<?php echo htmlentities(app('session')->get('admin')); ?>" name="username" id="username">
                    <input type="password" id="password" name="password" required="" autocomplete="off"
                        class="layui-input" placeholder="请输入新密码">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="password_confirm" class="layui-form-label" style="width:100px">
                    <span class="x-red">*</span>重复密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="password_confirm" name="password_confirm" required="" autocomplete="off"
                        class="layui-input" placeholder="请重新输入密码">
                </div>
            </div>
        </form>
        <div class="layui-form-item">
            <label class="layui-form-label">
            </label>
            <button class="layui-btn" onclick="reset_PWD()">提交</button>
        </div>

    </div>
    <script type="text/javascript" src="/public/static/product/js/hex_sha.js"></script>
    <script>
        function reset_PWD() {
            let username = $("#username").val();
            let password = hex_sha1($("#password").val());
            let password_confirm = hex_sha1($("#password_confirm").val());
            $.ajax({
                type: "post",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "<?php echo url('/admin_resetPWD'); ?>",//url
                data: {
                    username:username,
                    password:password,
                    password_confirm:password_confirm
                },
                success: function (result) {
                    if (result.msg === 1) {
                        layer.msg("修改成功", { icon: 1, time: 1500 }, function () { window.location.href = ("<?php echo url('/show_admin_welcome'); ?>"); });
                    } else if (result.msg === 0) {
                        layer.msg('修改失败', { icon: 2, time: 1500 });
                    } else {
                        layer.msg(result.msg);
                    }
                },
                error: function (result) {
                    layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 1500 })
                }
            });

        }
    </script>

</body>

</html>