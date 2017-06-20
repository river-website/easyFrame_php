<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 10:19
 */
class ezConf{
    private $conf = null;
    public function __construct(){
        $this->reload();
        $GLOBALS['ezData']['conf'] = $this;
    }
    public function reload(){
        if(!isset($GLOBALS['ezConf']))
            throw new Exception("ÅäÖÃÎÄ¼þ´íÎó");
        $this->conf = $GLOBALS['ezConf'];
    }
    public function getNode($node){
        if(!isset($this->conf[$node]))
            return false;
        $nodeConf = $this->conf[$node];
        if($nodeConf['state'] != true)
            return false;
        return $nodeConf['conf'];
    }
}