<?php namespace Hdphp\Tool;
class Code{
	//保存画布的资源
	private $img;
	//验证码画布的宽
	private $width;
	//验证码画布的高
	private $height;
	//验证码长度
	private $codeLen;
	//字体大小
	private $size;
	//字体文件
	private $fontfile = 'Hdphp/Tool/font.ttf';
	//验证码种子
	private $seed = '1234567890qwertyuiopasdfghjkzxcvbnm';
	
	public function __construct($width=200,$height=80,$codeLen=4,$size=20){
		$this->width = $width;
		$this->height = $height;
		$this->codeLen = $codeLen;
		$this->size = $size;
	}
	//提供给外部调用显示的
	public function show(){
		//1.发送头部
//		header('Content-type:image/png');
		//2.创建画布,调色并且填充颜色
		$this->createBg();
		//3.写字
		$this->wirte();
		//4.创建干扰
		$this->makeTrouble();
		//5.输出图像
		imagepng($this->img);
		//6.销毁图像
		imagedestroy($this->img);
	}
	//创建干扰
	private function makeTrouble(){
		//划线
		for ($i=0; $i < 4; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)); 
			imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
		}
	}
	//写字
	private function wirte(){
		for ($i=0; $i < $this->codeLen; $i++) {
			//算出验证码的x,y坐标 
			$x = $this->width / $this->codeLen * $i + 10;
			$y = ($this->height + $this->size) / 2;
			//字体颜色
			$color = imagecolorallocate($this->img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
			$text = $this->seed[mt_rand(0, strlen($this->seed) - 1)];
			//写字
			imagettftext($this->img, $this->size, mt_rand(-45, 45), $x, $y, $color, $this->fontfile, $text);
		}
		
	}
	//创建背景
	private function createBg(){
		$this->img = imagecreatetruecolor($this->width, $this->height);
		$color = hexdec('#ffffff');
		imagefill($this->img, 0, 0, $color);
	}
	
	
}

 ?>