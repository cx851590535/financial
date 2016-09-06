<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Service\PermissionService;
use App\Service\UserService;
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
        $users = UserService::getUserInfo($where);
        if(count($users)<1){
            return ResponseHelper::error('用户名或密码错误！');
        }
        $user = $users[0];
        if($user['status'] == 2){
            return ResponseHelper::error('您的账户已被禁用！');
        }
        $roleid = $user['roleid'];
        $permissions = PermissionService::getPermissionByRoleid($roleid);
        $permission = array();
        $permissionname = array();
        foreach ($permissions as $k => $v){
            $permissionname[] = $v['name'];
            if($v['fid'] == 0){
                $permission[$v['id']] = $v;
            }else{
                $permission[$v['fid']]['item'] = $v;
            }
        }
        $user['permissions'] = $permission;
        $user['permissionnames'] = $permissionname;
        session(['user'=>$user]);
        return ResponseHelper::success();
    }

    /*
     * 主页
     * */
    public function index(Request $request){
        $user = session('user');
        dump($request->getrequestUri());
        return view('home.index');
    }
}
