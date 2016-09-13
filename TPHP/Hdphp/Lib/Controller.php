<?php namespace Hdphp\Lib;
//总控制器
class Controller extends SmartyView{
	protected function success($msg,$url){
		$str = <<<str
<script>
alert('{$msg}');
location.href='{$url}';
</script>
str;
		echo $str;
		exit;
	}
	
	protected function error($msg,$url=NULL){
		//如果用户没有传递跳转地址，则跳转上一次的地址
		$url = is_null($url) ? $_SERVER['HTTP_REFERER'] : $url;
		$str = <<<str
<script>
alert('{$msg}');
location.href='{$url}';
</script>
str;
		echo $str;
		exit;
	}
	
	
}






 ?>