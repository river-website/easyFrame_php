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
    private $msg = '';

    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('log');
        $this->path = $this->conf['path'];
    }
    
    public function log_message($env, $msg, $write = false)
    {
        $this->msg  .= $env . '--' . date('Y-m-d H:i:s', time()) . '=>' . $msg.PHP_EOL;
        if($write == true)
        {
            $fileName = 'ezLog-' . date('Y-m-d', time()) . '.log';
            if (!file_put_contents($this->path . $fileName, $messgae, FILE_APPEND)) {
                return "日志写入失败。<br />";
        }
    }
    
}
