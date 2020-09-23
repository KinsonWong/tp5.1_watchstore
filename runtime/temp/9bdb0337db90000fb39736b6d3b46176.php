<?php /*a:1:{s:76:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\address_add.html";i:1600521245;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>添加收货地址</title>
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
             <a href="javascript:void(0);" style="text-decoration:none">会员管理</a>
              <a href="<?php echo url('/show_member_list'); ?>" style="text-decoration: none">会员列表</a>
              <a href="javascript:void(0);" style="text-decoration: none">
                  <cite>添加收货地址</cite>
              </a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none" href="javascript:location.replace(location.href);" title="刷新">
          <i class="layui-icon" style="line-height:30px">ဂ</i></a>
  </div>

  <div class="x-body">
    <form class="layui-form order-edit-top">
      <div class="layui-form-item">
          <label for="consignee" class="layui-form-label">
              <span class="x-red">*</span>收货人
          </label>
          <div class="layui-input-inline">
              <input type="hidden" name="uid" value="<?php echo htmlentities($uid); ?>">
              <input type="text" id="consignee" name="consignee" required="" lay-verify="required"
              autocomplete="off" value="" class="layui-input">
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
              <input type="text" value="" id="contact" name="contact" required=""
              autocomplete="off" class="layui-input">
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
                <textarea name="addr" placeholder="详细地址" class="layui-textarea"></textarea>
            </div>
        </div>
      <div class="layui-form-item">
          <label for="edit" class="layui-form-label">
          </label>
          <button  class="layui-btn" onclick="add_address()">
              添加
          </button>
      </div>
  </form>
</div>

    <script>
       layui.use(['form', 'code'], function () {
            form = layui.form;
            layui.code();
            $('#x-city').xcity('', '', '');
        });

        function add_address() {
            $.ajax({
                type: "post",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "<?php echo url('/address_add'); ?>",//url
                data: $(".layui-form").serialize(),
                success: function (result) {
                    if(result.msg == 1){
                        layer.msg('添加成功', {icon: 1,time:1500},function() {
                            window.location.href = "<?php echo url('/show_member_edit'); ?>/<?php echo htmlentities($uid); ?>";
                        });
                    } 
                },
                error: function (result) {
                    layer.msg("服务器繁忙,请稍后重试!", {icon: 0, time: 1500})
                }
            });

        }
    </script>
  </body>

</html>