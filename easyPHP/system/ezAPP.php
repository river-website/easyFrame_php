<?php

require_once ezSYSPATH . '/common/ezArray.php';
require_once ezSYSPATH . '/common/ezFile.php';
require_once ezSYSPATH . '/system/ezConf.php';
require_once ezSYSPATH . '/system/ezBase.php';
require_once ezSYSPATH . '/system/ezRoute.php';
require_once ezSYSPATH . '/system/ezHook.php';
require_once ezSYSPATH . '/system/ezRewrite.php';
require_once ezSYSPATH . '/system/ezException.php';
require_once ezSYSPATH . '/system/ezCacheHtml.php';

$ezData = array();

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
            $reRoute = null;#18060C
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
        // 加载cache html 模块
        $cacheHtml = new ezCacheHtml();
        if($cacheHtml->confValid()){
            $cacheHtml->setDispatch($dispatch);
            $htmlData = $cacheHtml->get();
            if($htmlData)return;
            $cacheHtml->start();
        }else{
            $cacheHtml = null;
        }
        $ezRoute->executeRoute($dispatch);        
        if(!empty($cacheHtml)){
            $cacheHtml->save();
        }
    }
}