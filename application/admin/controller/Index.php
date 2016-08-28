<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Index extends Base
{
    public function index()
    {
    	$this->assign('bjui_static_dir', config('bjui_static_dir'));//静态资源存放目录
        return $this->fetch();
    }

    public function welcome(){
    	return $this->fetch();
    }

    //登陆
    public function login()
    {
    	if($this->request->isPost()){
            $params = $this->request->post();
            $LoginLogic = model_logic('Login');
            $code = $LoginLogic->adminLogin($params);
            return get_ajax_arr($code, '', url('Index/index'));
    	}
    	$this->assign('bjui_static_dir', config('bjui_static_dir'));//public资源存放目录
    	return $this->fetch();
    }
}