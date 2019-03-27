<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:27
 */

namespace Sender\Curl;


class Put extends AbstractCurl
{
    protected function CallMethod()
    {
        $params = $this->params;
        if ($this->isjson){
            if (is_array($params)) {
                $params = json_encode($params, 320);
            }
        }
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
    }
}