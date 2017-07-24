<?php
//echo "com in";return;
// �������������վ��Ŀ¼
if(!defined('ezSERVER_ROOT'))define('ezSERVER_ROOT', 'D:/phpStudy/WWW');
// website�ڷ�������Ŀ¼�µ����·��
if(!defined('ezWEB_ROOT'))define('ezWEB_ROOT', dirname(__FILE__));
// easy ���Ĵ���·��
if(!defined('ezSYSPATH'))define("ezSYSPATH", ezWEB_ROOT . "/easyPHP");
// app ����·��
if(!defined('ezAPPPATH'))define("ezAPPPATH", ezWEB_ROOT . "/testAPP");
require_once ezSYSPATH . '/system/ezAPP.php';
ezAPP::runApp();