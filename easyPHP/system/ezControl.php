<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/12
 * Time: 14:13
 */

class ezControl
{
    private $log = null;
    private $db = null;
    private $cacheFile = null;
    private $cacheRedis = null;
    public function cacheFileSave($key,$value,$time = null){
        if(empty($this->cacheFile)){
            require_once ezSYSPATH.'/system/ezCacheFile.php';
            $this->cacheFile = new ezCacheFile();
        }
        if(empty($time))
            return $this->cacheFile->save($key,$value);
        else return $this->cacheFile->save($key,$value,$time);
    }
    public function cacheFileGet($key){
        if(empty($this->cacheFile)){
            require_once ezSYSPATH.'/system/ezCacheFile.php';
            $this->cacheFile = new ezCacheFile();
        }
        return $this->cacheFile->get($key);
    }

    public function cacheRedisSave($key,$value,$time=null){
        if(empty($this->cacheRedis)){
            require_once ezSYSPATH.'/system/ezCacheRedis.php';
            $this->cacheRedis = new ezCacheRedis();
        }
        if(empty($time))
            return $this->cacheRedis->save($key,$value);
        else return $this->cacheRedis->save($key,$value,$time);
    }

    public function cacheRedisGet($key){
        if(empty($this->cacheRedis)){
            require_once ezSYSPATH.'/system/ezCacheRedis.php';
            $this->cacheRedis = new ezCacheRedis();
        }
        return $this->cacheRedis->get($key);

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
		            $this->db                      = new ezDB();
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
}