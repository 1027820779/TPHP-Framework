<?php

// 原始的$content
// <li>
// 	<span>[$field.aid]</span>
// 	<a href="">[$field.t]</a>
// </li>

// 替换第一遍的$content
// <li>
// 	<span>14</span>
// 	<a href="">[$field.t]</a>
// </li>


// <li>
// 	<span>14</span>
// 	<a href="">第一篇文章</a>
// </li>




//作为了解
/**
 * $params 是参数，例如：cid rows
 * $content 就是标签包裹中间的内容
 */
function smarty_block_arc($params, $content, &$smarty)
{
	//载入模型
	include_once './Model.class.php';
	$model = new Model;
	//接收参数
	$rows = $params['rows'];
	$cid = $params['cid'];
	//sql
	$sql = "SELECT * FROM arc WHERE cid={$cid} LIMIT {$rows}";
	//获得数据
	$data = $model->query($sql);
	
//	$data 数组
//  (
//  [0] => Array
//      (
//          [aid] => 14
//          [t] => 第1篇文章
//          [cid] => 0
//      )
//
//  [1] => Array
//      (
//          [aid] => 15
//          [t] => 第2篇文章
//          [cid] => 0
//      )
//	)
	$str = '';
	foreach($data as $v){
//		$v数组
//      (
//          [aid] => 14
//          [t] => 第1篇文章
//          [cid] => 0
//      )
		//赋值给临时变量，为了不破坏$content
		$temp = $content;
		foreach($v as $f=>$value){
			$temp = str_replace("[\$field.$f]", $value, $temp);
		}
		//连接上替换好的字符串
		$str .= $temp;
	}
	return $str;
	
	
}

/* vim: set expandtab: */

?>
