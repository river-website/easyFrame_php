<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezCacheFile
{
    private $conf = null;
    private $path = null;
    private $time = null;
    private $prefix = '/ezCacheFile_';

    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('cacheFile');
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
        file_put_contents($path, serialize($data));
        return true;
    }
    public function get($key)
    {
        $path = $this->path.$this->prefix.$key;
        if(!file_exists($path))return null;
        $data = file_get_contents($path);
        if(time()>$data['time']){
            delete ($path);
            return null;
        }
        return unserialize($data['data']);
    }
}