<?php
namespace app\common\service;

use think\Model;
//基本
class Base extends Model
{
	protected $model;
	public function _initialize(){
		parent::_initialize();
	}
}