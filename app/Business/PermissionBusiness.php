<?php
/**
 * Created by PhpStorm.
 * User: ChenXiang
 * Date: 2016/09/06
 * Time: 16:40:31
 */

namespace App\Business;


use App\Helper\ArrayHelper;
use App\Model\Permission;
use App\Model\PermissionRole;

class PermissionBusiness extends Business
{
    /*
     * 根据角色编号获取权限
     * */
    public static function getPermissionByRoleid($roleid,$field='all'){
        if($roleid){
            $permissionids = PermissionRole::where('role_id',$roleid)->get(array('permission_id'))->toArray();
            if($field=='id'){
                return $permissionids;
            }
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