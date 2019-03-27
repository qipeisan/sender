<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午10:51
 */

namespace Sender\Module;


use Sender\Base\RequestInterface;

abstract class Request implements RequestInterface
{
    protected static $methods = ["GET","POST","DELETE","PUT"];
    protected $url;
    protected $data;
    protected $method;
    protected $headers;
    public function SetData(array $data)
    {
        $this->data = $data;
    }
    public function SetHeaders(array $data)
    {
        $this->headers = $data;
    }
    public function SetMethod(string $str)
    {
        $str = strtoupper($str);
        if (!in_array($str,self::$methods))
        {
            $str = "GET";
        }
        $this->method = $str;
    }
    public function SetUrl(string $url)
    {
        $this->url = $url;
    }

}