<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 下午1:58
 */

namespace Sender;


use Sender\ApiMap\Api;
use Sender\Factory\Factory;
use Sender\Module\ResponseJson;
use Sender\Module\Sender;

abstract class ApiSender
{
    protected $map;
    public function __construct()
    {
        $this->setMap();
    }
    protected function baseUrl(){
        return "http://127.0.0.1:8080/";
    }
    protected function setMap(){
        $this->map = $this->Maps();
    }
    abstract function Maps();
    public function send($key,$auth=null,$query=null,$id=null):ResponseJson{
        if (empty($this->map[$key])){
            return null;
        }
        $api = new Api($this->map[$key],$this->baseUrl());
        if ($id!==null){
            $api->SetId($id);
        }
        if ($auth!==null){
            $api->auther($auth);
        }
        if ($query!==null){
            $api->SetQuery($query);
        }
        $req = $api->ToRequset();
        $obj = new Sender();
        $obj->SetRequest($req);
        $resp = $obj->Send();
        return Factory::jsonResponse($resp);
    }
}