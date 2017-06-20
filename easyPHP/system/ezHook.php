<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/15
 * Time: 10:19
 */
class ezHook{
    private $hookConf = null;
    private $route = null;

    public function __construct(){
        global $ezConf;
        $Conf = $ezConf['hook'];
        if($Conf['state'] != true)
            return 'error';
        $this->hookConf = $Conf['conf'];
    }

    public function getHook($route){
            $this->route = $route;
    	if(!isset($this->hookConf[$this->route['control']]))
    		return $this->hookConf['default'];
    	$hookControl = $this->hookConf[$this->route['control']];
    	if(!isset($hookControl[$this->route['methon']]))
    		return $hookControl['default'];
    	return $hookControl[$this->route['methon']];
    }

} 