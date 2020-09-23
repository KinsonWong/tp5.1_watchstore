<?php /*a:1:{s:82:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin_member\member_add.html";i:1599996711;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>会员添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/public/static/admin/js/xcity.js"></script>
  </head>

  <body class="layui-anim layui-anim-up">
  <div class="x-nav">
      <span class="layui-breadcrumb">
             <a href="#" style="text-decoration:none">会员管理</a>
              <a href="<?php echo url('/show_member_list'); ?>" style="text-decoration: none">会员列表</a>
              <a href="#" style="text-decoration: none">
                  <cite>会员添加</cite>
              </a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none" href="javascript:location.replace(location.href);" title="刷新">
          <i class="layui-icon" style="line-height:30px">ဂ</i></a>
  </div>
  <div class="x-body">
      <form class="layui-form" id="user">
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red">*</span>用户名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_username" name="username" required=""  lay-verify="nickname"

                         autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">* </span>将会成为您唯一的登入名
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
                         autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                <span class="x-red">* </span>密码由6到16个字符组成
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
                  <span class="x-red">*</span>确认密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="password_confirm" required="" lay-verify="repass"
                         autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red">*</span>邮箱
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_email" name="email" required="" lay-verify="email"
                         autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_phone" class="layui-form-label">
                  <span class="x-red">*</span>电话
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_phone" name="phone" required="" lay-verify="email"
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

      </form>
      <div class="layui-form-item">
          <label for="L_repass" class="layui-form-label">
          </label>
          <button class="layui-btn" onclick="add_member()">
              添加
          </button>
      </div>
  </div>

    <script>
        layui.use(['form', 'code'], function () {
            form = layui.form;
            layui.code();
            $('#x-city').xcity('', '', '');
        });

        function add_member() {
            let uid=$("#uid").val();
            let username = $("#L_username").val();
            let password = $("#L_pass").val();
            let password_confirm = $("#L_repass").val();
            let email = $("#L_email").val();
            let phone = $("#L_phone").val();
            let province = $("#L_province").val();
            let city = $("#L_city").val();
            let area = $("#L_area").val();
            $.ajax({
                type: "post",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "<?php echo url('/user_register'); ?>",//url
                data: {
                    uid:uid,
                    username: username,
                    password: password,
                    password_confirm:password_confirm,
                    email: email,
                    phone: phone,
                    province: province,
                    city: city,
                    area: area
                },
                success: function (result) {
                    if (result.msg === 0) {
                        layer.msg('用户名不能为空', {icon: 2, time: 1000});
                    } else if (result.msg === 1) {
                        layer.msg('用户名不能超过25个字符', {icon: 2, time: 1000});
                    } else if (result.msg === 2) {
                        layer.msg('用户名不能为空', {icon: 2, time: 1000});
                    } else if (result.msg === 3) {
                        layer.msg('密码最多16位', {icon: 2, time: 1000});
                    } else if (result.msg === 4) {
                        layer.msg('密码最少6位', {icon: 2, time: 1000});
                    } else if (result.msg === 5) {
                        layer.msg('两次密码不一致', {icon: 2, time: 1000});
                    } else if (result.msg === 6) {
                        layer.msg('联系方式格式错误', {icon: 2, time: 1000});
                    } else if (result.msg === 7) {
                        layer.msg('邮箱格式错误', {icon: 2, time: 1000});
                    } else if (result.msg === 8) {
                        layer.msg('请补全地址', {icon: 2, time: 1000});
                    }else if(result.msg===9){
                        layer.msg('用户名已经存在', {icon: 2, time: 1000});
                    } else if (result.msg === 'success') {
                        layer.msg("添加成功", {icon:1,time:2000}, function() {
                        window.location.href=("<?php echo url('/show_member_list'); ?>");
                        });
                    } else {
                        layer.alert(result.msg);
                    }

                },
                error: function (result) {
                    layer.msg("服务器繁忙,请稍后重试!", {icon: 0, time: 1000})
                }
            });

        }
    </script>
  </body>

</html>