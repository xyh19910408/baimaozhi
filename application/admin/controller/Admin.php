<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Admin extends Base
{
	//列表
    public function adminList()
    {
    	$AdminService = model_service('Admin');
    	//获取列表页表单中的搜索参数
    	list($page_form, $order, $page) = $this->getPageForm('admin_time desc', '1,30');
    	$where = $AdminService->getWhere($page_form);
        list($data_list, $data_count) = $AdminService->processedList($where, $order, $page);

        $this->assign('data_list', $data_list); //表数据列表
        $this->assign('data_count', $data_count); //总数
    	return $this->fetch();
    }
}