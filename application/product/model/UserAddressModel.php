<?php

namespace app\product\model;


use think\Model;

class UserAddressModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'user_address';
    //设置自增id
    protected $pk = 'h_a_id';
}