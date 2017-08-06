<?php
/**
 * Created by PhpStorm.
 * User: win10
 * Date: 2017/6/14
 * Time: 11:32
 */

if (!function_exists('ezListToKeyValue')) {
	function ezListToKeyValue($data, $keyName, $valueName)
	{
		if (gettype($data) != 'array')
			return array();
		return array_reduce($data, create_function('$v,$w', '$v[$w["' . $keyName . '"]]=$w["' . $valueName . '"];return $v;'));
	}
}

if (!function_exists('ezArrayToXml')) {
	function ezArrayToXml($arr)
	{
		$xml = "<root>";
		foreach ($arr as $key => $val) {
			if (is_array($val)) {
				$xml .= "<" . $key . ">" . ezArrayToXml($val) . "</" . $key . ">";
			} else {
				$xml .= "<" . $key . ">" . $val . "</" . $key . ">";
			}
		}
		$xml .= "</root>";
		return $xml;
	}
}

//键值对数组转字符串
if (!function_exists('ezDicToString')) {
	function ezDicToString($data, $split, $link)
	{
		$tempAry = array();
        array_walk($data, create_function('$value,$key', '
				global $ret;
				global $link;
				$tempAry[] = $key."$link".$value ;
			'));
		return implode($split, $tempAry);
	}
}

//将XML转为array
if (!function_exists('ezXmlToArray')) {
	function ezXmlToArray($xml)
	{
		//禁止引用外部xml实体
		libxml_disable_entity_loader(true);
		$values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		return $values;
	}
}

if (!function_exists('ezFilter')) {
	function ezFilter(&$param, $requiredArray = array(), $optionalArray = array())
	{
		$requiredLostArray = array();
		$notNeedArray		= array();
		foreach ($requiredArray as $required) {
			if (!isset($param[$required]) || $param[$required] === '') {
				array_push($requiredLostArray, $required);
			}
		}
		foreach ($param as $key => $val) {
			if (!in_array($key, $requiredArray) && !in_array($key, $optionalArray)) {
				array_push($notNeedArray, $key);
				unset($param[$key]);
			}
		}
		if (count($requiredLostArray) == 0) {
			return true;
		} else {
			return array(
				'ret' => false,
				'msg' => array(
					'requiredLost' => $requiredLostArray,
					'notNeed' => $notNeedArray
				)
			);
		}
	}
}