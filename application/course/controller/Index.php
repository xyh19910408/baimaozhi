<?php
namespace app\course\controller;

class Index
{
    public function index()
    {
    	$j = 0;
    	for ($i=0; $i < 1000000; $i++) { 
    		$j += $i;
    	}
    	
        return $j;
    }
}