<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 13:42
 */
class ezBase
{
    private $conf = null;
    private $confNode = null;
    private $log = null;
    private $exception = null;
    public function __construct()
    {
        $this->conf      = $GLOBALS['ezData']['conf']->getNode($this->confNode);
        $this->log       = $GLOBALS['ezData']['log'];
        $this->exception = $GLOBALS['ezData']['exception'];
    }
    
    public function log($env, $msg)
    {
        $this->log->log_message($env, $msg);
    }
    public function excep($ex)
    {
        $this->exception->excep($ex);
    }
}