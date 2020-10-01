<?php
namespace app\user\controller;

use app\product\model\WatchModel;
use app\product\model\WatchOrderModel;
use app\product\model\UserAddressModel;
use app\product\model\OrderDetailModel;
use app\user\extend\UserExtend;
use app\user\model\UserModel;
use app\user\model\UserLogModel;
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


    /**
     * 忘记密码时检查用户邮箱是否存在
     * @param Request $request
     * @return \think\response\Json
     */
    public function email_check(Request $request)
    {
        $email = $request->email;//获取邮箱
        $jsonRes = UserExtend::select_email($email);    //邮箱不存在结果为0， 邮箱存在结果为1
        return json($jsonRes);//返回json数据
    }

        /**
     * 用户忘记密码重置
     * @param Request $request
     * @return \think\response\Json
     */
    public function user_reset_password(Request $request)
    {
        $checkRes = UserExtend::select_email($request->email);
        if ($checkRes['msg'] == 0) {
            $jsonRes = ['msg' => 0];    //邮箱信息不存在,返回0
        } else {
            $password = $request->password;//获取用户密码
            $password_confirm = $request->password_confirm;//获取用户的确认密码
            $phone = $request->phone;//获取用户电话
            $email = $request->email;//获取用户邮箱
            $province = $request->province;//获取用户省
            $city = $request->city;//获取用户市
            $area = $request->area;//获取用户区县
            
            $map['phone'] = $phone;   //筛选条件
            $map['email'] = $email;   //筛选条件
            $map['province'] = $province;   //筛选条件
            $map['city'] = $city;   //筛选条件
            $map['area'] = $area;   //筛选条件

            $result = UserModel::where($map)->find();
            if (empty($result)) {
                $jsonRes = ['msg' => 1];    //用户信息错误或不存在,返回1
            }else{
                if($password != $password_confirm){
                    $jsonRes = ['msg' => 2];    //两次输入密码不一致,返回2
                }else{
                    $res = UserModel::where('email',$email)->update(['password' => $password]);
                    if($res){
                        $jsonRes = ['msg' => "success"];//修改密码成功 
                    }else{
                        $jsonRes = ['msg' => "fail"];//修改密码失败 
                    }
                }
            }
        }
        return json($jsonRes);   //返回json数据
    }


    /** 跳转到登录页面
     * @return mixed
     */
    public function show_login()
    {
        return $this->fetch("login"); // 请求该方法，跳转到登录页面
    }

    /** 跳转到忘记密码页面
     * @return mixed
     */
    public function show_forget_password()
    {
        return $this->fetch("forget_password"); // 请求该方法，跳转到登录页面
    }


    /** 跳转到用户个人中心页面
     * @return mixed
     */
    public function show_user_center()
    {
        $uid = Session::get('uid');

        //用户基本信息
        $usermodel = new UserModel();
        $user = $usermodel->get($uid);

        //用户订单信息
        $user_order = WatchOrderModel::where('u_id', $uid)->select();
        //$user_order 与 $order_item 指向同一内容
        foreach ($user_order as &$order_item) {
            $user2 = UserAddressModel::where('h_a_id', $order_item['h_a_id'])->find();
            $order_item['user']=$user2;
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

         //用户收货地址信息
         $addressmodel = new UserAddressModel();
         $address = $addressmodel->where('u_id',$uid)->select();

         //用户登录日志
         $user_log = UserLogModel::where('user_id',$uid)->limit(10)->order('log_id','desc')->select();

        $this->assign('user', $user);  
        $this->assign('address', $address); 
        $this->assign('user_orders', $user_order); 
        $this->assign('user_log', $user_log); 
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
        $res = UserModel::where([
            "username" => $request->username
        ])->find();
        try {
            if(!$captcha->check($code)){
                $jsonRes = ['msg' => "验证码错误！"];// 登录失败，验证码错误
                UserLogModel::create([
                    'user_id'=> $res['uid'],
                    'username'=>$request->username,
                    'ip'=> $request->ip(),
                    'login_time'=> date("Y-m-d H:i:s"),
                    'description'=> "登录失败：验证码错误！"
                ]);
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
                    UserLogModel::create([
                        'user_id'=> $result['uid'],
                        'username'=>$request->username,
                        'ip'=> $request->ip(),
                        'login_time'=> date("Y-m-d H:i:s"),
                        'description'=> "登录成功！"
                    ]);
                } else {
                    $jsonRes = ["msg" => "用户名或密码错误！"]; // 登录失败
                    UserLogModel::create([
                        'user_id'=> $result['uid'],
                        'username'=>$request->username,
                        'ip'=> $request->ip(),
                        'login_time'=> date("Y-m-d H:i:s"),
                        'description'=> "登录失败：密码错误！"
                    ]);
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


    /**
     * 修改密码
     * @param Request $request
     * @return \think\response\Json
     */
    public function change_password(Request $request)
    {
        $password=$request->password;
        $password_confirm=$request->confirm_password;
        if($password_confirm!=$password){
            return json(['msg' => 2]);
        }else{
        try {
            UserModel::where('uid', $request->uid)->update([
                'password' => $password  
            ]);
        } catch (Exception $e) {
            return json(['msg' => $e->getMessage()]);
        }
        return json(['msg' => 1]);
        }
    }

    /**
     * 用户添加收货地址
     * @param Request $request
     * @return \think\response\Json
     */
    public function user_add_address(Request $request)
    {
        $data = [
            'u_id' => $request->uid,//获取用户id
            'consignee' => $request->consignee,//获取收件人姓名
            'contact' => $request->contact,//获取联系电话
            'province' => $request->province,//获取省
            'city' => $request->city,//获取市
            'area' => $request->area,//获取区县  
            'addr' => $request->addr //获取详细地址 
        ];
        
        UserAddressModel::create($data);//添加收货地址到数据库
        $jsonRes = ['msg' => "success"];//添加成功 
        return json($jsonRes);//返回json数据
    }

}