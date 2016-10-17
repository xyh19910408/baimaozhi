<?php
namespace app\common\library;

//时间处理
class Date
{

	/**
	 * 默认格式
	 * @param  [type] $time 时间
	 * @return [type]       [description]
	 */
	public static function defaultFormat($time){
		$time = date('Y-m-d H:i:s', $time);
		return $time;
	}
}