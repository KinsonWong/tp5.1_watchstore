<?php /*a:1:{s:81:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin_log\userlog_list.html";i:1601473024;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>登录日志列表</title>
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
      <a href="javascript:void(0);" style="text-decoration:none;">日志管理</a>
      <a href="javascript:void(0);" style="text-decoration:none;">会员登录日志列表</a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none"
      href="javascript:location.replace(location.href);" title="刷新">
      <i class="layui-icon" style="line-height:30px">ဂ</i></a>
  </div>
  <div class="x-body">

    <xblock>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
      <span class="x-right" style="line-height:40px">共有数据：<?php echo htmlentities($log_count); ?> 条</span>
    </xblock>

    <div class="logSearch">
        <div class="demoTable layui-form-item">
          <div class="layui-inline">
            <div class="layui-input-inline">
              <input class="layui-input" name="watchName" id="textdemo" autocomplete="off" placeholder="请输入用户名">
            </div>
          </div>
          <div class="layui-btn" data-type="reload">搜索</div>
        </div>
      </div>

    <table class="layui-hide" id="demo" lay-filter="demo"></table>

    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
      </script>
  </div>

  <script>
    layui.use('table', function () {
      var table = layui.table;

      table.render({
        elem: '#demo',
        url: "<?php echo url('/get_userlog_list'); ?>",//数据接口
        page: true,//开启分页
        limit: 10,
        cellMinWidth: 50, //全局定义常规单元格的最小宽度
        cols: [[ //表头
          { type: 'checkbox', fixed: 'left' },
          { field: 'log_id', title: '日志编号', sort: true, fixed: 'left' },
          { field: 'user_id', title: '用户ID' , sort: true},
          { field: 'username', title: '用户名' , sort: true},
          { field: 'ip', title: '登录IP', sort: true },
          { field: 'login_time', title: '登录时间', sort: true },
          { field: 'description', title: '描述', sort: true },
          { title: '操作', toolbar: '#barDemo' }
        ]],
        text: { none: '暂无相关数据', },
        id: 'textreload'
      });

      var $ = layui.$, active = {
        reload: function () {
          var textdemo = $('#textdemo').val();
          table.reload('textreload', {
            url: "<?php echo url('/search_log'); ?>",
            method: 'post',
            limit: 10,
            page: { curr: 1 },
            where: {
              username: textdemo,
            }
          })

        }
      }
      $('.logSearch .layui-btn').on('click', function () {
        var type = $(this).data('type');

        if ($('#textdemo').val() == "") {
          layer.msg('查询项目不能为空');
          return false;
        }
        active[type] ? active[type].call(this) : '';
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
              url: "<?php echo url('/userlog_delete'); ?>",//url
              data: {
                log_id: data.log_id,
              },
              success: function (result) {
                if (result.msg === 1) {
                  layer.msg('已删除!', { icon: 1, time: 1000 }, function () {
                    window.location.href = "<?php echo url('/show_userlog_list'); ?>";
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
        return false;
      });

    });

    function delAll(argument) {
      var checkStatus = layui.table.checkStatus('demo');
      var data = checkStatus.data;
      var log_ids = [];
      //console.log(data);
      //console.log(data.length);
      //console.log(data[0]);
      for (var i = 0; i < data.length; i++) {
        log_ids.push(data[i].log_id);
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
            url: "<?php echo url('/userlog_delete_s'); ?>",//url
            data: {
              log_ids: log_ids,
            },
            success: function (result) {
              if (result.msg == 1) {
                layer.msg('删除成功', { icon: 1 }, function () {
                  window.location.href = "<?php echo url('/show_userlog_list'); ?>";
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