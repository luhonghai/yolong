<?php
	session_start();
	
	require_once('../includes/global.php');
	
	require_once('../includes/functions.php');
	
if (!isset($_SESSION['admin'])){

	header('Location: login.php');
 
}else{
	

	
	if ( !$_GET['view'] ){
		include('dashboard.php');
	} else {
		include( $_GET['view'] . '.php');
	}
	
}