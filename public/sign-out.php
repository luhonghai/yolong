<?php

	$_SESSION['time'] = time() - 60*60*24*7;
	$_SESSION['username'] = '';
	
	header("Location: /index.php?view=home");		

 ?>