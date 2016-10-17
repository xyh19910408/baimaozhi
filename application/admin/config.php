<?php
return [
	// 开启应用Trace调试
	'app_trace'                 =>  true,
	// 静态资源存放目录
	'static_dir'           => 'static/admin/',
	// 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'       => 'html',
    //设置session
    'session'                   => [
        'prefix'         => 'admin',
        'type'           => '',
        'auto_start'     => true,
    ],
    //过滤不需要登录的事件
    'check_not_login'           => [
        'index/login',
    ],
];