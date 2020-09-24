<?php /*a:4:{s:74:"D:\phpstudy_pro\WWW\watchstore\application\product\view\product\plist.html";i:1600671759;s:40:"public/static/product/header/header.html";i:1600761367;s:40:"public/static/product/footer/footer.html";i:1600671831;s:40:"public/static/product/dialog/dialog.html";i:1600672004;}*/ ?>
<!DOCTYPE html>
<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
    lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>商品列表</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/product/images/favicon.png">
    <script src="/public/static/product/js/vue.js"></script>
    <style>
        .pagination {
            position: absolute;
            right: 10px;
        }
    </style>
</head>

<body class="shop">
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
    <!-- shop-main-area-start -->
    <div class="shop-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-left">
                        <div class="section-title-5 mb-30">
                            <h2>手表</h2>
                        </div>
                        <div class="left-title mb-20">
                            <h4>分类</h4>
                        </div>
                        <div class="left-menu mb-30">
                            <ul>
                                <?php if(is_array($catalog_list) || $catalog_list instanceof \think\Collection || $catalog_list instanceof \think\Paginator): $i = 0; $__LIST__ = $catalog_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                <li><a
                                        href="<?php echo url('/show_plist'); ?>/type/<?php echo htmlentities($item['name']); ?>"><?php echo htmlentities($item['name']); ?><span>(<?php echo htmlentities($item['value']); ?>)</span></a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>热卖</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-526px, 0px, 0px); transition: 0s; width: 1578px;">
                                        <div class="owl-item cloned" style="width: 263px;">
                                            <div class="product-total-2">
                                                <?php if(is_array($watchOrderData) || $watchOrderData instanceof \think\Collection || $watchOrderData instanceof \think\Paginator): $i = 0; $__LIST__ = $watchOrderData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$watchOrderItem): $mod = ($i % 2 );++$i;?>
                                                <div class="single-most-product bd mb-18">
                                                    <div class="most-product-img">
                                                        <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>">
                                                            <img src="/upload/img/<?php echo htmlentities($watchOrderItem['cover']); ?>" alt="watch">
                                                        </a>
                                                    </div>
                                                    <div class="most-product-content">
                                                        <div class="product-rating">
                                                            <ul>
                                                                <li>
                                                                    <a
                                                                        href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>">
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>">
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>">
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>">
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>">
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h4>
                                                            <a
                                                                href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchOrderItem['bid']); ?>"><?php echo htmlentities($watchOrderItem['bname']); ?></a>
                                                        </h4>
                                                        <div class="product-price">
                                                            <ul>
                                                                <li>￥<?php echo htmlentities($watchOrderItem['price']); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="category-image mb-30"><a href="javascript:void(0);"><img src="/public/static/product/images/77.jpg"
                                alt="banner"></a></div>
                    <div class="section-title-5 mb-30">
                        <h2>列表</h2>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="th">
                            <div class="row">
                                <?php if(is_array($watchData) || $watchData instanceof \think\Collection || $watchData instanceof \think\Paginator): $i = 0; $__LIST__ = $watchData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$watchDataItem): $mod = ($i % 2 );++$i;?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40 hidden-sm">
                                        <div class="product-img">
                                            <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>">
                                                <img style="width: 200px;height: 200px;"
                                                    src="/upload/img/<?php echo htmlentities($watchDataItem['cover']); ?>" alt="watch"
                                                    class="primary"></a>
                                            <div class="quick-view">
                                                <button style="display: none" id="open" data-target="#productModal"
                                                    data-toggle="modal">打开商品预览</button>
                                                <a class="action-view" href="javascript:void(0);"
                                                    onclick="showProductDetail('<?php echo htmlentities($watchDataItem['bid']); ?>')" title="商品预览">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div class="product-flag">
                                                <ul>
                                                    <li><span class="sale">new</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"><i
                                                                class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4>
                                                <input type="hidden" name="bid" value="<?php echo htmlentities($watchDataItem['bid']); ?>">
                                                <a
                                                    href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"><?php echo htmlentities($watchDataItem['bname']); ?></a>
                                            </h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>￥<?php echo htmlentities($watchDataItem['price']); ?></li>
                                                    <!--<li class="old-price">￥<?php echo htmlentities($watchDataItem['price']); ?></li>-->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-link">
                                            <div class="product-button">
                                                <a href="javascript:void(0);"
                                                    onclick="add_cart_f('<?php echo htmlentities($watchDataItem['bid']); ?>')" title="加入购物车">
                                                    <i class="fa fa-shopping-cart"></i>加入购物车
                                                </a>
                                            </div>
                                            <div class="add-to-link">
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo url('/show_details'); ?>/bid/<?php echo htmlentities($watchDataItem['bid']); ?>"
                                                            title="详细">
                                                            <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- single-product-end -->
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div><!-- single-shop-end -->
                </div>
            </div><!-- tab-area-end -->
            <!-- pagination-area-start -->
            <div class="pagination-area mt-50" style="position: relative">
                <?php echo $watchData; ?>
            </div><!-- pagination-area-end -->
        </div>
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
    <style>
    .btn-add-cart {
        display: inline-block;
        background: #333 none repeat scroll 0 0;
        border: medium none;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        height: 49px;
        letter-spacing: 0.025em;
        line-height: 49px;
        margin-left: 45px;
        padding: 0 30px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .btn-add-cart:focus {
        display: inline-block;
        background: #333 none repeat scroll 0 0;
        border: medium none;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        height: 49px;
        letter-spacing: 0.025em;
        line-height: 49px;
        margin-left: 45px;
        padding: 0 30px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .btn-add-cart:hover {
        color: #fff;
        background: #f07c29 none repeat scroll 0 0;
    }
</style>
<div class="modal fade app" id="productModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="modal-tab">
                            <div class="product-details-large tab-content" style="margin-bottom: 20px">
                                <div class="tab-pane active" id="image-1" style="text-align: center;">
                                    <img :src="'/upload/img/'+b_detail.cover"
                                        style="width: 340px;height: 340px;border-radius: 8px" alt="">
                                </div>
                            </div>
                            <div class="product-details-small quickview-active owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(0px, 0px, 0px); transition: 0s;text-align: center">
                                        <a class="active" v-for="item in b_detail.imgs" href="#">
                                            <img style="width: 115px;height: 115px;margin: 2px"
                                                :src="'/upload/img/'+item.img" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-dots">
                                    <button role="button" class="owl-dot active"><span></span></button>
                                    <button role="button" class="owl-dot"><span></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3>{{b_detail.bname}}</h3>
                            <div class="price"><span>￥{{b_detail.price}}</span></div>
                            <div>
                                <span style="margin-right: 5px">
                                    品牌：<span>{{b_detail.brand}}</span>
                                </span>
                            </div>
                            <div>
                                <span style="margin-right: 5px">
                                    型号：<span>{{b_detail.modelcode}}</span>
                                </span>
                            </div>
                            <div>
                                <span style="margin-right: 5px">
                                    商品类型：<span>{{b_detail.type}}</span>
                                </span>
                            </div>
                            <p style="height: 180px">
                                <span>商品简介：</span>
                                <span>{{b_detail.detail}}</span>
                            </p>
                            <form id="dialog-form" action="#">
                                数量：<input type="number" name="num" id="good_num_input" value="1">
                                <input type="hidden" name="bid" id="bid_input" :value="b_detail.bid">
                                <a class="btn-add-cart" href="javascript:void(0);" @click="add_cart">加入购物车</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Modal end -->
<!-- all js here -->
<!-- jquery latest version -->

<script>
    var data = {
        b_detail: {}
    }
    var vm = new Vue({
        el: ".app",
        data: data,
        methods: {
            get_watch_detail: function (bid) {
                $.ajax({
                    type: "POST",//方法类型
                    dataType: "json",//预期服务器返回的数据类型
                    url: "<?php echo url('/watch_detail'); ?>",//url
                    data: {
                        bid: bid,
                    },
                    success: function (result) {
                        vm.b_detail = result
                        vm.cover = "/upload/img/" + result.cover;
                        $("#open").click();
                    },
                    error: function (result) {
                        alert("服务器繁忙,请稍后重试!")
                    }
                });
            },
            add_cart: function (bid) {
                var flag = 1;
                if (typeof bid == "string") {
                    flag = 0;
                    $("#bid_input").val(bid);
                    $("#good_num_input").val(1);
                }
                var tempData = $("#dialog-form").serialize();
                $.ajax({
                    type: "POST",//方法类型
                    url: "<?php echo url('/add_cart'); ?>",//url
                    data: tempData,
                    success: function (result) {
                        if (result.msg == 1) {
                            alert("添加购物车成功！");
                            type_vm.get_cart_info();
                            if (flag == 1) {
                                $("#open").click();
                            }
                        } else if (result.msg == 0) {
                            alert("添加购物车失败！");
                            type_vm.get_cart_info();
                        }
                    },
                    error: function (result) {
                        alert("网络环境异常，发生异常错误！");
                    }
                });
            }
        },
    });
    function showProductDetail(bid) {
        vm.get_watch_detail(bid)
    }
    function add_cart_f(bid) {
        vm.add_cart(bid)
    }
</script>
</body>

</html>