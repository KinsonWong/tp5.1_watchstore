<?php /*a:3:{s:74:"D:\phpstudy_pro\WWW\watchstore\application\user\view\user\user_centre.html";i:1601553931;s:40:"public/static/product/header/header.html";i:1601556368;s:40:"public/static/product/footer/footer.html";i:1600671831;}*/ ?>
<!DOCTYPE html>
<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
    lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>用户中心</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/product/images/favicon.png">
    <link rel="stylesheet" href="/public/static/admin/lib/layui/css/layui.css">
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/product/js/jsAddress.js"></script>
    <style>
        .top_height {
            margin-bottom: 60px;
        }

        .bl {
            border-left: 1px solid #e5e5e5;
        }

        a:hover {
            color: #F07c29;
        }

        .tx {
            font-weight: light;
            color: #000000;
            font-size: 30px;
            margin-left: 15px;
        }

        .nt {
            font-weight: normal;
            color: #000000;
            font-size: 20px;
            margin-left: 30px;
        }

        .nt1 {
            text-align: center;
        }

        .b {
            color: #333333;
        }

        .bc {
            background-color: #e8e8e8;
        }

        .nav-pills>li.active>a,
        .nav-pills>li.active>a:hover,
        .nav-pills>li.active>a:focus {
            color: #fff;
            background-color: #f07c29 !important;
        }

        table .t-default {
            display: block;
            width: 80px;
            height: 30px;
            text-align: center;
            border-radius: 3px;
            background: #ffd6cc;
            color: #f30;
        }
    </style>
</head>

<body style="height:100%;">
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/public/static/product/css/bootstrap.min.css"><!-- animate css -->
    <link rel="stylesheet" href="/public/static/product/css/animate.css"><!-- meanmenu css -->
    <link rel="stylesheet" href="/public/static/product/css/meanmenu.min.css"><!-- owl.carousel css -->
    <link rel="stylesheet" href="/public/static/product/css/owl.carousel.css"><!-- font-awesome css -->
    <link rel="stylesheet" href="/public/static/product/css/font-awesome.min.css"><!-- flexslider.css-->
    <link rel="stylesheet" href="/public/static/product/css/flexslider.css"><!-- chosen.min.css-->
    <link rel="stylesheet" href="/public/static/product/css/chosen.min.css"><!-- style css -->
    <link rel="stylesheet" href="/public/static/product/css/style.css"><!-- responsive css -->
    <link rel="stylesheet" href="/public/static/product/css/responsive.css"><!-- modernizr css -->
    <script type="text/javascript" src="/public/static/product/js/jquery-3.2.1.min.js"></script>
    <script src="/public/static/product/js/modernizr-2.8.3.min.js"></script>
    <script src="/public/static/product/js/vue.js"></script>
    <style>
        .search-btn {
            background: #f07c29 none repeat scroll 0 0;
            color: #fff;
            display: inline-block;
            font-size: 18px;
            height: 42px;
            line-height: 40px;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            width: 42px;
            border-radius: 0 5px 5px 0px;
            border: none;
        }

        .search-btn:hover {
            background: #232323 none repeat scroll 0 0;
        }
    </style>
</head>

