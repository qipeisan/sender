<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:44
 */

namespace Sender\Factory;


use Sender\Base\ResponseInterface;
use Sender\Curl\AbstractCurl;
use Sender\Module\Request;
use Sender\Module\Response;
use Sender\Module\ResponseJson;

class Factory
{
    public static function curl($method,$url,$headers,$params,$timeout=30):AbstractCurl{
        $namespace = "\\Sender\\Curl\\";
        $class = $namespace.ucfirst(strtolower($method));
        $obj = new $class($url,$params,$headers,$timeout);
        return $obj;
    }
    public static function response($body,$status):Response{
        return new Response($body,$status);
    }

    public static function jsonResponse(ResponseInterface $res):ResponseJson{
        $obj = new ResponseJson();
        $obj->SetResponse($res);
        return $obj;
    }

    public static function request($url,$method,$headers = [],$data = null):Request{
        $obj = new Request();
        $obj->SetUrl($url);
        $obj->SetMethod($method);
        $obj->SetHeaders($headers);
        $obj->SetData($data);
        return $obj;
    }
}