<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 11:31
 */


class ezModel extends ezBase
{

	private $db = null;
	private $dbConnect = null;
	private $table = null;
    static private $initsql = array('option' => '', 'where' => '','join'=>'', 'group by' => '', 'having' => '', 'union' => '', 'order by' => '', 'limit' => '');
    private $sql = array('option' => '', 'join'=>'', 'where' => '','group by' => '', 'having' => '', 'union' => '', 'order by' => '', 'limit' => '');
	public $func = null;
	public $lastSql = null;
	// static function getInterface($model)
	// {
	//	 if (empty($model))
	//		 throw new Exception("model名为空");

	//	 if (empty($GLOBALS['ezData']['db'])) {
	//		 $db						= new ezDB();
	//		 $GLOBALS['ezData']['db'] = $db;
	//	 } else
	//		 $db = $GLOBALS['ezData']['db'];

	//	 if (file_exists(ezAPPPATH . '/model/' . $model . '.php')) {
	//		 require_once ezAPPPATH . '/model/' . $model . '.php';
	//		 if (!class_exists($model))
	//			 throw new Exception("没有这个类");
	//		 if (get_parent_class($model) != 'ezModel')
	//			 throw new Exception("类没有继承ezModel");
	//		 return new $model();
	//	 } else {
	//		 if (!$db->checkTableExist($model))
	//			 throw new Exception("没有这个模型");
	//		 return new ezModel($model);
	//	 }
	// }

	public function __construct($model)
	{
		if (empty($GLOBALS['ezData']['db'])) {
			$this->db				= new ezDB();
			$GLOBALS['ezData']['db'] = $this->db;
		} else
			$this->db = $GLOBALS['ezData']['db'];
		$this->dbConnect = $this->db->getConnect();
		$this->table	 = $model;
	}

	private function execute()
	{
		//組合sql
		$sql				 = $this->sql['option'];
		$this->sql['option'] = '';
		foreach ($this->sql as $key => $value) {
			if($key == 'join')
				$sql .= $value;
			else
				$sql .= $value == '' ? '' : ' ' . $key . ' ' . $value;
		}
		$this->lastSql = $sql;
		$this->sql = self::$initsql;
	    return ezDbPool::getInterface()->excute($sql,$this->func);
//		// 执行sql查询
//		$row = mysqli_query($this->dbConnect, $sql);
//		if (gettype($row) != 'object')
//			return $row;
//		// 获取查询结果
//		$data = array();
//		while ($result = mysqli_fetch_assoc($row)) {
//			$data[] = $result;
//		}
//		return $data;
	}

	public function select(array $fields = array())
	{
		if (gettype($fields) == 'array') {
			$this->sql['option'] = 'select ' . (count($fields) == 0 ? '*' : implode(',', $fields)) . ' from ' . $this->table;
		} else if (gettype($fields) == 'string') {
			$this->sql['option'] = 'select ' . ($fields != '' ?: '*') . ' from ' . $this->table;
		} else if (gettype($fields) == 'NULL') {
			$this->sql['option'] = 'select ' . '*' . ' from ' . $this->table;
		}
		return $this->execute();
	}

	public function where_in($key, array $condition = array())
	{
		if (count($condition) > 0 && !empty($key)) {
			$prefix = $this->sql['where'] == '' ?'': ' and';
			$this->sql['where'] .= $prefix . " $key in('" . implode("','", $condition) . "')";
		}
		return $this;
	}
	public function where_not_in($key,array $condition = array()){
	    if(count($condition) > 0 && !empty($key)){
            $prefix = $this->sql['where'] == '' ?'': ' and';
            $this->sql['where'] .= $prefix . " $key not in('" . implode("','", $condition) . "')";
        }
        return $this;
    }
	public function like(array $condition = array()){
		if(count($condition) > 0){
			foreach ($condition as $key=>$value) {
				$prefix = $this->sql['where'] == '' ?'': ' and';
				$this->sql['where'] .= $prefix . " $key like '%$value%'";
			}
		}
		return $this;
	}
	public function order(array $keys = array(),$sort = 'asc'){
		if(count($keys) > 0){
			$keys = implode(',',$keys);
			$this->sql['order by'] = "$keys $sort";
		}
		return $this;
	}

	public function group(array $keys = array()){
	     if(count($keys)>0){
            $this->sql['group by'] = implode(',',$keys);
         }
         return $this;
    }

	public function where(array $condition = array())
	{
	    if(count($condition)>0) {
            $prefix = $this->sql['where'] == '' ? '' : ' and ';
            $this->sql['where'] .= $prefix . implode(' and', $condition);
        }
		return $this;
	}
	public function join($table,$condition,$way = ''){
		if(!empty($table) || !empty($condition)){
			$this->sql['join'] .= " $way join $table on $condition";
		}
		return $this;
	}
	public function limit($limit, $offset = 0)
	{
		$this->sql['limit'] = ' ' . $offset . ',' . $limit;
		return $this;
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
		$this->sql['option'] = 'insert into ' . $this->table . '(' . implode(',', array_keys($data)) . ') values ("' . implode('","', array_values($data)) . '")';
		return $this->execute();
	}

	public function insertList($dataList)
	{
		$firstRow = reset($dataList);
		if (!is_array($firstRow))
			return $this;

		$sql = 'insert into ' . $this->table . '(' . implode(',', array_keys($firstRow)) . ') values ';
		foreach ($dataList as $data) {
			$temp = array_values($data);
			$temp1 = array();
			foreach ($temp as $value)
				$temp1[] = addslashes($value);
            $sql .= "('" . implode("','", $temp1) . "'),";
        }
		$this->sql['option'] = substr($sql, 0, -1);
		return $this->execute();
	}

	public function update(array $data, array $condition = array())
	{
		$sql = 'update ' . $this->table . ' set ';
		foreach ($data as $key => $value){
			$value = addslashes($value);
			$temp[] = "$key='$value'";
		}
        if(!empty($temp)&&count($temp)>0)
            $sql .= implode(',',$temp);
        if(count($condition)>0)
            $sql .= ' where '.implode(' and ',$condition);
		$this->sql['option'] = $sql;
		return $this->execute();
	}
}