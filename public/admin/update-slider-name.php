<?php

	$slider = $_POST['slider_name'];
	
	$pieces = explode("-", $slider);
	$slider_id = $pieces[0]; // slider id
	$slider_name = $pieces[1]; // new slider name
	
	$data = array( "name" => $slider_name );
			
	$insert = $db->update("sliders", $data, "id=".$slider_id);
	
?>