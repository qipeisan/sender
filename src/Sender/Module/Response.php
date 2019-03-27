<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:17
 */

namespace Sender\Module;


use Sender\Base\JsonResultInterface;
use Sender\Base\ResponseInterface;

class Response implements ResponseInterface,JsonResultInterface
{

    public function GetBody()
    {
        // TODO: Implement GetBody() method.
    }
    public function GetCode()
    {
        // TODO: Implement GetCode() method.
    }

    public function Result()
    {
        // TODO: Implement Body() method.
    }

    public function ErrorCode()
    {
        // TODO: Implement ErrorCode() method.
    }
    public function ErrorInfo()
    {
        // TODO: Implement ErrorInfo() method.
    }
    public function ErrorMsg()
    {
        // TODO: Implement ErrorMsg() method.
    }
    public function Valid()
    {
        // TODO: Implement Valid() method.
    }
}