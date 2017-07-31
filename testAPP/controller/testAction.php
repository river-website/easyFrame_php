<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/12
 * Time: 14:13
 */

class testAction extends ezControl
{
	public function revsql($data){
	ezGLOBALS::set('ez_user',$data);
		var_dump($data);
	}
	public function test()
	{
//		echo "test com in"; 
//	$ez_user = ezGLOBALS::get('ez_user');
//	if($ez_user == null) {
		$ez_user = $this->getModel('ez_user');
//		$ez_user->func = array($this, 'revsql');
		$a = $ez_user->select();
		var_dump($a);
//	}else{
//		echo "get data from globals<br>";
//		var_dump($ez_user);
//	}
//		var_dump($a);
//		$test = $this->getCacheFile('test');
//		if(empty($test))
//			$this->saveCacheFile('test','test value',300);
//		else
//			echo '<br>'.$test.'<br>';

//		$a = $this->getCacheRedis('redis_test');
//		if(empty($a))
//			$this->saveCacheRedis('redis_test','test_value');
//		echo $a;
	}
	public function hook($in)
	{
		echo "hook $in" . '<br>';
	}
}