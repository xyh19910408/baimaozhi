<?php
namespace app\rest\controller;

use app\rest\controller\Base;

class Index extends Base
{
	public function index(){
		//echo $this->method; //请求类型
		//echo '<br/>';
		//echo $this->type; //当前访问资源类型
		$data = 'hallo world';
		return json($data, 300);
	}
}