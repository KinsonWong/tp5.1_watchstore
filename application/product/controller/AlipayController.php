<?php
namespace app\product\controller;

require_once 'application/product/extend/alipay/pagepay/service/AlipayTradeService.php';
require_once 'application/product/extend/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

use think\Controller;
use think\Db;
use think\Exception;
use think\facade\Session;
use think\Request;

class AlipayController extends Controller
{
    public $config = array (
        //应用ID,您的APPID。
        'app_id' => "2016102500758030",
        //商户私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAhX7Tt9AC2R96FoqYvPw4j6DYvFutjXadkHRDMnJXPu8NhLK4fzq+uXdjao0PyEYQ28e0UxDHnydIEDfMfWH10stLpk4PlUO4RtQ/IIZgJ8JmCpe/+iX84pEAb/eW/mDNrYPwe9FdsjpHZh9r89reFrUGeXJ5gtiuVGy/vOh3d4eV5zWL3KQlyqBLL1gImwHAJHXJnwAyUp9HVqxF1KOVKdgiaeXocJNIWPLe2TL6fX6IiGNs92jZ5g1wlrLi4LUo4DPjrj1ppssUqW0BQ5JWn75mtefxI8qD6FbSxw/DbAkzWnunhADaLW1wi6falfdo7EsW2ckzV0qN1o6Ttm86gwIDAQABAoIBAFvcNwIQcDVKNK/YNVwuTxl+fEW47Ecg7TGe3zKSfbi/tNSwSsa5/M4Q+mcypD6TADzMQii6rjK1TCBk1SEeTJL985N/ubdjvyV2He5aqUYSvjbhz2fpxgd98ggaHlvy7vVMiioZmtjuw3zheF54KEUF0mu1uymvwt4zawkqCjNEJKepvItLbKKyxKQ+FU9f51zzQl1XyPOIU3C8TKtUNfwWiqni6VbUW3RF3cX0r/h5IFjCTsruIArWDJ/BDMKJfEm5jPzVjrkcce5G7HjTTf+NTIO0h8+yjnVW5AMzgx9BSK3Ve5lYJ2YC9XKx2U3QQrem07+tKti+O+6vyG9FHIECgYEA4zeY0eoGSCHPFexjIImX6GwWguI4TzMdj6UYo9bjU7BLQ+7vEzcc+3LQ7jUiOY+w8twZWeWM9ZJGM/i7NjzGdOIcMm7yPy62AM79L8YdxQFjIzhHvZbLsnNpmlWPdPa1YJQox1qRpGmnBW0rDqh4cH//cqHUx59spTAjJuzIRcMCgYEAlmfvw2S8DgBJVd+1J5H0UJI/+qlDfSyczoNxqsT5SwETzfQCholCsrBpn9/dyf/R+Ua1JmoY6Q/SkgjmgszTXYZLG4Gd1PJOLcNZxYlVCTiFdqeE7BA55OwuBe0ivfdTfpVmw6BVU3D8GCDeuAb8kx40UFfaM/lYuCYyb7SILEECgYBW5MEtrejfFwbiJHe4TsZoXUWyoh7UswCgGYw1xA1FyQrPnQWS/KW5x6v9HRbMmpYaGnAbf/0LQPhWEc5OrKlcs8gCxYkg/pUd9ArBhWuHFsO6CWDuMUgPI7IEEqp9GYg9ugtqScme7cSw/5HS1jzRETI4vYjpGp/rAGDBFxZ0DwKBgD44sU+8FLAWHkCQU3kTQGc0mZMxAuJ92kD0z8k9w4Pr5i2FjKXrktQpdwjUrAQs+MiPH9HMgpGoIgyX8gSah7ZhICE49fpqYz07W6AEuFEgONZlZu/hppG1wzRgbcb40mnDlMfJRINIcoHo1zp6aXLTRAEY1wQ5WyKTarobjVoBAoGACDuq3jCOaYKoimt54H9msliQqjg9GUc35tCb4tuC7aZ2JaqG1RvCgRPS8JK92W++I1hOqBe35OLauq8cDLezoAw7uVQ/lzgBP/I5MoBXRbExtftoo2+cFT4dBQakPW1LP+p+eWCaV2C5txwWGA/d57i0X1Ax44hsX0AV/2PK7vk=",

        //异步通知地址
        'notify_url' => "http://www.watchleague.com/notify_url",

        //同步跳转
        'return_url' => "http://www.watchleague.com/return_url",

        //编码格式
        'charset' => "UTF-8",

        //签名方式
        'sign_type'=>"RSA",

        //支付宝网关
        'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
    );

    public function payPage(Request $request){

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $request->post('WIDout_trade_no');
 
        //订单名称，必填
        $subject = $request->post('WIDsubject');
 
        //付款金额，必填
        $total_amount = $request->post('WIDtotal_amount');
 
        //商品描述，可空
        $body = "";
 
        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
 
        $aop = new \AlipayTradeService($this->config);
 
        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response = $aop->pagePay($payRequestBuilder,$this->config['return_url'],$this->config['notify_url']);
 
    }
 
 
    public function notify_url(){
        $arr=$_POST;
        $alipaySevice = new \AlipayTradeService($this->config);
        $alipaySevice->writeLog(var_export($_POST,true));
        $result = $alipaySevice->check($arr);
 
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代
 
 
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
 
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
 
            //商户订单号
 
            $out_trade_no = $_POST['out_trade_no'];
 
            //支付宝交易号
 
            $trade_no = $_POST['trade_no'];
 
            //交易状态
            $trade_status = $_POST['trade_status'];
 
 
            if($_POST['trade_status'] == 'TRADE_FINISHED') {
 
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                //如果有做过处理，不执行商户的业务程序
 
                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                //如果有做过处理，不执行商户的业务程序
                //注意：
                //付款完成后，支付宝系统发送该交易状态通知
            }
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            echo "success";    //请不要修改或删除
        }else {
            //验证失败
            echo "fail";
 
        }
    }
 
    public function return_url(){
        $arr=$_GET;
        $alipaySevice = new \AlipayTradeService($this->config);
        $result = $alipaySevice->check($arr);
 
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码
 
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
 
            //商户订单号
            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
 
            //支付宝交易号
            $trade_no = htmlspecialchars($_GET['trade_no']);
 
            //将订单表中的支付状态更改为已支付，并将支付宝交易号写入数据表中
            Db::table('watch_order')->where('o_id',$out_trade_no)->update(['status'=>1]);
 
            $this->success('支付成功，跳转中...',"http://www.watchleague.com/show_user_center?2");
 
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
 
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "验证失败";
        }
    }
 

}