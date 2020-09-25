<?php /*a:1:{s:73:"D:\phpstudy_pro\WWW\watchstore\application\user\view\user\user_order.html";i:1601019703;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>订单列表</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
    content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="/public/static/admin/css/font.css">
  <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
  <link rel="stylesheet" href="/public/static/admin/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/public/static/admin/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
</head>

<body>
  <div class="x-nav">
    <span class="layui-breadcrumb">
      <a href="<?php echo url('/show_index'); ?>" style="text-decoration: none">返回主页</a>
      <a href="#" style="text-decoration: none">
        <cite>订单列表</cite>
      </a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration: none"
      href="javascript:location.replace(location.href);" title="刷新">
      <i class="layui-icon" style="line-height:30px">ဂ</i></a>
  </div>

  <div class="x-body">
    <table class="layui-table">
      <thead>
        <tr>

          <th>订单编号</th>
          <th>商品名称</th>
          <th>支付方式</th>
          <th>应付金额(元)</th>
          <th>优惠金额(元)</th>
          <th>实付金额(元)</th>
          <th>收货人</th>
          <th>收货地址</th>
          <th>联系电话</th>
          <th>发货状态</th>
          <th>快递单号</th>
          <th>下单时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>


        <?php foreach($user_orders as $values): ?>
        <tr>
          <td><?php echo htmlentities($values['o_id']); ?></td>
          <td>
            <?php foreach($values['bname'] as $key=>$value): ?>
            <?php echo htmlentities($value['bname']); ?> * <?php echo htmlentities($value['user_buy_num']); ?><br>
            <?php endforeach; ?>
          </td>
          <td><?php echo htmlentities($values['payment']); ?></td>
          <td><?php echo htmlentities($values['all_price']); ?></td>
          <td><?php echo htmlentities($values['discounts']); ?></td>
          <td><?php echo htmlentities($values['pay']); ?></td>
          <td><?php echo htmlentities($values['user']['consignee']); ?></td>
          <td><?php echo htmlentities($values['user']['province']); ?><?php echo htmlentities($values['user']['city']); ?><?php echo htmlentities($values['user']['area']); ?><?php echo htmlentities($values['user']['addr']); ?></td>
          <td><?php echo htmlentities($values['user']['contact']); ?></td>
          <?php if(($values['status']==1)): ?>
          <td>待发货</td>
          <?php elseif(($values['status']==2)): ?>
          <td>已发货</td>
          <?php else: ?><td>已收货</td>
          <?php endif; ?>
          <td><?php echo htmlentities($values['expressNum']); ?></td>
          <td><?php echo htmlentities($values['date']); ?></td>
          <?php if(($values['status']==1)): ?>
          <td>-</td>
          <?php elseif(($values['status']==2)): ?>
          <td><a class="layui-btn layui-btn-normal layui-btn-xs" onclick="receive_confirm(this, '<?php echo htmlentities($values['o_id']); ?>')"
              href="javascript:;">确认收货</a></td>
          <?php else: ?><td>-</td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="page"></div>
  </div>

  <script>
    //console.log("<?php echo htmlentities($user_orders); ?>");

    //订单发货
    function receive_confirm(obj, id) {
      layer.confirm('确认收到货了吗？', function (index) {
        // 异步后台处理
        $.ajax({
          type: "POST",//方法类型
          dataType: "json",//预期服务器返回的数据类型
          url: "<?php echo url('/receive_confirm'); ?>",//url
          data: {
            oid: id,
          },
          success: function (result) {
            if (result.msg == 1) {
              layer.msg('已确认收货', { icon: 1, time: 1000 }, function () {
                window.location.href = ("<?php echo url('/show_user_order'); ?>");
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