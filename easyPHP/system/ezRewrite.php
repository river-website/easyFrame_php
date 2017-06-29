<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/19
 * Time: 10:16
 */
class ezRewrite
{
    private $conf = null;
    public function __construct()
    {
        $this->conf = $GLOBALS['ezData']['conf']->getNode('rewrite',false);
        
    }
    public function confValid(){
        if(is_array($this->conf))
            return true;
        return false;
    }
    public function reWriteRoute($route = null){
        if ($route == null)
            $route = explode('index.php/', $_SERVER['REQUEST_URI'])[1];

        $route_encode = str_replace('/', '%20', $route);
        foreach ($this->conf as $key => $value) {
            $key = str_replace('/', '%20', $key);
            $key = '/'.$key.'/';
            if(preg_match($key, $route_encode, $matches)){
                for($i=1;$i<count($matches);$i++)
                    $value = str_replace('$'.$i,$matches[$i],$value);
                return $value;
            }
        }
        return $route;
    }
}
