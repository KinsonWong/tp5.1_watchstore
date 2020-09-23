<?php

namespace app\product\extend;
use think\facade\Session;
use app\user\model\UserModel;
use think\Exception;

class CartExtend
{
    /**
     * 改变购物项数量
     * @param $bid
     * @param $flag
     * @return \think\response\Json
     */
    static function changeNum($bid, $flag)
    {
        $cart = Session::get('cart');
        if (empty($cart)) {
            $jsonRes = ['msg' => 0];
        } else {
            if ($flag != 1) {
                foreach ($cart as &$item) {
                    if ($item['bid'] == $bid) {
                        if ($item['num'] == 1) {
                            $jsonRes = ['msg' => 2];   //商品数量不能低于1
                        } else {
                            $item['num'] -= 1;      //商品数量减1
                            $jsonRes = ['msg' => 1];    //减少成功
                        }
                    }
                }
            } else {
                foreach ($cart as &$item) {
                    if ($item['bid'] == $bid) {
                        $item['num'] += 1;   //商品数量加1
                        $jsonRes = ['msg' => 1];   //数量添加成功
                    }
                }
            }
            Session::set('cart', $cart);
        }
        return json($jsonRes);
    }

    /**
     * 移除购物车项
     * @param $bid
     * @return \think\response\Json
     */
    static function removeItem($bid)
    {
        $cart = Session::get('cart');
        if (empty($cart)) {
            $jsonRes = ['msg' => 0];    //购物车为空
        } else {
            foreach ($cart as $key => $item) {
                if ($item['bid'] == $bid) {
                    unset($cart[$key]);
                }
            }
            Session::set('cart', $cart);
            $jsonRes = ['msg' => 1];
        }
        return json($jsonRes);
    }

    /**
     * 添加商品到购物车Session
     * @param $bid
     * @param $num
     * @return \think\response\Json
     */
    static function addCart($bid, $num)
    {
        if (empty($bid)) {
            return json(['msg' => 0]);
        } else if ($num > 0) {
            //若购物车为空
            if (empty(Session::get('cart'))) {
                $cart = array(
                    array('bid' => $bid, 'num' => $num)
                );
                Session::set('cart', $cart);
            } else {
                //若购物车不为空
                $flag = false;
                $cart = Session::get('cart');
                foreach ($cart as $item) {
                    //若原先购物车内商品和即将添加的商品一样
                    if ($item['bid'] == $bid) {
                        $flag = true;
                    }
                }
                if ($flag) {
                    foreach ($cart as &$item) {
                        if ($item['bid'] == $bid) {
                            //同种商品数量添加
                            $item['num'] += $num;
                        }
                    }
                    Session::set('cart', $cart);
                } else {
                    $cart[] = array('bid' => $bid, 'num' => $num);
                    Session::set('cart', $cart);

                }
            }
            return json(['msg' => 1]);
        } else {
            return json(['msg' => 0]);
        }
    }
    //优惠券是否可用
    static function check_coupon($uid,$coupon){
        try{
            $register_date = UserModel::where('uid',$uid)->value('registertime');
            $nowdate = date('Y-m-d H:i', time());
            
            $datetime_start = new \DateTime($nowdate);
            $datetime_end = new \DateTime($register_date);
            $days = $datetime_start->diff($datetime_end)->days;
            if($days<=30 && $coupon=="Freshman"){
                $jsonRes = ['msg' => 1];
                Session::set('coupon','1');
            }else{
                $jsonRes = ['msg' => 0];    //优惠券不可用
            }
        }catch (Exception $e) {
            $jsonRes = ['msg' => $e->getMessage()];
        }
        return $jsonRes;
    }

}