<?php
require_once __DIR__ . '/vendor/autoload.php';

class Send extends \Sender\ApiSender{
    public function Maps()
    {
        return [
            "test"=>["turn"=>[
              "url"=>"api/public/turns",
              "method"=>"get",
              "headers"=>[],
            ]],
            "login"=>[
                "url"=>"api/auth/login",
                "method"=>"post",
                "json"=>0,
                "headers"=>[],
            ],
            "test1"=>[
                "url"=>"test",
                "method"=>"post",
                "headers"=>[],
            ]
        ];
    }

    protected function baseUrl(){
        return "http://127.0.0.1:8080/";
    }
}
$s = new Send();
$res = $s->send("login",null,null,["account"=>"18312662537","password"=>"cccccc"]);
var_dump($res->ErrorMsg(),$res->GetCode(),$res->GetBody());
