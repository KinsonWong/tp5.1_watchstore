<?php /*a:3:{s:76:"D:\phpstudy_pro\WWW\watchstore\application\product\view\product\details.html";i:1600930015;s:40:"public/static/product/header/header.html";i:1600997570;s:40:"public/static/product/footer/footer.html";i:1600671831;}*/ ?>
<!DOCTYPE html>
<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
    lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>商品详情</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/product/images/favicon.png">
</head>

<body class="product-details">
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
        //挂载点 <div class="_type">
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
    <div class="breadcrumbs-area mb-70" style="border-bottom: none;">
        <div class="container">
        </div>
    </div><!-- breadcrumbs-area-end -->
    <!-- product-main-area-start -->
    <div class="product-main-area mb-70" style="margin-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <!-- product-main-area-start -->
                    <div class="product-main-area">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="flexslider">
                                    <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                        <ul class="slides"
                                            style="width: 1200%; transition-duration: 0s; transform: translate3d(-328px, 0px, 0px);">
                                            <?php if(is_array($imgs) || $imgs instanceof \think\Collection || $imgs instanceof \think\Paginator): $i = 0; $__LIST__ = $imgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imgItem): $mod = ($i % 2 );++$i;?>
                                            <li data-thumb="/upload/img/<?php echo htmlentities($imgItem['img']); ?>" class="clone" aria-hidden="true"
                                                style="text-align: center !important; display: block;">
                                                <img src="/upload/img/<?php echo htmlentities($imgItem['img']); ?>" style="width: auto;height: auto"
                                                    alt="woman" draggable="false">
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <ul class="flex-direction-nav">
                                        <li class="flex-nav-prev"><a class="flex-prev" href="#">上一张</a>
                                        </li>
                                        <li class="flex-nav-next"><a class="flex-next" href="#">下一张</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <div class="product-info-main">
                                    <div class="page-title">
                                        <h1><?php echo htmlentities($watchData['bname']); ?></h1>
                                    </div>
                                    <div class="product-info-stock-sku">
                                        <div class="product-attribute">
                                        </div>
                                    </div>
                                    <div class="product-reviews-summary"
                                        style="border-bottom: none;margin-bottom: 0px;">
                                        <div class="rating-summary"><a href="#"><i class="fa fa-star"></i></a><a
                                                href="#"><i class="fa fa-star"></i></a><a href="#"><i
                                                    class="fa fa-star"></i></a><a href="#"><i
                                                    class="fa fa-star"></i></a><a href="#"><i
                                                    class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info-price">
                                        <div class="price-final">
                                            <span>￥ <?php echo htmlentities($watchData['price']); ?></span>
                                        </div>
                                    </div>
                                    <div class="product-social-links">
                                        <div class="product-addto-links-text"><?php echo htmlentities($watchData['brand']); ?></div>
                                        <div class="product-addto-links-text"><?php echo htmlentities($watchData['type']); ?></div>
                                        <div class="product-addto-links-text"><?php echo htmlentities($watchData['modelcode']); ?></div>
                                        <div class="product-addto-links-text">
                                            <p><?php echo htmlentities($watchData['detail']); ?></p>
                                        </div>
                                    </div>
                                    <div class="product-add-form app">
                                        <form id="dialog-form" action="#">
                                            <div class="quality-button">
                                                <span>数量：</span>
                                                <input type="number" name="num" id="good_num_input" value="1">
                                            </div>
                                            <input type="hidden" name="bid" id="bid_input" value="<?php echo htmlentities($watchData['bid']); ?>">
                                            <a class="btn-add-cart" href="javascript:void(0);"
                                                @click="add_cart">加入购物车</a>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- product-main-area-end -->
                    <!-- product-info-area-start -->
                    <div class="new-book-area mt-60">
                        <div class="tab-active-2 owl-carousel owl-loaded owl-drag">
                            <!-- single-product-start -->

                        </div>
                    </div><!-- new-book-area-start -->
                </div>
                <?php if(count($relatedWatches)>0): ?>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-left">
                        <div class="left-title mb-20">
                            <h4>相关推荐</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-526px, 0px, 0px); transition: 0s; width: 1578px;">
                                        <div class="owl-item cloned" style="width: 263px;">
                                            <div class="product-total-2">
                                                <?php if(is_array($relatedWatches) || $relatedWatches instanceof \think\Collection || $relatedWatches instanceof \think\Paginator): $i = 0; $__LIST__ = $relatedWatches;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                                <div class="single-most-product bd mb-18">
                                                    <div class="most-product-img">
                                                        <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>">
                                                            <img src="/upload/img/<?php echo htmlentities($item['cover']); ?>" alt="watch">
                                                        </a>
                                                    </div>
                                                    <div class="most-product-content">
                                                        <div class="product-rating">
                                                            <ul>
                                                                <li>
                                                                    <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>"><i
                                                                            class="fa fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>"><i
                                                                            class="fa fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>"><i
                                                                            class="fa fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>"><i
                                                                            class="fa fa-star"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>"><i
                                                                            class="fa fa-star"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h4>
                                                            <a
                                                                href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($item['bid']); ?>"><?php echo htmlentities($item['bname']); ?></a>
                                                        </h4>
                                                        <div class="product-price">
                                                            <ul>
                                                                <li>￥<?php echo htmlentities($item['price']); ?></li>
                                                                <li class="old-price">￥<?php echo htmlentities($item['price']); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
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
<script>
    var data = {
    }
    var vm = new Vue({
        el: ".app",
        data: data,
        methods: {
            add_cart: function () {
                var tempData = $("#dialog-form").serialize();
                $.ajax({
                    type: "POST",//方法类型
                    url: "<?php echo url('/add_cart'); ?>",//url
                    data: tempData,
                    success: function (result) {
                        if (result.msg == 1) {
                            type_vm.get_cart_info();
                            alert("添加购物车成功！");
                        } else if (result.msg == 0) {
                            type_vm.get_cart_info();
                            alert("添加购物车失败！");
                        }
                    },
                    error: function (result) {
                        alert("网络环境异常，发生异常错误！");
                    }
                });
            }
        },
    });
</script>

</html>