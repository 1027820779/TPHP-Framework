<?php namespace Home\Controller;
//导入Hdphp\Lib命名空间下面的Controller类
use Hdphp\Lib\Controller;
class IndexController extends Controller{
	public function index(){
		$this->display('index.php');
	}
}




 ?>