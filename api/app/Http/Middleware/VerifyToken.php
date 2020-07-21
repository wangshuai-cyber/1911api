<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class VerifyToken
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
        $gettoken=$request->get('token');
        if($gettoken){
            $token=Redis::get('token');
            if($gettoken==$token){
                $url=$request->url();
                Redis::zincrby('sz:pageview',1,$url);
                $pageview=Redis::zrange('sz:pageview',0,-1,true);
                $key="h:pageview".Redis::get('user_id');
                Redis::hincrby($key,$url,1);
                var_dump($pageview);
                die;
                return $next($request);
            }else{
                $response=[
                    'error'=>40002,
                    'msg'=>'token有误请重新获取'
                ];
                $response=json_encode($response);
                echo $response;
                die;
            }
        }else{
            die('授权失败');
        }
    }
}