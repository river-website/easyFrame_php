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
class indexAction extends ezControl{
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
	}
	public function search($type,$searchWord){

	}
	public function look(){

	}
	public function crawl(){
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
                return $a[1];
            })
        );
        $yunUrl = $this->getModel('yunUrl');
        $baseUrl = 'http://www.baiduyunpan.com/file';
        $rule = $rules[$baseUrl];
        $this->crawlData(array($baseUrl,$rule,$yunUrl));
//        ezGLOBALS::$queEvent->add(array($this,'crawlData'),array($baseUrl,$rule,$yunUrl));
   	}
   	public function crawlData($args){
        echo "start crawl\n";
        $baseUrl = $args[0];
        $rule = $args[1];
        $yunUrl = $args[2];
        $phpQuery = new QueryList();
        for ($i=1;$i<2;$i++){
            $phpQuery->html = $baseUrl."/$i.html";
            $data[] = $phpQuery->setQuery($rule)->data[0];
//                var_dump($data);
        }
        $yunUrl->insertList($data);
    }
	public function updateCrawl(){

	}
	public function admin(){

	}
	public function login(){

	}
}