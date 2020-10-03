<?php
namespace app\admin\controller;

use app\product\model\UserAddressModel;
use app\user\model\UserModel;
use think\Controller;
use think\exception\DbException;
use think\facade\App;
use think\facade\Session;
use think\Request;
use think\Exception;


class AdminMemberController extends Controller
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
     * 显示用户列表
     * @return mixed
     */
    public function show_member_list()
    {
        $this->have_session();   //判断管理员是否登录
        try {
            $user = new UserModel();
            $user_count = UserModel::select();
        } catch (DbException $e) {
        }
        //传递参数回页面
        $this->assign('user_count', count($user_count));
        return $this->fetch('member_list');   //渲染模板
    }

    /**
     * 用户列表数据接口
     * @return mixed
     */
    public function get_member_list()
    {
        try {
            $user_list = UserModel::select();
            $allcount = count($user_list);    //用户总数
        
            $page=request()->param('page');
            $limit=request()->param('limit');
            $start=$limit*($page-1);

            //分页查询
            $user = new UserModel();
            $userpage = $user->order('uid','asc')->limit($start,$limit)->select();

            $res = [
                'code'=>0,
                'msg'=>'返回成功',
                'count'=>$allcount,
                'data'=>$userpage
            ];
            } catch (DbException $e) {
        }

        return json($res);
    }

    /**
     * 显示用户添加页面
     * @return mixed
     */
    public function show_member_add()
    {
        $this->have_session();
        return $this->fetch('member_add');   //渲染模板
    }

    /**
     * 显示用户编辑
     * @param $uid
     * @return mixed
     */
    public function show_member_edit($uid)
    {
        $this->have_session();
        $user = UserModel::get($uid);
        //传递参数回页面
        $this->assign('user', $user);
        return $this->fetch('member_edit');
    }

     /**
     * 显示会员收货地址添加页面
     * @return mixed
     */
    public function show_address_add($uid)
    {
        $this->have_session();
        //传递参数回页面
        $this->assign('uid', $uid);
        return $this->fetch('address_add');
    }

    /**
     * 添加用户收货地址
     * @param Request $request
     */
    public function address_add(Request $request)
    {
        $address = UserAddressModel::create([
            'u_id' => $request->post('uid'),        //用户id
            'province' => $request->post('province'),    //省
            'city' => $request->post('city'),      //市
            'area' => $request->post('area'),      //区县
            'addr' => $request->post('addr'),     //详细地址
            'consignee' => $request->post('consignee'),   //收件人
            'contact' => $request->post('contact')     //联系方式
        ]);
        $jsonRes = ['msg' => 1];  //添加成功
        return json($jsonRes);
    }


    /**
     * 显示用户收货地址编辑
     * @param $h_a_id
     * @return mixed
     */
    public function show_address_edit($h_a_id)
    {
        $this->have_session();
        $address = UserAddressModel::get($h_a_id);
        //传递参数回页面
        $this->assign('address', $address);
        return $this->fetch('address_edit');
    }

    /**
     * 用户收货地址数据接口
     * @return mixed
     */
    public function get_address_list()
    {
        try {     
            $page=request()->param('page');
            $limit=request()->param('limit');
            $uid=request()->param('uid');
            $start=$limit*($page-1);

            //分页查询
            $address = new UserAddressModel();
            $addresspage = $address->where('u_id',$uid)->limit($start,$limit)->select();
            $allcount = count($addresspage);

            $res = [
                'code'=>0,
                'msg'=>'返回成功',
                'count'=>$allcount,
                'data'=>$addresspage
            ];
            } catch (DbException $e) {
        }

        return json($res);
    }

     /**
     * 用户删除
     * @param Request $request
     * @return \think\response\Json
     */
    public function member_delete(Request $request)
    {
        $result = UserModel::destroy($request->post('uid'));
        if ($result > 0) {
            $jsonRes = ['msg' => 1];   //删除成功
        } else {
            $jsonRes = ['msg' => 0];   //删除失败
        }
        return json($jsonRes);
    }

    /**
     * 用户批量删除
     * @param Request $request
     * @return \think\response\Json
     */
    public function member_delete_s(Request $request)
    {
        $result = UserModel::destroy($request->post('uids'));   //根据主键删除
        if ($result) {
            $jsonRes = ['msg' => 1];   //批量删除成功
        } else {
            $jsonRes = ['msg' => 0];   //批量删除失败
        }
        return json($jsonRes);
    }

    /**
     * 用户编辑
     * @param Request $request
     * @return \think\response\Json
     */
    public function member_edit(Request $request)
    {

        $user = UserModel::get($request->post('uid'));
        $result = $user->save($request->post());
        if ($result) {
            $jsonRes = ['msg' => 1];    //编辑成功
        } else {
            $jsonRes = ['msg' => 0];   //编辑失败
        }

        return json($jsonRes);
    }

    

    /**
     * 用户地址删除
     * @param Request $request
     * @return \think\response\Json
     */
    public function address_delete(Request $request)
    {
        try {     
            UserAddressModel::where('h_a_id', $request->id)->delete();     //删除对应地址
        } catch (Exception $e) {
            return json(['msg' => $e->getMessage()]);
        }
        return json(['msg' => 1]);
    }


    /**
     * 修改用户地址信息
     * @param Request $request
     * @return \think\response\Json
     */
    public function address_update(Request $request)
    {
        try {
            // 修改收货地址信息
            UserAddressModel::where('h_a_id', $request->h_a_id)->update([
                'consignee' => $request->consignee,   //收件人
                'province' => $request->province,    //省
                'city' => $request->city,     //市
                'area' => $request->area,     //区县
                'addr' => $request->addr,     //详细地址
                'contact' => $request->contact   //联系电话
            ]);
            return json(["msg" => 1]);
        } catch (Exception $e) {
            return json(["msg" => $e->getMessage()]);
        }
    }

}