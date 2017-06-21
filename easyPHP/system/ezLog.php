<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezLog
{
    private $conf = null;
    private $path = null;
    
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('log');
    }
    
    public function log_message($env, $msg)
    {
        $messgae  = $env . '=>' . date('Y-m-d H:i:s', time()) . '=>=>' . $msg;
        $fileName = 'ezLog-' . date('Y-m-d', time()) . '.log';
        if (!file_put_contents($this->path . $fileName, $messgae, FILE_APPEND)) {
            return "日志写入失败。<br />";
        }
    }
    
}
