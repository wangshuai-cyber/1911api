<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Reg;
use Illuminate\Support\Str;
use App\Model\Token;
class LoginController extends Controller
{
    function Login(){
             $reg=new Reg();
//           $Tonke=new Tonke();
            $username=Request()->post('username','');
            $pass=Request()->post('pass','');
            $arr=$reg->where('username',$username)->first();


        if(!empty($arr)){
            if($arr['pass']==$pass){

                $response=[
                    'error'=>0,
                    'msg'=>'ok'
                ];
                $token=Str::random(32);
                $date=[
                    'token'=>$token
                ];
                Token::insert($date);
        return $response;

//                $reg->pass=Request()->post('pass','');
//                $Tonke->tonk=request()->post('tonke');

            }
            else{
                $response = [
                    'error' => 50004,
                    'msg' => '密码错误'
                ];
                print_r($response);
            }

        }else{
                $response=[
                    'error'=>50003,
                    'msg'=>'没有此用户'
                ];
                print_r($response);
            }

        }
    function centel(){
       $token=request()->get('token');
        if(empty($token)){
            $date=[
                'error'=>50001,
                'msg'=>"未授权"
            ];
            return $date;
        }
        $Token=new token();
        $arr=$Token->where('token',$token)->first();
        if($arr['token']==$token){
            $date=[
                'error'=>0,
                'msg'=>"欢迎进入个人中心"
            ];
            return $date;
        }
    }
    public function kkk(){
        phpinfo();
    }
    }


