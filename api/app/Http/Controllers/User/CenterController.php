<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Reg;
class CenterController extends Controller
{
    //

    function center()
    {
        $get_token = request()->get('token');
        $black_token = Redis::sismember('black_token', $get_token);
//        if (!$black_token) {
//            die('由于访问次数过多以添加到黑名单');
//        }
        if ($get_token) {
            $token = Redis::get('token');
            if ($get_token == $token) {
                $user_id = Redis::get('user_id');
                $userinfo = Reg::find($user_id);
                $response = [
                    'error' => 0,
                    'msg' => '欢迎' . $userinfo['username'] . '进入个人中心'
                ];
                return $response;
            }else{
                $response=[
                    'error'=>40002,
                    'msg'=>'token有误请重新获取'
                ];
                return $response;
            }
        }else{
            $response=[
                'error'=>40001,
                'msg'=>'未获取到登录信息请先登录'
            ];
            return $response;
        }
        if (!$black_token) {
           die('由于访问次数过多以添加到黑名单');
       }
    }
    function sign(){
        $key="ss:user_sign".date('ymd');
        $sign_count=Redis::zcard($key);
        if($sign_count>0){
            return '您今天已经签到过了哦';
        }else{
            $user_id=Redis::get('user_id');
            Redis::zadd($key,time(),$user_id);
            return '签到成功';
        }
    }
}
