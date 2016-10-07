<?php
namespace app\common\controller;

use think\Controller;
use app\common\library\Lang;

//基本
class Base extends Controller
{
	public function _initialize(){
		parent::_initialize();
		Lang::configLang(); //加载配置文件中的语言包
	}
}