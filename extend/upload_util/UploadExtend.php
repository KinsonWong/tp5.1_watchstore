<?php


namespace upload_util;
class UploadExtend
{
    
    //上传多张图片
    public static function upload_more($files,$url)
    {
        $i = 0;
        $data =[count($files)];  //创建数组
        foreach ($files as $file) {
            // 移动到应用根目录/uploads/ 目录下
            $info = $file->validate(['size' => 4194304, 'ext' => 'jpg,png,gif'])->rule('uniqid')->move($url);
            if ($info) {
                $data[$i] = $info->getFilename();
            } else {
                // 上传失败获取错误信息
                //echo $file->getError();
                return 1;
            }
            $i++;
        }
        return $data;
    }

    //上传单张图片
    //public static function upload_one($file,$url)
    //{
    //    $info = $file->validate(['size' => 4194304, 'ext' => 'jpg,png,gif'])->rule('uniqid')->move($url);
    //    if ($info) {
    //        $name = $info->getFilename();
    //    } else {
    //        return $info->getError();
    //    }
    //    return $name;
    //}

    //上传单张图片
    //public static function upload_one($file,$url)
    //{
        //$info = $file->validate(['size' => 4194304, 'ext' => 'jpg,png,gif'])->rule('uniqid')->move($url);
        //if ($info) {
            //$name = $info->getFilename();
        //} else {
            //return $info->getError();
        //}
        //return $name;
    //}

}
