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

	public function analyseRoute($route = null)
	{
		if ($route == null) {
			$url = explode('index.php/', $_SERVER['REQUEST_URI'])[1];
		} else
			$url = $route;
		// 解析url
		$urlArray	= explode('/', $url);
		$controlName = $urlArray[0];
		$methonName	= $urlArray[1];
		$param		 = array();
		for ($i = 2; $i < count($urlArray); $i++) {
			$param[] = $urlArray[$i];
		}

		if (!file_exists(ezAPPPATH . '/controller/' . $controlName . '.php'))
			throw new Exception("没有这个控制器");

		require_once ezAPPPATH . '/controller/' . $controlName . '.php';
		if (!class_exists($controlName))
			throw new Exception("没有这个类");

		if (get_parent_class($controlName) != 'ezControl')
			throw new Exception("类没有继承ezControl");


		$method = new ReflectionMethod($controlName, $methonName);

		if (!$method->isPublic() || $method->isStatic())
			throw new Exception("函数不是public或是静态");

		return array(
			'control' => $controlName,
			'methon' => $methonName,
			'param' => $param
		);
	}

	public function executeRoute($dispatch)
	{
		if (ezFilter($dispatch, array(
			'control',
			'methon',
			'param'
		)) != true)
			throw new Exception("配置文件错误");

		$method = new ReflectionMethod($dispatch['control'], $dispatch['methon']);

		// 获取这个函数参数类型定义
		$instance = new $dispatch['control']();
		$instance->setDispatch($dispatch);
		return $method->invokeArgs($instance, $dispatch['param']);
	}
}