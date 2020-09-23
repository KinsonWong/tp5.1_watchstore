<?php
namespace app\product\model;
use think\Model;

class WatchModel extends Model{
    //设置自增id
    protected $pk='bid';
    //自动写入时间戳
    protected $autoWriteTimestamp = 'datetime';
    //数据库中对应的字段
    protected $createTime = 'date';
}