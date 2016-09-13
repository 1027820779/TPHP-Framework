<?php
/**
 * [smarty_modifier_jiequ 截取的变量调节器]
 * @param  [type]  $string [要截取的字符串]
 * @param  integer $length [截取的长度]
 * @param  string  $etc    [后面连接的字符串]
 * @return [type]          [description]
 */
function smarty_modifier_jiequ($string,$length=20,$etc='...')
{
	//如果截取的长度大于文字的长度，不带省略号
	if($length >= mb_strlen($string,'utf-8')){
		return mb_substr($string, 0,$length,'utf-8');
	}else{
		return mb_substr($string, 0,$length,'utf-8') . $etc;
	}
 	
}











?>
