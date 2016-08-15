<?php
namespace app\course\controller;

use app\course\controller\Base;
use think\View as tView;

class View extends Base
{
	public function _initialize(){
		echo 'init<br/>';
	}

    public function index()
    {
        return 'index';
    }

    public function newView()
    {
        $view = new tView();
        //$view->assign('domain', 'domain');
        $assign['domain'] = 'domain';
        return $view->fetch('newView', $assign);
    }

    public function fatchView()
    {
    	//$this->assign('domain', 'domain');
    	$assign['domain'] = 'domain';
        return $this->fetch('newView', $assign);
    }

    public function funView()
    {
    	$assign['domain'] = 'domain';
        return View('newView', $assign);
    }
}