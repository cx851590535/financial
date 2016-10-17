<?php

namespace App\Http\Controllers;

use App\Helper\ArrayHelper;
use App\Helper\ResponseHelper;
use App\Business\PermissionBusiness;
use App\Business\UserBusiness;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $username = $request -> input('username','');
        $password = $request -> input('password','');
        if(empty($username)||empty($password)){
            return ResponseHelper::error('用户名或密码不能为空！');
        }
        $where = array('account'=>$username,'password'=>md5($password));
        $users = UserBusiness::getUserInfo($where);
        if(count($users)<1){
            return ResponseHelper::error('用户名或密码错误！');
        }
        $user = $users[0];
        if($user['status'] == 2){
            return ResponseHelper::error('您的账户已被禁用！');
        }
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

    /*
     * 登录页
     * */
    public function index(Request $request){
        if($request->session()->has('user')){
           return redirect('/home/index');
        }
        return view('login.index');
    }
    /*
     * 主页
     * */
    public function home(Request $request){
        return view('home.index');
    }
    /*
     * 退出登录
     * */
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    /*
     *
     * 无权限
     * */
    public function permissiondenied(Request $request){
        return ResponseHelper::error('对不起，您没有此功能的操作权限！');
    }
}
