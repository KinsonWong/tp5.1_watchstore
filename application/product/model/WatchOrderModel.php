<?php

namespace app\product\model;
use think\Model;

class WatchOrderModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'watch_order';
    //设置自增id
    protected $pk = 'o_id';
}