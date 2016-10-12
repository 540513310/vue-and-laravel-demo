<?php
namespace App\Libs\Bos\UmUploader;

use App\Libs\Bos\UmUploader\Uploader;

include_once "Uploader.class.php";
//上传配置

class UploaderProxy
{

    private $config = array(
        "savePath" => "upload/" ,             //存储文件夹
        "maxSize" => 1000 ,                   //允许的文件最大尺寸，单位KB
        "allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" )  //允许的文件格式
    );
    //上传文件目录
    private $Path = "upload/";

    public function __construct()
    {
        //背景保存在临时目录中
        $this->config[ "savePath" ] = $this->Path;
        $up = new Uploader( "upfile" ,  $this->config );
        $callback=$_GET['callback'];

        $info = $up->getFileInfo();

        /**
         * 返回数据
         */
        if($callback) {
            return '<script>'.$callback.'('.json_encode($info).')</script>';
        } else {
            return json_encode($info);
        }

    }


}
