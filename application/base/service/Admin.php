<?php
namespace app\base\service;
use app\base\service\Base;
//admin基本
class Admin extends Base
{
	protected $model;
	public function __construct(){
		$this->model = model_logic('Admin');
	}

	//列表
    public function findAll($where, $order, $page){
    	return $this->model->findAll($where, $order, $page);
    }
}