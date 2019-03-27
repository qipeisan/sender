<?php
namespace Sender\Base;

interface SenderInterface{
    function SetRequest(RequestInterface $req);
    function Send():ResponseInterface;
}