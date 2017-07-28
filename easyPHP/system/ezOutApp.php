<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/30
 * Time: 14:13
 */
class ezOutApp{
	private $conf = null;

	public function __construct()
	{
		$this->conf = $GLOBALS['ezData']['conf']->getNode('outApp');
	}
	public function executeOutApp($app,$dispatch){
		if(empty($this->conf[$app]))return false;
		if(!filter($dispatch,array('control','methon','param')))return false;
		$controlName = $dispatch['control'];
		$methonName = $dispatch['methon'];
		$path = $this->conf[$app].'/controller/'.$controlName.'.php';
		if (!is_file($path))
			throw new Exception("没有这个控制器");

		require_once ezWEB_ROOT . $path;
		if (!class_exists($controlName))
			throw new Exception("没有这个类");

		if (get_parent_class($controlName) != 'ezControl')
			throw new Exception("类没有继承ezControl");
		$method = new ReflectionMethod($controlName, $methonName);

		if (!$method->isPublic() || $method->isStatic())
			throw new Exception("函数不是public或是静态");
		$method = new ReflectionMethod($controlName, $methonName);

		// 获取这个函数参数类型定义
		$instance = new $controlName();
		$instance->setDispatch($dispatch);
		return $method->invokeArgs($instance, $dispatch['param']);
	}
}