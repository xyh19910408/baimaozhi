<?php
namespace app\admin\controller;

use think\Controller;
use think\Lang;
//基本
class Base extends Controller
{

    public function __construct(){
        parent::__construct();
        $lang_type = Lang::range(); //当前语言类型
        Lang::load(APP_PATH . 'admin'. DS . 'code'. DS .$lang_type.'.php'); //加载code语言包文件
    }

    /**
       * 获取列表页表单中的搜素参数
       * @param  string $default_order 默认排序条件
       * @return array                 [请求的参数, 排序条件, 分页条件]
    */
    public function getPageForm($default_order = ''){
        $order = $page = null;
        $page_form = $this->request->post();
        if(!empty($page_form['orderField']) && !empty($page_form['orderDirection'])){
            $order = $page_form['orderField'] . ' ' . $page_form['orderDirection'];
        }else{
            $order = $default_order;
        }
        if(!empty($page_form['pageCurrent']) && !empty($page_form['pageSize'])){
            $page = $page_form['pageCurrent'] . ', ' . $page_form['pageSize'];
        }else{
            $page = '1, 30';
        }
        $this->assign('page_form', $page_form); //搜索条件
        return [$page_form, $order, $page];
    }

}