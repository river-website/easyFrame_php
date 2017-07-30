<?php
//echo "com in";
//return;
// 网站目录
if(!defined('ezSERVER_ROOT'))define('ezSERVER_ROOT', '/phpstudy/www');
// website目录
if(!defined('ezWEB_ROOT'))define('ezWEB_ROOT', dirname(__FILE__));
// easy 核心目录
if(!defined('ezSYSPATH'))define("ezSYSPATH", ezWEB_ROOT . "/easyPHP");
// app 目录
if(!defined('ezAPPPATH'))define("ezAPPPATH", ezWEB_ROOT . "/testAPP");
require_once ezSYSPATH . '/system/ezAPP.php';
ezAPP::runApp();