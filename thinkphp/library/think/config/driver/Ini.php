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

namespace think\config\driver;

class Ini
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function parse()
    {
        if (is_file($this->config)) {
            return parse_ini_file($this->config, true);
        } else {
            return parse_ini_string($this->config, true);
        }
    }
}
