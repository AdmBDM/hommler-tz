<?php

function myDebug($arr, $die = false){
	echo '<pre>' . print_r($arr, true) . '</pre>';
	if ($die) die;
}

function cl_print_r ($var, $label = '') {
	$str = json_encode(print_r ($var, true));
	echo "<script>console.group('".$label."');console.log('".$str."');console.groupEnd();</script>";
}

function cl_var_dump ($var, $label = '') {
	ob_start();
	var_dump($var);
	$result = json_encode(ob_get_clean());
	echo "<script>console.group('".$label."');console.log('".$result."');console.groupEnd();</script>";
}

function build_sorter_asc($key) {
	return function($a, $b) use ($key) {
		return strnatcmp($a[$key], $b[$key]);
	};
}

function build_sorter_desc($key) {
	return function($a, $b) use ($key) {
		return strnatcmp($b[$key], $a[$key]);
	};
}
