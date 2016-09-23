<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Model\PermissionRole;
use App\Model\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    //角色管理首页
    public function index(Request $request){
        $rolename = $request -> get('rolename','');
        $perpage = $request -> get('perpage',20);
        if(!empty($rolename)){
            $roles = Role::where('name','like','%'.$rolename.'%')->paginate($perpage)->toArray();
        }else{
            $roles = Role::paginate($perpage)->toArray();
        }
        $roles['rolename'] = $rolename;
        return view('roles.index')->with('data',$roles);
    }
    //角色添加
    public function add(Request $request){
        $rolename = $request -> input('rolename','');
        if (empty($rolename)){
            return ResponseHelper::error('请输入角色名称！');
        }
        $role = Role::where('name',$rolename)->first();
        if(!empty($role)){
            return ResponseHelper::error('该角色名称已存在！');
        }
        $role = new Role();
        $role -> name = $rolename;
        $role -> display_name = $rolename;
        $role -> description = $rolename;
        if ($role -> save()){
            return ResponseHelper::success();
        }
        return ResponseHelper::error('添加失败！');
    }
    //角色删除
    public function del(Request $request){
        $id = $request -> input('id','');
        if(empty($id)){
            return ResponseHelper::error('参数传递失败，请刷新后重试！');
        }
        //先删除已分配的权限
        PermissionRole::where('role_id',$id)->delete();
        $role = Role::find($id);
        if(empty($role)){
            return ResponseHelper::error('参数传递失败，请刷新后重试！');
        }
        if($role->delete()){
            return ResponseHelper::success();
        }
        return ResponseHelper::error('删除失败！');
    }
}
