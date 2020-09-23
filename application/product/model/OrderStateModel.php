<?php

namespace app\product\model;


use think\Model;

class OrderStateModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'order_state';
    //设置自增id
    protected $pk = 'os_id';
}