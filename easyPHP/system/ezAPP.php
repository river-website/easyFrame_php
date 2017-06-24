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
        $reRoute = $ezReWrite->reWriteRoute(explode('index.php/', $_SERVER['REQUEST_URI'])[1]);
        // 加载路由模块
        $ezRoute                   = new ezRoute();
        $dispatch                  = $ezRoute->analyseRoute($reRoute);
        // 加载钩子模块
        $ezHook                    = new ezHook();
        $hookDispatch = $ezRoute->analyseRoute($ezHook->getHook($dispatch));
        $hookDispatch['param'] = $dispatch['param'];
        $ezRoute->executeRoute($hookDispatch);
        $ezRoute->executeRoute($dispatch);
    }
}