<?php

namespace App\Http\Controllers;

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
}
