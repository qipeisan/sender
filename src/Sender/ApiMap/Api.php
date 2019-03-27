<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 下午2:12
 */

namespace Sender\ApiMap;


use Sender\Base\RequestInterface;
use Sender\Factory\Factory;

class Api
{
    protected $url;
    protected $headers;
    protected $method;
    protected $params;
    protected $query;
    protected $id;
    protected $isjson;
    public function __construct($data,$baseUrl)
    {
        $this->url = $baseUrl.$data["url"];
        $this->headers = empty($data['headers'])?[]:$data["headers"];
        $this->method = empty($data['method'])?"GET":$data["method"];
        if (!empty($data["json"])){
            $this->contentType();
        }
    }
    public function SetId($id){
        $this->id = $id;
    }

    protected function contentType(){
        $this->isjson = true;
        if (empty($this->headers["Content-Type"])){
            $this->headers["Content-Type"] = "application/json";
        }
    }

    public function SetData($data){
        $this->params = $data;
    }

    public function auther($str){
        $this->headers["Authorization"] = "Bearer ".$str;
    }
    public function SetQuery($q){
        if (is_array($q)){
            $q = http_build_query($q);
        }
        $this->query = $q;
    }

    public function ToRequset():RequestInterface{
        $url = $this->url;
        if ($this->id!==0){
            $url = $url.$this->id;
        }
        if (!empty($this->query)){
            $url = $url."?".$this->query;
        }
        return Factory::request($url,$this->method,$this->headers,$this->params,$this->isjson);
    }
}