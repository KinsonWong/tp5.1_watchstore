<?php
namespace app\admin\controller;

use think\facade\Session;
use think\Controller;

class AdminSystemController extends Controller{

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
     * 获取文件夹下文件的数量
     * @param $url 传入一个url如：/apps/web
     * @return int 返回文件数量
     */
    public function getFileNumber($url){
        $num=0;
        $arr = glob($url);
        foreach ($arr as $v) {
            if(is_file($v)) {
                $num++;
            }
            else {
                $num+=$this->getFileNumber($v."/*");
            }
        }
        return $num;
    }


    /**
     * 获取文件夹大小
     */
    public function getDirSize($dir){ 
        $sizeResult=0;
        $handle = opendir($dir);
        while (false!==($FolderOrFile = readdir($handle))){ 
            if($FolderOrFile != "." && $FolderOrFile != "..") { 
                if(is_dir("$dir/$FolderOrFile"))
                { 
                    $sizeResult += $this->getDirSize("$dir/$FolderOrFile"); 
                }else{ 
                    $sizeResult += filesize("$dir/$FolderOrFile"); 
                }
            } 
        }
        closedir($handle);
        return $sizeResult;
        }


    /**
     * 单位自动转换函数
     */
    public function getRealSize($size)
    { 
        $kb = 1024;   // Kilobyte
        $mb = 1024 * $kb; // Megabyte
        $gb = 1024 * $mb; // Gigabyte
        $tb = 1024 * $gb; // Terabyte
        if($size < $kb){ 
            return $size." B";
        }else if($size < $mb){ 
            return round($size/$kb,2)." KB";
        }else if($size < $gb){ 
            return round($size/$mb,2)." MB";
        }else if($size < $tb){ 
            return round($size/$gb,2)." GB";
        }else{ 
            return round($size/$tb,2)." TB";
        }
    }

    /**
     * 显示系统工具页面
     */
    public function show_system_view()
    {
        $this->have_session();
        $temp_count=$this->getFileNumber('runtime/temp');
        $temp_size=$this->getRealSize($this->getDirSize('runtime/temp'));

        $log_count=$this->getFileNumber('runtime/log');
        $log_size=$this->getRealSize($this->getDirSize('runtime/log'));

        $this->assign('temp_count', $temp_count);
        $this->assign('log_count', $log_count);
        $this->assign('temp_size', $temp_size);
        $this->assign('log_size', $log_size);


        return $this->fetch('system_view');  //渲染模板
    }

    /**
     * 删除文件夹内文件
     */
    public function delFileUnderDir($dirName)
    {
        if($handle = opendir("$dirName")){
            while(false !== ( $item = readdir($handle))){
                if($item != "." && $item != ".." ){
                    if(is_dir("$dirName/$item" )){
                        $this->delFileUnderDir( "$dirName/$item");
                    }else{
                        unlink("$dirName/$item");
                    }
                }
            }
            closedir($handle);
        }
    }

    /**
     * 删除临时文件
     */
    public function delTemp(){
        try{
            $this->delFileUnderDir('runtime/temp');
            $jsonRes = ['msg' => 1];
        }catch (Exception $e) {
            $jsonRes = ['msg' => $e->getMessage()];
        }
        return json($jsonRes);
    }


    /**
     * 删除日志文件
     */
    public function delLog(){
        try{
            $this->delFileUnderDir('runtime/log');
            $jsonRes = ['msg' => 1];
        }catch (Exception $e) {
            $jsonRes = ['msg' => $e->getMessage()];
        }
        return json($jsonRes);
    }


}