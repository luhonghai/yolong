<?php
	if($_POST['new_badge']){
		$user_id = $_POST['user_id'];
		$badge_id = $_POST['badge_id'];
		
		$data = array("user_id" => $user_id , "badge_id" => $badge_id);
		$insert = $db->insert("user_badges", $data);
	}
	
	if($_POST['remove_badge']){
		$user_id = $_POST['user_id'];
		$badge_id = $_POST['badge_id'];
		
		$delete = $db->delete("user_badges", "user_id=$user_id AND badge_id=$badge_id");
	}
	
?>