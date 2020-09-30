<?php
namespace app\admin\controller;

use think\Controller;
use think\exception\DbException;
use app\user\model\UserLogModel;
use think\facade\Session;
use think\Request;
use think\Exception;

class AdminLogController extends Controller
{
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
     * 显示会员登录日志列表
     * @return mixed
     */
    public function show_userlog_list()
    {
        $this->have_session();   //判断管理员是否登录
        try {
            $log_count = UserLogModel::select();
        } catch (DbException $e) {
        }
        //传递参数回页面
        $this->assign('log_count', count($log_count));
        return $this->fetch('userlog_list');   //渲染模板
    }


    /**
     * 会员登录日志列表数据接口
     * @return mixed
     */
    public function get_userlog_list()
    {
        try {
            $userlog_list = UserLogModel::select();
            $allcount = count($userlog_list);    //用户总数
        
            $page=request()->param('page');
            $limit=request()->param('limit');
            $start=$limit*($page-1);

            //分页查询
            $userlog = new UserLogModel();
            $userlogpage = $userlog->order('log_id','desc')->limit($start,$limit)->select();

            $res = [
                'code'=>0,
                'msg'=>'返回成功',
                'count'=>$allcount,
                'data'=>$userlogpage
            ];
            } catch (DbException $e) {
        }

        return json($res);
    }

    /**
     * 日志删除
     * @param Request $request
     * @return \think\response\Json
     */
    public function userlog_delete(Request $request)
    {
        $result = UserLogModel::destroy($request->post('log_id'));
        if ($result > 0) {
            $jsonRes = ['msg' => 1];   //删除成功
        } else {
            $jsonRes = ['msg' => 0];   //删除失败
        }
        return json($jsonRes);
    }

    /**
     * 日志批量删除
     * @param Request $request
     * @return \think\response\Json
     */
    public function userlog_delete_s(Request $request)
    {
        $result = UserLogModel::destroy($request->post('log_ids'));   //根据主键删除
        if ($result) {
            $jsonRes = ['msg' => 1];   //批量删除成功
        } else {
            $jsonRes = ['msg' => 0];   //批量删除失败
        }
        return json($jsonRes);
    }


    /**
     * 搜索会员登录日志
     * @param Request $request
     * @return \think\response\Json
     */
    public function search_log(Request $request)
    {
        $username = $request->post('username');
        $page = $request->post('page');
        $limit = $request->post('limit');
        $start=$limit*($page-1);

        $logpage = UserLogModel::order('log_id','desc')->limit($start,$limit)->where('username','like','%'.$username.'%')->select();
        $count = count($logpage);

        $data = array(  // 拼装成为前端需要的JSON
            'code'=>0,
            'msg'=>'返回成功',
            'count'=>$count,
            'data'=>$logpage
        );
        return json($data);

    }


}