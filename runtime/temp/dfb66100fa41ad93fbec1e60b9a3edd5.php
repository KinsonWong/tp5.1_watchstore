<?php /*a:1:{s:72:"D:\phpstudy_pro\WWW\watchstore\application\user\view\user\user_edit.html";i:1601733327;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人信息编辑</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/lib/layui/css/layui.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xcity.js"></script>
</head>

<body class="layui-anim layui-anim-up">

    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
        </div>
        <input type="hidden" value="<?php echo htmlentities($user['uid']); ?>" name="uid" id="uid">
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>用户名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="username" required="" lay-verify="nickname"
                    value="<?php echo htmlentities($user['username']); ?>" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的登入名
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email" value="<?php echo htmlentities($user['email']); ?>"
                    autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_phone" class="layui-form-label">
                <span class="x-red">*</span>电话
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_phone" name="phone" required="" lay-verify="email" value="<?php echo htmlentities($user['phone']); ?>"
                    autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item" id="x-city">
            <label class="layui-form-label"><span class="x-red">*</span>所在地区</label>
            <div class="layui-input-inline">
                <select name="province" lay-filter="province" id="L_province">
                    <option value="">请选择省</option>
                </select>
            </div>
            <div class="layui-input-inline">
                <select name="city" lay-filter="city" id="L_city">
                    <option value="">请选择市</option>
                </select>
            </div>
            <div class="layui-input-inline">
                <select name="area" lay-filter="area" id="L_area">
                    <option value="">请选择县/区</option>
                </select>
            </div>
        </div>


    <div class="layui-form-item">
        <label for="edit" class="layui-form-label"></label>
        <button class="layui-btn" onclick="edit_member()">
            更新
        </button>
    </div>


    <script>
        layui.use(['form', 'code'], function () {
            form = layui.form;
            layui.code();
            $('#x-city').xcity('<?php echo htmlentities($user['province']); ?>', '<?php echo htmlentities($user['city']); ?>', '<?php echo htmlentities($user['area']); ?>');
        });

        function edit_member() {
            let uid = $("#uid").val();
            let username = $("#L_username").val();
            let email = $("#L_email").val();
            let phone = $("#L_phone").val();
            let province = $("#L_province").val();
            let city = $("#L_city").val();
            let area = $("#L_area").val();
            $.ajax({
                type: "post",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "<?php echo url('/member_edit'); ?>",//url
                data: {
                    uid: uid,
                    username: username,
                    email: email,
                    phone: phone,
                    province: province,
                    city: city,
                    area: area
                },
                success: function (result) {
                    if (result.msg === 1) {
                        layer.msg("更新成功", { icon: 1, time: 2000 });

                    } else if (result.msg === 0) {
                        layer.msg('更新失败', { icon: 2, time: 2000 });
                    } else {
                        layer.msg(result.msg);
                    }
                },
                error: function (result) {
                    layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 2000 })
                }
            });
        }

    </script>

</body>

</html>