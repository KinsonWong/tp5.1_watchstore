<?php /*a:3:{s:68:"D:\phpstudy_pro\WWW\watchstore\application\user\view\user\login.html";i:1600671784;s:40:"public/static/product/header/header.html";i:1600761367;s:40:"public/static/product/footer/footer.html";i:1600671831;}*/ ?>
<!DOCTYPE html>
<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
    lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>登录</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/product/images/favicon.png">
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->

    <style>
        .hover-c {
            cursor: pointer;
        }
    </style>
</head>

<body class="login">
    <!--[if lt IE 8]><p class="browserupgrade">You are using an <strong>outdated</strong>browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a>to improve your experience.</p><![endif]-->
    <!-- Add your site or application content here -->
    <!-- header-area-start -->
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
                                                        v-for="info in item.value">{{info.bname}}</a>
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
                                                        v-for="info in item.value">{{info.bname}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">畅销<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu mega-menu-2">
                                                <span v-for="item in result.dataBigSell">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value">{{info.bname}}</a>
                                                </span>
                                            </div>
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
                                                        v-for="info in item.value">{{info.bname}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">最新<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span v-for="item in result.dataNew">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value">{{info.bname}}</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="<?php echo url('/show_plist'); ?>">畅销<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu mega-menu-2">
                                                <span v-for="item in result.dataBigSell">
                                                    <a :href="'<?php echo url('/show_plist'); ?>/type/'+item.type"
                                                        class="title">{{item.type}}</a>
                                                    <a :href="'<?php echo url('/show_details'); ?>/bid/'+info.bid"
                                                        v-for="info in item.value">{{info.bname}}</a>
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
        el: "._type",
        data: type_data,
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
    <div class="breadcrumbs-area mb-70" style="border-bottom: none">

    </div><!-- breadcrumbs-area-end -->
    <!-- user-login-area-start -->
    <div class="user-login-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>登录</h2>
                    </div>
                </div>
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                    <form id="login-form">
                        <div class="login-form">
                            <div class="single-login"><label><span>*</span>用户名</label><input type="text" name="username"
                                    autocomplete="off"></div>
                            <div class="single-login"><label><span>*</span>密码 </label><input type="password"
                                    name="password" autocomplete="off"></div>
                            <div class="single-login"><label><span>*</span>验证码 </label><input type="text" name="code"
                                    autocomplete="off"></div>
                            <div><img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码" onclick="refreshVerify()"></div>
                            <br>
                            <div class="single-login single-login-2"><a class="hover-c" onclick="submit_form()">登录</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- user-login-area-end -->
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

    <a id="scrollUp" href="http://v.bootstrapmb.com/2018/7/rlrum1631/login.html#top"
        style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
</body>
<script>
    function refreshVerify() {
        var ts = Date.parse(new Date()) / 1000;
        $('#verify_img').attr("src", "/captcha?rand=" + ts);
    }

    function submit_form() {
        $.ajax({
            type: 'post',
            url: "<?php echo url('/user_login'); ?>",
            data: $("#login-form").serialize(),
            success: function (data) {
                if (data.msg != 1) {
                    alert(data.msg)
                    return
                }
                window.location = "<?php echo url('/show_index'); ?>"
            },
            error: function () {
                console.log(data.msg);
            }
        });
    }
</script>

</html>