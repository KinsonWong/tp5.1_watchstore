<?php /*a:1:{s:80:"D:\phpstudy_pro\WWW\watchstore\application\user\view\user\user_address_edit.html";i:1601612301;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
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

    <form class="layui-form order-edit-top">
        <div class="layui-form-item">
            <label for="consignee" class="layui-form-label">
                <span class="x-red">*</span>收货人
            </label>
            <div class="layui-input-inline">
                <input type="hidden" name="h_a_id" value="<?php echo htmlentities($address['h_a_id']); ?>">
                <input type="text" id="consignee" name="consignee" required="" lay-verify="required" autocomplete="off"
                    value="<?php echo htmlentities($address['consignee']); ?>" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>唯一的收货人姓名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="contact" class="layui-form-label">
                <span class="x-red">*</span>联系电话
            </label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo htmlentities($address['contact']); ?>" id="contact" name="contact" required="" autocomplete="off"
                    class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>收货人的手机号码
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <div class="layui-form-item" id="x-city">
                <label class="layui-form-label"><span class="x-red">*</span>地址</label>
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
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">
                <span class="x-red">*</span>详细地址
            </label>
            <div class="layui-input-block" style="width: 40%">
                <textarea name="addr" placeholder="详细地址" class="layui-textarea"><?php echo htmlentities($address['addr']); ?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="edit" class="layui-form-label">
            </label>
            <button class="layui-btn" lay-filter="edit" id="edit" lay-submit="">
                提交
            </button>
        </div>
    </form>

    <script>
        layui.use(['form', 'code'], function () {
            form = layui.form;
            layui.code();
            $('#x-city').xcity('<?php echo htmlentities($address['province']); ?>', '<?php echo htmlentities($address['city']); ?>', '<?php echo htmlentities($address['area']); ?>');
        });


        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form
                , layer = layui.layer;


            //监听提交
            form.on('submit(edit)', function (data) {
                //异步，把数据提交给后端
                $.ajax({
                    type: "POST",
                    url: "<?php echo url('/address_update'); ?>",
                    data: $(".layui-form").serialize(),
                    success: function (result) {
                        if (result.msg == 1) {
                            layer.msg('修改成功!', { icon: 1, time: 2000 });
                        } else {
                            layer.msg(result.msg, { icon: 0, time: 1000 });
                        }
                    },
                    error: function (result) {
                        layer.msg("服务器繁忙,请稍后重试!", { icon: 2, time: 1000 })
                    }
                });
                return false;
            });


        });

    </script>

</body>

</html>