<?php /*a:1:{s:83:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin_member\member_list.html";i:1600671653;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>用户列表</title>
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
      <a href="javascript:void(0);" style="text-decoration:none;">会员管理</a>
      <a href="javascript:void(0);" style="text-decoration:none;">会员列表</a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none"
      href="javascript:location.replace(location.href);" title="刷新">
      <i class="layui-icon" style="line-height:30px">ဂ</i></a>
  </div>
  <div class="x-body">

    <xblock>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      <a class="layui-btn" href="<?php echo url('/show_member_add'); ?>" style=" text-decoration:none;">添加用户</a>
      <span class="x-right" style="line-height:40px">共有数据：<?php echo htmlentities($user_count); ?> 条</span>
    </xblock>

    <table class="layui-hide" id="demo" lay-filter="demo"></table>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
      </script>
  </div>

  <script>
    layui.use('table', function () {
      var table = layui.table;

      table.render({
        elem: '#demo',
        url: "<?php echo url('/get_member_list'); ?>",//数据接口
        page: true,//开启分页
        limit: 10,
        cellMinWidth: 50, //全局定义常规单元格的最小宽度
        cols: [[ //表头
          { type: 'checkbox', fixed: 'left' },
          { field: 'uid', title: 'UID', width: 90, sort: true, fixed: 'left' },
          { field: 'username', title: '用户名' },
          { field: 'email', title: '邮箱' },
          { field: 'phone', title: '手机' },
          { field: 'province', title: '省', sort: true },
          { field: 'city', title: '市', },
          { field: 'area', title: '区/县', },
          { field: 'registertime', title: '注册时间', sort: true },
          { fixed: 'right', title: '操作', toolbar: '#barDemo' }
        ]],
        text: { none: '暂无相关数据', }
      });




      //监听行工作事件
      table.on('tool(demo)', function (obj) {
        var data = obj.data;
        //console.log(obj)
        if (obj.event === 'del') {
          layer.confirm('确定要删除吗？删除后无法恢复！', {
            icon: 2,
            title: '提示'
          }, function (index) {
            $.ajax({
              type: "POST",//方法类型
              dataType: "json",//预期服务器返回的数据类型
              url: "<?php echo url('/member_delete'); ?>",//url
              data: {
                uid: data.uid,
              },
              success: function (result) {
                if (result.msg === 1) {
                  layer.msg('已删除!', { icon: 1, time: 1000 }, function () {
                    window.location.href = "<?php echo url('/show_member_list'); ?>";
                  });

                } else if (result.msg === 0) {
                  layer.msg('删除失败', { icon: 2, time: 1000 });
                } else {
                  layer.msg(result.msg);
                }
              },
              error: function (result) {
                layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 1000 })
              }
            });
          });
        }

        else if (obj.event === 'edit') {
          window.location.href = "<?php echo url('/show_member_edit'); ?>/" + data.uid;
        }
        return false;
      });

    });

    function delAll(argument) {
      var checkStatus = layui.table.checkStatus('demo');
      var data = checkStatus.data;
      var uids = [];
      //console.log(data);
      //console.log(data.length);
      //console.log(data[0]);
      for (var i = 0; i < data.length; i++) {
        uids.push(data[i].uid);
      }
      if (data.length < 1) {
        layer.msg("请选择至少一行！", { icon: 0, time: 1000 });
      }
      else {
        layer.confirm('确认要删除所选行吗？', { title: '提示', icon: 2 }, function (index) {
          if (data.length == 0) {
            layer.msg('删除成功', { icon: 1, time: 1000 });
            return
          }
          //捉到所有被选中的，发异步进行删除
          $.ajax({
            type: "POST",//方法类型
            dataType: "json",//预期服务器返回的数据类型
            url: "<?php echo url('/member_delete_s'); ?>",//url
            data: {
              uids: uids,
            },
            success: function (result) {
              if (result.msg == 1) {
                layer.msg('删除成功', { icon: 1 }, function () {
                  window.location.href = "<?php echo url('/show_member_list'); ?>";
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
    }

  </script>
</body>

</html>