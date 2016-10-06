<?php
namespace app\base\logic;
use app\base\logic\Base;
//admin基本
class Admin extends Base
{
	protected $model;
	public function __construct(){
		$this->model = model('Admin');
	}
	//列表
    public function findAll($where, $order, $page){
    	$data_list = $this->model->where($where)->page($page)->order($order);
        return $data_list;
    }
}