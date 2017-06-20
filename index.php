<?php
// 定义服务器的网站根目录
define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT']);
// website在服务器根目录下的相对路径
define('WEB_ROOT',dirname($_SERVER['PHP_SELF']));
// easy 核心代码路径
define("ezSYSPATH", SERVER_ROOT.WEB_ROOT."/easyPHP");
// app 代码路径
define("ezAPPPATH", SERVER_ROOT.WEB_ROOT."/testAPP");

require_once ezSYSPATH.'/system/ezAPP.php';
ezAPP::runApp();