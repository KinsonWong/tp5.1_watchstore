<?php /*a:1:{s:81:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin_order\order_list.html";i:1600760961;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>订单列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <link rel="stylesheet" href="/public/static/admin/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>

  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="#"style="text-decoration: none">订单管理</a>
        <a href="#"style="text-decoration: none">
          <cite>订单列表</cite>
        </a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration: none" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo htmlentities($order_count); ?> 条</span>
      </xblock>

      <table class="layui-hide" id="demo" lay-filter="demo"></table>
      <style type="text/css">
        .layui-table-cell{
            height: auto; 
        }
    </style>

    </div>

    
    <script type="text/html" id="barDemo">
      {{#  if(d.status == "待发货"){ }}
          <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="order_deliver">发货</a>
          <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
          <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
      {{#  } else { }}
          <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
          <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
      {{#  } }}
    </script>

    <script type="text/html" id="titleTpl">
        {{# var len = d.bname.length;}}       
        {{# for(var i=0; i<len; i++){ }}
          <div>{{d.bname[i].brand}} {{d.bname[i].modelcode}} *{{d.bname[i].buy_num}}</div>
          
        {{#}}}
    </script>

    <script>
      layui.use('table', function(){
        var table = layui.table;

        table.render({
          elem: '#demo',
          url: "<?php echo url('/get_order_list'); ?>" ,//数据接口
          page: true ,//开启分页
          limit:8,
          cellMinWidth: 40, //全局定义常规单元格的最小宽度
          cols: [[ //表头
          {type: 'checkbox'},
          {field: 'o_id', title: '订单号',width:90,sort: true},
          {field: 'detail', title: '订单详情',width:300,templet: '#titleTpl'},
          {field: 'consignee', title: '收件人',width:100,},
          {field: 'contact', title: '联系电话'} ,
          {field: 'all_price', title: '应付金额',width:110,sort: true},
          {field: 'discounts', title: '优惠金额',width:110,sort: true},
          {field: 'pay', title: '实付金额',width:110,sort: true},
          {field: 'date', title: '下单时间',sort: true,},
          {field: 'status', title: '发货状态', width:110,sort: true},
          {title: '操作',toolbar: '#barDemo'}
        ]],
        text: {none: '暂无相关数据', }
  });

    //监听行工作事件
  table.on('tool(demo)', function(obj) {
        var data = obj.data;
        //console.log(obj)
        if (obj.event === 'del') {
            layer.confirm('确定要删除吗？删除后无法恢复！', {
                icon: 2,
                title: '提示'
            }, function(index) {
              $.ajax({
              type: "POST",//方法类型
              dataType: "json",//预期服务器返回的数据类型
              url: "<?php echo url('/order_delete'); ?>",//url
              data: {
                oid: data.id,
              },
              success: function (result) {
                if (result.msg===1){
                   layer.msg('已删除!',{icon:1,time:1000},function() {
                            window.location.href = "<?php echo url('/show_order_list'); ?>";
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

        else if (obj.event === 'order_deliver') {
          layer.prompt({
        formType: 3,
        value: '',  //初始值
        title: '请输入快递单号',
        area: ['300px', '60px'] //自定义文本域宽高
      }, function(value, index, elem){
        layer.close(index);
        layer.confirm('确认要发货吗？',function(index){
              // 异步后台处理
              $.ajax({
                type: "POST",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "<?php echo url('/order_deliver'); ?>",//url
                data: {
                  oid: data.o_id,
                  expressNum: value,
                },
                success: function (result) {
                  if(result.msg == 1){
                    layer.msg('已成功发货', {icon:1,time:1000},function() {
                            window.location.href =
                                "<?php echo url('/show_order_list'); ?>";
                        });
                  }else{
                    layer.msg(result.msg, {icon:1,time:1000});
                  }
                },
                error:function (result) {
                  console.log(result)
                  layer.msg("服务器繁忙,请稍后重试!",{icon:0,time:1000})
                }
              });
          });
      });
    }
        else if (obj.event === 'edit') {
            window.location.href = "<?php echo url('/show_order_edit'); ?>?oid=" + data.o_id;
        }
        return false;
    });
  });

</script>


    <script>
      //订单批量删除
      function delAll (argument) {
        var checkStatus = layui.table.checkStatus('demo');
        var data = checkStatus.data;
        var oids = [];

        for(var i = 0;i<data.length;i++){
            oids.push(data[i].o_id);
          }
          if(data.length<1){
            layer.msg("请选择至少一行！",{icon:0,time:1000});
          }
          else{
            layer.confirm('确认要删除所选订单吗？',function(index){
                if (data.length == 0){
                  layer.msg('删除成功', {icon: 1,time:1000});
                  return
                }
                //捉到所有被选中的，发异步进行删除
                $.ajax({
                  type: "POST",//方法类型
                  dataType: "json",//预期服务器返回的数据类型
                  url: "<?php echo url('/order_delete_s'); ?>",//url
                  data: {
                    oids: oids,
                  },
                  success: function (result) {
                    if(result.msg == 1){
                      layer.msg('删除成功', {icon: 1},function() {
                            window.location.href = "<?php echo url('/show_order_list'); ?>";
                        });
                    }else{
                      layer.msg(result.msg, {icon:1,time:1000});
                    }
                  },
                  error:function (result) {
                    console.log(result)
                    layer.msg("服务器繁忙,请稍后重试!",{icon:0,time:1000})
                  }
                });
            });
          }
      }
    </script>

  </body>
</html>