<?php

class ezBase
{
    protected $conf = null;
    protected $confNode = null;
    protected $throw = true;
    public function __construct()
    {
        $this->conf      = $GLOBALS['ezData']['conf']->getNode($this->confNode,$this->throw);
    }
    public function confValid(){
        if(is_array($this->conf))
            return true;
        return false;
    }
}