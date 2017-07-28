<?php

if (!function_exists('ezFilePut')) {
	function ezFilePut($path,$content,$mode=FILE_APPEND){
		$last = strrpos($path,'/');
		if($last != false){
			$dir = substr($path,0,$last);
			if(!is_dir($dir))mkdir($dir,0777,true);
		}
		return file_put_contents($path,$content,$mode);
	}
}