<?php

	function update_option($field_name, $value) {
		global $db;
		
		$output = $db->query("INSERT INTO `settings` (field, value) VALUES ('".$field_name."', '".$value."') ON DUPLICATE KEY UPDATE field='".$field_name."', value='".$value."'");
		
		return $output;
	}
	
	function get_option($field_name) {
		global $db;
		
		$output = $db->fetchOne("SELECT value FROM settings WHERE field='" . $field_name . "'");
		
		return $output;
	}
	
	function update_theme($field_name, $value) {
		global $db;
		
		$output = $db->query("INSERT INTO `theme_settings` (field, value) VALUES ('".$field_name."', '".$value."') ON DUPLICATE KEY UPDATE field='".$field_name."', value='".$value."'");
		
		return $output;
	}
	
	function theme_option($field_name) {
		global $db;
		
		$output = $db->fetchOne("SELECT value FROM theme_settings WHERE field='" . $field_name . "'");
		
		return $output;
	}
	
	function get_username($user_id){
		global $db;
	
		$output = $db->fetchOne("SELECT username FROM users WHERE id='" . $user_id . "'");
		
		return $output;
	}
	
	function count_comments($post_id){
		global $db;
	
		$count_comments = $db->fetchOne("SELECT COUNT(*) AS NUM FROM comments WHERE post_id = '" . $post_id . "'");
		
		if ( $count_comments == '' ){
			$count_comments = 0;
		}
		
		return $count_comments;
	}
	
	function count_slides($slider_id){
		global $db;
	
		$count_slides = $db->fetchOne("SELECT COUNT(*) AS NUM FROM slides WHERE slider_id = '" . $slider_id . "'");
		
		if ( $count_slides == '' ){
			$count_slides = 0;
		}
		
		return $count_slides;
	}
	
	function isLogged(){
		global $db;
		
		if ( $_SESSION['username'] != "") {
		
			if ( $_SESSION['username'] && $_SESSION['time'] < time() ) {
				$output = 'false';
			} else if ( $_SESSION['username'] && $_SESSION['time'] > time() ){
				$output = 'true';
			}
			
		} else {
			$output = 'false';
		}
		
		return $output;
	}
	
	function userinfo($user_id){
		global $db;
		
		$check_user = '';
		
		if ( $user_id ){
		
			$check_user = $db->fetchRow("SELECT * FROM users WHERE id = '$id'");	
			
		} else {
		
			if ( $_SESSION['username'] && $_SESSION['time'] > time() ){
				$username = $_SESSION['username'];
				$check_user = $db->fetchRow("SELECT * FROM users WHERE username = '$username'");
			}
			
		}
		
		return $check_user;
	}
	
	
	function get_membership ($user_id){
		global $db;
		
		if ( $user_id ){
		
			$userinfo = userinfo($user_id);
			
		} else {
			$userinfo = userinfo();
		}
		
		
		$get_membership = $db->fetchOne("SELECT name FROM memberships WHERE id = '".$userinfo['membership']."'");
		
		return $get_membership;
	}
	
	function get_school($school_id){
		global $db;

		$get_school = $db->fetchOne("SELECT school_name FROM schools WHERE id = '".$school_id."'");
		
		return $get_school;
		
	}
	
	function the_image($url = null){
		
		$post_image = get_option('post_image');
		
		if ($url){
		$image = "<img alt='example image' src='$url'>";
		} else {
		$image = "<img alt='example image' src='$post_image'>";
		}
		return $image;
		
	}
?>