<?php
namespace app\common\logic;

use think\Model;
//基本
class Base extends Model
{
	protected $model;
	public function initialize(){
		parent::initialize();
	}

	/**
	 * 列表
	 * @param  [type] $where 条件
	 * @param  [type] $order 排序
	 * @param  [type] $page  分页
	 * @return [type]        [description]
	 */
    public function findAll($where, $order, $page){
    	$data_list = $this->model->where($where)->page($page)->order($order)->select();
        return $data_list;
    }
}