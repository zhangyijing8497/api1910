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


    /**
     * 对称加密
     */
    public function decrypt1()
    {
        // echo '<pre>';print_r($_POST);echo '</pre>';
        $data = $_POST['data'];
        $sign = $_POST['sign'];

        $method = 'AES-256-CBC';
        $key = 'sjvgkavobava';
        $iv = '1910aslkdjhfzxcv';


        // 验签
        $local_sign = sha1($data.$key);
        if($sign == $local_sign){
            echo "验签成功";echo "</br>";
            // 解密
            $dec_data = openssl_decrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
            echo "解密后的数据: " . $dec_data;
        }else{
            echo "验签失败";
        }
    }

    /**
     * 非对称加密
     */
    public function rsaDecrypt1()
    {
        $enc_data = $_POST['data'];
        // 使用私钥解密
        $key_content = file_get_contents(storage_path('keys/priv.key'));
        $priv_key = openssl_get_privatekey($key_content);
        openssl_private_decrypt($enc_data,$dec_data,$priv_key);
        echo "解密后:" . $dec_data;
    }
}
