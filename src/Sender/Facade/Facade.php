<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 下午1:53
 */

namespace Sender\Facade;

use Sender\Module\Sender;
use Sender\Module\ResponseJson;

class Facade
{
    public static function trueSend($url,$method,$headers=[],$data = null):ResponseJson{
        $obj = new Sender();
        $req = \Sender\Factory\Factory::request($url,$method,$headers,$data);
        $obj->SetRequest($req);
        $resp = $obj->Send();
        return \Sender\Factory\Factory::jsonResponse($resp);
    }
    public static function apiSend():ResponseJson{

    }
}