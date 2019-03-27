<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午10:51
 */

namespace Sender\Module;


use Sender\Base\RequestInterface;

class Request implements RequestInterface
{
    protected static $methods = ["GET","POST","DELETE","PUT"];
    protected $url;
    protected $data;
    protected $method;
    protected $headers;
    protected $isjson;
    public function SetIsJson($is){

        $this->isjson = $is==true;
    }
    public function isJson(){
        return $this->isjson==true;
    }
    public function SetData($data)
    {
        $this->data = $data;
    }
    public function SetHeaders($data)
    {
        $this->headers = $data;
    }
    public function SetMethod($str)
    {
        $str = strtoupper($str);
        if (!in_array($str,self::$methods))
        {
            $str = "GET";
        }
        $this->method = $str;
    }
    public function SetUrl($url)
    {
        $this->url = $url;
    }
    public function GetData()
    {
        return $this->data;
    }
    public function GetHeaders()
    {
        return $this->headers;
    }
    public function GetUrl()
    {
        return $this->url;
    }
    public function GetMethod()
    {
        return $this->method;
    }

}