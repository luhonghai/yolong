<?php

	$field = $_POST['field'];
	$value = $_POST['value'];
	
	update_option($field, $value);
	
?>