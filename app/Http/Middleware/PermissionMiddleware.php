<?php

namespace App\Http\Middleware;

use App\Helper\ResponseHelper;
use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = session('user');
        $uri = $request->getpathInfo();
        if(isset($user['permissionnames'])&&in_array($uri,$user['permissionnames'])){
            return $next($request);
        }
        if($request->getMethod() == 'GET'){
            return redirect('/');
        }else{
            return ResponseHelper::error('对不起，您没有操作此功能的权限');
        }


    }
}
