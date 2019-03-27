<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:28
 */

namespace Sender\Curl;


use Sender\Base\SenderDriver;

abstract class AbstractCurl implements SenderDriver
{
    protected $curl;
    protected $data;
    protected $status;
    protected $params;
    protected $isjson;
    public function __construct($url,$params,$headers,$json=false,$timeoute=30)
    {
        $this->params = $params;
        $this->isjson=($json==true);
        $this->init($url,$timeoute);
        $this->setHeaders($headers);
    }

    protected function init($url,$timeout){
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求时要设置为false 不验证证书和hosts  FALSE 禁止 cURL 验证对等证书（peer's certificate）, 自cURL 7.10开始默认为 TRUE。从 cURL 7.10开始默认绑定安装。
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //$timeout = 30;
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, $timeout);
    }

    protected function setHeaders($headers){
        $header = [];
        if (!is_array($headers)){
            $headers = [];
        }
        /*$header[] = "Content-Type:application/json;charset=utf-8";*/
        foreach($headers as $key=>$v){
            $header[] = "$key:$v";
        }
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
    }

    public function send(){
        $this->CallMethod();
        $this->data = curl_exec($this->curl);
        $this->status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        unset($this->curl);
    }
    public function getData()
    {
       return  $this->data;
    }
    public function getStatus()
    {
        return $this->status;
    }

    abstract protected function CallMethod();

}