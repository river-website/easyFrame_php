<?php
// �������������վ��Ŀ¼
define('ezSERVER_ROOT', 'D:/phpStudy/WWW');
// website�ڷ�������Ŀ¼�µ����·��
define('ezWEB_ROOT', dirname(__FILE__));
// easy ���Ĵ���·��
define("ezSYSPATH", ezWEB_ROOT . "/easyPHP");
// app ����·��
define("ezAPPPATH", ezWEB_ROOT . "/testAPP");
require_once ezSYSPATH . '/system/ezAPP.php';
ezAPP::runApp();