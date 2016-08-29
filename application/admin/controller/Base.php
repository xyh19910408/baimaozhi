<?php
namespace app\admin\controller;

use think\Controller;
use think\Lang;
//基本
class Base extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->init();
    }

    //初始化
    public function init(){
        $lang_type = Lang::range(); //当前语言类型
        Lang::load(APP_PATH . 'admin'. DS . 'code'. DS .$lang_type.'.php'); //加载code语言包文件

        //获取当前操作
        $request = request();
        $controller_name = strtolower($request->controller());
        $action_name = strtolower($request->action());
        $controller_action = $controller_name . '/' . $action_name;

        //过滤不需要登陆的行为
        if(in_array($controller_action, config('no_login_behavior'))){
            return;
        }

        //登陆检测
        $LoginLogic = model_logic('Login');
        $admin_info = $LoginLogic->loginInfo();
        if(empty($admin_info)){
            $this->redirect('Index/login');
        }
        $this->assign('admin_info', $admin_info);
    }

    /**
       * 获取列表页表单中的搜索参数
       * @param  string $default_order 默认排序条件
       * @return array                 [请求的参数, 排序条件, 分页条件]
    */
    public function getPageForm($default_order = ''){
        $order = $page = null;
        $page_form = $this->request->post();
        if(!empty($page_form['orderField']) && !empty($page_form['orderDirection'])){
            $order = $page_form['orderField'] . ' ' . $page_form['orderDirection'];
        }else{
            $order = $default_order;
        }
        if(!empty($page_form['pageCurrent']) && !empty($page_form['pageSize'])){
            $page = $page_form['pageCurrent'] . ', ' . $page_form['pageSize'];
        }else{
            $page = '1, 30';
        }
        $this->assign('page_form', $page_form); //搜索条件
        return [$page_form, $order, $page];
    }

}