<body>
    <div class="_type">
        <!--[if lt IE 8]><p class="browserupgrade">你正在使用 <strong>过期的</strong>浏览器.
    Please <a href="http://browsehappy.com/">升级你的浏览器/a>改善你的体验.</p><![endif]-->
        <!-- Add your site or application content here -->
        <!-- header-area-start -->
        <header>
            <!-- header-top-area-start -->
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="language-area">
                                <ul>
                                    <li><a href="<?php echo url('/show_index'); ?>">网上手表商城</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="account-area text-right">
                                <ul>
                                    <?php if(app('session')->get('username') != null): ?>
                                    <li><a href="<?php echo url('/show_user_center'); ?>"><?php echo htmlentities(app('session')->get('username')); ?></a></li>
                                    <li><a href="<?php echo url('/show_user_order'); ?>">订单列表</a></li>
                                    <li><a href="<?php echo url('/user_logout'); ?>">退出</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo url('/show_register'); ?>">注册</a></li>
                                    <li><a href="<?php echo url('/show_login'); ?>">登录</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- header-top-area-end -->
            <!-- header-mid-area-start -->
            <div class="header-mid-area ptb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                            <div class="header-search">
                                <form action="<?php echo url('/show_plist'); ?>">
                                    <input type="text" name="search" placeholder="您想找哪款手表？">
                                    <button class="search-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                            <div class="logo-area text-center logo-xs-mrg">
                                <a href="<?php echo url('/show_index'); ?>">
                                    <img src="/public/static/product/images/Watch League.png" style="width:400px;height:80px"
                                        alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="my-cart">
                                <ul>
                                    <li><a href="<?php echo url('/show_cart'); ?>"><i
                                                class="fa fa-shopping-cart"></i>购物车</a><span>{{product_num}}</span>
                                        <div class="mini-cart-sub">
                                            <div class="cart-product" v-for="info in cart_info">
                                                <div class="single-cart">
                                                    <div class="cart-img">
                                                        <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid">
                                                            <img :src="'/upload/img/'+info.cover" alt="watch">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h5><a
                                                                :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid">{{info.bname}}</a>
                                                        </h5>
                                                        <p>￥{{info.price}}</p>
                                                        <p>数量：{{info.num}}</p>
                                                    </div>
                                                    <div class="cart-icon">
                                                        <a href="javascript:void(0)"
                                                            :onclick="'delete_cart_item('+info.bid+')'">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="cart_info.length > 0">
                                                <div class="cart-totals">
                                                    <h5>总价<span>￥{{total_price}}<span style="color: red;"
                                                                v-if="product_num > 2">（只计算前三商品总价）</span></span></h5>
                                                </div>
                                                <div class="cart-bottom">
                                                    <a class="view-cart" href="<?php echo url('/show_cart'); ?>">我的购物车</a>
                                                    <a href="<?php echo url('/show_check'); ?>">结算</a></div>
                                            </div>
                                            <div v-if="cart_info.length < 1">
                                                没有找到您喜欢的商品吗？
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- header-mid-area-end -->
            <!-- main-menu-area-start -->
            <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-area">
                                <nav>
                                    <ul>
                                        <li class="active">
                                            <a href="<?php echo url('/show_index'); ?>">主页</a>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">分类<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataTypes">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value" class="bname">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?php echo url('/show_plist'); ?>">最新<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataNew">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value" class="bname">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">畅销<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataBigSell">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value" class="bname">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?php echo url('/show_brand_story'); ?>">品牌故事<i class="fa fa-angle-down"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- main-menu-area-end -->

            <!-- mobile-menu-area-start -->
            <div class="mobile-menu-area hidden-md hidden-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active" style="display: block;">
                                    <ul id="nav">
                                        <li class="active">
                                            <a href="<?php echo url('/show_index'); ?>">主页</a>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">分类<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataTypes">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">最新<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataNew">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">畅销<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataBigSell">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value" class="bname">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- mobile-menu-area-end -->
        </header><!-- header-area-end -->
        <!-- breadcrumbs-area-start -->
    </div>
</body>
<script>
    var type_data = {
        result: {},
        cart_info: [],
        total_price: "0",
        product_num: "0",
    };
    var type_vm = new Vue({
        //挂载点 <div class="_type">
        el: "._type",
        data: type_data,
        name: 'bname',
        filters: {
            ellipsis (value) {
            if (!value) return ''

            if (value.length > 32) {
                return value.slice(0,32) + '...'
            }
            return value
            }
        },
        methods: {
            //获取分类信息
            get_types: function () {
                $.ajax({
                    type: "POST",//方法类型
                    url: "<?php echo url('/watch_header'); ?>",//url
                    success: function (result) {
                        type_vm.result = result
                    }
                });
            },
            //获取购物车前三条信息
            get_cart_info: function () {
                $.ajax({
                    type: "POST",//方法类型
                    url: "<?php echo url('/get_cart_info'); ?>",//url
                    success: function (result) {
                        type_vm.cart_info = result.cart_info;
                        type_vm.total_price = result.total_price;
                        type_vm.product_num = result.product_num;
                    }
                });
            }
        }

    });

    type_vm.get_types();
    type_vm.get_cart_info();

    //删除购物车项
    function delete_cart_item(bid) {
        $.ajax({
            type: "POST",//方法类型
            dataType: "json",//预期服务器返回的数据类型
            url: "<?php echo url('/delete_cart_item'); ?>",//url
            data: {
                bid: bid,
            },
            success: function (result) {
                if (result.msg == 1) {
                    type_vm.get_cart_info();
                }
            }
        });
    }
