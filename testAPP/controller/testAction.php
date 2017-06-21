<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/12
 * Time: 14:13
 */

class testAction extends ezControl{

	public function test(){
		$ez_user = ezModel::getInterface('ez_user');
        $ez_user->insert(array('id'=>'1'));
		echo "com in !<br>";
	}
	public function hook(){
		echo "hook in".'<br>';
	}
}