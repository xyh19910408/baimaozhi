<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Index extends Base
{
    protected $domain_name = null;

    //初始化
    public function _initialize(){
        //获取当前域名
        $request = request();
        $this->domain_name = $request->domain();
    }

    public function index()
    {
    	$this->assign('bjui_static_dir', $this->domain_name . DS . config('bjui_static_dir'));//静态资源存放目录
        return $this->fetch();
    }

    public function welcome(){
    	return $this->fetch();
    }

    //登陆
    public function login()
    {
        $LoginLogic = model_logic('Login');
    	if($this->request->isPost()){
            $params = $this->request->post();
            $code = $LoginLogic->adminLogin($params);
            return get_ajax_arr($code, '', url('Index/index'));
    	}
        $admin_info = $LoginLogic->loginInfo();
        if(!empty($admin_info)){
            $this->redirect('Index/index');
        }
    	$this->assign('bjui_static_dir', $this->domain_name . DS . config('bjui_static_dir'));//public资源存放目录
    	return $this->fetch();
    }

    //退出
    public function logout(){
        $LoginLogic = model_logic('Login');
        $LoginLogic->adminLogout();
        $this->redirect('Index/login');
    }
}