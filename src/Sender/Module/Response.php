<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:17
 */

namespace Sender\Module;


use Sender\Base\BaseResponse;
use Sender\Base\JsonResultInterface;
use Sender\Base\ResponseInterface;

class Response implements ResponseInterface
{
    protected $body;
    protected $code;

    public function __construct($body,$code){
        $this->body = $body;
        $this->code = $code;
    }

    public function GetBody()
    {
        return $this->body;
    }
    public function GetCode()
    {
        return $this->code;
    }


}