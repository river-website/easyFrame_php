<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 11:31
 */

class ezModel{

    private $dbConnect = null;
    private $table = null;
    private $sql = array();

    static function getInterface($model){
        global $ezData;
        if(!isset($model)||empty($model))
            return 'error';
        if(!isset($ezData['dbConnect'])){
            require_once ezSYSPATH.'/system/ezDB.php';
            $db = new ezDB();
        }
        else $db = $ezData['dbConnect'];
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/easyPHP/'.ezAPPPATH.'/model/'.$model.'.php')){
            require_once ezAPPPATH.'/model/'.$model.'.php';
            if(!class_exists($model))
                return '没有这个类';
            if(get_parent_class($model) != 'ezModel')
                return '类没有继承ez';
            return new $model();
        }else{
            if(!$db->checkTableExist($model))
                return '没有这个模型';
            return new ezModel($model);
        }
    }

    public function __construct($model){
        global $ezData;
        $this->table = $model;
        $this->dbConnect =  $ezData['dbConnect'];
    }

    public function execute(){
        // 执行sql查询
        $row = mysqli_query($this->dbConnect,$this->sql);

        // 获取查询结果
        $datas = array();
        if($row == false)
            return $datas;
        while ($result=mysqli_fetch_array($row))
        {
            $datas[]=$result[0];
        }
        return $datas;
    }

    public function select($condition){
            if(gettype($condition) == 'array'){
                    $this->sql['select'] = count($condition)==0?'*':implode(',', $condition);
            }else if(gettype($condition) == 'string'){
                $this->sql['select'] = $condition!=''?:'*';
            }else if(gettype($condition) == 'NULL'){
               $this->sql['select'] = '*';
            }else{
                echo 'error';
            }
    }

    public function where_in($key, array $condition){
        if(count($condition) == 0)
            return 'error';
        if(empty($key))
            return 'error';
        $prefix = $sql['where'] == '':' and ';
        $this->sql['where'] .= $prefix.' in('.implode(',', $condition).')';
    }
    public function where($condition){
        $prefix = $sql['where'] == '':' and ';
        if(gettype($condition) == 'array'){
                    $this->sql['where'] .= $prefix.count($condition)==0?'':ezDicToString($condition,' and ','=');
            }else if(gettype($condition) == 'string'){
                $this->sql['where'] .= $prefix.$condition!=''?:'*';
            }else{
                echo 'error';
            }
    }

    public function limit($limit,$offset=0){
        $this->sql .= ' limit '.$offset.','.$limit;
    }

    public function beginTransaction(){
        $this->Con->autocommit(false);
    }

    public function endTransaction(){
        if($this->Con->error){
            $this->Con->commit();
            $this->Con->autocommit(true);
            return true;
        }else{
            $this->Con->rollback();
            $this->Con->autocommit(true);
            return false;
        }
    }

    public function insert($data){
        $this->sql .= ' insert into '.$this->table.'('.implode(',',array_keys($data)).') values ('.implode(',',array_values($data)).')';
        $this->execute();
    }

    public function insertList($dataList){
        $firstRow = reset($dataList);
        if(!is_array($firstRow))
            return 'error';

        $this->sql .= ' insert into '.$this->defTable.'('.explode(',',array_keys($firstRow)).') values ';
        foreach ($dataList as $data)
            $this->sql .= '('.array_values($data).'),';
        $this->sql = substr($this->sql, 0, -1);
        return $this->execute();
    }

    public function update(array $data,array $condition = array()){
        $this->sql .= 'update '.$this->defTable.'set ';
        foreach ($data as $key=>$value)
            $this->sql .= $key.'='.$value.',';
        $this->sql = substr($this->sql,0,-1);
        foreach ($condition as $key => $value)
            $this->sql .= ' and '.$key.'='.$value;
        return $this->execute();
    }
}