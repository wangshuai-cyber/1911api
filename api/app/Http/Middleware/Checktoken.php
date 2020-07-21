<?php

namespace App\Http\Middleware;

use Closure;

class Checktoken
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
        $token=request()->get('token');
        if(!empty($token)){

        }else{
            die('授权失败');
        }

        return $next($request);
    }
}
