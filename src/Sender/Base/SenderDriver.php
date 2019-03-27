<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:26
 */

namespace Sender\Base;


interface SenderDriver
{
    function send();
    function getData();
    function getStatus();
}