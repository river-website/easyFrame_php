<?php
/**
 * Created by PhpStorm.
 * User: lhe.River
 * Date: 2017/6/13
 * Time: 22:01
 */

class ezRoute{
    private $methon = null;

    public function analyseRoute($route = null){
        if($route == null){
            $url = explode('index.php/',$_SERVER['REQUEST_URI'])[1];
        }
        else $url = $route;
        // 解析url
        $urlArray = explode('/',$url);
        $controlName = $urlArray[0];
        $methonName = $urlArray[1];
        $param = array();
        for($i=2;$i<count($urlArray);$i++){
            $param[] = $urlArray[$i];
        }

        if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/easyPHP/'.ezAPPPATH.'/controller/'.$controlName.'.php'))
            return '没有这个控制器';

        require_once ezSYSPATH.'/system/ezControl.php';
        require_once ezAPPPATH.'/controller/'.$controlName.'.php';
        if(!class_exists($controlName))
            return '没有这个类';
        if(get_parent_class($controlName) != 'ezControl')
            return '类没有继承ez';
        try {
            $method = new ReflectionMethod($controlName, $methonName);
        }catch (Exception $ex){
            return '类没有定义函数';
        }
        if (!$method->isPublic() || $method->isStatic())
            return '函数不是public或是静态';
        return array('control'=>$controlName,
                            'methon'=>$methonName,
                            'param'=>$param
                    );
    }

    public function executeRoute($dispatch){
        if(ezFilter($dispatch,array('control','methon','param')) != true)
            return '配置文件错误';
         try {
            $method = new ReflectionMethod($dispatch['control'], $dispatch['methon']);
        }catch (Exception $ex){
            return '类没有定义函数';
        }
        // 获取这个函数参数类型定义
        $instance  = new $dispatch['control']();
        return $method->invokeArgs($instance, $dispatch['param']);
    }
}