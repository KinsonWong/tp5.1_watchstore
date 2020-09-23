<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: kinson <437241304@qq.com>
// +----------------------------------------------------------------------

namespace think\route\dispatch;

use think\route\Dispatch;

class Response extends Dispatch
{
    public function exec()
    {
        return $this->dispatch;
    }

}
