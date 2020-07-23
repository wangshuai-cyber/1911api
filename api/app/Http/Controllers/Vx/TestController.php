<?php

namespace App\Http\Controllers\Vx;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
class TestController extends Controller
{
//    function test()
//    {
//        $store = Redis::llen('store');
//        $storeinfo = Redis::lrange('strore',0,-1);
//        if (!$storeinfo) {
//            Redis::lpush('store', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
//        }
//        if ($store > 0) {
//            Redis::lpop('store');
//            $content = "库存-1";
//            echo $content . "库存剩余" . $store;
//            die;
//        }else{
//            echo "库存没有了";
//        }
//
//
//    }


    public function kkk(){
        phpinfo();
    }

    function aes1(){
        $data="小沙雕";
        $method="AES-128-CBC";
        $key="1911php";
        $iv="1111111111111111";
        $enaes_data=base64_encode(openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv));
//        dd($enaes_data);
        $url="http://www.1911.com/vx/aes1";
        //die($url);
        $data=['form_params' => ['enaes_data'=>$enaes_data]];
//        dump($data);
        $client=new Client();

        $response = $client->request('POST',$url,$data);
        $result=$response->getBody();
        echo "加密后".$enaes_data;echo "<br>";
        echo "解密后".$result;echo "<br>";
//        $data=base64_decode($enaes_data);
//        $deaes_data=openssl_decrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
//        echo '|';
//        echo $deaes_data;
    }
    function aes2(){
        $data="我出来啦呀";
        $content=file_get_contents(storage_path('keys/pub.key'));
        $key=openssl_get_publickey($content);
        openssl_public_encrypt($data,$enpub_data,$key);
        $enpub_data=base64_encode($enpub_data);
        echo "解密前:  ".$enpub_data;
        $url="http://www.com/vx/aes2";
        $data=['form_params' => ['enpub_data'=>$enpub_data]];
        $client=new Client();
        $response = $client->request('post',$url,$data);
        $result=$response->getBody();
        echo "解密后  ".$result;
    }


}