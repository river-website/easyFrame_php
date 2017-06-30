<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/30
 * Time: 11:53
 */
class ezMsgQueue{
    private $conf = null;
    private $msgQue = 'ezMsgQueue';
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('msgQueue');
    }
    public function startService(){

    }
    public function startWithRedis(){

    }
    public function startWithFile(){

    }
    public function startWithShm(){

    }
    public function sendMsg($dispatch){
        if(empty($dispatch))return false;
    }
}