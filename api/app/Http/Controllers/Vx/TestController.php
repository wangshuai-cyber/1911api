<?php

namespace App\Http\Controllers\Vx;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
class TestController extends Controller
{
    function test()
    {
        $store = Redis::llen('store');
        $storeinfo = Redis::lrange('strore',0,-1);
        if (!$storeinfo) {
            Redis::lpush('store', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
        }
        if ($store > 0) {
            Redis::lpop('store');
            $content = "库存-1";
            echo $content . "库存剩余" . $store;
            die;
        }else{
            echo "库存没有了";
        }


    }


    public function kkk(){
        phpinfo();
    }

}