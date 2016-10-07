<?php
namespace app\common\library;

use think\Lang as ThinkLang;

//语言
class Lang
{
	/**
	 * 加载配置文件中的语言包
	 * @return [type] [description]
	 */
	public static function configLang(){
		$lang_path = config('extra_lang_path');
		if(empty($lang_path)){
			return true;
		}
		$lang_type = ThinkLang::range(); //当前语言类型
		foreach ($lang_path as $value) {
			ThinkLang::load($value . $lang_type . '.php');
		}
		return true;
	}
}