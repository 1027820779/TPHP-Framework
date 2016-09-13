<?php namespace Hdphp\Lib;
class SmartyView{
	private static $smarty = NULL;
	public function __construct(){
		//如果已经实例化过smarty，不用再次实例化
		if(!is_null(self::$smarty)) return;
		//实例化Smarty对象
		//前面的\是调用全局空间的Smarty
		$smarty = new \Smarty();
		//模版目录
		$smarty->template_dir = APP_NAME."/" . MODULE . "/View/" . CONTROLLER;
		//编译目录
		$path = "Storage/Compile/" . MODULE . '/' . CONTROLLER;
		is_dir($path) || mkdir($path,0777,true);
		$smarty->compile_dir = $path;
		//缓存目录
		$path = "Storage/Cache/" . MODULE . '/' . CONTROLLER;
		is_dir($path) || mkdir($path,0777,true);
		$smarty->cache_dir = $path;
		//是否开启缓存
		$smarty->caching = C("SMARTY_CACHE");
		//缓存时间
		$smarty->cache_lifetime = C("SMARTY_CACHE_LIFETIME");
		//开始定界符 
		$smarty->left_delimiter = C("LEFT_DELIMITER");
		//结束定界符
		$smarty->right_delimiter = C("RIGHT_DELIMITER");
		//局部不缓存(固定写法)
		//nocache是一个函数，放在functions.php
		$smarty->register_block("nocache", "nocache", false);
		
		//把smarty对象赋值给静态属性
		self::$smarty = $smarty;
	}
	
	//自定义的display
	protected function display($tpl=NULL){
		//如果用户没有传递模板，按照方法名找模板
		if(is_null($tpl)) $tpl = ACTION . '.php';
		//调用smarty里面的display
		self::$smarty->display($tpl,$_SERVER['REQUEST_URI']);
	}
	//自定义的assign
	protected function assign($var,$value){
		//调用smarty里面的assign
		self::$smarty->assign($var,$value);
	}
	
	//自定义的
	protected function is_cached($tpl){
		//调用smarty里面的is_cached
		return self::$smarty->is_cached($tpl,$_SERVER['REQUEST_URI']);
	}
	
	//清除缓存
	
}








