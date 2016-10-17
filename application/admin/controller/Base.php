<?php
namespace app\admin\controller;

use app\common\controller\Base as ControllerBase;
use app\common\library\ReturnMsg;
//admin基本
class Base extends ControllerBase
{
	public function _initialize(){
		parent::_initialize();

		$controller   = $this->request->controller();//控制器名称
		$action       = $this->request->action();//操作名称
		$behavior = strtolower($controller . '/' . $action);

		//判断登录
        if(!$this->checkLogin($behavior)){
        	$this->redirect('Index/login');
        }
	}

	/**
	 * 判断登录
	 * @param  [type] $behavior 当前行为
	 * @return [type]           [description]
	 */
	public function checkLogin($behavior){
		//过滤不需要登录的事件
		if(in_array($behavior, config('check_not_login'))){
			return true;
		}
		$AdminService = model_service('Admin');
        $admin_info = $AdminService->loginInfo();
        if(empty($admin_info)){
            return false;
        }
        return true;
	}

	/**
	 * 返回到bjui模板的参数
	 * @param  integer $code         消息码
	 * @param  string  $tabid        跳转窗口
	 * @param  [type]  $data         返回数据
	 * @param  integer $closeCurrent 是否关闭窗口 1关闭 2不关闭
	 * @return [type]                [description]
	 */
	public function getBjui($code = 10002, $tabid = '', $data = [], $closeCurrent = 0){
		return ReturnMsg::bjui($code, $tabid, $data, $closeCurrent);
	}

	/**
	 * 获取列表页表单中的搜索参数
	 * @param  string $default_order 默认排序条件
	 * @param  string $default_page  默认分页条件
	 * @return array                 [请求的参数, 排序条件, 分页条件]
	 */
	public function getPageForm($default_order = '', $default_page = '1, 30'){
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
            $page = $default_page;
        }
        $this->assign('page_form', $page_form); //搜索条件
        return [$page_form, $order, $page];
    }
}