<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 10:19
 */

require_once ezAPPPATH.'/conf.php';

class ezConf{
    private $conf = null;
    public function __construct(){
        $this->reload();
    }
    public function reload(){
        if(empty($GLOBALS['ezConf']))
            throw new Exception("配置文件错误");
        if(ezFilter($GLOBALS['ezConf'],array('db','html','codeCache','cache','debug','hook','log','monitor','app')) != true)
            throw new Exception("配置文件错误");
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