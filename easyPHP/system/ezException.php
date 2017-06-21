<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 10:16
 */
class ezException
{
    private $conf = null;
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('exception');
        
    }
    public function excep($ex)
    {
        
    }
}