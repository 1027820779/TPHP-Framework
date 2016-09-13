<?php
function p($var){
	echo '<pre>';
	print_r($var);
	echo '<pre>';
}
//局部不缓存，在SmartView里面有体现
function nocache($params, $content, &$smarty){
	return $content;
}

function M(){
	$model = new \Hdphp\Tool\Model;
	return $model;
}
//终止函数
function halt($msg){
	include 'Public/halt.html';
	exit;
}


// 网站配置项函数
function C($var=NULL){
	static $config=array();

	if(is_array($var)){
		$config=array_merge($config,$var);
	}

	if(is_string($var)){
		return isset($config[$var]) ? $config[$var] : NULL;
	}

	if(is_null($var)){
		return $config;
	}
}







 ?>