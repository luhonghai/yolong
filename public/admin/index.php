<?php
	session_start();
	
	require_once('../includes/global.php');
	
	require_once('../includes/functions.php');
	
	$user_info = userinfo();
	
	if ( !$_GET['view'] ){
		include('dashboard.php');
	} else {
		include( $_GET['view'] . '.php');
	}
	
?>