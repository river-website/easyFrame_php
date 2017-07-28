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

$GLOBALS['ezData'] = array();

class ezAPP
{
	static public function runApp()
	{
		// 加载配置模块
		$conf						= new ezConf();
		$GLOBALS['ezData']['conf'] = $conf;
		// 加载异常处理模块
		if($conf->validNode('exception'))
			set_exception_handler(array('ezException','exceptHandle'));
		// 加载服务模块
		if($conf->validNode('server')){
			$server = new ezServer();
			$server->init();
			$GLOBALS['ezData']['server'] = $server;
		}
		// 加载路由重写模块
		if($conf->validNode('rewrite')){
			$ezReWrite = new ezReWrite();
			$reRoute = $ezReWrite->reWriteRoute();
		}
		// 加载路由模块
		$ezRoute					 = new ezRoute();
		$dispatch					= $ezRoute->analyseRoute($reRoute);
		// 加载钩子模块
		if($conf->validNode('hook')){
			$ezHook					= new ezHook();
			$hookDispatch = $ezRoute->analyseRoute($ezHook->getHook($dispatch));
			$hookDispatch['param'] = $dispatch['param'];
			$ezRoute->executeRoute($hookDispatch);
		}
		// 加载cache html 模块
		if($conf->validNode('cacheHtml')) {
			$cacheHtml = new ezCacheHtml();
			$GLOBALS['ezData']['cacheHtml'] = $cacheHtml;
			$cacheHtml->setDispatch($dispatch);
			$htmlData = $cacheHtml->get();
			if ($htmlData) return;
			$cacheHtml->start();
		}
		$ezRoute->executeRoute($dispatch);

		if($conf->validNode('cacheHtml')) {
			$cacheHtml->save();
		}
	}
}