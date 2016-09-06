<?php

namespace App\Service;
use App\Model\User;

class UserService extends Service
{
    public static function getUserInfo($where,$filed=[]){
        $users = User::where('uid','>','0');
        if(count($where)>0){
            foreach ($where as $k => $v){
                if(is_array($v)){
                    $users = $users -> where($k,$v[0],$v[1]);
                }else{
                    $users = $users -> where($k,$v);
                }
            }
        }
        if(empty($filed)){
            return $users->get()->toArray();
        }
        return $users->get($filed)->toArray();
    }

}
?>