</script>

</html>

    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="<?php echo url('/show_index'); ?>">主页</a></li>
                            <li><a href="javascript:void(0);" class="active">个人中心</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    <div class="container">
        <div class="col-lg-2">
            <div class="text-left row no-gutters">
                <h1>账号管理</h1>
                <ul class="h2 d-flex flex-column nav nav-pills">
                    <li class="mt-50 nav-item active"><a data-toggle="pill" class="text-muted nav-link"
                            href="#q1">个人信息</a></li>
                    <li class="mt-50 nav-item"><a data-toggle="pill" class="text-muted nav-link" href="#q2">我的订单</a>
                    </li>
                    <li class="mt-50 mb-50 nav-item"><a data-toggle="pill" class="text-muted nav-link"
                            href="#q3">我的地址</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-10 tab-content bl">
            <div class="top_height tab-pane fade in active" id="q1">
                <div>
                    <p class="tx">你的基础信息</p>
                    <div class="nt b">
                        <input type="hidden" value="<?php echo htmlentities(app('session')->get('uid')); ?>" name="uid" id="uid">
                        <p>用户名：<?php echo htmlentities($user['username']); ?></p>
                        <p>手机号：<?php echo htmlentities($user['phone']); ?></p>
                        <p>电子邮箱：<?php echo htmlentities($user['email']); ?></p>
                        <p>注册日期：<?php echo htmlentities($user['registertime']); ?></p>
                        <p>所在地区：<?php echo htmlentities($user['province']); ?> <?php echo htmlentities($user['city']); ?> <?php echo htmlentities($user['area']); ?></p>
                        <span class="edit_PWD"><button type="button" class="btn btn-warning"
                                onclick="change_password()">修改密码</button></span>
                    </div>
                </div>
            </div>


            <div class="top_height tab-pane fade" id="q2">
                <p class="mb-50 tx">订单列表</p>
                <table class="table table-bordered table-hover">
                    <thead class="bc b">
                        <tr>
                            <th>
                                <nobr>订单编号</nobr>
                            </th>
                            <th>
                                <nobr>商品名称</nobr>
                            </th>
                            <th>
                                <nobr>支付方式</nobr>
                            </th>
                            <th>
                                <nobr>实付金额(元)</nobr>
                            </th>
                            <th>
                                <nobr>收货人</nobr>
                            </th>
                            <th>
                                <nobr>收货地址</nobr>
                            </th>
                            <th>
                                <nobr>联系电话</nobr>
                            </th>
                            <th>
                                <nobr>发货状态</nobr>
                            </th>
                            <th>
                                <nobr>快递单号</nobr>
                            </th>
                            <th>
                                <nobr>下单时间</nobr>
                            </th>
                            <th>
                                <nobr>操作</nobr>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="b">
                        <?php foreach($user_orders as $values): ?>
                        <tr>
                            <td><?php echo htmlentities($values['o_id']); ?></td>
                            <td><?php foreach($values['bname'] as $key=>$value): ?>
                                <?php echo htmlentities($value['bname']); ?> * <?php echo htmlentities($value['user_buy_num']); ?><br>
                                <?php endforeach; ?></td>
                            <td><?php echo htmlentities($values['payment']); ?></td>
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
                            <td><a class="layui-btn layui-btn-normal layui-btn-xs"
                                    onclick="receive_confirm(this, '<?php echo htmlentities($values['o_id']); ?>')" href="javascript:;">确认收货</a></td>
                            <?php else: ?><td>-</td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>


            <div class="top_height tab-pane fade" id="q3">
                <p class="mb-50 tx">新增收货地址</p>
                <div class="col-lg-6">
                    <form action="" class="mb-50">
                        <div class="single-register b">*收货人姓名：
                            <input type="hidden" name="uid" id="uid" value="<?php echo htmlentities(app('session')->get('uid')); ?>">
                            <input type="text" class="form-control" placeholder="长度不超过25个字符" id="consignee"
                                name="consignee" autocomplete="off"></div>
                        <div class="single-register b">*手机号码：<input type="text" class="form-control"
                                placeholder="请输入您的收货号码" id="contact" name="contact" autocomplete="off"></div>
                        <div class="single-register b">*所在地区：
                            <select class="form-control" id="cmbProvince" name="province"></select>
                            <select class="form-control" id="cmbCity" name="city"></select>
                            <select class="form-control" id="cmbArea" name="area"></select>
                        </div>
                        <div class="single-register b">*详细地址：
                            <textarea name="addr" id="addr" placeholder="详细地址" class="form-control"
                                placeholder="请输入详细地址信息，如道路、门牌号、小区、楼栋号等信息"></textarea></div>
                        <button class="btn btn-warning w-25" onclick="add_address()">保存</button>
                    </form>
                </div>



                <table class="table table-bordered table-hover">
                    <thead class="bc b">
                        <th>收货人</th>
                        <th>省</th>
                        <th>市</th>
                        <th>区/县</th>
                        <th>详细地址</th>
                        <th>电话</th>
                        <th>操作</th>
                    </thead>
                    <tbody class="b">
                        <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo htmlentities($vo['consignee']); ?></td>
                            <td><?php echo htmlentities($vo['province']); ?></td>
                            <td><?php echo htmlentities($vo['city']); ?></td>
                            <td><?php echo htmlentities($vo['area']); ?></td>
                            <td><?php echo htmlentities($vo['addr']); ?></td>
                            <td><?php echo htmlentities($vo['contact']); ?></td>
                            <td><button class="layui-btn layui-btn-xs" href="javascript:void(0);">编辑</button> 
                                <button class="layui-btn layui-btn-danger layui-btn-xs" href="javascript:void(0);">删除</button>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
    <script src="/public/static/product/js/jquery-1.12.0.min.js"></script><!-- bootstrap js -->
    <script src="/public/static/product/js/bootstrap.min.js"></script><!-- owl.carousel js -->
    <script src="/public/static/product/js/owl.carousel.min.js"></script><!-- meanmenu js -->
    <script src="/public/static/product/js/jquery.meanmenu.js"></script><!-- wow js -->
    <script src="/public/static/product/js/wow.min.js"></script><!-- jquery.parallax-1.1.3.js -->
    <script src="/public/static/product/js/jquery.parallax-1.1.3.js"></script><!-- jquery.countdown.min.js -->
    <script src="/public/static/product/js/jquery.countdown.min.js"></script><!-- jquery.flexslider.js -->
    <script src="/public/static/product/js/jquery.flexslider.js"></script><!-- chosen.jquery.min.js -->
    <script src="/public/static/product/js/chosen.jquery.min.js"></script><!-- jquery.counterup.min.js -->
    <script src="/public/static/product/js/jquery.counterup.min.js"></script><!-- waypoints.min.js -->
    <script src="/public/static/product/js/waypoints.min.js"></script><!-- plugins js -->
    <script src="/public/static/product/js/plugins.js"></script><!-- main js -->
    <script src="/public/static/product/js/main.js"></script>
    <footer>
        <!-- footer-top-start -->
        <div class="footer-mid ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>商品</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>

                                            <li><a href="<?php echo url('/show_index'); ?>#pos">最新商品</a></li>
                                            <li><a href="<?php echo url('/show_index'); ?>/type/2#pos">销量最高</a></li>
                                            <li><a href="<?php echo url('/show_index'); ?>/type/3#pos">主打商品</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>公司</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="javascript:void(0);">关于我们</a></li>
                                            <li><a href="javascript:void(0);">联系我们</a></li>
                                            <li><a href="javascript:void(0);">线下门店</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>您的账户</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="javascript:void(0);">收货地址</a></li>
                                            <li><a href="javascript:void(0);">绑定银行卡</a></li>
                                            <li><a href="<?php echo url('/show_user_order'); ?>">我的订单</a></li>
                                            <li><a href="javascript:void(0);">个人信息</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="single-footer mrg-sm">
                            <div class="footer-title mb-20">
                                <h3>其它</h3>
                            </div>
                            <div class="footer-contact">
                                <p><span>联系我们：</span>xxx-xxxxxxxx</p>
                                <p><span>Email：</span> xxxxx@mail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- footer-mid-end -->
        <!-- footer-bottom-start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row bt-2">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="copy-right-area">
                            <p>2020 Copyright @ Watch League All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="payment-img text-right"><a href="javascript:void(0);"><img
                                    src="/public/static/product/images/1.png" style="width:294px; height:32px" alt="payment"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- footer-bottom-end -->
    </footer><!-- footer-area-end -->
    <!-- all js here -->
    <!-- jquery latest version -->
