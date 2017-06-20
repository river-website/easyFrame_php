<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/12
 * Time: 14:13
 */

class testAction extends ezControl{

	public function test(){
		$tvsd = ezModel::getInterface('tvsd');
		$tvsd->insert(array('id'=>'1'));
		echo "com in !";
	}
	public function hook(){
		echo "hook in".'<br>';
	}
}