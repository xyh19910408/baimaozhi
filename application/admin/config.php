<?php
return [
	// 静态资源存放目录
    'static_dir'                => 'static/admin/',
    // BJUI存放目录
    'bjui_static_dir'           => 'static/admin/BJUI/',
    // public资源存放目录
    'public_static_dir'         => 'static/public/',

    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'       => 'html',

    // 开启应用Trace调试
	'app_trace'                 =>  true,

    //设置session
    'session'                => [
        'prefix'         => 'admin',
        'type'           => '',
        'auto_start'     => true,
    ],
];