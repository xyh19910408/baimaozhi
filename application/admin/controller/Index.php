<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Index extends Base
{
	public function _initialize(){
		parent::_initialize();
        $this->assign('static_dir', request()->domain() . DS . config('static_dir'));//静态资源存放目录
	}

	public function index()
    {
        $AdminService = model_service('Admin');
        $admin_info = $AdminService->loginInfo();
        $this->assign('admin_info', $admin_info);
    	return $this->fetch();
    }

    public function welcome(){
    	return $this->fetch();
    }

    //登陆
    public function login()
    {
        $AdminService = model_service('Admin');
        if($this->request->isPost()){
            $params = $this->request->post();
            $code = $AdminService->adminLogin($params);
            return $this->getBjui($code, '', url('Index/index'));
        }
        $admin_info = $AdminService->loginInfo();
        if(!empty($admin_info)){
            $this->redirect('Index/index');
        }
        return $this->fetch();
    }

    //退出
    public function logout(){
        $AdminService = model_service('Admin');
        $AdminService->adminLogout();
        $this->redirect('Index/login');
    }
}