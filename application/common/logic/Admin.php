<?php
namespace app\common\logic;

use app\common\logic\Base;
//admin基本
class Admin extends Base
{
	public function initialize(){
		parent::initialize();
		$this->model = model('Admin');
	}

}