<?php
// �������������վ��Ŀ¼
define('SERVER_ROOT',$_SERVER['DOCUMENT_ROOT']);
// website�ڷ�������Ŀ¼�µ����·��
define('WEB_ROOT',dirname($_SERVER['PHP_SELF']));
// easy ���Ĵ���·��
define("ezSYSPATH", SERVER_ROOT.WEB_ROOT."/easyPHP");
// app ����·��
define("ezAPPPATH", SERVER_ROOT.WEB_ROOT."/testAPP");

require_once ezSYSPATH.'/system/ezAPP.php';
ezAPP::runApp();