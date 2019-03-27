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

class ResponseJson extends BaseResponse
{
    protected $response;
    protected $body;
    protected $code;
    protected $result;
    protected $errcode;
    protected $errmsg;
    protected $errinfo;
    protected $data;

    public function SetResponse(ResponseInterface $response){
        $this->body = $response->GetBody();
        $this->code = $response->GetCode();
        $this->init();
    }

    protected function init(){
        if ($this->code!=200){
            $this->errorstatus();
            return ;
        }
        $this->result = json_decode($this->body,true);
        if (empty($this->result)){
            $this->errorRst();
            return ;
        }
        $this->errcode = !empty($this->result["errcode"])?$this->result["errcode"]:null;
        $this->errmsg = !empty($this->result["errmsg"])?$this->result["errmsg"]:null;
        $this->errinfo = !empty($this->result["errorinfo"])?$this->result["errorinfo"]:null;
        $this->data = !empty($this->result["data"])?$this->result["data"]:null;
    }

    public function GetBody()
    {
        return $this->body;
    }
    public function GetCode()
    {
        return $this->code;
    }

    public function Result()
    {
        return $this->result;
    }

    public function ErrorCode()
    {
        return !empty($this->result["errcode"])?$this->result["errcode"]:null;
    }
    public function ErrorInfo()
    {
        return  !empty($this->errinfo)?$this->errinfo:(!empty($this->result["errorinfo"])?$this->result["errorinfo"]:null);
    }
    public function ErrorMsg()
    {
        return  !empty($this->errmsg)?$this->errmsg:(!empty($this->result["errmsg"])?$this->result["errmsg"]:null);
    }
    public function data(){
        return  !empty($this->result["data"])?$this->result["data"]:null;
    }
    public function Valid()
    {
        if ($this->code!=200){
            return false;
        }
        return $this->errcode=="OK";
    }

    protected function errorstatus(){
        $this->errmsg = "error.http.code";
        $this->errinfo = "http code:".$this->code;
    }

    protected function errorRst(){
        $this->errmsg = "error.api.body";
        $this->errinfo = "body is not json or empty";
    }
}