<?php
namespace Sender\Base;

interface RequestInterface{
    function GetMethod();
    function GetHeaders();
    function GetData();
    function GetUrl();
    function SetUrl(string $url);
    function SetHeaders(array $data);
    function SetMethod(string $str);
    function SetData(array $data);
}