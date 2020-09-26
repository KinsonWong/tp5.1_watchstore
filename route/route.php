<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: kinson <437241304@qq.com>
// +----------------------------------------------------------------------

//Index
Route::get('show_index','index/index/show_index');//商城主页页面

//Admin
Route::get('show_admin_login','admin/admin/show_admin_login');//管理员登录页面
Route::get('show_admin_welcome','admin/admin/show_admin_welcome');//管理员欢迎界面
Route::get('show_admin_index','admin/admin/show_admin_index');//显示管理员主页
Route::get('admin_logout','admin/admin/admin_logout');//管理员退出
Route::post('admin_login','admin/admin/admin_login');//管理员登录

//Admin_Member
Route::get('show_member_list','admin/admin_member/show_member_list');//会员列表
Route::get('get_member_list','admin/admin_member/get_member_list');//会员列表数据接口
Route::get('show_member_edit/:uid','admin/admin_member/show_member_edit');//编辑会员页面
Route::post('member_delete','admin/admin_member/member_delete');//删除会员
Route::post('member_edit','admin/admin_member/member_edit');  //编辑会员信息
Route::get('show_member_add','admin/admin_member/show_member_add');//添加会员页面
Route::get('show_address_add/:uid','admin/admin_member/show_address_add');//会员收货地址添加页面
Route::post("address_add",'admin/admin_member/address_add');//会员地址添加
Route::get('get_address_list','admin/admin_member/get_address_list');//会员收货地址数据接口
Route::get('show_address_edit/:h_a_id','admin/admin_member/show_address_edit');//会员收货地址修改页面
Route::post('address_update','admin/admin_member/address_update');//会员收货地址更新
Route::post('address_delete','admin/admin_member/address_delete');//会员收货地址删除
Route::post('member_delete_s','admin/admin_member/member_delete_s');//会员批量删除

//Admin_Product
Route::get('show_watch_list','admin/admin_product/show_watch_list');//商品列表页面
Route::get('get_watch_list','admin/admin_product/get_watch_list');//商品列表数据接口
Route::get('show_watch_add','admin/admin_product/show_watch_add');//商品添加页面
Route::get('show_watch_edit/:bid','admin/admin_product/show_watch_edit');//商品编辑页面
Route::post('watch_delete','admin/admin_product/watch_delete');//商品删除
Route::post('watch_edit','admin/admin_product/watch_edit');//商品编辑
Route::post('watch_delete_s','admin/admin_product/watch_delete_s');//商品批量删除
Route::post("watch_add",'admin/admin_product/watch_add');//添加商品

//Admin_Order
Route::get('show_order_list','admin/admin_order/show_order_list');//订单列表页面
Route::get('get_order_list','admin/admin_order/get_order_list');//订单列表数据接口
Route::get('show_order_edit','admin/admin_order/show_order_edit');//订单编辑页面
Route::post('order_delete','admin/admin_order/order_delete');//订单删除
Route::post('order_deliver','admin/admin_order/order_deliver');//订单发货
Route::post('order_delete_s','adminadmin_order/order_delete_s');//订单批量删除
Route::post('order_update','admin/admin_order/order_update');//订单更新


//Product
Route::get('show_details','product/product/show_details');//商品详情页面
Route::post("watch_detail",'product/product/watch_detail');//获取商品详情信息
Route::post("add_cart",'product/product/add_cart');//添加购物车
Route::post("watch_header",'product/product/watch_header'); //获取商品分类
Route::post("remove_cart_item",'product/product/remove_cart_item');//删除购物车项
Route::post("cart_item_num",'product/product/cart_item_num');//改变购物车项数
Route::post("check_out",'product/product/check_out');//购物车结算
Route::post("get_cart_info",'product/product/get_cart_info');//获取购物车前三项
Route::post("delete_cart_item",'product/product/delete_cart_item');//删除购物车项
Route::get('show_plist','product/product/show_plist');//商品列表页面
Route::get('show_check','product/product/show_check');//商品结算页面
Route::get('show_cart','product/product/show_cart');//购物车页面
Route::post('coupon_check','product/product/coupon_check');//检查优惠码是否可用

//User
Route::get("show_user_order",'user/user/show_user_order'); //会员查看订单页面
Route::get("user_logout",'user/user/user_logout'); //会员注销
Route::post('user_check','user/user/user_check');//检查会员姓名是否重复
Route::post('email_check','user/user/email_check');//忘记密码时检查会员邮箱是否存在
Route::post('user_reset_password','user/user/user_reset_password');//会员忘记密码重置
Route::post('user_register','user/user/user_register');//会员注册
Route::post('user_login','user/user/user_login');//会员登录
Route::get('show_login','user/user/show_login');//会员登录页面
Route::get('show_forget_password','user/user/show_forget_password');//会员忘记密码页面
Route::get('show_user_center','user/user/show_user_center');//会员个人中心页面
Route::get('show_register','user/user/show_register');//会员注册页面
Route::post('receive_confirm','user/user/receive_confirm');//会员订单确认收货

return [

];
