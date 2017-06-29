<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/28
 * Time: 15:22
 */
class ezCacheHtml{
    private $conf = null;
    private $path = null;
    private $rules = null;
    private $dispatch = null;
    private $prefix = '/ezCacheHtml_';
    private $obStatus = false;
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('cacheHtml');
        $this->path = ezAPPPATH.$this->conf['path'];
        $this->rules = ezAPPPATH.$this->conf['rules'];
    }
    public function setDispatch($dispatch){
        if(empty($dispatch) || empty('control') || empty('methon') || empty('param'))
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
    public function get($unit = null){
        $unit = empty($unit)?'':'_'.$unit;
        $fileName = $this->path.$this->prefix.$this->dispatchToFile($this->dispatch).$unit.'.html';
        if(!file_exists($fileName))
            return null;
        $time = $this->getRules($this->dispatch);
        if(filectime($fileName)+$time>time())return false;
        return file_get_contents($fileName);
    }
    public function save($data = null,$unit = null){

        $filename = empty($unit)?'.html':'_'.$unit.'.html';
        $filename = $this->path.$this->prefix.$filename;
        if(empty($data)){
            file_put_contents($filename, ob_get_contents());

        }

    }
}