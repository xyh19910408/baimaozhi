<?php
// 异常错误报错级别,
error_reporting(E_ERROR | E_PARSE );

function test_odd($var){
	return ($var & 1);
}