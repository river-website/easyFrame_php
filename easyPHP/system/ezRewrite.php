<?php

class ezRewrite extends ezBase
{
    protected $confNode = 'rewrite';
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
                return str_replace('%20', '/', $value);
            }
        }
        return $route;
    }
}
