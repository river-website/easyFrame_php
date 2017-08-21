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
		$newShareList = ezServer::getInterface()->get('newShareList');
		if(empty($newShareList)) {
			$share_file = $this->getModel('share_file');
			$newShareList = $share_file
				->order(array('id'))
				->limit(100)
				->select();
			ezServer::getInterface()->set('newShareList',$newShareList,600);
		}
        $this->assign('newShareList',$newShareList);
        $this->display('index');
	}
	public function hot(){
        $hotSearchList = ezServer::getInterface()->get('hotSearchList');
        if(empty($hotSearchList)){
            $hotSearch = $this->getModel('hotSearch');
            $today = date('Ymd',time());
            $hotSearchList = $hotSearch
                ->where(array("date=$today"))
                ->group(array('searchWord'))
                ->order(array('count(searchWord)'))
                ->select(array('searchWord'));
            ezServer::getInterface()->set('hotSearchList',$hotSearchList,600);
        }
        $this->assign('hotSearchList',$hotSearchList);

        $hotFileList = ezServer::getInterface()->get('hotFileList');
        if(empty($hotFileList)){
            $hotFile = $this->getModel('hotFile');
            $today = date('Ymd',time());
            $hotFileList = $hotFile
                ->join('share_file','share_file.id=hotFile.fileID')
                ->where(array("date=$today"))
                ->group(array('fileID'))
                ->order(array('count(fileID)'))
                ->select(array('fileID','fileName'));
            ezServer::getInterface()->set('hotFileList',$hotFileList,600);
        }
        $this->assign('hotFileList',$hotFileList);

        $hotUserList = ezServer::getInterface()->get('hotUserList');
        if(empty($hotUserList)){
            $hotUser = $this->getModel('hotUser');
            $today = date('Ymd',time());
            $hotUserList = $hotUser
                ->join('share_user','share_user.id=hotUser.userID')
                ->where(array("date=$today"))
                ->group(array('userID'))
                ->order(array('count(userID)'))
                ->select(array('userID','userName'));
            ezServer::getInterface()->set('hotUserList',$hotUserList,600);
        }
        $this->assign('hotUserList',$hotUserList);
    }
    public function baseInfo(){
	    // 网站基本信息
        $webSiteInfo = ezServer::getInterface()->get('webSiteInfo');
        if(empty($webSiteInfo)){
            $webSite = $this->getModel('webSite');
            $webSiteInfo = $webSite->where(array('id=1'))->select();
            if(count($webSiteInfo) == 1)
                $webSiteInfo = $webSiteInfo[0];
            ezServer::getInterface()->set('webSiteInfo',$webSiteInfo,600);
        }
	    $this->assign('webSiteInfo',$webSiteInfo);

        $suffixType = ezServer::getInterface()->get('suffixType');
        if(empty($suffixType)) {
            $suffix = $this->getModel('suffix');
            $suffixData = $suffix->join('types', 'types.id=suffix.typeID')->select(array('types.name as typeName', 'suffix'));
            foreach ($suffixData as $value) {
                $suffixList[$value['suffix']] = $value['typeName'];
                $typesList[$value['typeName']][] = $value['suffix'];
            }
            $suffixType['suffix'] = $suffixList;
            $suffixType['types'] = $typesList;
        }
        $this->assign('suffixList',$suffixType['suffix']);
        $this->assign('typesList',$suffixType['types']);
    }
	public function search($typeName=null,$suffix=null,$searchWord=null,$page = 1){
        $this->baseInfo();
	    $this->hot();
		$share_file = $this->getModel('share_file');
		if(!empty($typeName)) {
            $typesList = ezServer::getInterface()->get('suffixType')['typesList'];
            if(empty($typesList[$typeName]))return;
            $suffixList = $typesList[$typeName];
            $share_file->where_in('suffix',$suffixList);
        }
		if(!empty($suffix))
			$share_file->where(array("suffix=$suffix"));
		if(!empty($searchWord)){
		    $searchWord = urldecode($searchWord);
            $insertdata['searchWord'] = $searchWord;
            $insertdata['date'] = date('Ymd',time());
            $hotSearch = $this->getModel('hotSearch');
            $hotSearch->insert($insertdata);
            $share_file->like(array('fileName'=>$searchWord));
        }
        if(empty($page))$page = 1;
		$searchList = $share_file->join('share_user','share_user.uk=share_file.uk')->limit(20,($page-1)*20)->select(array('share_file.id','fileName','suffix','size','shareTime','userName'));
		$this->assign('searchList',$searchList);
		$this->display('search');
	}
	public function share_file($fileID){
		$this->baseInfo();
		$this->hot();
		$share_file = $this->getModel('share_file');
		$fileInfo = $share_file
            ->where(array("share_file.id=$fileID"))
            ->join('share_user','share_user.uk=share_file.uk','left')
            ->select(array('share_file.*','share_user.userName','share_user.id as userID'));
		if(empty($fileInfo) || count($fileInfo) == 0)
		    return;
		$fileInfo = $fileInfo[0];
		$userFiles = $share_file
            ->where(array('uk='.$fileInfo['uk']))
            ->limit(20)
            ->select(array('id','fileName'));
		$likeFiles = $share_file
            ->like(array('fileName'=>$fileInfo['fileName']))
            ->limit(20)
            ->select(array('id','fileName'));
		$data['date'] = date('Ymd',time());
		$data['fileID'] = $fileID;
		$hotFile = $this->getModel('hotFile');
		$hotFile->insert($data);
		$this->assign('fileInfo',$fileInfo);
		$this->assign('userFiles',$userFiles);
		$this->assign('likeFiles',$likeFiles);
		$this->display('share_file');
	}
	public function share_user($userID,$page=1){
		$this->baseInfo();
		$this->hot();
		if(!empty($userID)){
			$share_user = $this->getModel('share_user');
			$userInfo = $share_user->where(array("id=$userID"))->select();
			if(empty($userInfo) || count($userInfo)!=1)return;
			$userInfo = $userInfo[0];
			$share_file = $this->getModel('share_file');
			$userFiles = $share_file->where(array("uk=".$userInfo['uk']))->limit(20,($page-1)*20)->select(array('id','fileName','suffix','size','shareTime'));
			if(count($userFiles)>0) {
                $suffixList = ezServer::getInterface()->get('suffixType')['suffixList'];
                foreach ($userFiles as &$vaule)
                    $vaule['typeName'] = empty($suffixList[$vaule['suffix']]) ? '其他' : $suffixList[$vaule['suffix']];
                unset($vaule);
            }
			$data['userID'] = $userID;
			$data['date'] = date('Ymd',time());
			$hotUser = $this->getModel('hotUser');
			$hotUser->insert($data);
			$this->assign('userInfo',$userInfo);
			$this->assign('userFiles',$userFiles);
		}
		$this->display('share_user');
	}
}