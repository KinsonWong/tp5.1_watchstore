<?php /*a:1:{s:76:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\member_edit.html";i:1600517962;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>会员编辑</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/public/static/admin/js/xcity.js"></script>
</head>

<body class="layui-anim layui-anim-up">
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:void(0);" style="text-decoration: none">会员管理</a>
              <a href="<?php echo url('/show_member_list'); ?>" style="text-decoration: none">会员列表</a>
              <a href="javascript:void(0);" style="text-decoration: none">
                  <cite>会员添加</cite>
              </a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <form class="layui-form" >
        <input type="hidden" value="<?php echo htmlentities($user['uid']); ?>" name="uid" id="uid">
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>用户名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="username" required=""  lay-verify="nickname"
                       value="<?php echo htmlentities($user['username']); ?>"
                       autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的登入名
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_pass" name="password" required="" lay-verify="pass" value="<?php echo htmlentities($user['password']); ?>"
                       autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                密码由6到16个字符组成
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>确认密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_repass" name="password_confirm" required="" lay-verify="repass"
                       value="<?php echo htmlentities($user['password']); ?>"
                       autocomplete="off" class="layui-input">
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
    </form>
    <br>

        <xblock>
            <a class="layui-btn" href="<?php echo url('/show_address_add'); ?>/<?php echo htmlentities($user['uid']); ?>" style=" text-decoration:none;">添加地址</a>
        </xblock>

    <div class="layui-form-item">
        <table class="layui-hide" id="demo" lay-filter="demo"></table>
    </div>

    <br>
    <div class="layui-form-item">
        <label for="L_repass" class="layui-form-label">
        </label>
        <button class="layui-btn" onclick="edit_member()">
            更新
        </button>
    </div>


</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>


<script>
    layui.use(['form', 'code'], function () {
            form = layui.form;
            layui.code();
            $('#x-city').xcity('<?php echo htmlentities($user['province']); ?>', '<?php echo htmlentities($user['city']); ?>', '<?php echo htmlentities($user['area']); ?>');
        });

    function edit_member() {
        let uid=$("#uid").val();
        let username = $("#L_username").val();
        let password = $("#L_pass").val();
        //let password_confirm = $("#password_confirm").val();
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
                uid:uid,
                username: username,
                password: password,
                email: email,
                phone: phone,
                province: province,
                city: city,
                area: area
            },
            success: function (result) {
                if (result.msg === 1) {
                    layer.msg("更新成功", {icon:1,time:2000}, function() {
                        window.location.href=("<?php echo url('/show_member_list'); ?>");
                        });
                    
                } else if (result.msg === 0) {
                    layer.msg('更新失败', {icon: 2, time: 2000});
                } else {
                    layer.msg(result.msg);
                }
            },
            error: function (result) {
                layer.msg("服务器繁忙,请稍后重试!", {icon: 0, time: 2000})
            }
        });
    }

    layui.use('table', function(){
        var table = layui.table;
        let uid=$("#uid").val();

        table.render({
          elem: '#demo',
          url: "<?php echo url('/get_address_list'); ?>/uid/" + uid ,//数据接口
          page: true ,//开启分页
          limit:5,
          where:{uid:uid},
          cellMinWidth: 40, //全局定义常规单元格的最小宽度
          cols: [[ //表头
          {type: 'checkbox'},
          {field: 'consignee', title: '收件人',sort: true},
          {field: 'contact', title: '联系电话'},
          {field: 'province', title: '省',sort: true},
          {field: 'city', title: '市',},
          {field: 'area', title: '区'} ,
          {field: 'addr', title: '详细地址'},
          {title: '操作',width: 120,toolbar: '#barDemo'}
        ]],
        text: {none: '暂无相关数据', }
  });

    //监听行工作事件
  table.on('tool(demo)', function(obj) {
        var data = obj.data;
        let uid=$("#uid").val();
        //console.log(obj)
        
        if (obj.event === 'del') {
            layer.confirm('确定要删除吗？删除后无法恢复！', {
                icon: 2,
                title: '提示'
            }, function(index) {
              $.ajax({
              type: "POST",//方法类型
              dataType: "json",//预期服务器返回的数据类型
              url: "<?php echo url('/address_delete'); ?>",//url
              data: {
                id: data.h_a_id,
              },
              success: function (result) {
                if (result.msg===1){
                   layer.msg('已删除!',{icon:1,time:1000},function() {
                            window.location.href = "<?php echo url('/show_member_edit'); ?>/" + uid;
                        });

                }else if (result.msg===0) {
                  layer.msg('删除失败',{icon:2,time:1000});
                }else {
                  layer.msg(result.msg);
                }
              },
              error:function (result) {
                layer.msg("服务器繁忙,请稍后重试!",{icon:0,time:1000})
              }
            });
            });
        } 

        else if (obj.event === 'edit') {
            window.location.href = "<?php echo url('/show_address_edit'); ?>/" + data.h_a_id;
        }
        return false;
    });
    
  });
</script>

</body>

</html>