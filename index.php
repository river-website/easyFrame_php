<?php
// 定义服务器的网站根目录
define('ezSERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);
// website在服务器根目录下的相对路径
define('ezWEB_ROOT', dirname(__FILE__));
// easy 核心代码路径
define("ezSYSPATH", ezWEB_ROOT . "/easyPHP");
// app 代码路径
define("ezAPPPATH", ezWEB_ROOT . "/testAPP");

require_once ezSYSPATH . '/system/ezAPP.php';
ezAPP::runApp();