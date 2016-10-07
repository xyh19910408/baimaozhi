<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Admin extends Base
{
	//列表
    public function adminList()
    {
    	$AdminService = model_service('Admin');
    	$page = '1,30';
        $data_list = $AdminService->findAll($where, $order, $page);
        $this->assign('data_list', $data_list); //表数据列表
    	return $this->fetch();
    }
}