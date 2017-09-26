<?php
/**
 * Created by PhpStorm.
 * User: lhe
 * Date: 2017/8/23
 * Time: 22:55
 */
//if (!function_exists('ezDebugLog')) {
//    function ezDebugLog($msg){
//        ezServer::getInterface()->debugLog($msg);
//    }
//}
//if (!function_exists('ezLog')) {
//    function ezLog($msg){
//        ezServer::getInterface()->log($msg);
//    }
//}
//
//if (!function_exists('ezBack')) {
//	function ezBack($func,$args= null){
//		ezQueueEvent::getInterface()->back($func,$args);
//	}
//}
//
//if (!function_exists('ezQueue')) {
//	function ezQueue($func,$args= null){
//		ezQueueEvent::getInterface()->add($func,$args);
//	}
//}
//
//if (!function_exists('ezDbExcute')) {
//	function ezDbExcute($sql, $func = null,$queEvent = false){
//		return ezDbPool::getInterface()->excute($sql, $func, $queEvent);
//	}
//}
//if (!function_exists('ezServer')) {
//	function ezServer(){
//		return ezServer::getInterface();
//	}
//}