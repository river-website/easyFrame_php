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
	public function test1(){
		$yunUrl = $this->getModel('yunUrl');
		$d = $yunUrl->order(array('id'))->select(array('id'));
		$min = $d[0]['id'];
		$max = $d[count($d)-1]['id'];
		foreach ($d as $item) {
			$g[$item['id']] = $item['id'];
		}
		for($i=$min;$i<=$max;$i++)
			if(!isset($g[$i]))
				$f[] = $i;
		echo implode(',',$f);
	}
	public function test2(){
        echo "back com in\n";

        $hotSearch = $this->getModel('hotSearch');
        $today = date('Ymd',time());
        $hotSearchData = $hotSearch
            ->where(array("date=$today"))
            ->group(array('searchWord'))
            ->order(array('count(searchWord)'))
            ->select(array('searchWord'));
	}
	public function test(){
		ezGLOBALS::$queEvent->back(array($this,'test2'));
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
			'title'=>array('head title','text'),
			'ukName'=>array(),
			'size'=>array()
		);
		$this->rules['https://wangpan007.com/redirect/file?id=%id%'] = array(
			'url'=>array('#tip_msg p:eq(1)','text')
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
	public function crawl(){
	    $count = 1000;
	    while(--$count>=0)
          ezGLOBALS::$queEvent->add(array($this,'baiduyunpan_file'));
    }
    public function crawl_baiduyunurl(){
        $count = 100;
        while(--$count>=0)
            $this->baiduyunpan_file();
    }
    public function back_crawl(){
        ezGLOBALS::$queEvent->back(array($this,'crawl_baiduyunurl'));
    }
	public function baiduyunpan_file(){
		ezServerLog("crawl yun url start");
		$baseUrl = 'http://www.baiduyunpan.com/file/%id%.html';
		$rule = $this->rules[$baseUrl];

		$crawlLast = $this->getModel('crawlLast');
		$last = $crawlLast->where(array('web="http://www.baiduyunpan.com/file/"'))->select();
		$last = $last[0];
		$start = $last['last'] + 1;
		$end = $start + 100;
        $last['last'] = $last['last'] + 100;
        $crawlLast->update($last,array('id='.$last['id']));
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		for ($i=$start;$i<$end;$i++){
		    $url = str_replace('%id%',$i,$baseUrl);
			$phpQuery->html = $url;
			$data = $phpQuery->setQuery($rule)->data;
			if(count($data) != 1 || count($data[0]) != 5){
			    $errData[] = array('url'=>$url,'type'=>0);
			    continue;
            }
			ezServerLog("crawl id is: $i");
			$crawlData[] = $data[0];
		}
		if(!empty($crawlData)&&count($crawlData)>0) {
            $yunUrl = $this->getModel('yunUrl');
            $yunUrl->insertList($crawlData);
			ezServerLog("crawl yun url data,count=".count($crawlData));
        }
		if(!empty($errData)&&count($errData)>0){
		    $err = $this->getModel('errCrawl');
		    $err->insertList($errData);
			ezServerLog("crawl yun url err count=".count($errData));
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

	public function backTask($taskName){
		ezGLOBALS::$queEvent->back(array($this,$taskName));
	}
	public function crawl_wangpan007(){
		$count = 100;
		while(--$count>=0)
			$this->wangpan007();
	}
	public function repairData(){
		$share_file = $this->getModel('share_file');
		$shareList = $share_file->select(array('id','url'));
		for($i=0;$i<count($shareList);$i++){
			$temp1 =explode('?',$shareList[$i]['url']);
			if(count($temp1) != 2)continue;
			parse_str($temp1[1],$temp2);
			if(!empty($temp2['shareid']))$data['shareid'] = $temp2['shareid'];
			if(!empty($temp2['uk']))$data['uk'] = $temp2['uk'];
			if(!empty($temp2['fid']))$data['fid'] = $temp2['fid'];
			$share_file->update($data,array('id='.$shareList[$i]['id']));
		}
	}
	public function checkUrl($urlList){
		$baseUrl = 'hhttp://pan.baidu.com/share/link?shareid=%shareid%&uk=%uk%&fid=%fid%';
		$rule = $this->rules[$baseUrl];
		$phpQuery = new QueryList();
		foreach ($urlList as $url){
			$phpQuery->html = $url;
			$crawl = $phpQuery->setQuery($rule)->data;
		}
	}
	public function wangpan007(){
		ezServerLog("crawl_wangpan007 url start");
		$baseUrl = 'https://wangpan007.com/redirect/file?id=%id%';
		$rule = $this->rules[$baseUrl];

		$crawlLast = $this->getModel('crawlLast');
		$last = $crawlLast->where(array('web="https://wangpan007.com/redirect/file?id=%id%"'))->select();
		$last = $last[0];
		$start = $last['last'] + 1;
		$end = $start + 100;
		$last['last'] = $last['last'] + 100;
		$crawlLast->update($last,array('id='.$last['id']));
		ezGLOBALS::addErrorIgnorePath(E_NOTICE,ezSYSPATH.'/library/');
		$phpQuery = new QueryList();
		for ($i=$start;$i<$end;$i++){
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
			ezServerLog("crawl id is: $i");
			$crawlData[] = $data;
		}
		if(!empty($crawlData)&&count($crawlData)>0) {
			$share_file = $this->getModel('share_file');
			$share_file->insertList($crawlData);
			ezServerLog("crawl_wangpan007 url data,count=".count($crawlData));
		}
	}

}