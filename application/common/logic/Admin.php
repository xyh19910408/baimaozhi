<?php
namespace app\common\logic;

use app\common\logic\Base;
//admin基本
class Admin extends Base
{
	protected $model;
	public function initialize(){
		parent::initialize();
		$this->model = model('Admin');
	}
	//列表
    public function findAll($where, $order, $page){
    	$data_list = $this->model->where($where)->page($page)->order($order)->select();
        return $data_list;
    }
}