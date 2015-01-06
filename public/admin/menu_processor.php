<?php

/**
 * default controller & method
 */
$controller = 'menu';
$method = 'index';

/**
 * url structure: index.php?act=controller.method
 */
if (isset($_GET['act'])) {
	$act = explode('.', $_GET['act']);
	$controller = $act[0];
	if (isset($act[1])) {
		$method = $act[1];
	}
}

$Class_name = ucfirst($controller);
$instance = new $Class_name;
$instance->$method();


/* End of index.php */

?>