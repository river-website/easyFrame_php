<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezHook{
    private $conf = null;

    public function __construct(){
        $this->conf = $GLOBALS['ezData']['conf']->getNode('hook');
    }

    public function getHook($route){
    	if(empty($this->conf[$route['control']]))
    		return $this->conf['default'];
    	$hookControl = $this->conf[$route['control']];
    	if(empty($hookControl[$route['methon']]))
    		return $hookControl['default'];
    	return $hookControl[$route['methon']];
    }

} 