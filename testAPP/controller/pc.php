<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/7/28
 * Time: 13:49
 */

class pc extends ezControl{
    private function toFileUrl($file){
        $webSiteInfo = ezServer()->getCache('webSiteInfo');
        return $webSiteInfo['webSite'].str_replace('$id',$file['id'],$webSiteInfo['fileSite']);
    }
    private function toUserUrl($user,$condition = null){
        $webSiteInfo = ezServer()->getCache('webSiteInfo');
        if(!isset($condition['type']))$condition['type'] = 'ALL';
        if(!isset($condition['suffix']))$condition['suffix'] = 'ALL';
        if(!isset($condition['word']))$condition['word'] = 'ALL';
        if(!isset($condition['page']))$condition['page'] = 1;
        return $webSiteInfo['webSite'].str_replace(
            array('$id','$type','$suffix','$word','$page'),
            array($user['id'],$condition['type'],$condition['suffix'],$condition['word'],$condition['page']),
            $webSiteInfo['userSite']);
    }
    private function toSearchUrl($condition = null){
        $webSiteInfo = ezServer()->getCache('webSiteInfo');
        if(!isset($condition['type']))$condition['type'] = 'ALL';
        if(!isset($condition['suffix']))$condition['suffix'] = 'ALL';
        if(!isset($condition['word']))$condition['word'] = 'ALL';
        if(!isset($condition['page']))$condition['page'] = 1;
        return $webSiteInfo['webSite'].str_replace(
                array('$type','$suffix','$word','$page'),
                array($condition['type'],$condition['suffix'],$condition['word'],$condition['page']),
                $webSiteInfo['searchSite']);
    }
	public function index(){
		$this->baseInfo();
        $this->hot();
		$newShareList = ezServer()->getCache('newShareList');
		if(empty($newShareList)) {
			$share_file = $this->getModel('share_file');
			$newShareList = $share_file
				->order(array('id'),'desc')
				->limit(100)
				->select();
			foreach ($newShareList as &$file)
			    $file['fileUrl'] = $this->toFileUrl($file);
			ezServer()->setCache('newShareList',$newShareList,1800);
		}
        $this->assign('newShareList',$newShareList);
        $this->display('index');
	}
	public function hot(){
		// 热门搜索
        $hotSearchList = ezServer()->getCache('hotSearchList');
        if(empty($hotSearchList)){
            $hotSearch = $this->getModel('hotSearch');
            $today = date('Ymd',time());
            $hotSearchList = $hotSearch
                ->where(array("date=$today"))
                ->group(array('searchWord'))
                ->order(array('count(searchWord)'))
                ->select(array('searchWord'));
            foreach ($hotSearchList as &$search)
                $search['searchUrl'] = $this->toSearchUrl(array('word'=>$search['word']));
            ezServer()->setCache('hotSearchList',$hotSearchList,1800);
        }
        $this->assign('hotSearchList',$hotSearchList);
        // 热门文件
        $hotFileList = ezServer()->getCache('hotFileList');
        if(empty($hotFileList)){
            $hotFile = $this->getModel('hotFile');
            $today = date('Ymd',time());
            $hotFileList = $hotFile
                ->join('share_file','share_file.id=hotFile.fileID')
                ->where(array("date=$today"))
                ->group(array('fileID'))
                ->order(array('count(fileID)'))
                ->select(array('fileID','fileName'));
            foreach ($hotFileList as &$file)
                $file['fileUrl'] = $this->toFileUrl($file);
            ezServer()->setCache('hotFileList',$hotFileList,1800);
        }
        $this->assign('hotFileList',$hotFileList);
        // 热门用户
        $hotUserList = ezServer()->getCache('hotUserList');
        if(empty($hotUserList)){
            $hotUser = $this->getModel('hotUser');
            $today = date('Ymd',time());
            $hotUserList = $hotUser
                ->join('share_user','share_user.id=hotUser.userID')
                ->where(array("date=$today"))
                ->group(array('userID'))
                ->order(array('count(userID)'))
                ->select(array('userID','userName','imgUrl'));
            foreach ($hotUserList as &$user)
                $user['userUrl'] = $this->toUserUrl($user);
            ezServer()->setCache('hotUserList',$hotUserList,1800);
        }
        $this->assign('hotUserList',$hotUserList);
    }
    public function baseInfo(){
	    // 网站基本信息
        $webSiteInfo = ezServer()->getCache('webSiteInfo');
        if(empty($webSiteInfo)){
            $webSite = $this->getModel('webSite');
            $webSiteInfo = $webSite->where(array('id=1'))->select();
			$webSiteInfo = $webSiteInfo[0];
			$share_file = $this->getModel('share_file');
			$count = $share_file->select('count(id) as count')[0]['count'];
			$webSiteInfo['fileCount'] = $count;
			$webSiteInfo['fileNewCount'] = rand(10000,1000000);
            ezServer()->setCache('webSiteInfo',$webSiteInfo,3600);
        }
	    $this->assign('webSiteInfo',$webSiteInfo);
	    // 格式类型信息
        $suffixType = ezServer()->getCache('suffixType');
        if(empty($suffixType)) {
            $suffix = $this->getModel('suffix');
            $suffixData = $suffix->join('types', 'types.id=suffix.typeID')->select(array('types.name as typeName', 'suffix'));
            foreach ($suffixData as $value) {
                $suffixList[$value['suffix']] = $value['typeName'];
                $typesList[$value['typeName']][$value['suffix']] = $value['suffix'];
            }
            $suffixType['suffix'] = $suffixList;
            $suffixType['types'] = $typesList;
            ezServer()->setCache('suffixType',$suffixType,600);
        }
        // 用户类型信息
        $share_user = ezServer()->getCache('share_user');
        if(empty($share_user)) {
            $user = $this->getModel('share_user');
            $userData = $user->select();
            foreach ($userData as &$value)
                $value['userUrl'] = $this->toUserUrl($value);
            foreach ($userData as $value)
                $user_id[$value['id']] = $value;
            foreach ($userData as $value)
                $user_uk[$value['uk']] = $value;

            $share_user['user_id'] = $user_id;
            $share_user['user_uk'] = $user_uk;
            ezServer()->setCache('share_user',$share_user,3600);
        }
        $this->assign('suffixList',$suffixType['suffix']);
        $this->assign('typesList',$suffixType['types']);
    }
    private function reHome(){
    	$this->redirect_url($_SERVER['HTTP_HOST']);
    }
	public function search($condition = null){
		$limit = 20;

		$condition = explode('-', $condition);
		if(count($condition)!=4){
			$this->reHome();
			return;
		}
		$typeName = urldecode($condition[0]);
		$suffix = $condition[1];
		$word 	= urldecode($condition[2]);
		$page 	= $condition[3];
 		if(empty($typeName)||empty($suffix)||empty($word)||!is_numeric($page) || $page<=0){
			$this->reHome();
			return;
		}
        $this->baseInfo();
        $typesList = ezServer()->getCache('suffixType')['typesList'];
        $suffixList = ezServer()->getCache('suffixType')['suffixList'];
        if($typeName !='ALL'){
        	if(empty($typesList[$typeName])){
				$this->reHome();
				return;
			}
			$suffixs = $typesList[$typeName];
			if($suffix != 'ALL' && empty($suffixs[$suffix])){
				$this->reHome();
				return;
			}
        }else{ 
        	if($suffix != 'ALL'){
        		if(empty($suffixList[$suffix])){
					$this->reHome();
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
//            $share_file->like(array('fileName'=>$word));
            $share_file->where(array('match(fileName) against("'.$word.'")'));
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
//				->join('share_user','share_user.uk=share_file.uk')
				->limit($limit,($page-1)*$limit)
				->select('share_file.id,fileName,suffix,size,shareTime');
        	$share_user_uk = ezServer()->getCache('share_user')['user_uk'];
			foreach ($searchList as &$value) {
                $value['typeName']=empty($suffixList[$value['suffix']])?'未知':$suffixList[$value['suffix']];

			}
        }else $searchList = array();
        $searachInfo['word'] = $word;
        $searachInfo['count'] = $count;
		$this->assign('searchList',$searchList);
		$this->assign('searchCount',$count);
		$this->display('search');
	}
	public function redirect_url($url){
		echo "<html><script language='javascript'>location.href='$url'</script></html>";
	}
	public function share_file($fileID = null){
		$this->baseInfo();
		$this->hot();
		if(empty($fileID)){$this->redirect_url($_SERVER['HTTP_HOST']);return;}
		$share_file = $this->getModel('share_file');
		$fileInfo = $share_file
            ->where(array("share_file.id=$fileID"))
//            ->join('share_user','share_user.uk=share_file.uk','left')
            ->select('share_file.*');
		if(empty($fileInfo) || count($fileInfo) == 0){$this->redirect_url($_SERVER['HTTP_HOST']);return;}
		$fileInfo = $fileInfo[0];
		$fileInfo['fileUrl'] = $this->toFileUrl($fileInfo);
		$suffixList = ezServer()->getCache('suffixList');
		$fileInfo['typeName'] = isset($suffixList[$fileInfo['suffix']])?$suffixList[$fileInfo['suffix']]:'未知';
		$user_uk = ezServer()->getCache('share_user')['user_uk'];
		$userInfo = $user_uk[$fileInfo['uk']];
		$fileInfo['userName'] = $userInfo['userName'];
		$fileInfo['imgUrl'] = $userInfo['imgUrl'];
		$fileInfo['userUrl'] = $this->toUserUrl($userInfo);
		$preFile = $share_file
			->where(array("id<$fileID"))
			->order(array('id'),'desc')
			->limit(1)
			->select('id,fileName');
		if(empty($preFile))$preFile = array('id'=>null,'fileName'=>null);
		else $preFile = $preFile[0];
		$preFile['fileUrl'] = $this->toFileUrl($preFile);
		$nextFile = $share_file
			->where(array("id>$fileID"))
			->order(array('id'),'asc')
			->limit(1)
			->select('id,fileName');
		if(empty($nextFile))$nextFile = array('id'=>null,'fileName'=>null);
		else $nextFile = $nextFile[0];
		$nextFile['fileUrl'] = $this->toFileUrl($nextFile);
		$userFiles = $share_file
            ->where(array('uk='.$fileInfo['uk']))
            ->limit(20)
            ->select(array('id','fileName'));
		foreach ($userFiles as &$value)
			$value['fileUrl'] = $this->toFileUrl($value);
		$likeFiles = $share_file
//            ->like(array('fileName'=>$fileInfo['fileName']))
//            ->where(array('match(fileName) against("'.$fileInfo['fileName'].'")'))
            ->limit(20)
            ->select(array('id','fileName'));
		foreach ($likeFiles as &$value)
			$value['fileUrl'] = $this->toFileUrl($value);
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
		//$this->display('share_file');
		echo 'com in';
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
			$suffixList = ezServer()->getCache('suffixType')['suffixList'];
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
        $this->display('share_user');
	}
}