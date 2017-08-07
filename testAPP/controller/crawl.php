<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/8/7
 * Time: 17:16
 */
require_once ezSYSPATH.'/library/QueryList/autoload.php';
use QL\QueryList;

class crawl{
	private $rules = array();
	public function __construct(){
		$this->initRules();
	}

	private function initRules(){
		$this->rules['http://www.baiduyunpan.com/file/%id%.html'] = array(
			'name'=>array('.resource-h2','text'),
//            'yunUserName'=>array('.x-right-li-a','text',null,function($contents){
//                if(strstr($contents,'Undefined index: uk_text in'))return '';
//                return $contents;
//            }),
			'yunUserID'=>array('.x-right-li-a','href',null,function($contents){
				$a = explode('-',$contents);
				$a = explode('/',$a[0]);
				if(empty($a[2]))return '';
				return $a[2];
			}),
			'size'=>array('.x-right-li:eq(2) span','text'),
			'suffix'=>array('.x-right-li:eq(4) span','text'),
			'url'=>array('.main-xzfx-a:eq(0)','href',null,function($contents){
				$a = explode('url=',$contents);
				if(empty($a[1]))return '';
				return urldecode($a[1]);
			})
		);
		$this->rules['http://www.baiduyunpan.com/user/%id%-0-0.html'] = array(
			'name'=>array('.main-right-h2','text',null,function($contents){
				return str_replace('的百度云资源','',$contents);
			}),
			'imgUrl'=>array('.main-left-a img','src')
		);
		$this->rules['http://pan.baidu.com/share/link?shareid=%shareid%&uk=%uk%&fid=%fid%'] = array(
			'title'=>array('head title')
		);
	}

	public function urlVariable($url){
		$baseUrl = 'http://pan.baidu.com/share/link?shareid=%shareid%&uk=%uk%&fid=%fid%';
		$rule = $this->rules[$baseUrl];
		$phpQuery = new QueryList();
		$phpQuery->html = $url;
		$title = $phpQuery->setQuery($rule)->data[0]['title'];
		$fileName = str_replace('_免费高速下载|百度网盘-分享无限制',$title);
		if(empty($fileName))return false;
		else return true;
	}

	public function baiduyunpan_file(){
		$baseUrl = 'http://www.baiduyunpan.com/file/%id%.html';
		$rule = $this->rules[$baseUrl];

		$yunUrl = $this->getModel('yunUrl');
		$maxID = $yunUrl->order(array('id'),'desc')->limit(1)->select(array('id'));
		if(count($maxID) == 0){
			$start = 1;
		}else{
			$start = $maxID[0]['id']+1;
		}
		$end = $start + 100;
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		for ($i=$start;$i<=$end;$i++){
			$phpQuery->html = $baseUrl."/$i.html";
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1)continue;
			if(count($data[0]) != 5)continue;
			$crawlData[] = $data[0];
		}
		if(!empty($crawlData)&&count($crawlData)>0) {
			$yunUrl->insertList($crawlData);
		}
	}

	public function baiduyunpan_user(){
		$yunUser = $this->getModel('yunUser');
		$yunUserIds = $yunUser->select(array('id'));
		foreach ($yunUserIds as $yunUserId)
			$ids[] = $yunUserId['id'];
		$yunUrl = $this->getModel('yunUrl');
		if(!empty($ids) && count($ids) > 0)
			$yunUrl->where_not_in('yunUserID',$ids);
		$newIDs = $yunUrl->group(array('yunUserID'))->select(array('yunUserID'));
		$phpQuery = new QueryList();
		$baseUrl = 'http://www.baiduyunpan.com/user/%id%-0-0.html';
		$rule = $this->relus[$baseUrl];
		foreach ($newIDs as $newID){
			$yunUserID = $newID['yunUserID'];
			$url = str_replace('%id%',$yunUserID,$baseUrl);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1)continue;
			if(count($data[0]) != 2)continue;
			$data[0]['id'] = $yunUserID;
			$crawlData[] = $data[0];
		}
		$yunUser->insertList($crawlData);
	}
}