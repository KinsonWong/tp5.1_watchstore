<?php
namespace app\user\controller;

use app\product\model\WatchModel;
use app\product\model\WatchOrderModel;
use app\product\model\UserAddressModel;
use app\product\model\OrderDetailModel;
use app\user\extend\UserExtend;
use app\user\model\UserModel;
use app\user\validate\UserValidate;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\Request;
use think\facade\Session;
use think\captcha\Captcha;

class UserController extends Controller
{

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
     * 显示注册页面
     * @return mixed
     */
    public function show_register()
    {
        return $this->fetch("register");//跳转到注册页面
    }

    /**
     * 用户注册
     * @param Request $request
     * @return \think\response\Json
     */
    public function user_register(Request $request)
    {
        $time = date('Y-m-d', time());
        $checkRes = UserExtend::select_username($request->username);
        if ($checkRes['msg'] == 0) {
            $jsonRes = ['msg' => 9];
        } else {
            $data = [
                'name' => $request->username,//获取用户名
                'password' => $request->password,//获取用户密码
                'password_confirm' => $request->password_confirm,//获取用户的确认密码
                'phone' => $request->phone,//获取用户电话
                'email' => $request->email,//获取用户邮箱
                'province' => $request->province,//获取用户省
                'city' => $request->city,//获取用户市
                'area' => $request->area//获取用户区县   
            ];
            $validate = new UserValidate();   //实例化用户验证模型
            if (!$validate->check($data)) {
                $jsonRes = ['msg' => $validate->getError()];//验证不通过,获得验证不通过的信息
            } else {
                $result = UserModel::create($request->post());//添加用户的数据到数据库
                if ($result) {
                    UserModel::where('username',$request->username)->update([
                        'registertime' => $time   //注册日期
                    ]);
                    $jsonRes = ['msg' => "success"];//添加用户信息成功
                } else {
                    $jsonRes = ['msg' => "fail"];//添加用户信息失败
                }
            }
        }
        return json($jsonRes);//返回json数据
    }

    /**
     * 检查用户名是否重复
     * @param Request $request
     * @return \think\response\Json
     */
    public function user_check(Request $request)
    {
        $username = $request->username;//获取用户名
        $jsonRes = UserExtend::select_username($username);    //用户名有重复 结果为0，无重复 结果为1
        return json($jsonRes);//返回json数据
    }


    /** 跳转到登录页面
     * @return mixed
     */
    public function show_login()
    {
        return $this->fetch("login"); // 请求该方法，跳转到登录页面
    }


    /** 跳转到用户个人中心页面
     * @return mixed
     */
    public function show_user_center()
    {
        $uid = Session::get('uid');
        $usermodel = new UserModel();
        $user = $usermodel->get($uid);

        $addressmodel = new UserAddressModel();
        $address = $addressmodel->get($uid);
        
        $this->assign('user', $user);  
        $this->assign('address', $address);  
        return $this->fetch("user_center"); // 请求该方法，跳转到个人中心页面
    }


    /**
     * 判断用户名或密码是否正确，然后输出相关信息。
     * @param Request $request
     * @return \think\response\Json
     */
    public function user_login(Request $request)
    {
        $captcha = new Captcha();
        $code=$request->post('code');
        try {
            if(!$captcha->check($code)){
                $jsonRes = ['msg' => "验证码错误！"];// 登录失败，验证码错误
            }
            else{
                $result = UserModel::where([
                    "username" => $request->username,
                    "password" => $request->password
                ])->find();
                if (!empty($result)) {
                    // 登录成功  设置session
                    Session::set("username", $request->username); 
                    Session::set("uid", $result["uid"]);
                    $jsonRes = ['msg' => 1];     //登录成功
                } else {
                    $jsonRes = ["msg" => "用户名或密码错误！"]; // 登录失败
                }
            }       
        } catch (Exception $e) {
            $jsonRes = ["msg" => $e->getMessage()];
        }
        return json($jsonRes);
    }

    /**
     * 用户注销
     * @return mixed
     */
    public function user_logout()
    {
        //删除session
        Session::delete('username');
        Session::delete('uid');
        Session::delete('cart');
        $this->success('退出成功!', url . 'show_index');  //跳转回主页
    }

    /**
     * 获取用户订单信息
     * @return mixed
     */
    public function show_user_order()
    {
        //从session获取uid
        $uid = Session::get('uid');
        try {
            // 判断是否登录
            $this->have_session();
            $user_order = WatchOrderModel::where('u_id', $uid)->select();

            //$user_order 与 $order_item 指向同一内容
            foreach ($user_order as &$order_item) {
                $user = UserAddressModel::where('h_a_id', $order_item['h_a_id'])->find();
                $order_item['user']=$user;
                $order_details = OrderDetailModel::where('b_o_id', $order_item['o_id'])->select();
                foreach ($order_details as &$order_detail) {
                    $watch_name = WatchModel::get($order_detail['b_id']);
                    $watch_name['user_buy_num'] = OrderDetailModel::where('b_id',$watch_name['bid'])->value('num');  //获取一种商品用户购买数量
                    //print_r($watch_name);
                    $watchInfo[] = $watch_name;
                    $order_item['bname'] = $watchInfo;
                }
                unset($watchInfo); //销毁变量
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        
        $this->assign('user_orders', $user_order);
        return $this->fetch('user_order');
    }

    /**
     * 订单确认收货
     * @param Request $request
     * @return \think\response\Json
     */
    public function receive_confirm(Request $request)
    {
        try {
            //直接修改status字段为3（已收货）
            WatchOrderModel::where('o_id', $request->oid)->update([
                'status' => 3
            ]);
        } catch (Exception $e) {
            return json(['msg' => $e->getMessage()]);
        }
        return json(['msg' => 1]);
    }

}