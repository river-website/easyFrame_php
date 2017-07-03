<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezCacheRedis extends ezBase
{
    protected $confNode = 'cacheRedis';
    private $redis = null;
    private $time = null;
    public function __construct()
    {
        parent::__construct();
        $this->time = $this->conf['time'];
        $this->connect();
    }

    public function connect()
    {
        $this->redis = new Redis();
        $this->redis->connect($this->conf['host'], $this->conf['port']);
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
        return unserialize($this->redis->get($key));
    }
}