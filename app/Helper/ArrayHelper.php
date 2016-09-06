<?php

namespace App\Helper;
class ArrayHelper extends Helper
{
    /*
     * 二维数组转一位数组 $key 为保留的键
     * */
    public static function arrs2arr($array,$key){
        $result = array();
        foreach ($array as $k => $v){
            $result[] = $v[$key];
        }
        return $result;
    }

}
?>