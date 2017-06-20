<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 11:31
 */

class ezDB{

    private $DbConf = null;
    private $Con = null;
    private $sql = '';

    public function __construct(){
        global $ezConf;
        $DbConf = $ezConf['db'];
        if($DbConf['state'] != true)
            return 'error';
        $this->DbConf = $DbConf['data'];
        $this->Con = $this->connectDB();
    }

    private function connectDB(){
        global $ezData;
        if(isset($ezData['dbConnect']))
            return $ezData['dbConnect'];

        $con = mysqli_connect($this->DbConf['host'],$this->DbConf['user'],$this->DbConf['password'],$this->DbConf['dataBase'],$this->DbConf['port']);
        if (!$con)
        {
            die('Could not connect: ' . mysqli_error());
        }
        $ezData['dbConnect'] = $con;
        return $con;
    }
    function checkTableExist($table)
    {
        $row = mysqli_query($this->Con,"show tables");
        $tables = array();
        while ($result=mysqli_fetch_array($row))
        {
            $tables[]=$result[0];
        }
         
        /*开始判断表是否存在*/
        if(in_array($table,$tables))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

}