<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/12
 * Time: 14:13
 */
require_once ezSYSPATH.'/system/ezView.php';
class ezControl
{
	private $log = null;
	private $db = null;
	private $cacheFile = null;
	private $cacheRedis = null;
	private $cacheHtml = null;
	private $cacheShm = null;
	private $dispatch = null;
    private $view       = null;
	private function initCacheFile(){
		if(empty($this->cacheFile)){
			if(empty($GLOBALS['ezData']['cacheFile'])) {
				require_once ezSYSPATH.'/system/ezCacheFile.php';
				$this->cacheFile = new ezCacheFile();
				$GLOBALS['ezData']['cacheFile'] = $this->cacheFile;
			}else $this->cacheFile = $GLOBALS['ezData']['cacheFile'];
		}
	}

	public function saveCacheFile($key,$value,$time = null){
		$this->initCacheFile();
		if(empty($time))
			return $this->cacheFile->save($key,$value);
		else return $this->cacheFile->save($key,$value,$time);
	}

	public function getCacheFile($key){
		$this->initCacheFile();
		return $this->cacheFile->get($key);
	}

	private function initCacheRedis(){
		if(empty($this->cacheRedis)){
			if(empty($GLOBALS['ezData']['cacheRedis'])) {
				require_once ezSYSPATH . '/system/ezCacheRedis.php';
				$this->cacheRedis = new ezCacheRedis();
				$GLOBALS['ezData']['cacheRedis'] = $this->cacheRedis;
			}else $this->cacheRedis = $GLOBALS['ezData']['cacheRedis'];
		}
	}

	public function saveCacheRedis($key,$value,$time=null){
		$this->initCacheRedis();
		if(empty($time))
			return $this->cacheRedis->save($key,$value);
		else return $this->cacheRedis->save($key,$value,$time);
	}

	public function getCacheRedis($key){
		$this->initCacheRedis();
		return $this->cacheRedis->get($key);
	}

	private function initCacheHtml(){
		if(empty($this->cacheHtml)){
			if(empty($GLOBALS['ezData']['cacheHtml'])) {
				require_once ezSYSPATH.'/system/ezCacheHtml.php';
				$this->cacheHtml = new ezCacheHtml();
				$GLOBALS['ezData']['cacheHtml'] = $this->cacheHtml;
			}else $this->cacheHtml = $GLOBALS['ezData']['cacheHtml'];
			$this->cacheHtml->setDispatch($this->dispatch);
		}
	}

	public function saveCacheHtml($unit = null){
		$this->initCacheHtml();
		$dispatch = $this->dispatch;
		$dispatch['param'] = implode('-',$dispatch['param']);
		$dispatch = array_values($dispatch);
		$this->cacheHtml->save(implode('_',$dispatch),$unit);
	}

	public function getCacheHtml($unit = null){
		$this->initCacheHtml();
		return $this->cacheHtml->get($unit);
	}

	public function initCacheShm(){
		if(empty($this->cacheShm)){
			if(empty($GLOBALS['ezData']['cachShm'])) {
				require_once ezSYSPATH.'/system/ezCacheShm.php';
				$this->cacheShm = new ezCacheShm();
				$GLOBALS['ezData']['cachShm'] = $this->cacheShm;
			}else $this->cacheShm = $GLOBALS['ezData']['cachShm'];
		}
	}

	public function getCacheShm($key){
		$this->initCacheShm();
		return $this->cacheShm->get($key);
	}
	public function saveCacheShm($key,$value,$time = null){
		$this->initCacheShm();
		return $this->cacheShm->save($key,$value,$time);

	}
	public function setDispatch($dispatch){
		if(empty($dispatch) || empty($dispatch['control']) || empty($dispatch['methon']) || !isset($dispatch['param']))
			throw new Exception('设置dispatch错误');
		$this->dispatch = $dispatch;
	}

	public function log($env, $msg, $write = false)
	{
		if(empty($this->log))
		{
		require_once ezSYSPATH.'/system/ezlog.php';
		$this->log = new ezLog();
		}
		$this->log->log_message($env,$msg,$write);
	}

	public function getModel($model)
	{

		if (empty($model))
	throw new Exception("model名为空");
			if(empty($this->db))
			{
			if (empty($GLOBALS['ezData']['db']))
			{
		 require_once ezSYSPATH . '/system/ezDB.php';
				$this->db						= new ezDB();
				$GLOBALS['ezData']['db'] = $this->db ;
	 } else
				$this->db = $GLOBALS['ezData']['db'];
			}

		if (file_exists(ezAPPPATH . '/model/' . $model . '.php')) {
			require_once ezAPPPATH . '/model/' . $model . '.php';
			if (!class_exists($model))
				throw new Exception("没有这个类");
			if (get_parent_class($model) != 'ezModel')
				throw new Exception("类没有继承ezModel");
			return new $model();
		} else {
			if (!$this->db->checkTableExist($model))
				throw new Exception("没有这个模型");
			require_once ezSYSPATH . '/system/ezModel.php';
			return new ezModel($model);
		}
	}
	public function assign($key, $value){
        if(empty($this->view))$this->view = new ezView();
         $this->view->assign($key,$value);
    }
    public function display($tpl){
        if(empty($this->view))$this->view = new ezView();
        $this->view->display($tpl);
    }
}