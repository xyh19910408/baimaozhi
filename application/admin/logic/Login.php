<?php
namespace app\admin\logic;

class Login
{
	/**
	 * 管理员登陆
	 * @param  [type] $params 参数
	 * @return [type]         [description]
	 */
	public function adminLogin($params = []){
		//登陆信息验证
		$validate = validate('Login');
		if(!$validate->check($params)){
            return $validate->getError();
        }
        
        //验证码验证
        if(!captcha_check($params['vertify'])){
			return '10009';
		};

        //获取用户信息
        $AdminLogic = model_logic('Admin');
        $where['admin_username'] = $params['username'];
        $admin_info = $AdminLogic->find($where);
        if(empty($admin_info)){
        	return '10013'; //没有管理员
        }

        //对比密码
        $admin_password = encrypt_password($params['password'], $admin_info['admin_random']);
        if($admin_password != $admin_info['admin_password']){
        	return '10013'; //密码错误
        }

        //保存登陆信息
        $admin_info = $this->loginInfo($admin_info);
        if(empty($admin_info)){
        	return '10014'; //登陆失败
        }
        return '9997'; //登陆成功
	}

	/**
	 * 登陆的用户信息
	 * @param  [type] $params 参数
	 * @return [type]         [description]
	 */
	public function loginInfo($params = []){
		if(!empty($params)){
			session('login_info', $params);
		}
		return session('login_info');
	}

	//退出登录
	public function adminLogout(){
		session('login_info', null);
		return true;
	}
}