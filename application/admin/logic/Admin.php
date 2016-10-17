<?php
namespace app\admin\logic;

use app\common\logic\Admin as BaseAdmin;
use app\common\library\String;
use app\common\library\Date;
//admin管理员
class Admin extends BaseAdmin
{
	public function _initialize(){
		parent::_initialize();
	}

	/**
	 * 登陆
	 * @param  [type] $params 登陆参数
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
		$where['admin_username'] = $params['username'];
		$admin_info = model('Admin')->where($where)->find();
		if(empty($admin_info)){
        	return '10013'; //没有管理员
        }
        //对比密码
        $admin_password = String::encryptPassword($params['password'], $admin_info['admin_random']);
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

    /**
     * 获取条件
     * @param  [type] $params 参数
     * @return [type]         [description]
     */
    public function getWhere($params){
        $where = [];
        if(!empty($params['admin_username'])){
            $where['admin_username'] = ['like', '%'.$params['admin_username'].'%'];
        }else{
            $where = '1=1';
        }
        return $where;
    }

   	/**
   	 * 处理列表
   	 * @param  [type] $where 条件
   	 * @param  [type] $order 排序
   	 * @param  [type] $page  分页
   	 * @return [type]        [description]
   	 */
    public function processedList($where, $order, $page){
    	$data_list = $this->findAll($where, $order, $page);
    	foreach ($data_list as &$value) {
    		$value = $this->processedData($value);
    	}
        $data_count = $this->model->where($where)->count();
    	return [$data_list, $data_count];
    }

    /**
     * 处理数据
     * @param  [type] $data 数据
     * @return [type]       [description]
     */
    public function processedData($data){
        $data['admin_time_text'] = Date::defaultFormat($data['admin_time']);
        $data['admin_state_text'] = $this->model->getAdminStaticText($data['admin_state']);
    	return $data;
    }
}