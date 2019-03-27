<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:27
 */

namespace Sender\Curl;


class Get extends AbstractCurl
{

    protected function CallMethod()
    {
        curl_setopt($this->curl, CURLOPT_HTTPGET, true);
    }
}