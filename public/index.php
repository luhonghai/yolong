<?php 
	session_start();
	
	require_once('includes/global.php');
	
	require_once('includes/functions.php');
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	$data = array(
		"ip" => $_SERVER['REMOTE_ADDR'] , 
		"page" => $actual_link ,
		"date" => time() );
			
	$db->insert("visitors", $data);

	$data = "";
	
	$user_info = userinfo();
	
	if (isLogged() == 'true') {
	
		$data = array( "online" => time() );
		$db->update("users", $data, "id=".$user_info['id']);
		$data = "";
	
	}
	if ( !$_GET['view'] ){
		include('home.php');
	} else {
		include( $_GET['view'] . '.php');
	}

?>

