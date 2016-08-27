<?php
// 应用公共文件

/**
 * 加密密码
 * @param  [type] $password 密码
 * @param  [type] $random   随机字符串
 * @return [type]           [description]
 */
function encrypt_password($password, $random){
	// 密码字符集
	$str1 = substr($random, 0, 3);
	$str2 = substr($random, 3, 7);
	$password = md5(config('AUTH_CODE').$str1.$password.$str2);
	return $password;
}

/**
 * 根据数量输出随机字符串
 * @param  integer $num 数量
 * @return [type]       [description]
 */
function get_random_code($num = 8){
	$str = '';
	// 密码字符集
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
	$max = strlen($chars) - 1;
    for ($i = 0; $i < $num; $i++) {
        $str .= $chars[mt_rand(0, $max)];
    }
    return $str;
}