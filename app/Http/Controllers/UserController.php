<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //用户管理页面
    public function index(Request $request){
        $account = $request -> get('account','');
        $nickname = $request -> get('nickname','');
        $roleid = $request -> get('roleid','');
        $status = $request -> get('status','');
        $perpage = $request -> get('perpage',20);
        $users = User::where('uid','>','0');
        if(!empty($account)){
            $users = User::where('account',$account);
        }
        if(!empty($nickname)){
            $users = User::where('nickname',$nickname);
        }
        if(!empty($roleid)){
            $users = User::where('roleid',$roleid);
        }
        if(!empty($status)){
            $users = User::where('status',$status);
        }
        $users = $users ->paginate($perpage)->toArray();

        foreach ($users['data'] as $k => $v){
            //获取角色名称
            $roles = Role::find($v['roleid']);
            $users['data'][$k]['rolename'] = $roles['display_name'];
        }
        $users['account'] = $account;
        $users['nickname'] = $nickname;
        $users['roleid'] = $roleid;
        $users['status'] = $status;
        $roles = Role::all() -> toArray();
        $users['role'] = $roles;
        return view('user.index')->with('data',$users);
    }

    //添加用户
    public function add(Request $request){
        $account = $request -> input('account','');
        $password = $request -> input('password','');
        $nickname = $request -> input('nickname','');
        $role = $request -> input('role','');
        $status = $request -> input('status',1);
        if(empty($account)||empty($password)||empty($role)){
            return ResponseHelper::error('请完成资料填写！');
        }
        $users = User::where('account',$account) -> first();
        if(!empty($users)){
            return ResponseHelper::error('帐号已被占用！');
        }
        $users = new User();
        $users -> account = $account;
        $users -> password = md5($password);
        $users -> nickname = $nickname;
        $users -> roleid = $role;
        $users -> status = $status;
        if($users -> save()){
            return ResponseHelper::success();
        }
        return ResponseHelper::error('用户添加失败！');

    }

    //判断用户名是否被占用
    public function isused(Request $request){
        $account = $request -> input('account','');
        $users = User::where('account',$account) -> first();
        if(!empty($users)){
            return ResponseHelper::error('帐号已被占用！');
        }else{
            return ResponseHelper::success();
        }
    }

    //删除用户
    public function delete(Request $request){
        $uid = $request -> input('uid','');
        if(empty($uid)){
            return ResponseHelper::error('参数错误，删除失败，请刷新后再试！');
        }
        $users = User::find($uid);
        if(empty($users)){
            return ResponseHelper::error('用户不存在，删除失败，请刷新后再试！');
        }
        if($users -> delete()){
            return ResponseHelper::success();
        }
        return ResponseHelper::error('删除失败!');
    }

    //禁用用户
    public function forbid(Request $request){
        $uid = $request -> input('uid','');
        $status = $request -> input('status',2);
        $status = $status == 1?2:1;
        if(empty($uid)){
            return ResponseHelper::error('参数错误，操作失败，请刷新后再试！');
        }
        $users = User::find($uid);
        if(empty($users)){
            return ResponseHelper::error('用户不存在，操作失败，请刷新后再试！');
        }
        $users -> status = $status;
        if($users -> save()){
            return ResponseHelper::success();
        }
        return ResponseHelper::error('操作失败!');
    }
}
