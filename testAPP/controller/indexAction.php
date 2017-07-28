<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/7/28
 * Time: 13:49
 */
/*
	user	id	name		pwd		role 	used
	yunUser	id	yunName
	yunUrl	id	url		name	type	yunId
	hotKey	id	key		times
	hotUrl	id	yunUrlID	times

*/
class indexAction extends ezControl{
	public function index(){
	$hotKey = $this->getModel('hotKey');
	$hotUrl = $this->getModel('hotUrl');
	$hotKeyData = $hotKey->select();
	$hotUrlData = $hotUrl->select();
	}
	public function search($type,$searchWord){

	}
	public function look(){

	}
	public function crawl(){

	}
	public function updateCrawl(){

	}
	public function admin(){

	}
	public function login(){

	}
}