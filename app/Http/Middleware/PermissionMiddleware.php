<?php

namespace App\Http\Middleware;

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
        $uri = $request->getrequestUri();
        if(isset($user['permissionnames'])&&in_array($uri,$user['permissionnames'])){
            return $next($request);
        }
        return redirect('/');

    }
}
