<?php
// 异常错误报错级别,
error_reporting(E_ERROR | E_PARSE );

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


/**
 * 实例化Model logic
 * @param string    $name Model名称
 * @param string    $layer 业务层名称
 * @param bool      $appendSuffix 是否添加类名后缀
 * @return \think\Model
 */
function model_logic($name = '', $layer = 'logic', $appendSuffix = false){
	return model($name, $layer, $appendSuffix);
}

/**
 * 实例化Model service
 * @param string    $name service名称
 * @param string    $layer 业务层名称
 * @param bool      $appendSuffix 是否添加类名后缀
 * @param string    $common       公共模块名
 * @return \think\Model
 */
function model_service($name = '', $layer = 'service', $appendSuffix = false){
	return model($name, $layer, $appendSuffix);
}