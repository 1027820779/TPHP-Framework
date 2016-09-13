<?php namespace Hdphp\Tool;
//导入全局空间的PDO类
use Pdo;
class Model{
	private static $pdo = NULL;

	public function __construct(){
		if(is_null(self::$pdo)){
			//通过PDO连接数据库
			try{
				$dsn = "mysql:host=".C("DB_HOST").";dbname=".C('DB_NAME');
				$root=C("DB_USER");
				$pass=C("DB_PASSWD");
				self::$pdo = new Pdo($dsn,$root,$pass);
				//设置字符集
				self::$pdo->query("SET NAMES UTF8");
				//设置错误类型(设置异常错误)
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				//输出错误
				echo $e->getMessage();
			}
		}
	}
	//执行查询
	public function query($sql){
		try{
			//返回结果集对象
			$result = self::$pdo->query($sql);
			//获得数据
			$data = $result->fetchAll(PDO::FETCH_ASSOC);
			return $data;

		}catch(PDOException $e){
			echo $e->getMessage() . '<span style="color:red">):</span>';
		}
		
	}

	//执行(insert,update,delete)
	public function exec($sql){
		try{
			//返回受影响条数
			$afRows = self::$pdo->exec($sql);
			return $afRows;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

}



















 ?>