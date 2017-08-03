<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 19:27
 */
require_once ezSYSPATH.'/library/smarty/Smarty.class.php';
class ezView
{
	static private $path		= ezAPPPATH.'/view/';
	static private $suffix		= '.tpl';
	private $data = array();
	private $templet = '';
    static private $smarty  = null;

    public function __construct(){
        if(empty(self::$smarty)) {
            self::$smarty = new smarty();
            self::$smarty->setLeftDelimiter('{{');
            self::$smarty->setRightDelimiter('}}');
        }
    }

    public function assign($key,$value){
        self::$smarty->assign($key,$value);
    }

	public function display($tpl)
	{
	    $path = self::$path.$tpl;
        self::$smarty->display($path);

		if (!file_exists($this->templet))
			return '模板不存在';
		$view = file_get_contents($this->templet);
		//解析并替换
		//判断是否需要html
		if ($GLOBALS['html']['state']) {
			$rules = $GLOBALS['html']['data']['rules'];
			$path	= $GLOBALS['html']['data']['path'];
			$host	= $_SERVER['host'];
			foreach ($rules as $key => $value) {
				if (preg_match($key, $host)) {
					file_put_contents($path . $value, $view);
					break;
				}
			}
		}

		echo $view;
	}
}