<?php /*a:1:{s:83:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin_product\watch_edit.html";i:1600671686;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>添加用户</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
</head>

<body class="layui-anim layui-anim-up">
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a href="#" style="text-decoration: none">商品管理</a>
            <a href="<?php echo url('/show_watch_list'); ?>" style="text-decoration: none">商品列表</a>
            <a href="#" style="text-decoration: none">
                <cite>商品编辑</cite>
            </a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <form class="layui-form">
            <input type="hidden" value="<?php echo htmlentities($result['bid']); ?>" name="bid" id="bid">
            <div class="layui-form-item">
                <label for="productname" class="layui-form-label">
                    <span class="x-red">*</span>商品名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="productname" name="bname" required="" autocomplete="off" class="layui-input"
                        value="<?php echo htmlentities($result['bname']); ?>" style="width: 450px;" placeholder="请输入商品名称">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="brand" class="layui-form-label">
                    <span class="x-red">*</span>品牌
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="brand" name="brand" required="" value="<?php echo htmlentities($result['brand']); ?>" autocomplete="off"
                        class="layui-input" style="position:absolute;z-index:2;width:82%;" placeholder="请输入或选择">
                    <select type="text" id="brand_select" lay-filter="brand_select" autocomplete="off" required=""
                        class="layui-select">
                        <?php foreach($brands as $brand): ?>
                        <option value="<?php echo htmlentities($brand['brand']); ?>"><?php echo htmlentities($brand['brand']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="type" class="layui-form-label">
                    <span class="x-red">*</span>型号
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="modelcode" name="modelcode" required="" value="<?php echo htmlentities($result['modelcode']); ?>"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="type" class="layui-form-label">
                    <span class="x-red">*</span>类型
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="type" name="type" required="" value="<?php echo htmlentities($result['type']); ?>" autocomplete="off"
                        class="layui-input" style="position:absolute;z-index:2;width:82%;" placeholder="请输入或选择">
                    <select type="text" id="type_select" lay-filter="type_select" autocomplete="off" required=""
                        class="layui-select">
                        <?php foreach($types as $type): ?>
                        <option value="<?php echo htmlentities($type['type']); ?>"><?php echo htmlentities($type['type']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="price" class="layui-form-label">
                    <span class="x-red">*</span>价格(元)
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="price" name="price" required="" value="<?php echo htmlentities($result['price']); ?>" autocomplete="off"
                        class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="store" class="layui-form-label">
                    <span class="x-red">*</span>库存
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="store" name="store" required="" value="<?php echo htmlentities($result['store']); ?>" autocomplete="off"
                        class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    商品介绍
                </label>
                <div class="layui-input-block" style="width: 30%">
                    <textarea name="detail" required="" autocomplete="off" placeholder="请输入商品介绍，可不填"
                        class="layui-textarea"><?php echo htmlentities($result['detail']); ?></textarea>
                </div>
            </div>

        </form>
        <div class="layui-form-item">
            <label for="price" class="layui-form-label">
            </label>
            <button class="layui-btn" onclick="edit_watch()">更新</button>
        </div>
    </div>
    <script>
        layui.use(['form'], function () {
            var form = layui.form;

            //select框的值赋值到input框
            form.on('select(type_select)', function (data) {
                $("#type").val(data.value);
                $("#type_select").next().find("dl").css({ "display": "none" });
                form.render(); //重新渲染
            });

            //select框的值赋值到input框
            form.on('select(brand_select)', function (data) {
                $("#brand").val(data.value);
                $("#brand_select").next().find("dl").css({ "display": "none" });
                form.render(); //重新渲染
            });

            form.render(); //重新渲染
        });

        function edit_watch() {
            let bid = $("#bid").val();
            let bname = $("#productname").val();
            let type = $("#type").val();
            let modelcode = $("#modelcode").val();
            let detail = $("#detail").val();
            let price = $("#price").val();
            let brand = $("#brand").val();
            let store = $("#store").val();
            $.ajax({
                type: "post",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "<?php echo url('/watch_edit'); ?>",//url
                data: {
                    bid: bid,
                    bname: bname,
                    type: type,
                    modelcode: modelcode,
                    detail: detail,
                    price: price,
                    brand: brand,
                    store: store
                },
                success: function (result) {
                    if (result.msg === 1) {
                        layer.msg("更新成功", { icon: 1, time: 1500 }, function () { window.location.href = ("<?php echo url('/show_watch_list'); ?>"); });
                    } else if (result.msg === 0) {
                        layer.msg('更新失败', { icon: 2, time: 1500 });
                    } else {
                        layer.msg(result.msg);
                    }
                },
                error: function (result) {
                    layer.msg("服务器繁忙,请稍后重试!", { icon: 0, time: 1500 })
                }
            });

        }
    </script>
</body>

</html>