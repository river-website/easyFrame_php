<?php
/**
 * Created by PhpStorm.
 * User: lhe.River
 * Date: 2017/6/13
 * Time: 22:01
 */

$ezData = array();

require_once ezSYSPATH . '/system/ezConf.php';
require_once ezSYSPATH . '/common/ezArray.php';
require_once ezSYSPATH . '/system/ezRoute.php';
require_once ezSYSPATH . '/system/ezHook.php';
require_once ezSYSPATH . '/system/ezRewrite.php';
require_once ezSYSPATH . '/system/ezException.php';

class ezAPP
{
    static public function runApp()
    {
        // 加载配置模块
        $conf                      = new ezConf();
        $GLOBALS['ezData']['conf'] = $conf;
        // 加载异常处理模块
        // $exception = new ezException();
        set_exception_handler(array('ezException','exceptHandle'));
        // 加载路由重写模块
        $ezReWrite = new ezReWrite();
        if($ezReWrite->confValid()) $reRoute = $ezReWrite->reWriteRoute();
        else{
            $reRoute = null;
            $ezReWrite = null;
        }
        // 加载路由模块
        $ezRoute                   = new ezRoute();
        $dispatch                  = $ezRoute->analyseRoute($reRoute);
        // 加载钩子模块
        $ezHook                    = new ezHook();
        if($ezHook->confValid()) {
            $hookDispatch = $ezRoute->analyseRoute($ezHook->getHook($dispatch));
            $hookDispatch['param'] = $dispatch['param'];
            $ezRoute->executeRoute($hookDispatch);
        }
        else $ezHook = null;
        $ezRoute->executeRoute($dispatch);
    }
}