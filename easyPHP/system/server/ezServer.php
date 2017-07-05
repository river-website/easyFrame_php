<?php

class ezServer{
    private $forkNum = 4;
    private $ids = array();
    private $serverSocket = null;
    
    private $cSockets = array();
    private $childMsgQue = null;
    public function __construct(){
        
    }
    public function init(){
        $this->serverSocket = stream_socket_server('tcp://127.0.0.1:8011');
        if(!$this->serverSocket)echo 'create socket fail!';
        else{
            stream_set_blocking($this->serverSocket,0);
            $this->forks();
            while($clientSocket = stream_socket_accept($this->serverSocket)){
                $this->add($this->ids[rand(0,3)],$clientSocket);
            }
        }
    }
    public function msgQue($key){
        //产生一个消息队列
        return msg_get_queue($msg_key, 0666);
    }
    public function forks(){
        for($i=0;$i<$this->forkNum;$i++)
            $this->fork($i);            
    }
    public function fork($i){
        $msgQue = $this->msgQue($i+10000);
        $pid = pcntl_fork();
        if($pid == 0){
            $this->childMsgQue = $msgQue;
            $this->childLoop();
            exit();
        }else{
            $this->ids[] = $msgQue;
        }
    }
    
    public function add($msgQue,$scoket){
        //将一条消息加入消息队列
        msg_send($msg_queue, 1, $scoket);
    }
    public function readmsg(){
        if(msg_stat_queue($this->childMsgQue)['msg_qnum']>0)
        { 
            if (msg_receive($this->queue, 1, $msgtype_erhalten, 100000, $data, true, MSG_IPC_NOWAIT, $err) === true) {  
                return $data;  
            } else {  
                throw new Exception($err);  
            }  
        } else {  
            return array();    
        }
    }
    public function childLoop(){
        $readList = array();
        $writeList = array();
        $e = null;
        $t = 100;
        $readTempList = array_keys($readList);
        $writeTempList = array_keys($writeList);
        while(true){
            @stream_select($readTempList,$writeTempList,$e,$t);
            foreach($readTempList as $rSocket){
                $result=@socket_read($rSocket, 8192);
                if($result===false){  
                    $err_code=socket_last_error();  
                    $err_test=socket_strerror($err_code);  
                    echo "client ".(int)$rSocket." has closed[$err_code:$err_test]\n";  
                    //手动关闭客户端,最好清除一下$readfds数组中对应的元素  
                    socket_shutdown($rSocket);  
                    socket_close($rSocket);  
                    unset($readList[$rSocket]);
                }else{  
                    // do thing 
                }  
            }
            $msgs =$this->readmsg();
            $readTempList = array_merge(array_keys($readList),$msgs);
        }    
        
    }
}

$server = new ezServer();
$server->init();