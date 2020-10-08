<?php /*a:3:{s:76:"D:\phpstudy_pro\WWW\watchstore\application\index\view\index\brand_story.html";i:1601557747;s:40:"public/static/product/header/header.html";i:1601974929;s:40:"public/static/product/footer/footer.html";i:1601781026;}*/ ?>
<!DOCTYPE html>
<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
    lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>品牌故事</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/product/images/favicon.png">

    <style>
        .top_height {
            height: 405px;
            background: #e8e8e8;
            margin-bottom: 2rem;
        }

        .text_small {
            font-size: 0.8rem;
        }

        .my_img1 {
            margin-left: 27px;
            margin-top: 20px;
            width: 85%;
            transition: transform 1s;
        }

        .my_img1:hover {
            transform: scale(1.1);
        }

        ._text {
            margin-left: 27px;
            margin-top: 20px;
            width: 85%;
            text-indent: 20px;
        }

        .tt {
            margin-bottom: 35px;
            color: #F07c29;
        }
    </style>
</head>

<body>
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

    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="<?php echo url('/show_index'); ?>">主页</a></li>
                            <li><a href="javascript:void(0);" class="active">品牌故事</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    <div class="container">
        <div class="row no-gutters">
            <h1 class="tt">品牌故事</h1>
            <div class="col-lg-4 col-sm-12">
                <div class="mr-lg-1 top_height">
                    <img class="my_img1" src="/public/static/product/images/1.jpg" alt="">
                    <div class="_text">
                        <p>精工(SEIKO)由日本表匠服部金太郎于1892年创立，并在1968荣获日内瓦天文台竞赛之“最佳机械腕表”。精工于1969推出世界第一只石英腕表Astron,并在1895年成功推出日本制造的TIME
                            KEEPER怀表，其在腕表界的地位得以奠定，创始人金太郎也被日本新闻界尊称为“日本时计之王”。</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="mr-lg-1 top_height">
                    <img class="my_img1" src="/public/static/product/images/2.jpg" alt="">
                    <div class="_text">
                        <p>佳明(Garmin)成立于1989年，注册地为瑞士沙夫豪森。近30年前，Garmin 以尖端的航空
                            GPS导航产品进入市场，目前已是航空、航海、车用、运动健身产品等市场的领先者。腕表品类包括智能腕表、户外腕表、航空腕表、和MARQ时尚腕表等系列。结合惊艳设计、卓越质量与优异可靠度，创造绝佳的产品体验，搭配完整的产品生态圈，Garmin矢志成为每位热爱生活的使用者喜爱的品牌。
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="top_height">
                    <img class="my_img1" src="/public/static/product/images/3.jpg" alt="">
                    <div class="_text">
                        <p>卡西欧(CASIO)品牌源于日本，创立于1957年。卡西欧腕表将高、精、尖的先进科技结合新型液晶技术恰当的运用于腕上时计，坚持不懈地开发无以伦比的“腕上科技产品”。卡西欧腕表推广集多功能和新时尚为一体的运动休闲手表品牌G-Shock和Baby-G,经过市场开拓期的品牌塑造活动，成为新潮、时尚、高科技、功能多元化的电子腕表的代名词。
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="mr-lg-1 top_height">
                    <img class="my_img1" src="/public/static/product/images/4.jpg" alt="">
                    <div class="_text">
                        <p>安普里奥·阿玛尼(Emporio Armani)是意大利著名奢侈品品牌Giorgio
                            Armani旗下的，针对年轻人设计的副线品牌。1981年成立于意大利米兰，经营产品有鞋履、香水、饰物等。Emporio Armani挟着主牌Giorgio
                            Armani的威势，一上市便大受欢迎，分店从欧洲迅速遍及美洲和亚洲。</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="mr-lg-1 top_height">
                    <img class="my_img1" src="/public/static/product/images/5.jpg" alt="">
                    <div class="_text">
                        <p>浪琴(LONGINES)于1832年在瑞士索伊米亚创立，拥有逾180多年的悠久历史与精湛工艺，在运动计时领域亦拥有显赫传统与卓越经验。浪琴作为世界锦标赛的计时器及国际联合会的合作伙伴，以其优雅的钟表享誉全球，并以飞翼沙漏为标志的浪琴表以优雅著称于世。作为全球领先钟表制造商斯沃琪集团旗下的著名品牌，浪琴表已遍布世界150多个国家。
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="top_height">
                    <img class="my_img1" src="/public/static/product/images/6.jpg" alt="">
                    <div class="_text">
                        <p>天梭(TISSOT)由查理费里西安·天梭创立于1853年，1983年加入Swatch集团。天梭融合了160年的创意和传统的瑞士制表工艺，是瑞士制表业中的佼佼者。第一间天梭制表工作室位于瑞士小镇力洛克，2014年天梭表已成功畅销全球五大洲150个国家，并且成为代表瑞士产品的质量和精确度的品牌。
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="top_height">
                    <img class="my_img1" src="/public/static/product/images/7.jpg" alt="">
                    <div class="_text">
                        <p>天美时(TIMEX)是始创于1854年的美国钟表品牌，以其悠久的制表历史和时尚的外观闻名。天美时户外系列手表有着强大的功能性与实用性，是科技与设计的完美结合。TIMEX手表深受众多明星政要的喜爱，并对它爱不释手，最有名的当属美国历任总统，如奥巴马、乔治布什、克林顿、戈尔等。所以天美时又被称为“永远被总统选戴的TIMEX".
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="top_height">
                    <img class="my_img1" src="/public/static/product/images/loading.gif" alt="pic" >
                    <div class="_text" style="text-align: center;">
                        <p>品牌故事陆续更新中，敬请期待！</p>
                    </div>
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

</html>