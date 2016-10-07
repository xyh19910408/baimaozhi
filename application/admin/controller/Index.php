<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Index extends Base
{
	public function _initialize(){
		parent::_initialize();
	}

	public function index()
    {
        $this->assign('bjui_static_dir', request()->domain() . DS . config('bjui_static_dir'));//静态资源存放目录
    	return $this->fetch();
    }

    public function welcome(){
    	return $this->fetch();
    }
}