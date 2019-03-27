<?php
/**
 * Created by PhpStorm.
 * User: czi
 * Date: 19-3-27
 * Time: 上午11:14
 */

namespace Sender\Base;


interface JsonResultInterface
{
    /**
     * @throws Exception
     * @return bool
     */
    function Valid();
    function ErrorCode();
    function ErrorMsg();
    function ErrorInfo();
    function Result();
    function data();
}