<?php /*a:3:{s:74:"D:\phpstudy_pro\WWW\watchstore\application\product\view\product\check.html";i:1601798989;s:40:"public/static/product/header/header.html";i:1601974929;s:40:"public/static/product/footer/footer.html";i:1601781026;}*/ ?>
<!DOCTYPE html>
<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
    lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>商品结算</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/product/images/favicon.png">
    <script type="text/javascript" src="/public/static/product/js/jquery-3.2.1.min.js"></script>
    <script src="/public/static/product/js/vue.js"></script>
    <script type="text/javascript" src="/public/static/product/js/jsAddress.js"></script>
    <style>
        .pay {
            display: inline-block;
            background: #333 none repeat scroll 0 0;
            border: medium none;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            height: 49px;
            letter-spacing: 0.025em;
            line-height: 49px;
            padding: 0 40px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .pay:focus {
            display: inline-block;
            background: #333 none repeat scroll 0 0;
            border: medium none;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            height: 49px;
            letter-spacing: 0.025em;
            line-height: 49px;
            padding: 0 40px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .pay:hover {
            color: #fff;
            background: #f07c29 none repeat scroll 0 0;
        }
    </style>
</head>

<body class="checkout">
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
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
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
                                    <li><a href="javascript:void(0);" onclick="show_order()">我的订单</a></li>
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
                                    <input type="text" name="search" placeholder="您想找哪款手表？" autocomplete="off">
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
                                                        v-for="info in item.value"
                                                        class="bname">{{info.bname|ellipsis}}</a>
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
                                                        v-for="info in item.value"
                                                        class="bname">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">畅销<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataBigSell">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value"
                                                        class="bname">{{info.bname|ellipsis}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?php echo url('/show_brand_story'); ?>">品牌故事<i class="fa "></i></a>
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
                                                        v-for="info in item.value"
                                                        class="bname">{{info.bname|ellipsis}}</a>
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
            ellipsis(value) {
                if (!value) return ''

                if (value.length > 32) {
                    return value.slice(0, 32) + '...'
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

    //弹出显示订单
    function show_order() {
        layui.use("layer", function () {
            var layer = layui.layer;  //layer初始化
            layer.open({
                type: 2,
                area: ['1600px', '850px'],
                fixed: false, //不固定
                maxmin: true,
                content: "<?php echo url('/show_user_order'); ?>"
            });
        });

    }
</script>

</html>
    <div class="breadcrumbs-area mb-70" style="border-bottom: none;padding: 0px;">
        <div class="container">
        </div>
    </div><!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    <div class="checkout-area mb-70 app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="left: 25%">
                    <div class="checkbox-form choice-addr">
                        <h3>选择收货地址</h3>
                        <div class="row">
                            <form id="choice_harvest">
                                <div class=" col-lg-12" style="font-size: 16px;">
                                    <!--这里写 收件地址-->
                                    <?php foreach($userAddressDatas as $key=>$addressItem): ?>
                                    <div>
                                        <label>
                                            <input type="radio" name="h_a_id" value="<?php echo htmlentities($addressItem['h_a_id']); ?>" <?php if($key==0): ?>checked<?php endif; ?>>
                                            <span><?php echo htmlentities($addressItem['consignee']); ?></span>
                                            <span><?php echo htmlentities($addressItem['contact']); ?></span>
                                            <span><?php echo htmlentities($addressItem['province']); ?></span>
                                            <span><?php echo htmlentities($addressItem['city']); ?></span>
                                            <span><?php echo htmlentities($addressItem['area']); ?></span>
                                            <span><?php echo htmlentities($addressItem['addr']); ?></span>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </form>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a class="pay" href="javascript:void(0);"
                                    style="line-height: 42px;padding: 0px 27px;height: 42px;"
                                    @click="add_harvest_addr">选用其它地址</a>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox-form edit-harvest" style="margin-top: 10px;display: none;">
                        <h3>选用其它地址</h3>
                        <div class="row">
                            <form id="new_harvest">
                                <div class=" col-lg-12">
                                    <!--这里写 收件地址-->
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>收件人<span class="required">*</span></label>
                                        <input type="text" name="consignee" placeholder="请输入收件人姓名">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>地区<span class="required">*</span></label>
                                        <select class="form-control" id="cmbProvince" name="province"></select>
                                        <select class="form-control" id="cmbCity" name="city"></select>
                                        <select class="form-control" id="cmbArea" name="area"></select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>详细地址<span class="required">*</span></label>
                                        <input type="text" name="addr" placeholder="请输入详细地址">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkout-form-list">
                                        <label>联系电话<span class="required">*</span></label>
                                        <input type="text" name="contact" placeholder="联系电话">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="different-address">
                        <div class="checkout-form-list"><label for="checkout-mess">支付方式</label>
                            <label style="margin: 0 0 10px;"><input id="cbox" type="radio" v-model="payment"
                                    value="online-pay" checked />线上支付</label>
                            <label style="margin: 0 0 10px;"><input id="cbox" type="radio" v-model="payment"
                                    value="cash-pay" />货到付款</label>
                        </div>

                        <div class="order-notes">
                            <div class="checkout-form-list"><label for="checkout-mess">买家留言</label>
                                <textarea placeholder="请输入您的留言" v-model="l_mes" rows="10" cols="30"
                                    id="checkout-mess"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox-form" style="margin-top: 10px;">
                        <a class="pay" href="javascript:void(0);" @click="buy">购买</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- checkout-area-end -->
    <!-- footer-area-start -->
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
                                            <li><a href="<?php echo url('/show_user_center'); ?>">个人信息</a></li>
                                            <li><a href="javascript:void(0);" onclick="show_order()">我的订单</a></li>
                                            <li><a href="<?php echo url('/show_user_center'); ?>?3">收货地址</a></li>
                                            <li><a href="<?php echo url('/show_user_center'); ?>?4">登录日志</a></li>
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
                                <p><span>联系我们：</span>888-88888888</p>
                                <p><span>Email：</span> watch-league@gmail.com</p>
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
<script>
    var data = {
        l_mes: "",
        payment: "online-pay",
        is_add_harvest: false
    }
    var vm = new Vue({
        //挂载点为 <div class="checkout-area mb-70 app">
        el: ".app",
        data: data,
        methods: {
            add_harvest_addr: function () {
                $(".choice-addr").slideUp();
                $(".edit-harvest").slideDown();
                vm.is_add_harvest = true;
            },
            buy: function () {
                var params = "";
                if (vm.is_add_harvest) {
                    params = $("#new_harvest").serialize();
                } else {
                    params = $("#choice_harvest").serialize()
                }
                //支付方式
                params += "&payment=" + vm.payment;
                //买家留言
                if (vm.l_mes != "") {
                    params += "&l_msg=" + vm.l_mes;
                }
                if (vm.payment == 'online-pay') {
                    $.ajax({
                        type: "POST",//方法类型
                        url: "<?php echo url('/check_out_online'); ?>",//url   线上支付
                        data: params,
                        success: function (result) {
                            if (result.msg == 1) {
                                alert("创建订单成功，前去支付")
                                window.location = "<?php echo url('/show_order_pay/'); ?>"+result.oid;    //跳转到订单支付页
                            }
                        },
                        error: function (result) {
                            alert("服务器繁忙,请稍后重试!")
                        }
                    });
                } else {
                    $.ajax({
                        type: "POST",//方法类型
                        url: "<?php echo url('/check_out_cash'); ?>",//url   货到付款
                        data: params,
                        success: function (result) {
                            if (result.msg == 1) {
                                alert("购买成功！请耐心等待商品到达您的手中！")
                                window.location = "<?php echo url('/show_user_center'); ?>?2";    //跳转到个人中心订单页
                            }
                        },
                        error: function (result) {
                            alert("服务器繁忙,请稍后重试!")
                        }
                    });

                }

            }
        },
    });

    $(document).ready(function () {
        addressInit('cmbProvince', 'cmbCity', 'cmbArea');
    });

</script>

</html>