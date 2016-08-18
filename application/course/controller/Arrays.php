<?php
namespace app\course\controller;

class Arrays
{
    public function index()
    {
    	$cars = array('a'=>100, 'b'=>120, 'c'=>140,  'C'=>160, 'D'=>array(1000));
    	var_dump($cars);
    	echo '<br />';
    	$arrlength = count($cars);
    	// for($x=0;$x<$arrlength;$x++){
    	// 	echo $cars[$x];
    	// 	echo '<br />';
    	// }
    	foreach($cars as $key => $value){
    		echo $key.' => '.$value;
    		echo '<br/>';
    	}
    	print_r(array_change_key_case($cars, CASE_UPPER));
    	echo '<br/>';
    	print_r(array_change_key_case($cars));
    	echo '<br />';
    	print_r(array_chunk($cars, 2, true));
    	echo '<br />';
    	$arrarr = array(
    		array('id' => 1, 'name' => 'a'),
    		array('id' => 2, 'name' => 'b'),
    		array('id' => 3, 'name' => 'c'));
    	print_r(array_column($arrarr, null, 'name'));
    	echo '<br />';
    	$arr1 = array(1,2,3,4,5);
    	$arr2 = array('a', 'b', 'c');
    	//print_r(array_combine($arr1, $arr2));
    	echo '<br />';
    	print_r(array_count_values($arr1));
    	echo '<br />';
    	print_r(array_fill(2,2,'a'));
    	echo '<br />';
    	print_r(array_fill_keys(array(100,200),'a'));
    	echo '<br />';
    	print_r(array_filter($arr1, 'test_odd'));
    	echo '<br />';
    	print_r(array_flip($cars));
    	echo '<br/>';
        echo 'index';
    }
}