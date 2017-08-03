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
    website id
*/
require_once ezSYSPATH.'/library/QueryList/autoload.php';
use QL\QueryList;
class pc extends ezControl{
	public function index(){
        $hotKeyData = ezGLOBALS::get('hotKeyData');
        if(empty($hotKeyData)){
            $hotKey = $this->getModel('hotKey');
            $hotKeyData = $hotKey->select();
            ezGLOBALS::set('hotKeyData',$hotKeyData,600);
        }
        $hotUrlData = ezGLOBALS::get('hotUrlData');
        if(empty($hotUrlData)){
            $hotUrl = $this->getModel('hotUrl');
            $hotUrlData = $hotUrl->select();
            ezGLOBALS::set('hotUrlData',$hotUrlData,600);
        }
        $newUrlData = ezGLOBALS::get('newUrlData');
        if(empty($newUrlData)){
            $yunUrl = $this->getModel('yunUrl');
            $newUrlData = $yunUrl->select();
            ezGLOBALS::set('newUrlData',$newUrlData,600);
        }
        $this->assign('websiteInfo',array('title'=>'test title'));
        $this->assign('menuList',array('test1','test2'));
        $this->display('index');
	}
	public function search($type,$searchWord){
		$yunUrl = $this->getModel('yunUrl');

	}
	public function look(){

	}
	public function test(){
	    $this->assign('test','test');
	    $this->display('index');
    }
	public function crawl($start,$end){
        $rules['http://www.baiduyunpan.com/file'] = array(
            'name'=>array('.resource-h2','text'),
//            'yunUserName'=>array('.x-right-li-a','text',null,function($contents){
//                if(strstr($contents,'Undefined index: uk_text in'))return '';
//                return $contents;
//            }),
            'yunID'=>array('.x-right-li-a','href',null,function($contents){
                $a = explode('-',$contents);
                $a = explode('/',$a[0]);
                if(empty($a[2]))return '';
                return $a[2];
            }),
            'size'=>array('.x-right-li:eq(2) span','text'),
            'type'=>array('.x-right-li:eq(4) span','text'),
            'url'=>array('.main-xzfx-a:eq(0)','href',null,function($contents){
                $a = explode('url=',$contents);
                if(empty($a[1]))return '';
                return urldecode($a[1]);
            })
        );
        $yunUrl = $this->getModel('yunUrl');
        $baseUrl = 'http://www.baiduyunpan.com/file';
        $rule = $rules[$baseUrl];
//        $this->crawlData(array($baseUrl,$rule,$start,$end,$yunUrl));
        ezGLOBALS::$queEvent->add(array($this,'crawlData'),array($baseUrl,$rule,$start,$end,$yunUrl));
   	}
   	public function crawlData($args){
        echo "start crawl\n";
        $baseUrl = $args[0];
        $rule = $args[1];
		$start = $args[2];
		$end = $args[3];
		$yunUrl = $args[4];
        $phpQuery = new QueryList();
        for ($i=$start;$i<=$end;$i++){
            $phpQuery->html = $baseUrl."/$i.html";
            $data[] = $phpQuery->setQuery($rule)->data[0];
                var_dump($data);
        }
        $yunUrl->insertList($data);
    }
    public function yunUrlVariable($yunUrlData){
   		$url = urldecode($yunUrlData['url']);
		$rules['http://pan.baidu.com/share/link?shareid=$shareid&uk=$uk&fid=$fid'] = array('title'=>array('head title'));
		$rule = $rules['http://pan.baidu.com/share/link?shareid=$shareid&uk=$uk&fid=$fid'];
		$phpQuery = new QueryList();
		$title = $phpQuery->setQuery($rule)->data[0]['title'];
		$fileName = str_replace('_免费高速下载|百度网盘-分享无限制',$title);
		if($fileName !=  $yunUrlData['name'])return false;
		else return true;
	}
	public function updateCrawl(){

	}
	public function admin(){

	}
	public function login(){

	}
}