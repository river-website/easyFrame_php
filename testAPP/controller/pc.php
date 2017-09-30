<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/7/28
 * Time: 13:49
 */

/*
 *  网站基本 信息  webSiteInfo                                    webSiteInfo
 *  suffix 列表   suffixList  txt->文档                           suffixList
 *  type   列表   typeList    文档->txt,doc,pdf...                typeList
 *  user   列表   user_id     id->data;   user_uk->array(data)
 *  hotfile列表   hotFileList fileID                              hotFileList
 *  hotUser列表   hotUserList userID                              hotUserList
 *  hotSearch     hotSearchList searchWord                        hotSearchList
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
        if(!isset($condition['searchWord']))$condition['searchWord'] = 'ALL';
        if(!isset($condition['page']))$condition['page'] = 1;
        return $webSiteInfo['webSite'].str_replace(
            array('$id','$type','$suffix','$searchWord','$page'),
            array($user['id'],$condition['type'],$condition['suffix'],$condition['searchWord'],$condition['page']),
            $webSiteInfo['userSite']);
    }
    private function toSearchUrl($condition = null){
        $webSiteInfo = ezServer()->getCache('webSiteInfo');
        if(!isset($condition['type']))$condition['type'] = 'ALL';
        if(!isset($condition['suffix']))$condition['suffix'] = 'ALL';
        if(!isset($condition['searchWord']))$condition['searchWord'] = 'ALL';
        if(!isset($condition['page']))$condition['page'] = 1;
        return $webSiteInfo['webSite'].str_replace(
                array('$type','$suffix','$searchWord','$page'),
                array($condition['type'],$condition['suffix'],$condition['searchWord'],$condition['page']),
                $webSiteInfo['searchSite']);
    }
	public function redirect_url($url){
		echo "<html><script language='javascript'>location.href='$url'</script></html>";
	}
	private function reHome(){
		$webSiteInfo = ezServer()->getCache('webSiteInfo');
		$this->redirect_url($webSiteInfo['webSite'].'/index.php/pc/index');
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
                ->order(array('count(searchWord)'),'desc')
                ->select(array('searchWord'));
            foreach ($hotSearchList as &$search)
                $search['searchUrl'] = $this->toSearchUrl($search);
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
                ->order(array('count(fileID)'),'desc')
                ->select(array('share_file.id','fileName'));
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
                ->select(array('share_user.id','userName','imgUrl'));
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
	    // 后缀信息,类型信息
        $suffixList = ezServer()->getCache('suffixList');
        $typesList = ezServer()->getCache('typesList');
        if(empty($suffixList)||empty($typesList)) {
            $suffix = $this->getModel('suffix');
            $suffixData = $suffix
                ->join('types', 'types.id=suffix.typeID')
                ->select(array('types.name as typeName', 'suffix'));
            foreach ($suffixData as $value) {
                $suffixList[$value['suffix']] = $value['typeName'];
                $typesList[$value['typeName']][$value['suffix']] = $value['suffix'];
            }
            ezServer()->setCache('suffixList',$suffixList,3600);
            ezServer()->setCache('typesList',$typesList,3600);
        }
        $this->assign('suffixList',$suffixList);
        $this->assign('typesList',$typesList);

        // 用户类型信息
        $share_user_id = ezServer()->getCache('share_user_id');
        $share_user_uk = ezServer()->getCache('share_user_uk');
        if(empty($share_user_id)||empty($share_user_uk)) {
            $user = $this->getModel('share_user');
            $userData = $user->select();
            foreach ($userData as &$value)
                $value['userUrl'] = $this->toUserUrl($value);
            foreach ($userData as $value)
                $share_user_id[$value['id']] = $value;
            foreach ($userData as $value)
                $share_user_uk[$value['uk']] = $value;
            ezServer()->setCache('share_user_id',$share_user_id,3600);
            ezServer()->setCache('share_user_uk',$share_user_uk,3600);
        }
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
	public function search($condition = null){
		$this->baseInfo();
		$this->hot();

		$limit = 20;
		$condition = explode('-', $condition);
		if(count($condition)!=4){$this->reHome();return;}
		$typeName = urldecode($condition[0]);
		$suffix = $condition[1];
		$word 	= urldecode($condition[2]);
		$page 	= $condition[3];
 		if(empty($typeName)||empty($suffix)||empty($word)||!is_numeric($page) || $page<=0){$this->reHome();return;}

        $typesList = ezServer()->getCache('typesList');
        $suffixList = ezServer()->getCache('suffixList');
        if($typeName !='ALL'){
        	if(empty($typesList[$typeName])){$this->reHome();return;}
			$suffixs = $typesList[$typeName];
			if($suffix != 'ALL' && empty($suffixs[$suffix])){$this->reHome();return;}
        }else if($suffix != 'ALL'){
			if(empty($suffixList[$suffix])){$this->reHome();return;}
        }
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
            $share_file->where(array('match(fileName) against("'.$word.'")'));
        }
        $sql = $share_file->sql;
        $count = $share_file->select('count(id) as count');
        if(empty($count) || count($count) != 1) $count = 0;
        else $count = $count[0]['count'];
        if($count>0){
        	$share_file->sql = $sql;
        	$searchList = $share_file
				->limit($limit,($page-1)*$limit)
				->select('id,fileName,suffix,size,shareTime,uk');
        	$user_uk = ezServer()->getCache('share_user_uk');
			foreach ($searchList as &$value) {
				$value['typeName'] = empty($suffixList[$value['suffix']])?'未知':$suffixList[$value['suffix']];
				$value['fileUrl'] = $this->toFileUrl($value);
                if(!empty($user_uk[$value['uk']])){
                	$uk =  $user_uk[$value['uk']];
					$value['userName'] = $uk['userName'];
					$value['userUrl'] = $this->toUserUrl($uk);
				}else{
					$value['userName'] = '未知';
					$value['userUrl'] = '';
				}
			}
        }else $searchList = array();
        $searachInfo['word'] = $word;
        $searachInfo['count'] = $count;
		$this->assign('searchList',$searchList);
		$this->assign('searchCount',$count);
		$this->display('search');
	}
	public function share_file($fileID = null){
		$this->baseInfo();
		$this->hot();
		if(empty($fileID) || !is_numeric($fileID)){$this->reHome();return;}
		$share_file = $this->getModel('share_file');
		$fileInfo = $share_file
            ->where(array("share_file.id=$fileID"))
            ->select('share_file.*');
		if(empty($fileInfo) || count($fileInfo) == 0){$this->reHome();return;}
		$fileInfo = $fileInfo[0];
		$fileInfo['fileUrl'] = $this->toFileUrl($fileInfo);
		$suffixList = ezServer()->getCache('suffixList');
		$fileInfo['typeName'] = isset($suffixList[$fileInfo['suffix']])?$suffixList[$fileInfo['suffix']]:'未知';
		$user_uk = ezServer()->getCache('share_user_uk');
		if(!isset($user_uk[$fileInfo['uk']]))$userInfo = array();
		else{
		    $userInfo = $user_uk[$fileInfo['uk']];
            $userInfo['userUrl'] = $this->toUserUrl($userInfo);
        }
		$preFile = $share_file
			->where(array("id<$fileID"))
			->order(array('id'),'desc')
			->limit(1)
			->select('id,fileName');
		if(empty($preFile)||count($preFile) == 0)$preFile = array('id'=>null,'fileName'=>null);
		else{
		    $preFile = $preFile[0];
		    $preFile['fileUrl'] = $this->toFileUrl($preFile);
		}
		$nextFile = $share_file
			->where(array("id>$fileID"))
			->order(array('id'),'asc')
			->limit(1)
			->select('id,fileName');
		if(empty($nextFile)||count($nextFile) == 0)$nextFile = array('id'=>null,'fileName'=>null);
		else{
		    $nextFile = $nextFile[0];
            $nextFile['fileUrl'] = $this->toFileUrl($nextFile);
        }
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
        $this->assign('userInfo',$userInfo);
		$this->assign('userFiles',$userFiles);
		$this->assign('likeFiles',$likeFiles);
		$this->assign('preFile',$preFile);
		$this->assign('nextFile',$nextFile);
		$this->display('share_file');
	}
	public function share_user($userID=null,$condition=null){
		$this->baseInfo();
		$this->hot();

		$limit = 20;
		$condition = explode('-', $condition);
		if(count($condition)!=4){$this->reHome();return;}
		$typeName = urldecode($condition[0]);
		$suffix = $condition[1];
		$word 	= urldecode($condition[2]);
		$page 	= $condition[3];
		if(empty($typeName)||empty($suffix)||empty($word)||!is_numeric($page) || $page<=0){$this->reHome();return;}

		if(empty($userID)||!is_numeric($userID)){$this->reHome();return;}
		$user_id = ezServer()->getCache('share_user_id');
		if(!isset($user_id[$userID])){$this->reHome();return;}
		$userInfo = $user_id[$userID];

		$typesList = ezServer()->getCache('typesList');
		$suffixList = ezServer()->getCache('suffixList');
		$share_file = $this->getModel('share_file');
		if($typeName !='ALL'){
			if(empty($typesList[$typeName])){$this->reHome();return;}
			$suffixs = $typesList[$typeName];
			if($suffix != 'ALL' && empty($suffixs[$suffix])){$this->reHome();return;}
		}else if($suffix != 'ALL') {
			if (empty($suffixList[$suffix])) {$this->reHome();return;}
		}
		if(!empty($suffixs))
			$share_file->where_in('suffix',array_keys($suffixs));
		if($suffix != 'ALL')
			$share_file->where(array("suffix=$suffix"));
		if($word != 'ALL'){
			$insertdata['searchWord'] = $word;
			$insertdata['date'] = date('Ymd',time());
			$hotSearch = $this->getModel('hotSearch');
			$hotSearch->insert($insertdata);
			$share_file->where(array('match(fileName) against("'.$word.'")'));
		}
		$sql = $share_file->where(array("uk=".$userInfo['uk']))->sql;

		$userFiles = $share_file->limit($limit,($page-1)*$limit)->select(array('id','fileName','suffix','size','shareTime'));
		if(count($userFiles)>0) {
			$condition['type'] = $condition[0];
			$condition['suffix'] = $condition[1];
			$condition['searchWord'] = $condition[2];
			$condition['page'] = $condition[3];

			foreach ($userFiles as &$vaule) {
				$vaule['typeName'] = empty($suffixList[$vaule['suffix']]) ? '未知' : $suffixList[$vaule['suffix']];
				$vaule['fileUrl'] = $this->toUserUrl($vaule,$condition);
			}
			$share_file->sql = $sql;
			$count = $share_file->select('count(id) as count');
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
        $this->display('share_user');
	}
}