<?php
/**
 * 返回ajax请求的数组
 * @param  integer $code         消息码
 * @param  string  $tabid        跳转窗口
 * @param  [type]  $data         返回数据
 * @param  integer $closeCurrent 是否关闭窗口 1关闭 2不关闭
 * @return [type]                [description]
 */
function get_ajax_arr($code = 10002, $tabid = '', $data = [], $closeCurrent = 0){
	$msg = [];
	//状态码(ok = 200, error = 300, timeout = 301)，可以在BJUI.init时配置三个参数的默认值。
	if($code == 10001)     $msg['statusCode'] = 301;
	elseif($code < 10001)  $msg['statusCode'] = 200;
	else                   $msg['statusCode'] = 300;
	//待刷新navtab id
	isset($tabid) && $msg['tabid'] = $tabid;
	//信息内容
	$msg['message'] = lang($code);
	//是否关闭当前窗口(navtab或dialog)。
	$msg['closeCurrent'] = false;
	if($msg['statusCode'] == 200 || $closeCurrent == 1) $msg['closeCurrent'] = true;
	if($closeCurrent == 2) $msg['closeCurrent'] = false;
	//返回数据
	if(!empty($data)) $msg['data'] = $data;
	return json($msg);
}

/**
 * 处理unix时间
 * @param  [type] $time unix时间
 * @return [type]       [description]
 */
function handle_unix_time($unix_time){
	return date('Y-m-d H:i:s', $unix_time);
}
