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
    private $prefix = 'ezCacheHtml_';
    private $obStatus = false;
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('cacheHtml');
        $this->path = ezAPPPATH.$this->conf['path'];
    }
    public function save($data = null,$unit = null){
        if($obStatus == true)

        $filename = empty($unit)?'.html':'_'.$unit.'.html';
        $filename = $this->path.$this->prefix.$filename;
        if(empty($data)){
            file_put_contents($filename, ob_get_contents());

        }

    }
}