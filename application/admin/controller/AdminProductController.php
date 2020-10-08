<?php
namespace app\admin\controller;

use app\product\model\WatchImgModel;
use app\product\model\WatchModel;
use think\Controller;
use think\exception\DbException;
use think\facade\Session;
use think\Request;
use think\Exception;
use upload_util\UploadExtend;


class AdminProductController extends Controller
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
     * 显示所有的商品
     * @return mixed
     */
    public function show_watch_list()
    {
        $this->have_session();
        try {
            $watch_count = WatchModel::select();      
            $this->assign('watch_count', count($watch_count));     //商品总数
        } 
        catch (Exception $e) {
            $e->getMessage();
        }
        return $this->fetch('watch_list');
    }

    /**
     * 商品列表数据接口
     * @return mixed
     */
    public function get_watch_list()
    {
        try {
            $watch_list = WatchModel::select();
            $allcount = count($watch_list);   //商品总数
        
            $page=request()->param('page');
            $limit=request()->param('limit');
            $start=$limit*($page-1);

            //分页查询
            $watch = new WatchModel();
            $watchpage = $watch->order('bid','desc')->limit($start,$limit)->select();

            $res = [
                'code'=>0,
                'msg'=>'返回成功',
                'count'=>$allcount,
                'data'=>$watchpage
            ];
            } catch (DbException $e) {
        }

        return json($res);
    }

    /**
     * 显示添加商品界面
     * @return mixed
     */
    public function show_watch_add()
    {
        $this->have_session();
        $types = WatchModel::field("type")->distinct(true)->select();   //指定查询type字段,并去除重复值
        $brands = WatchModel::field("brand")->distinct(true)->select();   //指定查询brand字段,并去除重复值
        $this->assign('brands', $brands);  //手表品牌
        $this->assign('types', $types);   //手表类型
        return $this->fetch('watch_add');
    }

    /**
     * 显示编辑商品界面
     * @param $bid
     * @return mixed
     */
    public function show_watch_edit($bid)
    {
        $result = WatchModel::get($bid);
        $types = WatchModel::field("type")->distinct(true)->select();   //指定查询type字段,并去除重复值
        $brands = WatchModel::field("brand")->distinct(true)->select();   //指定查询brand字段,并去除重复值
        $this->assign('brands', $brands);  //手表品牌
        $this->assign('types', $types);   //手表类型
        $this->assign('result', $result);
        return $this->fetch('watch_edit');

    }


    /**
     * 添加商品
     * @param Request $request
     */
    public function watch_add(Request $request)
    {

        if (empty($request->file()['watch_img'][0])) {
            //$this->error('至少一张图片');
            $jsonRes = ['msg' => 0];// 至少上传一张图片，添加失败，返回json结果0
        } else {
            $watch_imgs = UploadExtend::upload_more($request->file('watch_img'), url_upload);
//            $image = Image::open(url_upload . $watch_imgs[0]);
//            $image->thumb(150, 150)->save(url_upload . $watch_imgs[0]);
            $watch = WatchModel::create([
                'bname' => $request->post('bname'),
                'detail' => $request->post('detail'),
                'modelcode' => $request->post('modelcode'),
                'price' => $request->post('price'),
                'type' => $request->post('type'),
                'brand' => $request->post('brand'),
                'store' => $request->post('store'),
                'cover' => $watch_imgs[0],
                'sell'=>0
            ]);
            if (count($watch_imgs) > 1) {
                for ($i = 1; $i < count($watch_imgs); $i++) {
                    $watchImg = WatchImgModel::create([
                        'b_id' => $watch->bid,
                        'img' => $watch_imgs[$i]
                    ]);
//                    $image = Image::open(url_upload . $watch_imgs[$i]);
//                    $image->thumb(150, 150)->save(url_upload . $watch_imgs[$i]);
                }
            }
            if (!empty($watchImg) || !empty($watch)) {
                //$this->success("添加成功！", url . 'show_watch_list');
                $jsonRes = ['msg' => 1];// 添加成功，返回json结果1
            }
        }
        return json($jsonRes);
    }

    /**
     * 编辑商品
     * @param Request $request
     * @return \think\response\Json
     */
    public function watch_edit(Request $request)
    {
        $watch = WatchModel::get($request->post('bid'));
        $result = $watch->save($request->post());
        if ($result) {
            $jsonRes = ['msg' => 1];  //编辑成功
        } else {
            $jsonRes = ['msg' => 0];   //编辑失败
        }

        return json($jsonRes);
    }

    /**
     * 删除单个商品
     * @param Request $request
     * @return \think\response\Json
     */
    public function watch_delete(Request $request)
    {
        try {
            $watch = WatchModel::get($request->post('bid'));
            if (!empty($watch)) {
                unlink(url_upload . $watch['cover']);     //删除图片
            }
            $watch_imgs = WatchImgModel::where('b_id', $request->post('bid'))->select();
            if (!empty($watch_imgs)) {
                foreach ($watch_imgs as $key => $watch_img) {
                    unlink(url_upload . $watch_img->img);  //删除其他图片
                }
            }
            $result = WatchModel::destroy($request->post('bid'));
            WatchImgModel::where('b_id', $request->post('bid'))->delete();
            if ($result) {
                $jsonRes = ['msg' => 1];     //删除成功
            } else {
                $jsonRes = ['msg' => 0];     //删除失败
            }
        } catch (Exception $e) {
            $jsonRes = ['msg' => $e->getMessage()];
        }
        return json($jsonRes);

    }

    /**
     * 批量删除商品
     * @param Request $request
     * @return \think\response\Json
     */
    public function watch_delete_s(Request $request)
    {
        $bids = implode(',', $request->post('bids'));  //数组组合成字符串
        try {
            $watches = WatchModel::all($request->post('bids'));  //根据bids查询记录
            foreach ($watches as $key => $watch) {
                unlink(url_upload . $watch->cover);   //删除封面图片文件
            }
            $result = WatchModel::destroy($request->post('bids'));
            $watch_imgs = WatchImgModel::where("b_id in ($bids)")->select();
            if (!empty($watch_imgs)) {
                foreach ($watch_imgs as $key => $watch_img) {
                    unlink(url_upload . $watch_img->img);  //删除其他图片
                }
            }
            WatchImgModel::where("b_id in ($bids)")->delete();   //删除记录
            if ($result > 0) {
                $jsonRes = ['msg' => 1];   //批量删除成功
            } else {
                $jsonRes = ['msg' => 0];   //批量删除失败
            }
        } catch (Exception $e) {
            $jsonRes = ['msg' => $e->getMessage()];
        }
        return json($jsonRes);

    }

    /**
     * 搜索商品
     * @param Request $request
     * @return \think\response\Json
     */
    public function search_watch(Request $request)
    {
        $name = $request->post('name');
        $page = $request->post('page');
        $limit = $request->post('limit');
        $start=$limit*($page-1);

        $watch = new WatchModel();
        $watchpage = $watch->order('bid','asc')->limit($start,$limit)->where('bname','like','%'.$name.'%')->select();
        $count = count($watchpage);

        $data = array(  // 拼装成为前端需要的JSON
            'code'=>0,
            'msg'=>'返回成功',
            'count'=>$count,
            'data'=>$watchpage
        );
        return json($data);

    }

}