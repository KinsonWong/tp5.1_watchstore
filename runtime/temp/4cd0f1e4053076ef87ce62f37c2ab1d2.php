<?php /*a:1:{s:83:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin_system\system_view.html";i:1601963342;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>系统管理</title>
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
  <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
  <style>
    .div1 {
      float: left;
      margin-right: 35px;
    }
  </style>
</head>

<body class="layui-anim layui-anim-up">
  <div class="x-nav">
    <span class="layui-breadcrumb">
      <a href="#" style=" text-decoration:none;">系统管理</a>
      <a href="#" style=" text-decoration:none;">系统工具</a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none"
      href="javascript:location.replace(location.href);" title="刷新">
      <i class="layui-icon" style="line-height:30px">ဂ</i></a>
  </div>

  <div class="x-body">
    <div style="margin-left: 30px;margin-top: 30px;">

      <div class="div1">
        <p>临时文件数量：<?php echo htmlentities($temp_count); ?></p>
        <p>临时文件大小：<?php echo htmlentities($temp_size); ?></p>
        <button class="layui-btn layui-btn-danger" onclick="delTemp()"><i class="layui-icon"></i>删除临时文件</button>
      </div>


      <div class="div1">
        <p>日志文件数量：<?php echo htmlentities($log_count); ?></p>
        <p>日志文件大小：<?php echo htmlentities($log_size); ?></p>
        <button class="layui-btn layui-btn-danger" onclick="delLog()"><i class="layui-icon"></i>删除日志文件</button>
      </div>
    </div>

  </div>

  <script>
    //删除临时文件
    function delTemp() {
      layer.confirm('确认要删除所有的临时文件吗？', { title: '提示', icon: 2 }, function (index) {
        $.ajax({
          type: "GET",//方法类型
          dataType: "json",//预期服务器返回的数据类型
          url: "<?php echo url('/delTemp'); ?>",//url

          success: function (result) {
            if (result.msg == 1) {
              layer.msg('删除成功', { icon: 1 }, function () {
                window.location.href = "<?php echo url('/show_system_view'); ?>";
              });

            } else {
              layer.msg(result.msg, { icon: 1, time: 1000 });
            }
          },
          error: function (result) {
            console.log(result)
            layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 1000 })
          }
        });
      });
    }

    //删除日志文件
    function delLog() {
      layer.confirm('确认要删除所有的日志文件吗？', { title: '提示', icon: 2 }, function (index) {
        $.ajax({
          type: "GET",//方法类型
          dataType: "json",//预期服务器返回的数据类型
          url: "<?php echo url('/delLog'); ?>",//url

          success: function (result) {
            if (result.msg == 1) {
              layer.msg('删除成功', { icon: 1 }, function () {
                window.location.href = "<?php echo url('/show_system_view'); ?>";
              });

            } else {
              layer.msg(result.msg, { icon: 1, time: 1000 });
            }
          },
          error: function (result) {
            console.log(result)
            layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 1000 })
          }
        });
      });
    }
  </script>
</body>

</html>