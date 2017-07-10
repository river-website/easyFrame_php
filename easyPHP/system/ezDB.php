<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 11:31
 */

class ezDB extends ezBase
{
    
    protected $confNode = 'db';
    private $connect = null;
    
    public function __construct()
    {
        $this->conf    = $GLOBALS['ezData']['conf']->getNode('db');
        $this->connect = $this->connectDB();
    }
    
    private function connectDB()
    {
        if (!empty($GLOBALS['ezData']['dbConnect']))
            return $GLOBALS['ezData']['dbConnect'];
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            echo "socket_create() failed, reason: ".socket_strerror(socket_last_error())."\n";
        }
        $con = mysqli_connect($this->conf['host'], $this->conf['user'], $this->conf['password'], $this->conf['dataBase'], $this->conf['port'],$socket);
        if (!$con)
            throw new Exception(mysqli_error());
        $GLOBALS['ezData']['dbConnect'] = $con;
        return $con;
    }
    function checkTableExist($table)
    {
        $row    = mysqli_query($this->connect, "show tables");
        $tables = array();
        while ($result = mysqli_fetch_array($row)) {
            $tables[] = $result[0];
        }
        
        /*开始判断表是否存在*/
        if (in_array($table, $tables)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getConnect()
    {
        return $this->connect;
    }
    
}