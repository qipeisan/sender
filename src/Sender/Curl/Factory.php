<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:44
 */

namespace Sender\Curl;


class Factory
{
    public static function curl($method,$url,$headers,$params,$timeout=30){
        $class = strtoupper($method);
        $obj = new $class($url,$params,$headers,$timeout);
        return $obj;
    }
}