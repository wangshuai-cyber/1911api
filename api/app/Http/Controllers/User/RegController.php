<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Reg;
class RegController extends Controller
{
    function Reg(){
        $username=Request()->post('username','');
        $pass=Request()->post('pass','');
        if(empty($username)){
            $response=[
                'error'=>50001,
                'msg'=>"用户名不能为空"
            ];
            return $response;
        }

        if(empty($pass)){
            $response=[
                'error'=>50002,
                'msg'=>"密码不能为空"
            ];
            return $response;
        }
        $reg=new Reg();
        $reg->username=Request()->post('username','');
        $reg->pass=Request()->post('pass','');
        if($reg->save()){
            echo 'ok';
        }
    }

}
