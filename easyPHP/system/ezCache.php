<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezCache
{
    private $redis = null;
    private $memcache = null;
    private $cacheConf = null;
    
    public function __construct()
    {
        $cacheConf = $GLOBALS['ezConf']['cache'];
        if ($cacheConf['state'] != true)
            return 'error';
        $this->cacheConf = $cacheConf['data'];
        $this->connectCache();
    }
    
    public function connectCache()
    {
        if ($this->cacheConf['redis']['state']) {
            $this->redis = new Redis();
            $this->redis->pconnect($this->cacheConf['redis']['host'], $this->cacheConf['redis']['port']);
            $GLOBALS['ezCache']['redis'] = $this->redis;
        }
        if ($this->cacheConf['memcache']['state']) {
            $this->memcache = new Memcache;
            $this->memcache->pconnect($this->cacheConf['memcache']['host'], $this->cacheConf['memcache']['port']);
            $GLOBALS['ezCache']['memcache'] = $this->memcache;
        }
    }
}