<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/28
 * Time: 15:22
 */
class ezCacheHtml extends ezBase
{
    protected $confNode = 'cacheHtml';
    private $path = null;
    private $rules = null;
    private $dispatch = null;
    private $prefix = '/ezCacheHtml_';
    private $obStatus = false;
    public function __construct()
    {
        parent::__construct();
        $this->path = ezAPPPATH.$this->conf['path'];
        $this->rules = $this->conf['rules'];
    }
    public function setDispatch($dispatch){
        if(empty($dispatch) || empty($dispatch['control']) || empty($dispatch['methon']) || !isset($dispatch['param']))
            throw new Exception('设置dispatch错误');
        $this->dispatch = $dispatch;
    }
    private function getRules($route)
    {
        if (empty($this->rules[$route['control']]))
            return $this->rules['default'];
        $htmlControl = $this->rules[$route['control']];
        if (empty($htmlControl[$route['methon']]))
            return $htmlControl['default'];
        return $htmlControl[$route['methon']];
    }
    private function dispatchToFile($dispatch){
        $dispatch['param'] = implode('-',$dispatch['param']);
        $dispatch = array_values($dispatch);
        return implode('_',$dispatch);
    }
    public function start(){
        ob_start();
    }
    public function get($unit = null){
        $unit = empty($unit)?'':'_'.$unit;
        $fileName = $this->path.$this->prefix.$this->dispatchToFile($this->dispatch).$unit.'.html';
        if(!file_exists($fileName))
            return false; 
        $time = $this->getRules($this->dispatch);
        if(filectime($fileName)+$time*60<time())return false;
        include $fileName;
        return true;
    }
    public function save($unit = null){
        $unit = empty($unit)?'':'_'.$unit;
        $fileName = $this->path.$this->prefix.$this->dispatchToFile($this->dispatch).$unit.'.html';
        $obData = ob_get_contents();
        if($obData != false)ob_end_flush();
        ezFilePut($fileName,$obData);
    }
}