</body>

</html>

</body>
<script type="text/javascript" src="/public/static/product/js/hex_sha.js"></script>
<script type="text/javascript">

    function change_password() {
        var uid = $("#uid").val();
        layui.use("layer", function () {
            var layer = layui.layer;  //layer初始化
            layer.prompt({
                formType: 1,
                offset: 'c',
                value: '',  //初始值
                title: '请输入新密码'
            }, function (value, index, elem) {
                var confirm_password = hex_sha1($("#PWDconfirm").val());
                var password = value;
                var password = hex_sha1(password);
                layer.close(index);
                layer.confirm('确认要修改吗？', function (index) {
                    // 异步后台处理
                    $.ajax({
                        type: "POST",//方法类型
                        dataType: "json",//预期服务器返回的数据类型
                        url: "<?php echo url('/change_password'); ?>",//url
                        data: {
                            uid: uid,
                            password: password,
                            confirm_password: confirm_password,
                        },
                        success: function (result) {
                            if (result.msg == 1) {
                                layer.msg('已成功修改', { icon: 1, time: 1000 }, function () {
                                    window.location.href =
                                        "<?php echo url('/show_user_center'); ?>";
                                });
                            } else if (result.msg == 2) {
                                layer.msg("两次输入密码不一致", { icon: 0, time: 1000 });
                            } else {
                                layer.msg(result.msg, { icon: 0, time: 1000 });
                            }
                        },
                        error: function (result) {
                            console.log(result)
                            layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 1000 })
                        }
                    });
                });
            });
            $(".layui-layer-content").append("<br/><input type=\"password\" id= \"PWDconfirm\" class=\"layui-input\" placeholder=\"请再次输入密码\"/>")
        });
    }

    //订单确认收货
    function receive_confirm(obj, id) {
        layui.use("layer", function () {
            var layer = layui.layer;  //layer初始化

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
                                window.location.href = ("<?php echo url('/show_user_center'); ?>");
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
        });
    }

    function add_address() {
        let uid = $("#uid").val();
        let consignee = $("#consignee").val();
        let contact = $("#contact").val();
        let province = $("#cmbProvince").val();
        let city = $("#cmbCity").val();
        let area = $("#cmbArea").val();
        let addr = $("#addr").val();

        $.ajax({
            type: "POST",//方法类型
            dataType: "json",//预期服务器返回的数据类型
            url: "<?php echo url('/user_add_address'); ?>",//url
            data: {
                uid: uid,
                consignee: consignee,
                contact: contact,
                province: province,
                city: city,
                area: area,
                addr: addr
            },
            success: function (result) {
                if (result.msg === 'success') {
                    alert("保存成功");
                    window.location.href = "<?php echo url('/show_user_center'); ?>"
                } else {
                    alert(result.msg);
                }
            },
            error: function () {
                alert("服务器繁忙,请稍后重试!");
            }
        });
    }

    $(document).ready(function () {
        addressInit('cmbProvince', 'cmbCity', 'cmbArea');
    });


</script>

</html>