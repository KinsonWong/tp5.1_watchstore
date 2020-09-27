<?php /*a:1:{s:70:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\login.html";i:1601188715;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>网上手表商城后台登录</title>
    <link rel="stylesheet" href="/public/static/admin/css/login.css" media="all" />
    <link rel="stylesheet" href="/public/static/admin/lib/layui/css/layui.css" media="all" />
    <script type="text/javascript" src="/public/static/product/js/hex_sha.js"></script>
    <style>
        /* 覆盖原框架样式 */
        .layui-elem-quote {
            background-color: inherit !important;
            font-size: 150%;
        }

        .layui-input,
        .layui-select,
        .layui-textarea {
            background-color: inherit;
            padding-left: 30px;
        }
    </style>
</head>

<body>
    <!-- Head -->
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm12 layui-col-md12 zyl_mar_01">
                <blockquote class="layui-elem-quote">管理员后台登陆</blockquote>
            </div>
        </div>
    </div>
    <!-- Head End -->

    <!-- Carousel -->
    <div class="layui-row">
        <div class="layui-col-sm12 layui-col-md12">
            <div class="layui-carousel zyl_login_height" id="zyllogin" lay-filter="zyllogin">
                <div carousel-item="">
                    <div>
                        <div class="zyl_login_cont"></div>
                    </div>
                    <div>
                        <img src="/public/static/admin/images/01.jpg" />
                    </div>
                    <div>
                        <div class="background">
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <div>
                        <img src="/public/static/admin/images/03.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Footer -->
    <div class="layui-row">
        <div class="layui-col-sm12 layui-col-md12 zyl_center zyl_mar_01">
            © Copyright Admin-Background - 2020
        </div>
    </div>
    <!-- Footer End -->


    <div class="zyl_lofo_main">
        <fieldset class="layui-elem-field layui-field-title zyl_mar_02">
            <legend>登录到管理员后台</legend>
        </fieldset>
        <div class="layui-row layui-col-space13">
            <form class="layui-form zyl_pad_01" action="">
                <div class="layui-col-sm12 layui-col-md12">
                    <div class="layui-form-item">
                        <input type="text" name="username" lay-verify="required" autocomplete="off" placeholder="管理员账号"
                            class="layui-input" id="username">
                        <i class="layui-icon layui-icon-username zyl_lofo_icon"></i>
                    </div>
                </div>
                <div class="layui-col-sm12 layui-col-md12">
                    <div class="layui-form-item">
                        <input type="password" name="password" lay-verify="required" autocomplete="off"
                            placeholder="管理员密码" class="layui-input" id="password">
                        <i class="layui-icon layui-icon-password zyl_lofo_icon"></i>
                    </div>
                </div>
                <div class="layui-col-sm12 layui-col-md12">
                    <div class="layui-row">
                        <div class="layui-col-xs4 layui-col-sm4 layui-col-md4">
                            <div class="layui-form-item">
                                <input type="text" name="code" lay-verify="required" autocomplete="off"
                                    placeholder="验证码" class="layui-input" id="code">
                                <i class="layui-icon layui-icon-vercode zyl_lofo_icon"></i>
                            </div>
                        </div>
                        <div class="layui-col-xs4 layui-col-sm4 layui-col-md4">
                            <div><img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码" onclick="refreshVerify()"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="layui-col-sm12 layui-col-md12">
                    <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">立即登录</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.all.js"></script>
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/js/jparticle.min.js"></script>

    <script>
        //点击刷新验证码
        function refreshVerify() {
            var ts = Date.parse(new Date()) / 1000;
            $('#verify_img').attr("src", "/captcha?rand=" + ts);
        }

        layui.use(['carousel', 'form'], function () {
            var carousel = layui.carousel,
                form = layui.form;

            //监听提交
            form.on('submit(demo1)', function (data) {
                //var resData = data.field;
                let username = $("#username").val();
                let password = hex_sha1($("#password").val());
                let code = $("#code").val();

                $.ajax({
                    type: "POST",
                    data: {
                        username:username,
                        password:password,
                        code,code
                    },
                    url: "<?php echo url('/admin_login'); ?>",

                    success: function (result) {
                        if (result.msg == 2) {
                            //debugger
                            layer.closeAll("loading");
                            layer.msg("密码错误或用户不存在", {
                                icon: 2,
                                time: 2500
                            });
                            //debugger
                            //parent.layer.closeAll();
                        } else if (result.msg == 3) {
                            layer.closeAll("loading");
                            //debugger
                            layer.msg("验证码错误", {
                                icon: 2,
                                time: 2500
                            });
                        } else {
                            layer.closeAll("loading");
                            layer.msg("登录成功", {
                                icon: 1,
                                time: 2000
                            }, function () {
                                window.location.href = "<?php echo url('/show_admin_index'); ?>";
                            });
                        }
                    },
                    error: function () {
                        alert("发生错误")
                    }
                });
                return false;
            });

            //设置轮播主体高度
            var zyl_login_height = $(window).height() / 1.3;
            var zyl_car_height = $(".zyl_login_height").css("cssText", "height:" + zyl_login_height +
                "px!important");

            //Login轮播主体
            carousel.render({
                elem: '#zyllogin' //指向容器选择器
                ,
                width: '100%' //设置容器宽度
                ,
                height: 'zyl_car_height',
                arrow: 'always' //始终显示箭头
                ,
                anim: 'fade' //切换动画方式
                ,
                autoplay: true //是否自动切换false true
                ,
                arrow: 'hover' //切换箭头默认显示状态||不显示：none||悬停显示：hover||始终显示：always
                ,
                indicator: 'none' //指示器位置||外部：outside||内部：inside||不显示：none
                ,
                interval: '3500' //自动切换时间:单位：ms（毫秒）
            });

            //粒子线条
            $(".zyl_login_cont").jParticle({
                background: "rgba(0,0,0,0)", //背景颜色
                color: "#fff", //粒子和连线的颜色
                particlesNumber: 100, //粒子数量
                //disableLinks:true,//禁止粒子间连线
                //disableMouse:true,//禁止粒子间连线(鼠标)
                particle: {
                    minSize: 1, //最小粒子
                    maxSize: 3, //最大粒子
                    speed: 30, //粒子的动画速度
                }
            });
        });
    </script>

</body>

</html>