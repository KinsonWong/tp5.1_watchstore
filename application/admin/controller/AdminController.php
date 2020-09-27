<?php
namespace app\admin\controller;

use app\admin\model\AdminModel;
use app\product\model\WatchModel;
use app\product\model\WatchOrderModel;
use app\user\model\UserModel;
use think\Controller;
use think\Db;
use think\exception\DbException;
use think\facade\App;
use think\facade\Session;
use think\Request;
use think\Exception;
use think\captcha\Captcha;


class AdminController extends Controller
{
    /**
     * 显示管理员登录页面
     * @return mixed
     */
    public function show_admin_login()
    {
        return $this->fetch('login');
    }

    /**
     * 管理员登录
     * @param Request $request
     */
    public function admin_login(Request $request)
    {
        $captcha = new Captcha();    //实例化验证码包
        $code=$request->post('code');   //接收验证码
        try {
            if(!$captcha->check($code)){
                $jsonRes = ['msg' => 3];// 登录失败，验证码错误，返回json结果3
            }
            else{
                $result = AdminModel::where([
                    'username' => $request->post('username'),
                    'password' => $request->post('password')
                ])->find();
                if (!empty($result)) {
                    Session::set('admin', $request->post('username'));
                    $jsonRes = ['msg' => 1];// 登录成功，返回json结果1
                } else {
                    $jsonRes = ['msg' => 2];// 登录失败，用户名或密码错误，返回json结果2
                }
            } 
        } catch (Exception $e) {
            $e->getMessage();
        }
        return json($jsonRes);   //返回json结果
    }

    /**
     * 管理员退出
     */
    public function admin_logout()
    {
        Session::delete('admin');
        $this->success('退出成功', url . 'show_admin_login');
    }

    /**
     * 显示管理员主页
     * @return mixed
     */
    public function show_admin_index()
    {
        $this->have_session();
        return $this->fetch('index');  //渲染模板
    }

    /**
     * 显示欢迎页面的基本信息
     * @return mixed
     */
    public function show_admin_welcome()
    {
        $this->have_session();
        $time = date('Y-m-d H:i', time());     
        $order_count = WatchOrderModel::select();//查询订单数量
        $user_count = UserModel::select();//查询用户数量
        $watch_count = WatchModel::select();//查询商品的数量
        $count = ['user_count' => count($user_count), 'watch_count' => count($watch_count), 'order_count' => count($order_count)];//将三种数量放入集合
        $version = Db::query('SELECT VERSION() AS ver');//查询数据库版本
        $info = array(
            'system_os' => PHP_OS,
            'php_version' => PHP_VERSION,
            'env_version' => $_SERVER['SERVER_SOFTWARE'],
            'run_method' => php_sapi_name(),
            'tp_version' => App::version(),
            'upload_limit' => ini_get('upload_max_filesize'),
            'mysql_version' => $version[0]['ver'],
            'run_time' => ini_get('max_execution_time') . '秒',
            'server_ip' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            'su_space' => round((disk_free_space('.') / (1024 * 1024)), 2) . 'M',

        );//查询一系列的系统信息并传递回模板页面
        $this->assign('info', $info);
        $this->assign('time', $time);
        $this->assign('count', $count);
        return $this->fetch('welcome');   //渲染模板
    }

    /**
     * 判断管理员是否登录
     */
    public function have_session()
    {
        if (empty(Session::get('admin'))) {
            $this->error('当前未登录', url . 'show_admin_login');
        }
    }

    /**
     * 显示管理员修改密码页面
     * @return mixed
     */
    public function show_admin_resetPWD()
    {
        $this->have_session();
        return $this->fetch('resetPWD');  //渲染模板
    }

    /**
     * 管理员修改密码
     * @return mixed
     */
    public function admin_resetPWD(Request $request)
    {
        $username=$request->post('username');
        $PWD=$request->post('password');
        $PWD_Rept=$request->post('password_confirm');
        if($PWD!=$PWD_Rept){
            $jsonRes = ['msg' => 0];// 两次密码不一致，返回json结果0
        }else{
            AdminModel::where('username',$username)->update(['password'=> $PWD]);
            $jsonRes = ['msg' => 1];// 修改密码成功，返回json结果1
        }
        return json($jsonRes);
    }

}