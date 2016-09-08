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

    /*
     * 权限数组整理
     * */
    public static function dealPermission($permissions){
        $permission = array();
        $permissionname = array();
        foreach ($permissions as $k => $v){
            $permissionname[] = $v['name'];
            if($v['fid'] == 0){
                $permission[$v['id']] = $v;
            }else{
                $permission[$v['fid']]['item'][] = $v;
            }
        }
        return array($permission,$permissionname);
    }

}
?>