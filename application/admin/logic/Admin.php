<?php
namespace app\admin\logic;

use think\Db;
use app\admin\model\Admin as AdminModel;

class Admin
{
    /**
     * 保存
     * @param  [type] $params 参数
     * @return [type]         [description]
     */
    public function save($params = [])
    {
        $r = 0;
        //处理密码
    	if(!empty($params['admin_password'])){
            $params['admin_random'] = get_random_code(8);
            $params['admin_password'] = encrypt_password($params['admin_password'], $params['admin_random']);
        }else{
            unset($params['admin_password']);
        }

        $validate = validate('Admin');
        Db::startTrans();
        try {
            if(empty($params['admin_id'])){
                //判断账号是否重复
                $where['admin_username'] = $params['admin_username'];
                $admin_info = $this->find($where);
                if(!empty($admin_info)){
                    Db::rollback();
                    return '11011';
                }
                $params['admin_time'] = time();
                $params['admin_state'] = 1;
                if(!$validate->check($params)){
                    Db::rollback();
                    return $validate->getError();
                }
                $r = AdminModel::create($params);
            }else{
                if(!$validate->scene('edit')->check($params)){
                    Db::rollback();
                    return $validate->getError();
                }
                //更新管理员
                AdminModel::update($params);
                $r = 1;
            }

            if($r){
                Db::commit();
                return '10000';
            } else{
                Db::rollback();
                return '10002';
            }
        } catch (Exception $e) {
            Db::rollback();
            return '10003';
        }
    }

    //列表
    public function findAll($where, $order, $page){
        $data_list = AdminModel::all(function($query) use ($where, $order, $page){
            $query->where($where)->page($page)->order($order);
        });
        return $data_list;
    }

    //处理后的列表
    public function findAllHandle($where, $order, $page){
        $data_list = $this->findAll($where, $order, $page);
        foreach ($data_list as &$value) {
            $value = $this->handleData($value);
        }
        return $data_list;
    }

    //获取条件
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
     * 单项
     * @param  [type] $where 条件
     * @return [type]        [description]
     */
    public function find($where){
        $admin_info = AdminModel::get($where);
        return $admin_info;
    }

    //处理后的单项
    public function findHandle($where){
        $admin_info = $this->find($where);
        $admin_info = $this->handleData($admin_info);;
        return $admin_info;
    }

    /**
     * 数量
     * @param  [type] $where 条件
     * @return [type]        [description]
     */
    public function count($where = '1=1'){
        return AdminModel::where($where)->count();
    }

    /**
     * 删除
     * @param  string $id 删除的管理员id
     * @return [type]     [description]
     */
    public function del($id = ''){
        if(empty($id)){
            return '10004';
        }
        $admin_info = AdminModel::get($id);
        if(empty($admin_info)){
            return '9998';
        }
        $admin_info->delete();
        return '9999';
    }

    /**
     * 获取管理员状态信息
     * @param  [type] $key 状态
     * @return [type]      [description]
     */
    public function getAdminStateAttr($key){
        $adminState[0] = lang('close');
        $adminState[1] = lang('open');
        if(isset($key)){
            return $adminState[$key];
        }
        return $adminState;
    }

    /**
     * 处理数据
     * @param  [type] $data 管理员数据
     * @return [type]       [description]
     */
    public function handleData($data){
        $data['admin_time_attr'] = handle_unix_time($data['admin_time']);
        $data['admin_state_attr'] = $this->getAdminStateAttr($data['admin_state']);
        return $data;
    }
}