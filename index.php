<?php
// 定义服务器的网站根目录
if(!defined('ezSERVER_ROOT'))define('ezSERVER_ROOT', 'D:/phpStudy/WWW');
// website在服务器根目录下的相对路径
if(!defined('ezWEB_ROOT'))define('ezWEB_ROOT', dirname(__FILE__));
// easy 核心代码路径
if(!defined('ezSYSPATH'))define("ezSYSPATH", ezWEB_ROOT . "/easyPHP");
// app 代码路径
if(!defined('ezAPPPATH'))define("ezAPPPATH", ezWEB_ROOT . "/testAPP");
require_once ezSYSPATH . '/system/ezAPP.php';
ezAPP::runApp();