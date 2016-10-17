<?php
namespace app\common\library;

//字符串处理
class String
{
	/**
	 * 加密密码
	 * @param  [type] $password 密码
	 * @param  [type] $random   加密字符串
	 * @return [type]           [description]
	 */
	public static function encryptPassword($password, $random){
		// 密码字符集
		$str1 = substr($random, 0, 3);
		$str2 = substr($random, 3, 7);
		$password = md5(config('AUTH_CODE').$str1.$password.$str2);
		return $password;
	}
}