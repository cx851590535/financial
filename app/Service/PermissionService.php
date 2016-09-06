<?php
/**
 * Created by PhpStorm.
 * User: ChenXiang
 * Date: 2016/09/06
 * Time: 16:40:31
 */

namespace App\Service;


use App\Helper\ArrayHelper;
use App\Model\Permission;
use App\Model\PermissionRole;

class PermissionService extends Service
{
    /*
     * 根据角色编号获取权限
     * */
    public static function getPermissionByRoleid($roleid){
        if($roleid){
            $permissionids = PermissionRole::where('role_id',$roleid)->get(array('permission_id'))->toArray();
            $permissionids = ArrayHelper::arrs2arr($permissionids,'permission_id');
            $permissions = Permission::whereIn('id',$permissionids)->orderBy('fid','ASC')->orderBy('order','ASC')->get()->toArray();
            //$permissions = ArrayHelper::arrs2arr($permissions,'name');
            //dd(strpos(json_encode($permissions),'index'));
            return $permissions;
        }
        return [];
    }

}
?>