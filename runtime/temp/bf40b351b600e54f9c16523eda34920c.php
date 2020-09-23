<?php /*a:1:{s:74:"D:\phpstudy_pro\WWW\watchstore\application\admin\view\admin\watch_add.html";i:1600245063;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>添加商品</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin_theme.css">
    <script type="text/javascript" src="/public/static/admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/layui/layui.all.js" charset="utf-8"></script>
    <script type="text/javascript" src="/public/static/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/public/static/admin/js/exif.js"></script>

    <style>
        *{ margin: 0; padding: 0;}
        .gallery .img-item { position: relative; cursor: pointer; }
        .gallery .img-item .delete { position: absolute; display: block; width: 20px; height: 20px;
            color: #fff; background: rgba(232, 0, 0, 0.7);  line-height: 20px; text-align: center;
            border-radius: 50%; top: 25px; right: 25px; cursor: pointer; }
        .img { width: 100px; height: 100px; margin: 20px; cursor: pointer;}
        .btn-upload{ margin: 20px; float: left; display: block; width: 100px; height: 100px;
            border: 1px solid #ddd; background: #ebebeb; line-height: 100px; font-size: 14px;
            text-align: center; color: #808080; cursor: pointer; }
        .box {
            width: 100%;
            height: 100%;
            background: #333;
            position: absolute;
            top:0px;
            left:0px;
            margin: 0 auto;
            align-items: center; /*定义body的元素垂直居中*/
            justify-content: center; /*定义body的里的元素水平居中*/
            display: none;
            overflow: hidden
        }
        .box img{
            width:100%;
            position: absolute;
        }
    </style>
</head>

