<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Admin extends Base
{
	protected $admin_navid = 'admin-adminList'; //管理员navid
    protected $default_admin = 'admin_time desc'; //管理员默认搜索条件

    //列表
    public function adminList()
    {
        $AdminService = base_service('Admin');
        $page = '1,30';
        $data_list = $AdminService->findAll($where, $order, $page);

        // $order = $page = $where = null;
        // //获取列表页表单中的搜索参数
        // list($page_form, $order, $page) = $this->getPageForm($this->default_admin);
        // $AdminLogic = model_logic('Admin');
        // //获取搜索条件
        // $where = $AdminLogic->getWhere($page_form);
        // //获取表数据列表
        // $data_list = $AdminLogic->findAllHandle($where, $order, $page);
        // //总数
        // $data_count = $AdminLogic->count($where);

        // $this->assign('page_form', $page_form); //搜索条件
        $this->assign('data_list', $data_list); //表数据列表
        //$this->assign('data_count', $data_count); //总数
        return $this->fetch();
    }

    //编辑
    public function adminEdit($id = '')
    {
        $params = $code = $where = null;
        $AdminLogic = model_logic('Admin');
    	if($this->request->isPost()){
    		$params = $this->request->post();
            $code = $AdminLogic->save($params);
    		return get_ajax_arr($code, $this->admin_navid, $code);
    	}
        if(!empty($id)){
            $where['admin_id'] = $id;
            $this->assign('data_info', $AdminLogic->find($where));
        }
        return $this->fetch();
    }

    //删除
    public function adminDel($id = ''){
        $AdminLogic = model_logic('Admin');
        $code = $AdminLogic->del($id);
        return get_ajax_arr($code, $this->admin_navid, $code, 2);
    }
}