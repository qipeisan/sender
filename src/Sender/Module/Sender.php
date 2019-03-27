<?php
namespace Sender\Module;
use Sender\Base\BaseResponse;
use Sender\Base\SenderDriver;
use Sender\Base\SenderInterface;
use Sender\Base\RequestInterface;
use Sender\Base\ResponseInterface;
use Sender\Factory\Factory;

class Sender implements SenderInterface{
    /**
     * @var RequestInterface
     */
    protected $request;
    public function SetRequest(RequestInterface $req){
        $this->request = $req;
    }
    public function Send():ResponseInterface{
        $driver = $this->driver();
        $driver->send();
        return Factory::response($driver->getData(),$driver->getStatus());
    }

    protected function driver():SenderDriver{
        return Factory::curl($this->request->GetMethod(),$this->request->GetUrl(),
            $this->request->GetHeaders(),$this->request->GetData(),$this->request->isJson(),30);
    }
}
