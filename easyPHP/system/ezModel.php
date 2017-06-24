<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 11:31
 */


class ezModel
{
    
    private $db = null;
    private $dbConnect = null;
    private $table = null;
    private $sql = array('option' => '', 'where' => '', 'group by' => '', 'having' => '', 'union' => '', 'order by' => '', 'limit' => '');
    
    // static function getInterface($model)
    // {
    //     if (empty($model))
    //         throw new Exception("model名为空");
        
    //     if (empty($GLOBALS['ezData']['db'])) {
    //         $db                      = new ezDB();
    //         $GLOBALS['ezData']['db'] = $db;
    //     } else
    //         $db = $GLOBALS['ezData']['db'];
        
    //     if (file_exists(ezAPPPATH . '/model/' . $model . '.php')) {
    //         require_once ezAPPPATH . '/model/' . $model . '.php';
    //         if (!class_exists($model))
    //             throw new Exception("没有这个类");
    //         if (get_parent_class($model) != 'ezModel')
    //             throw new Exception("类没有继承ezModel");
    //         return new $model();
    //     } else {
    //         if (!$db->checkTableExist($model))
    //             throw new Exception("没有这个模型");
    //         return new ezModel($model);
    //     }
    // }
    
    public function __construct($model)
    {
        if (empty($GLOBALS['ezData']['db'])) {
            $this->db                = new ezDB();
            $GLOBALS['ezData']['db'] = $this->db;
        } else
            $this->db = $GLOBALS['ezData']['db'];
        $this->dbConnect = $this->db->getConnect();
        $this->table     = $model;
    }
    
    private function execute()
    {
        //組合sql
        $sql                 = $this->sql['option'];
        $this->sql['option'] = '';
        foreach ($this->sql as $key => $value) {
            $sql .= $value == '' ? '' : ' ' . $key . ' ' . $value;
        }
        // 执行sql查询
        $row = mysqli_query($this->dbConnect, $sql);
        if (gettype($row) != 'object')
            return $row;
        // 获取查询结果
        $data = array();
        while ($result = mysqli_fetch_assoc($row)) {
            $data[] = $result;
        }
        return $data;
    }
    
    public function select($condition = null)
    {
        if (gettype($condition) == 'array') {
            $this->sql['option'] = 'select ' . (count($condition) == 0 ? '*' : implode(',', $condition)) . ' from ' . $this->table;
        } else if (gettype($condition) == 'string') {
            $this->sql['option'] = 'select ' . ($condition != '' ?: '*') . ' from ' . $this->table;
        } else if (gettype($condition) == 'NULL') {
            $this->sql['option'] = 'select ' . '*' . ' from ' . $this->table;
        }
        return $this->execute();
    }
    
    public function where_in($key, array $condition)
    {
        if (count($condition) > 0 & !empty($key)) {
            $prefix = $this->sql['where'] == '' ?: ' and ';
            $this->sql['where'] .= $prefix . ' in(' . implode(',', $condition) . ')';
        }
        return $this;
    }
    public function where($condition)
    {
        $prefix = $this->sql['where'] == '' ?: ' and ';
        if (gettype($condition) == 'array') {
            $this->sql['where'] .= $prefix . count($condition) == 0 ? '' : ezDicToString($condition, ' and ', '=');
        } else if (gettype($condition) == 'string') {
            $this->sql['where'] .= $prefix . $condition != '' ?: '*';
        }
        return $this;
    }
    
    public function limit($limit, $offset = 0)
    {
        $this->sql['limit'] = ' ' . $offset . ',' . $limit;
    }
    
    public function beginTransaction()
    {
        $this->dbConnect->autocommit(false);
    }
    
    public function endTransaction()
    {
        if ($this->dbConnect->error) {
            $this->dbConnect->commit();
            $this->dbConnect->autocommit(true);
            return true;
        } else {
            $this->dbConnect->rollback();
            $this->dbConnect->autocommit(true);
            return false;
        }
    }
    
    public function insert($data)
    {
        $this->sql['option'] = 'insert into ' . $this->table . '(' . implode(',', array_keys($data)) . ') values (' . implode(',', array_values($data)) . ')';
        return $this->execute();
    }
    
    public function insertList($dataList)
    {
        $firstRow = reset($dataList);
        if (!is_array($firstRow))
            return $this;
        
        $sql = 'insert into ' . $this->table . '(' . explode(',', array_keys($firstRow)) . ') values ';
        
        foreach ($dataList as $data)
            $sql .= '(' . implode(',', array_values($data)) . '),';
        $this->sql['option'] = substr($sql, 0, -1);
        return $this->execute();
    }
    
    public function update(array $data, array $condition = array())
    {
        $sql = 'update ' . $this->table . 'set ';
        foreach ($data as $key => $value)
            $sql .= $key . '=' . $value . ',';
        $this->sql['option'] = substr($this->sql, 0, -1);
        return $this->execute();
    }
}