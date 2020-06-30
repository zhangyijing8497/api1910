<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public  function info()
    {
        $key = 'sjbvbvkvkcbs';
        $data = $_GET['data'];
        $sign = $_GET['sign'];


        $local_sign = sha1($data.$key);
        echo "接收端计算的签名: ".$local_sign;echo "</br>";

        if($sign == $local_sign){
            echo "验签成功";
        }else{
            echo "验签失败";
        }
    }

    /**
     * 接收数据
     */
    public function receive()
    {
        echo '<pre>';print_r($_GET);echo '</pre>';
    }

    /**
     * 接受post 数据
     */
    public function receivePost()
    {
        echo '<pre>';print_r($_GET);echo '</pre>';
        echo '<pre>';print_r($_POST);echo '</pre>';
    }
}
