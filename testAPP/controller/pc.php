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
        $this->hot();
        $yunUrl = $this->getModel('yunUrl');
        $newUrlData =  $yunUrl
            ->order(array('id'))
            ->limit(50)
            ->select();
        $this->assign('newUrlList',$newUrlData);
        $this->display('index');
	}
	public function hot(){
        $hotSearchData = ezGLOBALS::get('hotSearchData');
        if(empty($hotSearchData)){
            $hotSearch = $this->getModel('hotSearch');
            $today = date('Ymd',time());
            $hotSearchData = $hotSearch
                ->where(array("date=$today"))
                ->group(array('searchWord'))
                ->order(array('count(searchWord)'))
                ->select(array('searchWord'));
            ezGLOBALS::set('hotSearchData',$hotSearchData,600);
        }
        $this->assign('hotSearchList',$hotSearchData);

        $hotUrlData = ezGLOBALS::get('hotUrlData');
        if(empty($hotUrlData)){
            $hotUrl = $this->getModel('hotUrl');
            $today = date('Ymd',time());
            $hotUrlData = $hotUrl
                ->join('yunUrl','yunUrl.id=hotUrl.yunUrlID')
                ->where(array("date=$today"))
                ->group(array('yunUrlID'))
                ->order(array('count(yunUrlID)'))
                ->select(array('yunUrlID','yunUrl.name'));
            ezGLOBALS::set('hotUrlData',$hotUrlData,600);
        }
        $this->assign('hotUrlList',$hotUrlData);

        $hotUserData = ezGLOBALS::get('hotUserData');
        if(empty($hotUserData)){
            $hotUser = $this->getModel('hotUser');
            $today = date('Ymd',time());
            $hotUserData = $hotUser
                ->join('yunUser','yunUser.id=hotUser.yunUserid')
                ->where(array("date=$today"))
                ->group(array('yunUserID'))
                ->order(array('count(yunUserID)'))
                ->select(array('yunUserID','name'));
            ezGLOBALS::set('hotUserData',$hotUserData,600);
        }
        $this->assign('hotUserList',$hotUserData);
    }
    public function baseInfo(){
	    // 网站基本信息
	    $webSite = $this->getModel('webSite');
	    $webSiteData = $webSite->where(array('id=1'))->select();
	    $this->assign('websiteInfo',$webSiteData[0]);

	    $types = $this->getModel('types');
	    $typesData = $types->select();
	    $this->assign('typeList',$typesData);
    }
	public function search($type,$suffix,$searchWord,$page = 0){
	    $this->hot();
		$yunUrl = $this->getModel('yunUrl');
		if(!empty($type)) {
			$suffixTable = $this->getModel('suffix');
			$data = $suffixTable->where(array("typeID=$type"))->select(array('suffix'));
			foreach ($data as $value)
				$suffixList[] = $value['suffix'];
			if(empty($suffixList) || count($suffixList) == 0)return;
			$yunUrl->where_in('suffix',$suffixList);
		}
		if(!empty($suffix))
			$yunUrl->where(array("suffix=$suffix"));
		if(!empty($searchWord)){
		    $searchWord = urldecode($searchWord);
            $insertdata['searchWord'] = $searchWord;
            $insertdata['date'] = date('Ymd',time());
            $hotSearch = $this->getModel('hotSearch');
            $hotSearch->insert($insertdata);
            $yunUrl->like(array('yunUrl.name'=>$searchWord));
        }
		$searchData = $yunUrl->join('yunUser','yunUser.id=yunUrl.yunUserID')->limit(20)->select(array('yunUrl.*,yunUser.name as yunUserName'));
		$this->assign('searchList',$searchData);
		$this->display('search');
	}
	public function file($fileID){
	    $this->hot();
		$yunUrl = $this->getModel('yunUrl');
		$fileInfo = $yunUrl
            ->where(array("yunUrl.id=$fileID"))
            ->join('yunUser','yunUser.id=yunUrl.yunUserID')
            ->select(array('yunUrl.*','yunUser.name as userName'));
		if(empty($fileInfo) || count($fileInfo) == 0)
		    return;
		$fileInfo = $fileInfo[0];
		$userFiles = $yunUrl
            ->where(array('yunUserID='.$fileInfo['yunUserID']))
            ->limit(20)
            ->select(array('name','id'));
		$likeFiles = $yunUrl
            ->like(array('name'=>$fileInfo['name']))
            ->limit(20)
            ->select(array('id','name'));
		$data['date'] = date('Ymd',time());
		$data['yunUrlID'] = $fileID;
		$hotUrl = $this->getModel('hotUrl');
		$hotUrl->insert($data);
		$this->assign('fileInfo',$fileInfo);
		$this->assign('userFiles',$userFiles);
		$this->assign('likeFiles',$likeFiles);
		$this->display('file');
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
            'yunUserID'=>array('.x-right-li-a','href',null,function($contents){
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
        $baseUrl = 'http://www.baiduyunpan.com/file';
        $rule = $rules[$baseUrl];
//        $this->crawlData(array($baseUrl,$rule,$start,$end));
        ezGLOBALS::$queEvent->add(array($this,'crawlData'),array($baseUrl,$rule,$start,$end));
   	}
   	public function crawlData($args){
        echo "start crawl\n";
        $baseUrl = $args[0];
        $rule = $args[1];
		$start = $args[2];
		$end = $args[3];
		$types = $this->getModel('types');
		$yunUrl = $this->getModel('yunUrl');
		$typesData = $types->select();
		foreach ($typesData as $type)
			$typesIndex[$type['type']] = $type['menuID'];

		$phpQuery = new QueryList();
        for ($i=$start;$i<=$end;$i++){
            $phpQuery->html = $baseUrl."/$i.html";
            $data = $phpQuery->setQuery($rule)->data;
            if(count($data) != 1)continue;
            if(count($data[0]) != 5)continue;
            $crawlData[] = $data[0];
        }
        if(count($crawlData)>0) {
			$yunUrl->insertList($crawlData);
		}
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
    	$crawlCount = 1000;
		$yunUrl = $this->getModel('yunUrl');
		$maxID = $yunUrl->orderBy(array('id'),'desc')->limit(1)->select('id');
		if(count($maxID) == 1){
			$maxID =$maxID[0]['id'];
			$this->crawl($maxID+1,$maxID+$crawlCount);
		}

	}
	public function crawlYunUser(){
	    $relus['http://www.baiduyunpan.com/user/%id%'] = array(
	        'name'=>array('.main-right-h2','text',null,function($contents){
	            return str_replace('的百度云资源','',$contents);
            }),
            'imgUrl'=>array('.main-left-a img','src')
        );
        $yunUser = $this->getModel('yunUser');
        $yunUserIds = $yunUser->select(array('id'));
        foreach ($yunUserIds as $yunUserId)
            $ids[] = $yunUserId['id'];
        $yunUrl = $this->getModel('yunUrl');
        if(!empty($ids) && count($ids) > 0)
            $yunUrl->where_not_in('yunUserID',$ids);
        $newIDs = $yunUrl->group(array('yunUserID'))->select(array('yunUserID'));
        $phpQuery = new QueryList();
        $baseUrl = 'http://www.baiduyunpan.com/user/%id%';
        $rule = $relus[$baseUrl];
        foreach ($newIDs as $newID){
            $yunUserID = $newID['yunUserID'];
            $url = str_replace('%id%',$yunUserID.'-0-0.html','http://www.baiduyunpan.com/user/%id%');
            $phpQuery->html = $url;
            $data = $phpQuery->setQuery($rule)->data;
            if(count($data) != 1)continue;
            if(count($data[0]) != 2)continue;
            $data[0]['id'] = $yunUserID;
            $crawlData[] = $data[0];
        }
        $yunUser->insertList($crawlData);
    }
	public function yunUser($yunUserID,$page=0){
	    $count = 20;
	    $this->hot();
		if(!empty($yunUserID)){
			$yunUser = $this->getModel('yunUser');
			$userInfo = $yunUser->where(array("id=$yunUserID"))->select();
			$yunUrl = $this->getModel('yunUrl');
			$userFiles = $yunUrl->where(array("yunUserID=$yunUserID"))->limit($count,$page*$count)->select();
			$data['yunUserID'] = $yunUserID;
			$data['date'] = date('Ymd',time());
			$hotUser = $this->getModel('hotUser');
			$hotUser->insert($data);
			$this->assign('userInfo',$userInfo);
			$this->assign('userFiles',$userFiles);
		}
		$this->display('yunUser');
	}
	public function admin(){
		if(empty($_COOKIE['id']))$this->display('login');


		$this->display('admin');
	}
	public function login(){
		$name = $_POST['name'];
		$pwd = $_POST['pwd'];
		$user = $this->getModel('user');
		$userData = $user->where(array("name=$name"))->select(array('user','pwd'));
		if(count($userData) != 1){
			echo "error";
			return;
		}
		if($userData[0]['pwd'] != $pwd){
			echo 'error';
			return;
		}
		echo 'success';
	}
}