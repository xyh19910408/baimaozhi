<?php
namespace app\course\controller;

class Output
{
	public function hello(){
		return 'hello, world!';
	}

	public function json(){
		$data = 'hello, world!';
		return json_encode($data);
	}

	public function read(){
		return View();
	}
}