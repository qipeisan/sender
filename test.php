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
              "data"=>null,
            ]],
            "collects"=>[
                "url"=>"api/jwt/user/users/collect/",
                "method"=>"get",
                "headers"=>[],
                "data"=>null,
            ]
        ];
    }

    protected function baseUrl(){
        return "http://127.0.0.1:8080/";
    }
}

$arr = [
    "test"=>
        [
            "turn"=>[
            "url"=>"api/public/turns",
            "method"=>"get",
            "headers"=>[],
            "data"=>null,
         ]
    ],
    "collects"=>[
        "url"=>"api/jwt/user/users/collect/",
        "method"=>"get",
        "headers"=>[],
        "data"=>null,
    ]
];;
/*
$s = new Send();
$res = $s->send("collects",
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1NTM3NTYyMTYsImd1YXJkIjoidXNlciIsImtleSI6MTAwMDB9.dsyof8SqFx-4HlSrc1LU4TOgt3oojLc9yRfcKWv2mYA",["page"=>2],null);
/*var_dump($res->Valid());
print_r($res->data());*/
//print_r($s->send("collects",null,null,"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1NTM3NTQ5NTUsImd1YXJkIjoidXNlciIsImtleSI6MTAwMDB9.755VQ3NNJ5Dj6JUP015m3zUtK4qQ7vXUh914q42DV8Y")
  //  );*/a

