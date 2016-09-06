<?php
/**
 * Created by PhpStorm.
 * User: ChenXiang
 * Date: 2016/09/06
 * Time: 16:01:02
 */

namespace App\Helper;


class ResponseHelper extends Helper
{
    public static function success($data=[],$url=''){
        $result = array('code'=>200,'data'=>$data,'url'=>$url);
        return $result;
    }
    public static function error($msg,$url=''){
        $result = array('code'=>400,'msg'=>$msg,'url'=>$url);
        return $result;
    }

}
?>