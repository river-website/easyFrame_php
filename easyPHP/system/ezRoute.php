<?php
/**
 * Created by PhpStorm.
 * User: lhe.River
 * Date: 2017/6/13
 * Time: 22:01
 */

require_once ezSYSPATH . '/system/ezControl.php';

class ezRoute
{
	static private $entryFileName		= 'index.php/';
	static private $controllerPath		=  '/controller/';
	static private $suffix				= '.php';
	public function analyseRoute($route = null){
		if ($route == null) $url = explode(self::$entryFileName, $_SERVER['REQUEST_URI'])[1];
        else $url = $route;
		// 解析url
		$urlArray	= explode('/', $url);
		$controlName = $urlArray[0];
		$methonName	= $urlArray[1];
		$param		 = array();
		for ($i = 2; $i < count($urlArray); $i++) $param[] = $urlArray[$i];
		$file =ezAPPPATH . self::$controllerPath . $controlName . self::$suffix;
		if (!file_exists($file)) throw new Exception("没有这个控制器");
		require_once $file;
		if (!class_exists($controlName)) throw new Exception("没有这个类");
		if (get_parent_class($controlName) != 'ezControl') throw new Exception("类没有继承ezControl");
		$method = new ReflectionMethod($controlName, $methonName);
		if (!$method->isPublic() || $method->isStatic()) throw new Exception("函数不是public或是静态");
		return array('control' => $controlName, 'methon' => $methonName, 'param' => $param);
	}

	public function executeRoute($dispatch){
		if (ezFilter($dispatch, array('control', 'methon', 'param')) != true) throw new Exception("配置文件错误");
        $control = new $dispatch['control']();
        $control->setDispatch($dispatch);
       return runG(array($control,$dispatch['methon']),$dispatch['param']);
	}
}