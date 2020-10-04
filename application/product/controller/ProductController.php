<?php
namespace app\product\controller;

use app\product\extend\CartExtend;
use app\product\model\WatchImgModel;
use app\product\model\WatchModel;
use app\product\model\WatchOrderModel;
use app\product\model\UserAddressModel;
use think\Controller;
use think\Db;
use think\Exception;
use think\facade\Session;
use think\Request;

class ProductController extends Controller
{
    /**
     * 根据bid显示手表详细信息
     * @param Request $request
     * @return mixed
     */
    public function show_details(Request $request)
    {
        try{
            // 根据bid查询手表信息
            $watchData = WatchModel::where("bid", $request->bid)->find();
            $this->assign("watchData", $watchData);
            // 根据bid查询手表图片
            $imgs = WatchImgModel::where("b_id", $request->bid)->select();
            $imgs[count($imgs)] = ["img"=>$watchData["cover"]];
            $this->assign("imgs", $imgs);
            // 根据类型查询相关手表
            $relatedWatches = WatchModel::where("type", $watchData["type"])->where("bid",'<>',$request->bid)->limit(3)->select();   // 不等于->"<>"
            $this->assign("relatedWatches", $relatedWatches);
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch('details');
    }

    /**
     * 首页商品列表查看
     * @param Request $request
     * @return mixed
     */
    public function show_plist(Request $request)
    {
        $type = $request->type;
        $search = $request->search;
        try {
            // 展示类型
            $types = WatchModel::field("type")->distinct(true)->limit(6)->select();
            $data = array();
            foreach ($types as $item) {
                $item["name"] = $item["type"];
                $item["value"] = WatchModel::where("type", $item["type"])->count("type");
                array_push($data, $item);
            }
            $this->assign("catalog_list", $data);
            // 销量排名
            $watchOrderData = WatchModel::order("sell desc")->limit(5)->select();
            $this->assign("watchOrderData", $watchOrderData);
            // 展示商品列表
            $WatchModel = new WatchModel();
            if ($type != null) {
                // 根据类型进行商品展示
                $watchData = $WatchModel->where("type", $type)->paginate(12);
            } else if ($search != null){
                // 搜索商品
                $watchData = $WatchModel->whereLike("bname", "%".$search."%")->paginate(12);
            }else {
                // 直接查询watch数据库商品
                $watchData = $WatchModel->paginate(12);
            }
            $this->assign("watchData", $watchData);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        return $this->fetch("plist");
    }

    /**
     * 显示订单结算页面
     * @return mixed
     */
    public function show_check()
    {
        try{
            // 检查是否登录
            $this->have_session();
            // 根据uid查询用户的所有收货地址
            $userAddressDatas = UserAddressModel::where("u_id", Session::get("uid"))->select();
            $this->assign("userAddressDatas", $userAddressDatas);
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        return $this->fetch("check");
    }

    /**
     * 显示购物车
     * @return mixed
     */
    public function show_cart()
    {
        //优惠券session默认设置为0，即默认不使用优惠券
        Session::set('coupon','0'); 

        //从session获取购物车信息
        $cart = Session::get('cart');
        if (empty($cart)) {
            $this->assign('result', 0);
            $this->assign('allPrice', 0);
        } else {
            $allPrice = 0;
            //$cart 和 $item 指向同一内容
            foreach ($cart as &$item) {
                $watch = WatchModel::get($item['bid']);
                $item['name'] = $watch->bname;
                $item['cover'] = $watch->cover;
                $item['price'] = $watch->price;
                $item['totalPrice'] = $watch->price * $item['num'];
                $allPrice += $item['totalPrice'];
            }
            $this->assign('result', 1);
            $this->assign('discount', 0);  //优惠金额默认为0
            $this->assign('allPrice', $allPrice);
            $this->assign('cart', $cart);
        }
        return $this->fetch("cart");
    }

    /**
     * 添加购物车
     * @param Request $request
     * @return \think\response\Json
     */
    public function add_cart(Request $request)
    {
        return CartExtend::addCart( $request->post('bid'),$request->post('num'));
    }

    /**
     * 删除购物车项
     * @param Request $request
     * @return \think\response\Json
     */
    public function remove_cart_item(Request $request)
    {
        return CartExtend::removeItem($request->post('bid'));
    }

    /**
     * 改变购物项的数目
     * @param Request $request
     * @return \think\response\Json
     */
    public function cart_item_num(Request $request)
    {
        return CartExtend::changeNum($request->post('bid'),$request->post('flag'));
    }

    /**
     * 通过bid获取商品具体信息
     * @param Request $request
     * @return \think\response\Json
     */
    public function watch_detail(Request $request)
    {
        try {
            $singleWatch = WatchModel::where("bid", $request->bid)->find();
            $singleWatch["imgs"] = WatchImgModel::where("b_id", $request->bid)->select();
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        return json($singleWatch);
    }

    /**
     * 获取分类信息
     * @return \think\response\Json
     */
    public function watch_header()
    {
        try{
            // 获取分类
            $dataTypes = [];
            $types = WatchModel::field("type")->distinct(true)->limit(4)->select();   //指定查询type字段,并去除重复值
            foreach ($types as $type)
            {
                $tempItem["type"] = $type["type"];
                $tempItem["value"] = WatchModel::field("bname, bid")->where("type", $type["type"])->select();    //指定查询bname，bid字段
                array_push($dataTypes, $tempItem);
            }
            // 获取最新
            $dataNew = [];
            $types = WatchModel::field("type")->distinct(true)->limit(4)->select();   //指定查询type字段,并去除重复值
            foreach ($types as $type)
            {
                $tempItem["type"] = $type["type"];
                $tempItem["value"] = WatchModel::field("bname, bid, date")->where("type", $type["type"])->order("date desc")->select();   //指定查询bname，bid,date 字段
                array_push($dataNew, $tempItem);
            }
            // 获取畅销
            $dataBigSell = [];
            $types = WatchModel::field("type")->distinct(true)->limit(4)->select();   //指定查询type字段,并去除重复值
            foreach ($types as $type)
            {
                $tempItem["type"] = $type["type"];
                $tempItem["value"] = WatchModel::field("bname, bid, sell")->where("type", $type["type"])->
                order("sell desc")->select();   //指定查询bname，bid,sell 字段
                array_push($dataBigSell, $tempItem);
            }
            // 结果数据
            $result = [
                "dataTypes"=>$dataTypes,
                "dataNew"=>$dataNew,
                "dataBigSell"=>$dataBigSell,
            ];
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        return json($result);
    }

    /**
     * 检查优惠码是否可用
     * @param Request $request
     * @return \think\response\Json
     */
    public function coupon_check(Request $request)
    {
        $coupon = $request->coupon;//获取优惠码
        $uid = $request->uid;//获取用户id
        $jsonRes = CartExtend::check_coupon($uid,$coupon);    //优惠码不可用，结果为0，优惠码可用，结果为1
        return json($jsonRes);//返回json数据
    }

    /**
     * 购物车结算货到付款
     * @param Request $request
     * @return \think\response\Json
     */
    public function check_out_cash(Request $request)
    {
        try{
            $payment="货到付款";

            $address=[
                "u_id"=>Session::get("uid"),
                "consignee"=>$request->consignee,
                "province"=>$request->province,
                "area"=>$request->area,
                "city"=>$request->city,
                "addr"=>$request->addr,
                "contact"=>$request->contact,
            ];
            //如果无保存地址则新建收货地址
            if($request->h_a_id == null){
                $UserAddressModel = new UserAddressModel();
                $UserAddressModel->u_id = $address["u_id"];
                $UserAddressModel->consignee = $address["consignee"];
                $UserAddressModel->province = $address["province"];
                $UserAddressModel->city = $address["city"];
                $UserAddressModel->area = $address["area"];
                $UserAddressModel->addr = $address["addr"];
                $UserAddressModel->contact = $address["contact"];
                $UserAddressModel->save();
                // 获取自增ID
                $h_a_id = $UserAddressModel->h_a_id;
            }else{
                $h_a_id = $request->h_a_id;
            }
  
            // 把购物车的商品全部结算
            $goods = Session::get("cart");
            $all_price = 0;
            foreach ($goods as $good) {
                $watchItem = WatchModel::where("bid", $good["bid"])->find();
                $all_price += $watchItem["price"] * $good["num"];
                WatchModel::where("bid", $good["bid"])->setInc('sell',$good["num"]);  //销量增加
                WatchModel::where("bid", $good["bid"])->setDec('store',$good["num"]);  //库存减少
            }
            if($all_price < 599){   //订单金额小于599元，加收15元运费
                $all_price += 15;
            }

            $coupon_flag = Session::get("coupon");   //获取优惠券状态
            if($coupon_flag == 1){
                $discounts = $all_price*0.2;
                $pay = $all_price*0.8;
            }
            else{
                $discounts = 0;
                $pay = $all_price;
            }

            // 发布订单
            $WatchOrderModel = new WatchOrderModel();
            $WatchOrderModel->u_id = Session::get("uid");
            $WatchOrderModel->status = 1;
            $WatchOrderModel->date = date("Y-m-d H:i:s");
            $WatchOrderModel->h_a_id = $h_a_id;
            $WatchOrderModel->l_msg = $request->l_msg;
            $WatchOrderModel->payment = $payment;
            $WatchOrderModel->all_price = $all_price;
            $WatchOrderModel->discounts = $discounts;
            $WatchOrderModel->pay = $pay;

            $WatchOrderModel->save();
            $o_id = $WatchOrderModel->o_id;
            // 插入订单详情
            foreach ($goods as $good) {
                Db::name("order_detail")->insert([
                    "b_o_id"=>$o_id,
                    "b_id"=>$good["bid"],
                    "num"=>$good["num"]
                ]);
            }
            Session::set("cart", []);
            return json(["msg"=>1]);
        
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        return json(["msg"=>'']);
    }


    /**
     * 购物车结算线上支付
     * @param Request $request
     * @return \think\response\Json
     */
    public function check_out_online(Request $request)
    {
        try{
            $payment="线上支付";

            $address=[
                "u_id"=>Session::get("uid"),
                "consignee"=>$request->consignee,
                "province"=>$request->province,
                "area"=>$request->area,
                "city"=>$request->city,
                "addr"=>$request->addr,
                "contact"=>$request->contact,
            ];
            //如果无保存地址则新建收货地址
            if($request->h_a_id == null){
                $UserAddressModel = new UserAddressModel();
                $UserAddressModel->u_id = $address["u_id"];
                $UserAddressModel->consignee = $address["consignee"];
                $UserAddressModel->province = $address["province"];
                $UserAddressModel->city = $address["city"];
                $UserAddressModel->area = $address["area"];
                $UserAddressModel->addr = $address["addr"];
                $UserAddressModel->contact = $address["contact"];
                $UserAddressModel->save();
                // 获取自增ID
                $h_a_id = $UserAddressModel->h_a_id;
            }else{
                $h_a_id = $request->h_a_id;
            }
  
            // 把购物车的商品全部结算
            $goods = Session::get("cart");
            $all_price = 0;
            foreach ($goods as $good) {
                $watchItem = WatchModel::where("bid", $good["bid"])->find();
                $all_price += $watchItem["price"] * $good["num"];
                WatchModel::where("bid", $good["bid"])->setInc('sell',$good["num"]);  //销量增加
                WatchModel::where("bid", $good["bid"])->setDec('store',$good["num"]);  //库存减少
            }
            if($all_price < 599){   //订单金额小于599元，加收15元运费
                $all_price += 15;
            }

            $coupon_flag = Session::get("coupon");   //获取优惠券状态
            if($coupon_flag == 1){
                $discounts = $all_price*0.2;
                $pay = $all_price*0.8;
            }
            else{
                $discounts = 0;
                $pay = $all_price;
            }

            // 发布订单
            $WatchOrderModel = new WatchOrderModel();
            $WatchOrderModel->u_id = Session::get("uid");
            $WatchOrderModel->status = 0;    //0为待支付状态
            $WatchOrderModel->date = date("Y-m-d H:i:s");
            $WatchOrderModel->h_a_id = $h_a_id;
            $WatchOrderModel->l_msg = $request->l_msg;
            $WatchOrderModel->payment = $payment;
            $WatchOrderModel->all_price = $all_price;
            $WatchOrderModel->discounts = $discounts;
            $WatchOrderModel->pay = $pay;

            $WatchOrderModel->save();
            $o_id = $WatchOrderModel->o_id;
            // 插入订单详情
            foreach ($goods as $good) {
                Db::name("order_detail")->insert([
                    "b_o_id"=>$o_id,
                    "b_id"=>$good["bid"],
                    "num"=>$good["num"]
                ]);
            }
            Session::set("cart", []);

            return json(["msg"=>1,"oid"=>$o_id]);
        
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        return json(["msg"=>'']);
    }


    /**
     * 显示支付订单页面界面
     * @param $oid
     * @return mixed
     */
    public function show_order_pay($oid)
    {
        $thisorder = WatchOrderModel::get($oid);
        //传递参数回页面
        $this->assign('thisorder', $thisorder);
        return $this->fetch('order_pay');
    }



    /**
     * 判断用户是否登录
     */
    public function have_session()
    {
        if (empty(Session::get('username'))) {
            $this->error('当前未登录', url . 'show_login');
        }
    }

    /**
     * 获取购物车前三条信息
     * @return \think\response\Json
     */
    public function get_cart_info()
    {
        $data = [];
        $total_price = 0;
        try{
            $cart = Session::get("cart");   //从session中获取购物车内容
            if($cart != null){
                foreach ($cart as $key=>$value){
                    if($key == 3){
                        break;
                    }
                    $watchItem = WatchModel::where("bid", $value["bid"])->find();
                    $total_price += $watchItem["price"] * $value["num"];
                    $watchItem["num"] = $value["num"];
                    array_push($data, $watchItem);
                }
            }
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        $result = [
            "cart_info"=>$data,
            "total_price"=>$total_price,
        ];
        if(Session::get("cart") != null){
            $result["product_num"] = count(Session::get("cart"));
        }else{
            $result["product_num"] = 0;
        }
        return json($result);
    }

    /**
     * 通过bid删除指定购物车商品
     * @param Request $request
     * @return \think\response\Json
     */
    public function delete_cart_item(Request $request)
    {
        try{
            $cart = Session::get("cart");
            if($cart != null){
                foreach ($cart as $key=>$value){
                    if($value["bid"] == $request->bid){
                        unset($cart[$key]);
                        Session::set("cart", array_values($cart));
                        break;
                    }
                }
            }
        }catch (Exception $e){
            $this->error($e->getMessage());
        }
        return json(["msg"=>1]);  //删除成功
    }
}