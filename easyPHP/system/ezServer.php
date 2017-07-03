<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/7/3
 * Time: 11:13
 */

class ezServer extends ezBase
{
    protected $confNode = 'server';
    private $ip = null;
    private $port = null;
    private $path = null;
    private $status = null;
    private $stop = null;
    private $file = null;
    public function __construct()
    {
        parent::__construct();
        $this->path = ezAPPPATH.$this->conf['path'];
        $this->ip = $this->conf['ip'];
        $this->port = $this->conf['port'];
    }
    public function getTask(){
        /*----------------    以下操作都是手册上的    -------------------*/
        if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0)
            throw Exception("socket_create() 失败的原因是:".socket_strerror($sock));
        if(($ret = socket_bind($sock,$this->ip,$this->port)) < 0)
            throw Exception("socket_bind() 失败的原因是:".socket_strerror($ret));
        if(($ret = socket_listen($sock,4)) < 0)
            throw Exception("socket_listen() 失败的原因是:".socket_strerror($ret));
        $count = 0;

        do {
            if (($msgsock = socket_accept($sock)) < 0) {
                throw Exception("socket_accept() failed: reason: " . socket_strerror($msgsock));
                break;
            } else {
                //发到客户端
                $msg ="测试成功！\n";
                socket_write($msgsock, $msg, strlen($msg));

                echo "测试成功了啊\n";
                $buf = socket_read($msgsock,8192);


                $talkback = "收到的信息:$buf\n";
                echo $talkback;

                if(++$count >= 5){
                    break;
                };


            }
            socket_close($msgsock);

        } while (true);

        socket_close($sock);
    }
    public function init(){
        if(!is_dir($this->path))mkdir($this->path,0777,true);
        $filePath = $this->path.$this->status;
        $this->file = fopen($filePath,"w+");
        // 排它性的锁定
        if (flock($this->file,LOCK_EX)){
            $this->start();
            $this->stop();
        }else fclose($this->file);
    }
    private function start(){
        while(true){
            if(is_file($this->path.$this->stop))
                return;

        }
    }
    private function stop(){
        if(empty($this->file))return false;
        if(flock($this->file,LOCK_UN) == false)return false;
        if(fclose($this->file))return false;
        return true;
    }
}