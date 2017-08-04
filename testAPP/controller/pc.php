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
		$webSiteData = ezGLOBALS::get('webSiteData');
		if(empty($webSiteData)){
			$webSite = $this->getModel('webSite');
			$webSiteData = $webSite->select();
			ezGLOBALS::set('webSiteData',$webSiteData,600);
		}
		$this->assign('webSite',$webSiteData);

		$menusData = ezGLOBALS::get('menusData');
		if(empty($menusData)){
			$menus = $this->getModel('menus');
			$menusData = $menus->select();
			ezGLOBALS::set('menusData',$webSiteData,600);
		}
		$this->assign('menus',$menusData);

        $hotKeyData = ezGLOBALS::get('hotKeyData');
        if(empty($hotKeyData)){
            $hotKey = $this->getModel('hotKey');
            $hotKeyData = $hotKey->select();
            ezGLOBALS::set('hotKeyData',$hotKeyData,600);
        }
		$this->assign('hotKey',$hotKeyData);

		$hotUrlData = ezGLOBALS::get('hotUrlData');
		if(empty($hotUrlData)){
            $hotUrl = $this->getModel('hotUrl');
            $hotUrlData = $hotUrl->select();
            ezGLOBALS::set('hotUrlData',$hotUrlData,600);
        }
		$this->assign('hotUrl',$hotUrlData);

		$newUrlData = ezGLOBALS::get('newUrlData');
        if(empty($newUrlData)){
            $yunUrl = $this->getModel('yunUrl');
            $newUrlData = $yunUrl->select();
            ezGLOBALS::set('newUrlData',$newUrlData,600);
        }
		$this->assign('newUrl',$newUrlData);

        $this->display('index');
	}
	public function search($menu,$type,$searchWord,$page){
		$yunUrl = $this->getModel('yunUrl');
		if(!empty($menu)) {
			$types = $this->getModel('types');
			$data = $types->where(array('menu'=>$menu))->select(array('type'));
			foreach ($data as $value)
				$typesList = $value['type'];
			$yunUrl->where_in('type',$typesList);
		}
		if(!empty($type))
			$yunUrl->where(array('type'=>$type));
		if(!empty($searchWord))
			$yunUrl->like(array('name'=>$searchWord));
		$searchData = $yunUrl->join('yunUser','yunUser.id=yunUrl.yunUserID')->limit(10)->select('yunUrl.*,yunUser.name as yunUserName');
		$this->assign('searchData',$searchData);
		$this->display('search');
	}
	public function file($fileID){
		$yunUrl = $this->getModel('yunUrl');
		$fileInfo = $yunUrl->where(array('id'=>$fileID))->join('yunUser','yunUser.id=yunUrl.yunUserID')->select();
		$userFiles = $yunUrl->where(array('yunUserID'=>$fileInfo['yunUserID']))->limit(20)->select(array('name','url'));
		$likeFiles = $yunUrl->like('name',$fileInfo['name'])->select(array('name','url'));
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
	public function yunUser($yunUserID,$page=0){
		if(!empty($yunUserID)){
			$yunUser = $this->getModel('yunUser');
			$userInfo = $yunUser->where(array('id'=>$yunUserID))->select();
			$yunUrl = $this->getModel('yunUrl');
			$userFiles = $yunUrl->where(array('yunUserID'=>$yunUserID))->limit(10)->select();
			$this->assign('userInfo',$userInfo);
			$this->assign('userFiles',$userFiles);
		}
		$this->display('user');
	}
	public function admin(){
		if(empty($_COOKIE['id']))$this->display('login');


		$this->display('admin');
	}
	public function login(){
		$name = $_POST['name'];
		$pwd = $_POST['pwd'];
		$user = $this->getModel('user');
		$userData = $user->where(array('name'=>$name))->select(array('user','pwd'));
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