<?php
namespace app\course\controller;

use think\View as tView;

class View
{
    public function index()
    {
        return 'index';
    }

    public function newView()
    {
        $view = new tView();
        return $view->fetch('newView');
    }
}