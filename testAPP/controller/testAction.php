<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/12
 * Time: 14:13
 */

class testAction extends ezControl
{
    
    public function test()
    {
        $ez_user = $this->getModel('ez_user');
        $a       = $ez_user->select();
        
        $test = $this->getCacheFile('test');
        if(empty($test))
            $this->saveCacheFile('test','test value',300);
        else
            echo '<br>'.$test.'<br>';   
    }
    public function hook($in)
    {
        echo "hook $in" . '<br>';
    }
}