<?php

namespace App\Http\Controllers;

use App\Helper\ArrayHelper;
use App\Helper\ResponseHelper;
use App\Model\Permission;
use App\Model\PermissionRole;
use App\Model\Role;
use App\Business\PermissionBusiness;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class PermissionController extends Controller
{
    //刷新权限
    public function refresh(Request $request){
        $user = session('user');
        $roleid = $user['roleid'];
        $permissions = PermissionBusiness::getPermissionByRoleid($roleid);
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
        try{
            DB::transaction(function () use($permission,$id){
                PermissionRole::where("permission_id",$id)->delete();
                $permission -> delete();
            });
            return ResponseHelper::success();
        }catch (Exception $e){
            return ResponseHelper::error('删除失败，请刷新后重试');
        }
    }
    //添加权限
    public function add(Request $request){
        $id = $request -> input('id','');
        $pname = $request -> input('pname','');
        $picon = $request -> input('picon','');
        $proute = $request -> input('proute','');
        $pdescri = $request -> input('pdescri','');
        $pid = $request -> input('pfid','');
        $porder = $request -> input('porder',0);
        $type = $request -> input('type',1);
        if(empty($pname)){
            return ResponseHelper::error('请输入权限名称(路由)！');
        }
        $permission = Permission::where('name',$proute)->count();
        if(empty($id)){
            if($permission>0){
                return ResponseHelper::error('权限名称(路由)不能重复！');
            }
            $permission = new Permission();
        }else{
            $permission = Permission::find($id);
            if(empty($permission)){
                return ResponseHelper::error('操作失败！');
            }
        }
        if(empty($pid)){
            $pid = 0;
        }
        if(empty($porder)){
            $porder = 0;
        }

        $permission -> display_name = $pname;
        $permission -> fid = $pid;
        $permission ->class = $picon;
        $permission -> name = $proute;
        $permission -> description = $pdescri;
        $permission -> order = $porder;
        $permission -> type = $type;
        try{
            $permission -> save();
            return ResponseHelper::success();
        }catch (QueryException $e){
            return ResponseHelper::error('操作失败！');
        }
    }

    //权限分配
    public function roleshow(Request $request){
        $roles = Role::all()->toArray();
        $permissions = Permission::orderBy('fid','ASC')->get()->toArray();
        $dealpermission = ArrayHelper::dealPermission($permissions,true);
        $data = array('permissions'=>$dealpermission[0],'roles'=>$roles);
        return view('permission.roleshow')->with('data',$data);
    }
    public function roleset(Request $request){
        $role = $request -> input('role','');
        $permissions = $request -> input('permissions','');
        if(empty($role)){
            return ResponseHelper::error('请选中一个角色！');
        }
        if(empty($permissions)){
            return ResponseHelper::error('请至少勾选一个权限！');
        }
        $permissionarr = explode(',',$permissions);
        $data = array();
        foreach ($permissionarr as $k => $v){
            $data[$k]['permission_id'] = $v;
            $data[$k]['role_id'] = $role;
        }
        try{
            DB::transaction(function () use ($role,$data){
                PermissionRole::where('role_id',$role)->delete();
                PermissionRole::insert($data);
            });
            return ResponseHelper::success();
        }catch (Exception $e){
            return ResponseHelper::error('权限写入失败！');
        }

    }
    public function getPermissionByRole(Request $request){
        $role = $request -> get('role','');
        if(empty($role)){
            return ResponseHelper::error('请选择一个角色！');
        }else{
            $permissions = PermissionBusiness::getPermissionByRoleid($role,'id');
            /*$data = array();
            foreach ($permissions as $k => $v){
                $data[] = $v['permission_id'];
            }
            return ResponseHelper::success($data);*/
            return ResponseHelper::success($permissions);
        }
    }
}
