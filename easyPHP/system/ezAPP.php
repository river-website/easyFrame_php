<?php
/**
 * Created by PhpStorm.
 * User: lhe.River
 * Date: 2017/6/13
 * Time: 22:01
 */

$ezData = array();

require_once ezSYSPATH.'/system/ezConf.php';
require_once ezSYSPATH.'/common/ezArray.php';
require_once ezSYSPATH.'/system/ezModel.php';
require_once ezSYSPATH.'/system/ezRoute.php';
require_once ezSYSPATH.'/system/ezHook.php';


class ezAPP{

    static public function runApp(){
        ezAPP::initApp();

    }

    static private function initApp(){
        // 加载配置模块
        $conf = new ezConf();
        $GLOBALS['ezData']['conf'] = $conf;
        // 加载路由模块
        $ezRoute = new ezRoute();
        $dispatch = $ezRoute->analyseRoute();
        // 加载钩子模块
        $ezHook = new ezHook();
        $ezRoute->executeRoute($ezRoute->analyseRoute($ezHook->getHook($dispatch)));
        $ezRoute->executeRoute($dispatch);
    } 


}