<body class="layui-anim layui-anim-up">
<div class="x-nav">
      <span class="layui-breadcrumb">
          <a href="#" style="text-decoration: none">商品管理</a>
              <a href="<?php echo url('/show_watch_list'); ?>" style="text-decoration: none">商品列表</a>
              <a href="#" style="text-decoration: none">
                  <cite>商品添加</cite>
              </a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right;text-decoration:none" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <form class="layui-form" id="myform" enctype="multipart/form-data" method="post" action="">
        <div class="layui-form-item">
            <label for="productname" class="layui-form-label">
                <span class="x-red">*</span>商品名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="productname" name="bname" required=""
                       autocomplete="off" class="layui-input" style="width: 450px;" placeholder="请输入商品名称">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="brand" class="layui-form-label">
                <span class="x-red">*</span>品牌
            </label>
            <div class="layui-input-inline">
                <input type="text" id="brand" name="brand" required="" autocomplete="off" class="layui-input" style="position:absolute;z-index:2;width:82%;" placeholder="请输入或选择">
                <select type="text" id="brand_select" lay-filter="brand_select" autocomplete="off" required="" class="layui-select">
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
                <input type="text" id="modelcode" name="modelcode" required=""
                       autocomplete="off" class="layui-input" placeholder="请输入商品型号">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="type" class="layui-form-label">
                <span class="x-red">*</span>类型
            </label>
            <div class="layui-input-inline">
                <input type="text" id="type" name="type" required="" autocomplete="off" class="layui-input" style="position:absolute;z-index:2;width:82%;" placeholder="请输入或选择">
                <select type="text" id="type_select" lay-filter="type_select" autocomplete="off" required="" class="layui-select">
                    <?php foreach($types as $type): ?>
                    <option value="<?php echo htmlentities($type['type']); ?>"><?php echo htmlentities($type['type']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="price" class="layui-form-label">
                <span class="x-red">*</span>售价(元)
            </label>
            <div class="layui-input-inline">
                <input type="text" id="price" name="price" required=""
                       autocomplete="off" class="layui-input" placeholder="请输入商品售价">
            </div>
        </div>
        
        <div class="layui-form-item">
            <label for="store" class="layui-form-label">
                <span class="x-red">*</span>库存
            </label>
            <div class="layui-input-inline">
                <input type="text" id="store" name="store" required=""
                       autocomplete="off" class="layui-input" placeholder="请输入商品库存">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                商品介绍
            </label>
            <div class="layui-input-block" style="width: 30%">
                <textarea name="detail" required="" autocomplete="off" placeholder="请输入商品介绍，可不填" class="layui-textarea"></textarea>
            </div>
        </div>
        <br>

        <div class="layui-form-item">
        <label for="watch_img" class="layui-form-label">
            <span class="x-red">*</span>商品图片
        </label>
        <div class="layui-input-inline">
            <div class="x-green">至少上传一张图片</div>
            <div class="x-green">第一张图片将作为商品缩略图</div>
        </div>
        </div>
        <div class="gallery" id="gallery" style="margin-left:100px;margin-bottom: 30px;">
            <div class="img-item" style="display: inline-block;" id="first-btn-upload">
                <label for="btn-upload" class="btn-upload" id="btn-upload">点击上传图片</label>
                <div style="clear: both;"></div>
            </div>
        </div>
        <input type="file" id="watch_img" name="watch_img[]" multiple style="display: none">

        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <button class="layui-btn" lay-submit="" lay-filter="demo1">添加</button>
        </div>
    </form>
</div>
<script>
    // 上传图片预览
    function preView(obj){
         var pimg = obj;
         // var pimg = document.querySelector("img");
         var oImg = document.querySelector(".box img");
         var oBox = document.querySelector(".box");
         // pimg.onclick=function(){
         oBox.style.display="flex"
         oImg.src=pimg.src
         // }
         oBox.onclick=function(){
             oBox.style.display="none"
             oImg.src=''
         }
     }
     // 创建数组保存图片
     var files = new Array();
     var id = 0;
     // 选择图片按钮隐藏input[file]
     $("#btn-upload").click(function() {
         $("#watch_img").trigger("click");
     });
     // 选择图片
     $("#watch_img").change(function() {
         // 获取所有图片
         var img = document.getElementById("watch_img").files;
         // 遍历
         for (var i = 0; i < img.length; i++) {
             // 得到图片
             var file = img[i];
             // 判断是否是图片
             var flag = judgeImgSuffix(file.name);
             if(flag){
 
             }else{
                 alert("要求图片格式为png,jpg,jpeg,bmp");
                 return;
             }
 
             // 把图片存到数组中
             files[id] = file;
             id++;
             // 获取图片路径
             var url = URL.createObjectURL(file);
 
             // 创建img
             var box = document.createElement("img");
             box.setAttribute("src", url);
             box.className = 'img';
             box.onclick = function(){
                 preView(this);
             };
 
             // 创建div 
             var imgBox = document.createElement("div");
             imgBox.style.float = 'left';
             imgBox.className = 'img-item';
 
             // 创建span
             var deleteIcon = document.createElement("span");
             deleteIcon.className = 'delete';
             deleteIcon.innerText = 'x';
             // 把图片名绑定到data里面
             deleteIcon.id = img[i].name;
             // 把img和span加入到div中
             imgBox.appendChild(deleteIcon);
             imgBox.appendChild(box);
             // 获取id=gallery的div
             var body = document.getElementsByClassName("gallery")[0];
             // body.appendChild(imgBox);
             var showPlace =document.getElementsByClassName("img-item")[0];
             body.insertBefore(imgBox,showPlace);
             // 点击span事件
             $(deleteIcon).click(function() {
                 // 获取data中的图片名
                 var filename = $(this).attr('id');
                 // 删除父节点
                 $(this).parent().remove();
                 var fileList = Array.from(files);
                 // 遍历数组
                 for (var j = 0; j < fileList.length; j++) {
                     // 通过图片名判断图片在数组中的位置然后删除
                     if (fileList[j].name == filename) {
                         fileList.splice(j, 1);
                         id--;
                         break;
                     }
                 }
                 files = fileList;
             });
         }
     });

     function judgeImgSuffix(path){
         var index = path.lastIndexOf('.');
         var suffix = "";
         if(index > 0){
             suffix = path.substring(index+1);
         }
         if("png"==suffix || "jpg"==suffix || "jpeg"==suffix || "bmp"==suffix || "PNG"==suffix || "JPG"==suffix || "JPEG"==suffix || "BMP"==suffix){
             return true;
         }else{
             return false;
         }
     }

    layui.use(['form'], function() {
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
            
        //监听提交
        form.on('submit(demo1)', function() {
            form = layui.form;
            var Data = new FormData($('#myform')[0]);
            Data.delete('watch_img[]');
            //for(var[a,b] of Data.entries()){
                //console.log(a,b);
            //}
            for(var i=0; i<$('#watch_img')[0].files.length;i++){
                Data.append('watch_img[]',$('#watch_img')[0].files[i]);
            }

            $.ajax({
                type: "POST",
                data: Data,
                cache: false,
                contentType: false,  
                processData: false,
                async : false,  
                url: "<?php echo url('/watch_add'); ?>",

                success: function(result) {
                    if (result.msg == 0) {
                        //debugger
                        layer.closeAll("loading");
                        layer.msg("至少上传一张图片", {
                            icon: 2,
                            time: 2500
                        });
                        //debugger
                        //parent.layer.closeAll();
                    } else {
                        layer.closeAll("loading");
                        layer.msg("添加成功", {
                            icon: 1,
                            time: 2000
                        }, function() {
                            window.location.href =
                                "<?php echo url('/show_watch_list'); ?>";
                        });
                    }
                },
                error: function() {
                    alert("发生错误")
                }
            });
            return false;
        });

        form.render();
    });
</script>

</body>
</html>