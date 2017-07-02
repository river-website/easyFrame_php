<?php

class ezCacheFile extends ezBase
{
    protected $confNode = 'cacheFile';
    private $path = null;
    private $time = null;
    private $prefix = '/ezCacheFile_';

    public function __construct()
    {
        parent::__construct();
        $this->path = ezAPPPATH.$this->conf['path'];
        $this->time = $this->conf['time'];
    }
    
    public function save($key,$value,$time = null)
    {
        if(empty($key))return false;
        $time = $time == null?$this->time:$time;
        $time = time()+$time*60;
        $path = $this->path.$this->prefix.$key;
        $data['endTime'] = $time;
        $data['data'] = $value;
        ezFilePut($path, serialize($data));
        return true;
    }
    public function get($key)
    {
        $path = $this->path.$this->prefix.$key;
        if(!file_exists($path))return null;
        $data = unserialize(file_get_contents($path));
        if(time()>$data['endTime']){
            unlink ($path);
            return null;
        }
        return $data['data'];
    }
}