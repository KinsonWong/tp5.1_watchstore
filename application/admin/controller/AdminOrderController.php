<?php
namespace app\admin\controller;

use app\product\model\UserAddressModel;
use app\product\model\OrderStateModel;
use app\product\model\OrderDetailModel;
use app\product\model\WatchModel;
use app\product\model\WatchOrderModel;
use think\Controller;
use think\exception\DbException;
use think\facade\Session;
use think\Request;
use think\Exception;


class AdminOrderController extends Controller
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
     * 显示订单列表
     * @return mixed
     */
    public function show_order_list()
    {
        // 判断是否登录
        $this->have_session();
        try {
            $order_count = WatchOrderModel::select();      
            $this->assign('order_count', count($order_count));
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        return $this->fetch('order_list');
    }


    /**
     * 订单列表数据接口
     * @return mixed
     */
    public function get_order_list()
    {
        try {
            $order_list = WatchOrderModel::select();
            $allcount = count($order_list);

            $page=request()->param('page');
            $limit=request()->param('limit');
            $start=$limit*($page-1);

            $WatchOrderModel = new WatchOrderModel();
            $watchOrderData = $WatchOrderModel->order('o_id','desc')->limit($start,$limit)->select();

            foreach ($watchOrderData as &$watchOrderItem) {
                $watchOrderItem['status'] = OrderStateModel::where('os_id', $watchOrderItem['status'])->value('state');   //获取发货状态字段
                $userAddrInfo = UserAddressModel::where('h_a_id', $watchOrderItem['h_a_id'])->find();   //返回一个一维数组
                $orderDetails = OrderDetailModel::where('b_o_id',$watchOrderItem['o_id'])->select();
                if ($userAddrInfo == null) {
                    $this->error('订单数据显示错误：没有找到相应的用户收件地址');
                }
                $watchOrderItem['consignee'] = $userAddrInfo['consignee'];// 收货人
                $watchOrderItem['addr'] = $userAddrInfo['addr'];// 收货地址
                $watchOrderItem['contact'] = $userAddrInfo['contact'];// 电话
                foreach ($orderDetails as &$orderDetail) {
                    $watch_in_order = WatchModel::get($orderDetail['b_id']);   //订单中的商品
                    $map['b_id'] = $watch_in_order['bid'];   //筛选条件
                    $map['b_o_id'] = $watchOrderItem['o_id'];  //筛选条件
                    $watch_in_order['buy_num'] = OrderDetailModel::where($map)->value('num');  //获取订单中一种商品用户购买数量
                    //print_r($watch_in_order);
                    $watchInfo[] = $watch_in_order;  //数组
                    $watchOrderItem['bname'] = $watchInfo;  
                }
                unset($watchInfo); //销毁变量
            }
            $res = [
                'code'=>0,
                'msg'=>'返回成功',
                'count'=>$allcount,
                'data'=>$watchOrderData
            ];
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        return json($res);   //返回json结果
    }


    /**
     * 展示订单修改页面
     * @param Request $request
     * @return mixed
     */
    public function show_order_edit(Request $request)
    {
        try {
            // 判断是否登录
            $this->have_session();
            // 通过订单ID查询并显示某个订单信息
            $orderData = WatchOrderModel::where('o_id', $request->oid)->select();
            $orderData[0]['status'] = OrderStateModel::where('os_id', $orderData[0]['status'])->value('state');
            $userAddrInfo = UserAddressModel::where('h_a_id', $orderData[0]['h_a_id'])->select();   //返回二维数组
            if (count($userAddrInfo) == 0) {
                $this->error('订单数据显示错误：没有找到相应的用户收件地址');
            }
            $orderData[0]['consignee'] = $userAddrInfo[0]['consignee'];// 收货人
            $orderData[0]['province'] = $userAddrInfo[0]['province'];// 省
            $orderData[0]['city'] = $userAddrInfo[0]['city'];// 市
            $orderData[0]['area'] = $userAddrInfo[0]['area'];// 区/县
            $orderData[0]['addr'] = $userAddrInfo[0]['addr'];// 详细地址
            $orderData[0]['contact'] = $userAddrInfo[0]['contact'];// 电话
            $orderData[0]['h_a_id'] = $userAddrInfo[0]['h_a_id'];// 电话
            $this->assign('order_data', $orderData);
            // 获取所有订单状态
            $this->assign('order_status', OrderStateModel::select());
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        return $this->fetch('order_edit');
    }


    /**
     * 订单发货
     * @param Request $request
     * @return \think\response\Json
     */
    public function order_deliver(Request $request)
    {
        try {
            // 判断是否登录
            $this->have_session();
            //直接修改status字段为2（已发货）
            WatchOrderModel::where('o_id', $request->oid)->update([
                'status' => 2,
                'expressNum' => $request->expressNum  
            ]);
        } catch (Exception $e) {
            return json(['msg' => $e->getMessage()]);
        }
        return json(['msg' => 1]);
    }

    /**
     * 订单删除
     * @param Request $request
     * @return \think\response\Json
     */
    public function order_delete(Request $request)
    {
        try {
            // 判断是否登录
            $this->have_session();
            WatchOrderModel::where('o_id', $request->oid)->delete();     //删除对应订单
            OrderDetailModel::where('b_o_id',$request->oid)->delete();   //删除对应订单详情
        } catch (Exception $e) {
            return json(['msg' => $e->getMessage()]);
        }
        return json(['msg' => 1]);
    }

    /**
     * 删除多个订单
     * @param Request $request
     * @return \think\response\Json
     */
    public function order_delete_s(Request $request)
    {
        try {
            // 判断是否登录
            $this->have_session();
            WatchOrderModel::destroy($request->oids);    //根据主键删除
            OrderDetailModel::destroy(['b_o_id'=>$request->oids]);
        } catch (Exception $e) {
            return json(['msg' => $e->getMessage()]);
        }
        return json(['msg' => 1]);
    }


    /**
     * 修改订单信息
     * @param Request $request
     * @return \think\response\Json
     */
    public function order_update(Request $request)
    {
        try {
            // 判断是否登录
            $this->have_session();
            // 修改订单信息
            WatchOrderModel::where('o_id', $request->oid)->update([
                'status' => $request->status,       //发货状态
                'all_price' => $request->all_price,   //总金额
                'discounts' => $request->discounts,   //优惠金额
                'pay' => $request->pay,       //实付金额
                'expressNum' => $request->expressNum   //快递单号
            ]);
            // 修改收货信息
            UserAddressModel::where('h_a_id', $request->h_a_id)->update([
                'consignee' => $request->consignee,
                'province' => $request->province,
                'city' => $request->city,
                'area' => $request->area,
                'addr' => $request->addr,
                'contact' => $request->contact
            ]);
            return json(["msg" => 1]);
        } catch (Exception $e) {
            return json(["msg" => $e->getMessage()]);
        }
    }


}