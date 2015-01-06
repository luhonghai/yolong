<?php

	
	if ( !$_GET['view'] ){
		include('home.php');
	} else {
		include( $_GET['view'] . '.php');
	}

?>

