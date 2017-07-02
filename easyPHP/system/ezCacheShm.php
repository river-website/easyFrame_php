<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/27
 * Time: 14:42
 */
class ezCacheShm extends ezBase
{
    protected $confNode = 'cacheShm';
    private $shmKey = null;
    private $size = null;
    private $auth = null;
    private $index = 0;
    public function __construct()
    {
        parent::__construct();
        $this->shmKey = $this->conf['shmKey'];
        $this->size = $this->conf['size'];
        $this->auth = $this->conf['auth'];
    }

    public function save($key,$value,$time = null){
        $shm_id = shm_attach($this->shmKey,$this->size,$this->auth);
        if(empty($shm_id))
            throw new Exception("打开shm内存共享失败");
        $index = shm_get_var($shm_id, $this->index);
        if(empty($index[$key])){
            $index['ez_max'] += 1;
            $index[$key] = array('id'=>$index['ez_max'],'time'=>$time*60+time());
            shm_put_var($shm_id,$index['ez_max'],$value);
            shm_put_var($shm_id,$this->index,$index);
        }else{
            shm_put_var($shm_id,$index[$key]['id'],$value);
        }
    }
    public function get($key){
        $shm_id = shm_attach($this->shmKey,$this->size,$this->auth);
        if(empty($shm_id))
            throw new Exception("打开shm内存共享失败");
        $index = shm_get_var($shm_id, $this->index);
        if(empty($index[$key])){
            return null;
        }else{
            if(time()>$index[$key]['time']){
                shm_remove_var($shm_id,$index[$key]['id']);
                unset($index[$key]);
                shm_put_var($shm_id,$this->index,$index);
                return null;
            }else
                return shm_get_var($shm_id,$index[$key]['id']);
        }
    }

}