<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezCacheRedis
{
    private $conf = null;
    private $redis = null;
    private $time = null;
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('cacheRedis');
        $this->time = $this->conf['time'];
    }

    public function connect()
    {
        $this->redis = new Redis();
        $this->redis->pconnect($this->conf['host'], $this->conf['port']);
    }
    public function save($key,$value,$time = null)
    {
        if(empty($key))return false;
        $time = $time == null?$this->time:$time;
        return $this->redis->set($key,serialize($value),$time);
    }
    public function get($key)
    {
        if(empty($key))return false;
        return $this->redis->get($key);
    }
}