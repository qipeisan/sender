<?php
namespace Sender\Base;

interface RequestInterface{
    function GetMethod();
    function GetHeaders();
    function GetData();
    function GetUrl();
    function SetUrl($url);
    function SetHeaders($data);
    function SetMethod($str);
    function SetData($data);
}