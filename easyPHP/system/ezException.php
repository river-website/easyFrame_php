<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 10:16
 */
class ezException extends ezBase 
{
    protected $confNode = 'exception';

    static public function exceptHandle($ex)
    {
        echo "<pre>";print_r($ex);echo "<pre>"; 
    }
}