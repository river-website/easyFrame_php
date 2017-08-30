<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/7/28
 * Time: 13:49
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
		// 热门搜索
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
        // 热门文件
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
        // 热门用户
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
	    // 格式类型信息
        $suffixType = ezServer::getInterface()->get('suffixType');
        if(empty($suffixType)) {
            $suffix = $this->getModel('suffix');
            $suffixData = $suffix->join('types', 'types.id=suffix.typeID')->select(array('types.name as typeName', 'suffix'));
            foreach ($suffixData as $value) {
                $suffixList[$value['suffix']] = $value['typeName'];
                $typesList[$value['typeName']][$value['suffix']] = $value['suffix'];
            }
            $suffixType['suffix'] = $suffixList;
            $suffixType['types'] = $typesList;
        }
        $this->assign('suffixList',$suffixType['suffix']);
        $this->assign('typesList',$suffixType['types']);
    }
    private function reHone(){
    	$this->redirect_url($_SERVER['HTTP_HOST']);
    }
	public function search($condition = null){
		$limit = 20;

		$condition = explode('-', $condition);
		if(count($condition)!=4){
			$this->reHone();
			return;
		}
		$typeName = urldecode($condition[0]);
		$suffix = $condition[1];
		$word 	= urldecode($condition[2]);
		$page 	= $condition[3];
 		if(empty($typeName)||empty($suffix)||empty($word)||!is_numeric($page) || $page<=0){
			$this->reHone();
			return;
		}
        $this->baseInfo();
        $typesList = ezServer::getInterface()->get('suffixType')['typesList'];
        $suffixList = ezServer::getInterface()->get('suffixType')['suffixList'];
        if($typeName !='ALL'){
        	if(empty($typesList[$typeName])){
				$this->reHone();
				return;
			}
			$suffixs = $typesList[$typeName];
			if($suffix != 'ALL' && empty($suffixs[$suffix])){
				$this->reHone();
				return;
			}
        }else{ 
        	if($suffix != 'ALL'){
        		if(empty($suffixList[$suffix])){
				$this->reHone();
				return;
				}
        	}
        }
	    $this->hot();
		$share_file = $this->getModel('share_file');
		if(!empty($suffixs)) 
            $share_file->where_in('suffix',array_keys($suffixs));
		if($suffix != 'ALL')
			$share_file->where(array("suffix=$suffix"));
		if($word != 'ALL'){
            $insertdata['searchWord'] = $word;
            $insertdata['date'] = date('Ymd',time());
            $hotSearch = $this->getModel('hotSearch');
            $hotSearch->insert($insertdata);
            $share_file->like(array('fileName'=>$word));
        }
        $sql = $share_file->sql;
        $count = $share_file->select('count(id) as count');
        if(empty($count) || count($count) != 1)
        	$count = 0;
        else
        	$count = $count[0]['count'];
        if($count>0){
        	$share_file->sql = $sql;
        	$searchList = $share_file
				->join('share_user','share_user.uk=share_file.uk')
				->limit($limit,($page-1)*$limit)
				->select('share_file.id,fileName,suffix,size,shareTime,userName');
			foreach ($searchList as &$value) 
				$value['typeName']=empty($suffixList[$value['suffix']])?'未知':$suffixList[$value['suffix']];
        }else $searchList = array();
        $searachInfo['word'] = $word;
        $searachInfo['count'] = $count;
		$this->assign('searchList',$searchList);
		$this->assign('searchCount',$count);
		$this->assign('tplName','search');
		$this->display('com');
	}

	public function redirect_url($url){
		echo "<html><script language='javascript'>location.href='$url'</script></html>";
	}
	public function ttime(){
		static $time;
		if(empty($time))
			$time = time();
		else{
			$now = time();
			echo ($now-$time).'<br>';
			$time = $now;
		}
	}
	public function share_file($fileID = null){
		$this->baseInfo();
		$this->hot();
		if(empty($fileID)){
			$this->redirect_url($_SERVER['HTTP_HOST']);
			return;
		}
		$share_file = $this->getModel('share_file');
		$fileInfo = $share_file
            ->where(array("share_file.id=$fileID"))
            ->join('share_user','share_user.uk=share_file.uk','left')
            ->select('share_file.*,share_user.*,share_user.id as userID');
		if(empty($fileInfo) || count($fileInfo) == 0){
			$this->redirect_url($_SERVER['HTTP_HOST']);
			return;
		}
		$fileInfo = $fileInfo[0];
		$preFile = $share_file
			->where(array("id<$fileID"))
			->order(array('id'),'desc')
			->limit(1)
			->select('id,fileName');
		if(empty($preFile))$preFile = array('id'=>null,'fileName'=>null);
		else $preFile = $preFile[0];
		$nextFile = $share_file
			->where(array("id>$fileID"))
			->order(array('id'),'asc')
			->limit(1)
			->select('id,fileName');
		if(empty($nextFile))$nextFile = array('id'=>null,'fileName'=>null);
		else $nextFile = $nextFile[0];
		$userFiles = $share_file
            ->where(array('uk='.$fileInfo['uk']))
            ->limit(20)
            ->select(array('id','fileName'));
		$likeFiles = $share_file
            ->like(array('fileName'=>$fileInfo['fileName']))
            ->limit(20)
            ->select(array('id','fileName'));
        $userShareCount = $share_file
        	->where(array('uk='.$fileInfo['uk']))
        	->select('count(id) as count');
        $fileInfo['count'] = $userShareCount[0]['count'];
		$data['date'] = date('Ymd',time());
		$data['fileID'] = $fileID;
		$hotFile = $this->getModel('hotFile');
		$hotFile->insert($data);
		$this->assign('fileInfo',$fileInfo);
		$this->assign('userFiles',$userFiles);
		$this->assign('likeFiles',$likeFiles);
		$this->assign('preFile',$preFile);
		$this->assign('nextFile',$nextFile);
		$this->assign('tplName','share_file');
		$this->display('com');
	}
	public function share_user($userID=null,$page=1){
		$this->baseInfo();
		$this->hot();
		if(empty($userID)){
			$this->redirect_url($_SERVER['HTTP_HOST']);
			return;
		}
		$share_user = $this->getModel('share_user');
		$userInfo = $share_user->where(array("id=$userID"))->select();
		if(empty($userInfo) || count($userInfo)!=1){
			$this->redirect_url($_SERVER['HTTP_HOST']);
			return;
		}
		if(empty($page) || !is_numeric($page))$page=1;
		$userInfo = $userInfo[0];
		$share_file = $this->getModel('share_file');
		$userFiles = $share_file->where(array("uk=".$userInfo['uk']))->limit(20,($page-1)*20)->select(array('id','fileName','suffix','size','shareTime'));
		if(count($userFiles)>0) {
			$suffixList = ezServer::getInterface()->get('suffixType')['suffixList'];
			foreach ($userFiles as &$vaule)
				$vaule['typeName'] = empty($suffixList[$vaule['suffix']]) ? '其他' : $suffixList[$vaule['suffix']];
			unset($vaule);
			$count = $share_file->where(array("uk=".$userInfo['uk']))->select('count(id) as count');
			if(empty($count) || count($count)!=1)
				$userInfo['count'] = 0;
			else $userInfo['count'] = $count[0]['count'];
		}
		$data['userID'] = $userID;
		$data['date'] = date('Ymd',time());
		$hotUser = $this->getModel('hotUser');
		$hotUser->insert($data);
		$this->assign('userInfo',$userInfo);
		$this->assign('userFiles',$userFiles);
        $this->assign('tplName','share_user');
        $this->display('com');
	}
}