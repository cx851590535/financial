<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Model\Permission;
use App\Service\PermissionService;
use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends Controller
{
    //刷新权限
    public function refresh(Request $request){
        $user = session('user');
        $roleid = $user['roleid'];
        $permissions = PermissionService::getPermissionByRoleid($roleid);
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
        $user['permissions'] = $permission;
        $user['permissionnames'] = $permissionname;
        session(['user'=>$user]);
        return ResponseHelper::success();
    }
    //权限列表
    public function index(Request $request){
        $permissions = Permission::all()->toArray();
        dump($permissions);
        return view('permission.index')->with('permissions',$permissions);
    }
}
