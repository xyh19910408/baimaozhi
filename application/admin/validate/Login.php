<?php
namespace app\admin\validate;

use think\Validate;
//登陆验证器
class Login extends Validate
{
    protected $rule = [
        'username'       =>  'require|max:20',
        'password'       =>  'require|max:20',
        'vertify'        =>  'require|max:4',
    ];

    protected $message = [
        'username.require'       =>  '10007',
        'username.max'           =>  '10011',
        'password.require'       =>  '10008',
        'password.max'           =>  '10012',
        'vertify.require'        =>  '10009',
        'vertify.max'            =>  '10009',
    ];
}