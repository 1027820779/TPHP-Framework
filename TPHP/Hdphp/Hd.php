<?php 
class Hd{
	public static function run(){
		//这样不用多次创建目录，也不会覆盖文件了
		if(!is_dir(APP_NAME)){
			//创建文件夹
			self::createDir();
			//复制文件
			self::copyFile();
		}
		//载入核心文件
		self::loadCore();
		//执行应用类
		\Hdphp\Lib\App::run();
	}
	//复制文件
	private static function copyFile(){
		//把提前准备好的控制器复制到App/Home/Controller文件夹，为了将来实例化
		copy('Hdphp/Common/IndexController.php', APP_NAME.'/Home/Controller/IndexController.php');
		//第一次安装框架，默认显示的模板
		copy('Hdphp/Common/index.php', APP_NAME.'/Home/View/Index/index.php');
		// 复制配置项
		copy("Hdphp/Common/userConfig.php",APP_NAME."/Home/Config/config.php");
		// 复制公共配置项
		copy("Hdphp/Common/config.php",APP_NAME."/Common/Config/config.php");
		//错误模板，以后会被halt函数用到
		copy('Hdphp/Common/halt.html', 'Public/halt.html');
	}
	
	//创建文件夹
	private static function createDir(){
		$dirs = array(
		//控制器目录
		APP_NAME.'/Home/Controller',
		//模板目录
        APP_NAME.'/Home/View/Index',
		// 配置项目录
        APP_NAME.'/Home/Config',
		//放css,js,halt.html
		'Public',
		// 公共配置项目录
         APP_NAME.'/Common/Config'
		);
		foreach ($dirs as $d) {
			is_dir($d) || mkdir($d,0777,true);
		}
	}
	
	//载入核心类
	private static function loadCore(){
		//载入函数
		require './Hdphp/Lib/functions.php';
		//载入Smarty
		require './Hdphp/Org/Smarty/Smarty.class.php';
		//载入SmartyView类，它是Controller和Smarty的桥梁
		require './Hdphp/Lib/SmartyView.php';
		//载入总控制器
		require './Hdphp/Lib/Controller.php';
		//载入app类
		require './Hdphp/Lib/App.php';
	}
	
}
Hd::run();



 ?>