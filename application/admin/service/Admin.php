<?php
namespace app\admin\service;

use app\common\service\Admin as BaseAdmin;
//admin管理员
class Admin extends BaseAdmin
{
	public function _initialize(){
		parent::_initialize();
	}

	/**
	 * 登陆
	 * @param  [type] $params 登陆参数
	 * @return [type]         [description]
	 */
	public function adminLogin($params = []){
		return $this->model->adminLogin($params);
	}

	/**
	 * 登陆的用户信息
	 * @param  [type] $params 参数
	 * @return [type]         [description]
	 */
	public function loginInfo($params = []){
		return $this->model->loginInfo($params);
	}

	//退出登录
	public function adminLogout(){
		return $this->model->adminLogout();
	}

	/**
   	 * 处理列表
   	 * @param  [type] $where 条件
   	 * @param  [type] $order 排序
   	 * @param  [type] $page  分页
   	 * @return [type]        [description]
   	 */
    public function processedList($where, $order, $page){
    	return $this->model->processedList($where, $order, $page);
    }

    /**
     * 获取条件
     * @param  [type] $params 参数
     * @return [type]         [description]
     */
    public function getWhere($params){
    	return $this->model->getWhere($params);
    }
}