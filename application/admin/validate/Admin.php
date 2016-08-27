<?php
namespace app\admin\validate;

use think\Validate;
//管理员验证器
class Admin extends Validate
{
    protected $rule = [
        'admin_username'      =>  'require|max:20',
        'admin_password'      =>  'require|max:32',
        'admin_random'        =>  'require|max:8',
        'admin_time'          =>  'require|max:11',
        'admin_state'         =>  'require|max:1',
    ];

    protected $message = [
        'admin_username.require'       =>  '11001',
        'admin_username.max'           =>  '11002',
        'admin_password.require'       =>  '11003',
        'admin_password.max'           =>  '11004',
        'admin_random.require'         =>  '11005',
        'admin_random.max'             =>  '11006',
        'admin_time.require'           =>  '11007',
        'admin_time.max'               =>  '11008',
        'admin_state.require'          =>  '11009',
        'admin_state.max'              =>  '110010',
    ];

    protected $scene = [
        'edit'  =>  ['admin_password', 'admin_random'],
    ];
}