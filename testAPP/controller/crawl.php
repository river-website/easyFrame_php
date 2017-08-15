<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/8/7
 * Time: 17:16
 */
require_once ezSYSPATH.'/library/QueryList/autoload.php';
use QL\QueryList;

class crawl extends ezControl {
	private $rules = array();
	public function __construct(){
		$this->initRules();
	}
	private function initRules(){
		$this->rules['http://www.baiduyunpan.com/file/%id%.html'] = array(
			'name'=>array('.resource-h2','text'),
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
			'fileName'=>array('head title','text',null,function($contents){
				return str_replace('_免费高速下载|百度网盘-分享无限制','',$contents);
			}),
			'size'=>array('.button-box .text:eq(1)','text',null,function($con){
				return str_replace(')','',str_replace('(','',$con));
			})
		);
		$this->rules['https://wangpan007.com/redirect/file?id=%id%'] = array(
			'url'=>array('#tip_msg p:eq(1)','text')
		);
		$this->rules['https://wangpan007.com/share/file/%id%'] = array(
			'fileName'=>array('.title-box h1','text'),
			'suffix'=>array('.info-basic li:eq(0) span','text',null,function($con){
				$con = ltrim($con,'(');
				return rtrim($con,')');
			}),
			'size'=>array('.info-basic li:eq(1)','text',null,function($con){
				return str_replace('文件大小：','',$con);
			}),
			'shareTime'=>array('.info-basic li:eq(2)','text',null,function($con){
				return str_replace('分享时间：','',$con);
			})
		);
		$this->rules['http://www.sopanpan.com/file/%id%.html'] = array(
			'fileName'=>array('.wbreak','text'),
			'url'=>array('#down','href'),
			'uk'=>array('.usrif .r a','href',null,function($con){
				$con = str_replace('/user/','',$con);
				return str_replace('-0.html','',$con);
			})
		);
		$this->rules['http://pan.baidu.com/share/home?uk=%id%'] = array(
			'userName'=>array('.homepagelink','text'),
			'userInfo'=>array('.personal-info','text'),
			'imgUrl'=>array('.pic-frm-pic','src')
		);
	}
	public function backCrawlTask($taskName){
		ezGLOBALS::$queEvent->back(array($this,'crawl'),$taskName);
	}
	public function crawl($funcName){
		$count = 1000;
		while(--$count>=0){
			if($this->$funcName())break;
		}
	}
	public function baiduyun_user(){
		ezServerLog("baiduyun_user start");
		$baseUrl = 'http://pan.baidu.com/share/home?uk=%id%';
		$rule = $this->rules[$baseUrl];

		$share_user = $this->getModel('share_user');
		$crawl_list = $share_user->where(array("userName is null"))->order(array('id'),'asc')->limit(1000)->select(array('id','uk'));
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		foreach ($crawl_list as $crawl_id){
			$url = str_replace('%id%',$crawl_id['uk'],$baseUrl);
			ezDebugLog($url);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 2){
				continue;
			}
			$data = $data[0];
			ezServerLog('baiduyun_user id is: '.$crawl_id['id'].' uk is '.$crawl_id['uk']);
			$share_user->update($data,array('id='.$crawl_id['id']));
		}
		ezServerLog("baiduyun_user end");
		if(count($crawl_list)>0)return false;
		return true;
	}
	public function sopanpan_file(){
		ezServerLog("sopanpan_file start");
		$baseUrl = 'http://www.sopanpan.com/file/%id%.html';
		$rule = $this->rules[$baseUrl];

		$ids = $this->updateLast($baseUrl,100);
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		for ($i=$ids['start'];$i<$ids['end'];$i++){
			$url = str_replace('%id%',$i,$baseUrl);
			ezDebugLog($url);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 3){
				continue;
			}
			$data = $data[0];
			$temp1 =explode('?',$data['url']);
			if(count($temp1) == 2){
				parse_str($temp1[1],$temp2);
				if(!empty($temp2['shareid']))$data['shareid'] = $temp2['shareid'];
				if(!empty($temp2['fid']))$data['fid'] = $temp2['fid'];
			}
			ezServerLog("sopanpan_file id is: $i");
			$crawlData[] = $data;
		}
		if(!empty($crawlData)&&count($crawlData)>0) {
			$share_file = $this->getModel('share_file');
			$share_file->insertList($crawlData);
			ezServerLog("sopanpan_file count=".count($crawlData));
		}
		ezServerLog("sopanpan_file end");
		return false;
	}
	public function wangpan007_file(){
		ezServerLog("wangpan007_file start");
		$baseUrl = 'https://wangpan007.com/share/file/%id%';
		$rule = $this->rules[$baseUrl];

		$share_file = $this->getModel('share_file');
		$crawl_list = $share_file->where(array("fileName is null"))->order(array('id'),'asc')->limit(1000)->select(array('id','wangpan007_id'));
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		foreach ($crawl_list as $crawl_id){
			$url = str_replace('%id%',$crawl_id['wangpan007_id'],$baseUrl);
			ezDebugLog($url);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 4){
				continue;
			}
			$data = $data[0];
			ezServerLog('wangpan007_file id is: '.$crawl_id['id'].' wanpan007 id is '.$crawl_id['wangpan007_id']);
			$share_file->update($data,array('id='.$crawl_id['id']));
		}
		ezServerLog("wangpan007_file end");
		if(count($crawl_list)>0)return false;
		return true;
	}
	public function wangpan007_redirect(){
		ezServerLog("wangpan007_redirect start");
		$baseUrl = 'https://wangpan007.com/redirect/file?id=%id%';
		$rule = $this->rules[$baseUrl];

		$ids = $this->updateLast($baseUrl,1000);
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		for ($i=$ids['start'];$i<$ids['end'];$i++){
			$url = str_replace('%id%',$i,$baseUrl);
			ezDebugLog($url);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 1){
				continue;
			}
			$data = $data[0];
			$data['url'] = str_replace('amp;','',$data['url']);
			$temp1 =explode('?',$data['url']);
			if(count($temp1) != 2)continue;
			parse_str($temp1[1],$temp2);
			if(!empty($temp2['shareid']))$data['shareid'] = $temp2['shareid'];
			if(!empty($temp2['uk']))$data['uk'] = $temp2['uk'];
			if(!empty($temp2['fid']))$data['fid'] = $temp2['fid'];
			$data['wangpan007_id'] = $i;
			ezServerLog("wangpan007_redirect id is: $i");
			$crawlData[] = $data;
		}
		if(!empty($crawlData)&&count($crawlData)>0) {
			$share_file = $this->getModel('share_file');
			$share_file->insertList($crawlData);
			ezServerLog("crawl_wangpan007 count=".count($crawlData));
		}
		ezServerLog("wangpan007_redirect end");
		return false;
	}
	public function baiduyunpan_file(){
		ezServerLog("baiduyunpan_file start");
		$baseUrl = 'http://www.baiduyunpan.com/file/%id%.html';
		$rule = $this->rules[$baseUrl];

		$ids = $this->updateLast($baseUrl,1000);
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		for ($i=$ids['start'];$i<$ids['end'];$i++){
		    $url = str_replace('%id%',$i,$baseUrl);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 5){
			    $errData[] = array('url'=>$url,'type'=>0);
			    continue;
            }
			ezServerLog("baiduyunpan_file id is: $i");
			$crawlData[] = $data[0];
		}
		if(!empty($crawlData)&&count($crawlData)>0) {
            $yunUrl = $this->getModel('yunUrl');
            $yunUrl->insertList($crawlData);
			ezServerLog("baiduyunpan_file count=".count($crawlData));
        }
		ezServerLog("baiduyunpan_file end");
		return false;
	}

	public function getSuffix($fileName){
		$pos = strrpos($fileName,'.');
		if($pos != false && $pos != 0){
			return substr($fileName,$pos);
		}else{
			return '/';
		}
	}
	public function update_baiduyun_user(){
		$share_user = $this->getModel('share_user');
		$share_file = $this->getModel('share_file');
		$all_uk_list = $share_file->group(array('uk'))->select(array('uk'));
		$old_uk_list = $share_user->select(array('uk'));
		foreach ($old_uk_list as $old_uk)
			$uk_list[$old_uk['uk']] = $old_uk['uk'];
		foreach ($all_uk_list as $uk)
			if(!isset($uk_list[$uk['uk']]))
				$new_uk_list[] = $uk;
		if(!empty($new_uk_list)) {
			$share_user->insertList($new_uk_list);
			echo('inser user count='.count($new_uk_list));
		}
	}
	public function repairData(){
		// 后缀
		$suffix = $this->getModel('suffix');
		$suffix_list = $suffix->select(array('id','suffix'));
		foreach ($suffix_list as $value){
			$id = $value['id'];
			$value = strtolower($value['suffix']);
			if(strpos($value,'.') === false)
				$value = ".$value";
			$suffix->update(array('suffix'=>$value),array("id=$id"));
		}
		// 文件 后缀修复
		$share_file = $this->getModel('share_file');
		$offet = 0;
		$limit = 1000;
		while (true){
			$share_list = $share_file->order(array('id'),'asc')->limit($limit,$offet)->select(array('id','fileName','suffix'));
			if(count($share_list) == 0)break;
			$offet += $limit;
			foreach ($share_list as $value){
				$update = array();
				$fileSuffix = $value['suffix'];
				$low = strtolower($fileSuffix);
				if(empty($fileSuffix)){
					$fileName = $value['fileName'];
					$pos = strripos($fileName,'.');
					if( $pos === false) {
						$update['suffix'] = '/';
					}
					else{
						$update['suffix'] = strtolower(substr($fileName,$pos));
					}
				}else{
					if(strpos($low,'.') === false)
						$low = '.'.$low;
					else if($low===$fileSuffix)continue;
					$update['suffix'] = $low;
				}
				$share_file->update($update,array('id=',$value['id']));
			}
		}
	}
	public function updateLast($www,$count){
		$crawlLast = $this->getModel('crawlLast');
		$last = $crawlLast->where(array("web='$www'"))->select();
		$last = $last[0];
		$start = $last['last'] + 1;
		$end = $start + $count;
		$last['last'] = $last['last'] + $count;
		$crawlLast->update($last,array('id='.$last['id']));
		return array('start'=>$start,'end'=>$end);
	}

	public function wangpan007_file_sign($id){
		ezServerLog("wangpan007_file start");
		$baseUrl = 'https://wangpan007.com/share/file/%id%';
		$rule = $this->rules[$baseUrl];

		$share_file = $this->getModel('share_file');
		$crawl_list = $share_file->where(array('id='.$id))->select(array('id','wangpan007_id'));
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		foreach ($crawl_list as $crawl_id){
			$url = str_replace('%id%',$crawl_id['wangpan007_id'],$baseUrl);
			ezDebugLog($url);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 4){
				continue;
			}
			$data = $data[0];
			ezServerLog('crawl id is: '.$crawl_id['id'].' wanpan007 id is '.$crawl_id['wangpan007_id']);
			$share_file->update($data,array('id='.$crawl_id['id']));
		}
		if(count($crawl_list)>0)return false;
		return true;
	}
	public function sopanpan_file_sign($id){
		ezServerLog("sopanpan_file start");
		$baseUrl = 'http://www.sopanpan.com/file/%id%.html';
		$rule = $this->rules[$baseUrl];

		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		$url = str_replace('%id%',$id,$baseUrl);
		ezDebugLog($url);
		$phpQuery->html = $url;
		$data = $phpQuery->setQuery($rule)->data;
		if(count($data) != 1 || count($data[0]) != 3){
			return;
		}
		$data = $data[0];
		$temp1 =explode('?',$data['url']);
		if(count($temp1) == 2){
			parse_str($temp1[1],$temp2);
			if(!empty($temp2['shareid']))$data['shareid'] = $temp2['shareid'];
			if(!empty($temp2['fid']))$data['fid'] = $temp2['fid'];
		}
		ezServerLog("crawl id is: $id");
		$crawlData[] = $data;
		var_dump($crawlData);
		if(!empty($crawlData)&&count($crawlData)>0) {
			$share_file = $this->getModel('share_file');
			$share_file->insertList($crawlData);
			ezServerLog("sopanpan_file crawl count=".count($crawlData));
		}
	}
	public function baiduyun_file_sign($id){
		$baseUrl = 'http://pan.baidu.com/share/link?shareid=%shareid%&uk=%uk%&fid=%fid%';
		$rule = $this->rules[$baseUrl];

		$share_file = $this->getModel('share_file');
		$url = $share_file->where(array("id=$id"))->select(array('url'));
		$url = $url[0]['url'];
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
//		$url = str_replace('%id%',$id,$baseUrl);
		echo($url);
		$phpQuery->html = $url;
		$data = $phpQuery->setQuery($rule)->data;
		if(count($data) != 1 || count($data[0]) != 3){
			return;
		}
		$data = $data[0];
		ezServerLog("crawl id is: $id");
		$crawlData[] = $data;
		var_dump($crawlData);
		if(!empty($crawlData)&&count($crawlData)>0) {
//			$share_file->insertList($crawlData);
			ezServerLog("sopanpan_file crawl count=".count($crawlData));
		}
	}
}