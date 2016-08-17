<?php
namespace app\course\controller;

use app\course\controller\Base;

class Html extends Base
{
	public function index(){
		return $this->fetch();
	}

	public function index2(){
		return $this->fetch();
	}
}