<?php
//echo "com in";
//return;
$conf = array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => 'root',
		'dataBase' => 'test',
		'port' => 3306
	);
$con = mysqli_connect($conf['host'], $conf['user'], $conf['password'], $conf['dataBase'], $conf['port']);
if (!$con)throw new Exception(mysqli_error());
$row = mysqli_query($con,"select * from ez_user");
var_dump($row->fetch_all(MYSQLI_ASSOC));
