<?php /*a:1:{s:75:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\order_edit.html";i:1600154849;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>订单编辑</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/public/static/admin/js/xcity.js"></script>
  
      <style>
          .order-edit-top{
              display: block;
              margin-top: 10px !important;
          }
      </style>
  </head>
  
  <body>
    <div class="x-body">
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a href="#" style="text-decoration: none">订单管理</a>
              <a href="<?php echo url('/show_order_list'); ?>" style="text-decoration: none">订单列表</a>
              <a href="#"style="text-decoration: none">
                  <cite>订单修改</cite>
              </a>
            </span>
        </div>
        <?php if(is_array($order_data) || $order_data instanceof \think\Collection || $order_data instanceof \think\Paginator): $i = 0; $__LIST__ = $order_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <form class="layui-form order-edit-top">
            <div class="layui-form-item">
                <label for="contact" class="layui-form-label">
                    <span></span>下单时间
                </label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input layui-disabled" value="<?php echo htmlentities($item['date']); ?>" id="date" name="date" required=""
                    autocomplete="off" class="layui-input" disabled="">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>下单时间无法修改
                </div>
            </div>
          <div class="layui-form-item">
              <label for="consignee" class="layui-form-label">
                  <span class="x-red">*</span>收货人
              </label>
              <div class="layui-input-inline">
                  <input type="hidden" name="oid" value="<?php echo htmlentities($item['o_id']); ?>">
                  <input type="hidden" name="uid" value="<?php echo htmlentities($item['u_id']); ?>">
                  <input type="hidden" name="h_a_id" value="<?php echo htmlentities($item['h_a_id']); ?>">
                  <input type="text" id="consignee" name="consignee" required="" lay-verify="required"
                  autocomplete="off" value="<?php echo htmlentities($item['consignee']); ?>" class="layui-input">
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
                  <input type="text" value="<?php echo htmlentities($item['contact']); ?>" id="contact" name="contact" required=""
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>收货人的手机号码
              </div>
          </div>
          <div class="layui-form-item">
              <label for="all_price" class="layui-form-label">
                  <span class="x-red">*</span>总金额
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="<?php echo htmlentities($item['all_price']); ?>" id="all_price" name="all_price" required=""
                  autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="discounts" class="layui-form-label">
                  <span class="x-red">*</span>优惠金额
              </label>
              <div class="layui-input-inline">
                  <input type="text" value="<?php echo htmlentities($item['discounts']); ?>" id="discounts" name="discounts" required=""
                         autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>活动优惠金额
              </div>
          </div>
          <div class="layui-form-item">
            <label for="all_price" class="layui-form-label">
                <span class="x-red">*</span>实付金额
            </label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo htmlentities($item['pay']); ?>" id="pay" name="pay" required=""
                autocomplete="off" class="layui-input">
            </div>
        </div>
          <div class="layui-form-item">
              <label for="goods_status" class="layui-form-label">
                  <span class="x-red">*</span>发货状态
              </label>
              <div class="layui-input-inline">
                  <select name="status" id="goods_status" required lay-verify="order_state">
                      <option value="-1">请选择发货状态</option>
                      <?php if(is_array($order_status) || $order_status instanceof \think\Collection || $order_status instanceof \think\Paginator): $i = 0; $__LIST__ = $order_status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$status_item): $mod = ($i % 2 );++$i;?>
                      <option value="<?php echo htmlentities($status_item['os_id']); ?>"><?php echo htmlentities($status_item['state']); ?></option>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>当前状态-><?php echo htmlentities($item['status']); ?>
              </div>
          </div>

          <div class="layui-form-item">
            <label for="all_price" class="layui-form-label">
                <span class="x-red"></span>快递单号
            </label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo htmlentities($item['expressNum']); ?>" id="expressNum" name="expressNum" 
                autocomplete="off" class="layui-input">
            </div>
        </div>

          <div class="layui-form-item layui-form-text">
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
        </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">
                    <span class="x-red">*</span>详细地址
                </label>
                <div class="layui-input-block" style="width: 40%">
                    <textarea name="addr" placeholder="详细地址" class="layui-textarea"><?php echo htmlentities($item['addr']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">
                    <span></span>买家留言
                </label>
                <div class="layui-input-block" style="width: 40%">
                    <textarea name="l_msg" class="layui-textarea layui-disabled"><?php echo htmlentities($item['l_msg']); ?></textarea>
                </div>
            </div>
          <div class="layui-form-item">
              <label for="edit" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" id="edit" lay-submit="">
                  更新
              </button>
          </div>
      </form>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <script>
        layui.use(['form', 'code'], function () {
            form = layui.form;
            layui.code();
            $('#x-city').xcity('<?php echo htmlentities($item['province']); ?>', '<?php echo htmlentities($item['city']); ?>', '<?php echo htmlentities($item['area']); ?>');
        });

        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;


          //自定义验证规则
          form.verify({
            order_state: function(value){
              if(value == -1){
                return '请选择收货状态！';
              }
            }
          });

          //监听提交
          form.on('submit(add)', function(data){
              //异步，把数据提交给后端
              $.ajax({
                  type: "POST",
                  url: "<?php echo url('/order_update'); ?>",
                  data: $(".layui-form").serialize(),
                  success: function (result) {
                      if(result.msg == 1){
                          layer.msg('修改成功!', {icon:1,time:2000}, function() {
                            window.location.href =
                                "<?php echo url('/show_order_list'); ?>";
                        });
                      }else{
                          layer.msg(result.msg, {icon:0,time:1000});
                      }
                  },
                  error:function (result) {
                      layer.msg("服务器繁忙,请稍后重试!",{icon:2,time:1000})
                  }
              });
              return false;
          });
          
          
        });
    </script>

  </body>

</html>