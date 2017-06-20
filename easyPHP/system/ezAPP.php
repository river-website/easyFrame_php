<?php
/**
 * Created by PhpStorm.
 * User: lhe.River
 * Date: 2017/6/13
 * Time: 22:01
 */
global $ezData;

class ezAPP{

    static public function runApp(){
        ezAPP::initApp();

    }

    static private function initApp(){
        // 加载配置文件
        require_once ezAPPPATH.'/conf.php';
        //判断配置文件正确性
        if(!isset($ezConf))
            echo '配置文件错误';
        require_once ezSYSPATH.'/common/ezArray.php';
        if(ezFilter($ezConf,array('db','html','codeCache','cache','debug','hook','log','monitor','app')) != true)
            echo '配置文件错误';

        require_once ezSYSPATH.'/system/ezModel.php';
        require_once ezSYSPATH.'/system/ezRoute.php';
        $ezRoute = new ezRoute();
        $dispatch = $ezRoute->analyseRoute();
        require_once ezSYSPATH.'/system/ezHook.php';
        $ezHook = new ezHook();
        $ezRoute->executeRoute($ezRoute->analyseRoute($ezHook->getHook($dispatch)));
        $ezRoute->executeRoute($dispatch);
    } 


}