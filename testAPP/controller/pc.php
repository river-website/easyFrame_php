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
class pc extends ezControl{
	public function index(){
		$this->baseInfo();
        $this->hot();
        $yunUrl = $this->getModel('yunUrl');
        $newUrlData =  $yunUrl
            ->order(array('id'))
            ->limit(100)
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