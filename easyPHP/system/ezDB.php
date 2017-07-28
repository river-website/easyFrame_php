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
		$this->conf	= $GLOBALS['ezData']['conf']->getNode('db');
//		$this->connect = $this->connectDB();
	}

	private function connectDB()
	{
		if (!empty($GLOBALS['ezData']['dbConnect']))
			return $GLOBALS['ezData']['dbConnect'];

		$con = mysqli_connect($this->conf['host'], $this->conf['user'], $this->conf['password'], $this->conf['dataBase'], $this->conf['port']);
		if (!$con)
			throw new Exception(mysqli_error());
		$asynDB = $GLOBALS['server']->asynDB;
		$asynDB->add($con);
		$GLOBALS['ezData']['dbConnect'] = $con;
		return $con;
	}
	function checkTableExist($table)
	{
		return true;
		$row	= mysqli_query($this->connect, "show tables");
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