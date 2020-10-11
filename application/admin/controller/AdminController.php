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
        $captcha = new Captcha();    //实例化验证码拓展包
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

    function arr_format($arr){
        $res = array();
        foreach ( $arr as $key => $value ) {
            foreach( $value as $k=>$v ){
                    if ( isset($res[$key][$k]) ){
                        if ( $k == 'orderdate' ) { // 相同键值相加
                            $res[$key][$k] += $v;
                        }
                    }else{
                        $res[$key][$k] = $v;
                    }
                
            }
        }
        return $res;
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
     * @param Request $request
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

    /**
     * 获取近7日订单每日总数数据
     * @return mixed
     */
    public function get_week_order_data(){
        try {     
            $nowdate = date('Y-m-d', time());
            $beginDate = date('Y-m-d', strtotime('-6 days'));

            $keys = array_map(function ($time) {
            return date("Y-m-d", $time);
            }, range(strtotime($beginDate), strtotime($nowdate),24 * 3600));

            $list=[];
            for($i=0;$i<count($keys);$i++){
                $list[$i]=array('orderdate'=>$keys[$i],'count'=>0);
            }
        
        $sql = "SELECT str_to_date( date, '%Y-%m-%d' ) AS orderdate,count(*) as count FROM watch_order 
            WHERE str_to_date( date, '%Y-%m-%d' )>'$beginDate' AND str_to_date( date, '%Y-%m-%d' )<='$nowdate' GROUP BY str_to_date( date, '%Y-%m-%d' )";
        $result = Db::query($sql);

        $Data = array_merge_recursive($list, $result);
        $Data = array_unique($Data, SORT_REGULAR);

        $new = [];
        foreach($Data as $k => $v){
            if(isset($new[$v['orderdate']])){
            $new[$v['orderdate']]['count'] += $v['count'];
            }else{
                $new[$v['orderdate']] = $v;
            }
        }
        $new = array_values($new);

        $date = array_column($new,'orderdate');
        array_multisort($date,SORT_ASC,$new);
  
            $res = [
                'code'=>200,
                'result'=>$new
            ];
            } catch (DbException $e) {
        }
        return json($res);
    }

    /**
     * 获取近7日订单每日销售额数据
     * @return mixed
     */
    public function get_week_order_sell(){
        try {     
            $nowdate = date('Y-m-d', time());
            $beginDate = date('Y-m-d', strtotime('-6 days'));

            $keys = array_map(function ($time) {
            return date("Y-m-d", $time);
            }, range(strtotime($beginDate), strtotime($nowdate),24 * 3600));

            $list=[];
            for($i=0;$i<count($keys);$i++){
                $list[$i]=array('orderdate'=>$keys[$i],'sell'=>0);
            }
        
        $sql = "SELECT str_to_date( date, '%Y-%m-%d' ) AS orderdate,sum(pay) as sell FROM watch_order 
            WHERE str_to_date( date, '%Y-%m-%d' )>'$beginDate' AND str_to_date( date, '%Y-%m-%d' )<='$nowdate' GROUP BY str_to_date( date, '%Y-%m-%d' )";
        $result = Db::query($sql);

        $Data = array_merge_recursive($list, $result);
        $Data = array_unique($Data, SORT_REGULAR);

        $new = [];
        foreach($Data as $k => $v){
            if(isset($new[$v['orderdate']])){
            $new[$v['orderdate']]['sell'] += $v['sell'];
            }else{
                $new[$v['orderdate']] = $v;
            }
        }
        $new = array_values($new);

        $date = array_column($new,'orderdate');
        array_multisort($date,SORT_ASC,$new);
  
            $res = [
                'code'=>200,
                'result'=>$new
            ];
            } catch (DbException $e) {
        }
        return json($res);
    }

}