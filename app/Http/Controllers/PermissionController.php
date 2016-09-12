<?php

namespace App\Http\Controllers;

use App\Helper\ArrayHelper;
use App\Helper\ResponseHelper;
use App\Model\Permission;
use App\Model\Role;
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
        $dealpermission = ArrayHelper::dealPermission($permissions);
        $permission = $dealpermission[0];
        $permissionname = $dealpermission[1];
        $user['permissions'] = $permission;
        $user['permissionnames'] = $permissionname;
        session(['user'=>$user]);
        return ResponseHelper::success();
    }
    //权限列表
    public function index(Request $request){
        $searchkey = $request -> get('searchkey','');
        $searchvalue = $request -> get('searchvalue','');
        $perpage = $request -> get('perpage',20);
        if(!empty($searchkey)){
            $permissions = Permission::where($searchkey,'like','%'.$searchvalue.'%')->paginate($perpage)->toArray();
        }else{
            $permissions = Permission::paginate($perpage)->toArray();
        }

        $permissionNewArr = array();
        foreach ($permissions['data'] as $k => $v){
            if($v['fid'] > 0){
                //获取父级目录名称
                $fpermission = Permission::find($v['fid']);
                $permissions['data'][$k]['fname'] = $fpermission['display_name'];
            }
        }
        $permissions['searchkey'] = $searchkey;
        $permissions['searchvalue'] = $searchvalue;
        $permissions['fpermissions'] = Permission::where('fid','0')->get(array('id','display_name'))->toArray();
        return view('permission.index')->with('data',$permissions);
    }
    //删除权限
    public function delete(Request $request){
        $id = $request -> get('id','');
        if(empty($id)){
            return ResponseHelper::error('删除失败，请刷新后重试');
        }
        $permission = Permission::find($id);
        if($permission -> delete()){
            return ResponseHelper::success();
        }
        return ResponseHelper::error('删除失败，请刷新后重试');
    }

    //权限分配
    public function roleshow(Request $request){
        $roles = Role::all()->toArray();
        $permissions = Permission::all()->toArray();
        $dealpermission = ArrayHelper::dealPermission($permissions);
        $data = array('permissions'=>$dealpermission[0],'roles'=>$roles);
        //dump($data);
        return view('permission.roleshow')->with('data',$data);
    }
}
