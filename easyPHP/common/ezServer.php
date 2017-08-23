<?php
/**
 * Created by PhpStorm.
 * User: lhe
 * Date: 2017/8/23
 * Time: 22:55
 */
if (!function_exists('ezDebugLog')) {
    function ezDebugLog($msg){
        ezServer::getInterface()->debugLog($msg);
    }
}
if (!function_exists('ezLog')) {
    function ezLog($msg){
        ezServer::getInterface()->log($msg);
    }
}