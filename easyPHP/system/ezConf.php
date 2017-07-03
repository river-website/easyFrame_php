<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 10:19
 */

require_once ezAPPPATH . '/conf.php';

class ezConf
{
    private $conf = null;
    public function __construct()
    {
        $this->reload();
    }
    public function reload()
    {
        if (empty($GLOBALS['ezConf']))
            throw new Exception("配置文件错误");
        if (ezFilter($GLOBALS['ezConf'], array(
            'db',
            'cacheRedis',
            'cacheFile',
            'cacheShm',
            'cacheHtml',
            'codeCache',
            'rewrite',
            'debug',
            'hook',
            'log',
            'monitor',
            'app'
        )) != true)
            throw new Exception("配置文件错误");
        $this->conf = $GLOBALS['ezConf'];
    }
    public function validNode($node){
        if (!isset($this->conf[$node]))return false;
        if ($this->conf[$node]['state'] != true)return false;
        return true;
    }
    public function getNode($node)
    {
        if (!isset($this->conf[$node])) throw new Exception("没有这个节点");
        $nodeConf = $this->conf[$node];
        if ($nodeConf['state'] != true)throw new Exception("模块未开启");
        return $nodeConf['conf'];
    }
}