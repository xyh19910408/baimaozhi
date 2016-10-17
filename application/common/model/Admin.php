<?php
namespace app\common\model;

use app\common\model\Base;
//admin基本
class Admin extends Base
{
	/**
	 * 管理员状态文本
	 * @param  [type] $key key值
	 * @return [type]      [description]
	 */
	public function getAdminStaticText($key){
		$arr[0] = lang('close');
        $arr[1] = lang('open');
        if(isset($key)){
            return $arr[$key];
        }
        return $arr;
	}
}