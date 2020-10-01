<?php

namespace app\index\controller;

use app\product\model\WatchModel;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\Request;

class IndexController extends Controller
{
    /**
     * 跳转到主页 默认显示新品类
     * @param int $type
     * @return mixed
     */
    public function show_index($type = 1)  
    {
        try {
            $randWatch=WatchModel::orderRaw('rand()')->find();
            $this->assign('randWatch', $randWatch);
        } catch (Exception $e) {
            $e->getMessage();
        }
        //新品类
        if ($type == 1) {
            $this->feature_watch();
            try {
                $new_watches = WatchModel::order('date desc')->limit(10)->select();  //按添加日期降序
                $this->assign('type', 1);
                $this->assign('watches', $new_watches);
            } catch (Exception $e) {
                $e->getMessage();
            }
        } 
        // 畅销类
        else if ($type == 2) {
            $this->feature_watch();
            try {
                $sell_watches = WatchModel::order('sell desc')->limit(10)->select();  //按销量降序
                $this->assign('type', 2);
                $this->assign('watches', $sell_watches);
            } catch (Exception $e) {
                $e->getMessage();
            }
        } 
        //主打类
        else {
            $this->feature_watch();
            try {
                $main_watches = WatchModel::orderRaw('rand()')->limit(10)->select();  //随机选择
                $this->assign('type', 3);
                $this->assign('watches', $main_watches);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
        return $this->fetch("index");
    }

    /**
     * 查询特色手表
     */
    public function feature_watch()
    {
        try {
            $main_watches1 = WatchModel::orderRaw('rand()')->limit(10)->select();  //使用mysql的rand（）方法
            $main_watches2 = WatchModel::orderRaw('rand()')->limit(10)->select();  //使用mysql的rand（）方法
            $this->assign('featureOne', $main_watches1);
            $this->assign('featureTwo', $main_watches2);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * 跳转到品牌故事页面
     * @return mixed
     */
    public function show_brand_story()  
    {
        return $this->fetch("brand_story");
    }
}

