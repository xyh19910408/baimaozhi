<?php
namespace app\common\service;

use app\common\service\Base;
//admin基本
class Admin extends Base
{
	public function initialize(){
		parent::initialize();
		$this->model = model_logic('Admin');
	}

	//列表
    public function findAll($where, $order, $page){
    	$data_list = $this->model->findAll($where, $order, $page);
    	return $data_list;
    }
}