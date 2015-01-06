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
	
    function checkUser($uid,$oauth_provider,$username = null , $fullname = null , $email = null ,$twitter_otoken = null,$twitter_otoken_secret = null) {
		global $db;
		
		if ( $oauth_provider == 'twitter' ){
		
			$query = $db->fetchRow("SELECT * FROM `users` WHERE twitter = '$uid'");
			if ( $query['username'] != ''){
				$_SESSION['time'] = time() + 60*60*24*7;
				$_SESSION['username'] = $query['username'];
			}
		
		}	else if ( $oauth_provider == 'facebook' ){
		
			$query = $db->fetchOne("SELECT * FROM `users` WHERE facebook = '$uid'");
			
			if ( $query['username'] != ''){
				$_SESSION['time'] = time() + 60*60*24*7;
				$_SESSION['username'] = $query['username'];
			}
			
		}
		
		if ( $query['username'] != 'incorrect' ) {
            # User is already present          
            header('Location: index.php?view=sign-in&message=incorrect');
        } else if ( $query['username'] != '' ) {
            # User is already present          
            header('Location: index.php?view=home');
        } else {
			header('Location: index.php?view=sign-up&oauth_provider='.$oauth_provider.'&uid='.$uid.'&username='.$username.'&fullname='.$fullname.'&email='.$email);
	  }
        return $result;
    }
	
	function get_base_url($extra = null) {	
	
		$output = "http://".get_option('web_site_domain').'/'.$extra;
		
		return $output;
	}
	
	function set_future_time($days) {	
	
		$output = time() + 60 * 60 * 24 * $days;
		
		return $output;
	}
	
	function set_past_time($days) {	
	
		$output = time() - 60 * 60 * 24 * $days;
		
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
	
	function get_post_title($post_id){
		global $db;
	
		$output = $db->fetchOne("SELECT title FROM posts WHERE id='" . $post_id . "'");
		
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
	
	function userinfo($user_id = null){
		global $db;
		
		$check_user = '';
		
		if ( $user_id ){
		
			$check_user = $db->fetchRow("SELECT * FROM users WHERE id = '$user_id'");	
			
		} else {
		
			if ( $_SESSION['username'] && $_SESSION['time'] > time() ){
				$username = $_SESSION['username'];
				$check_user = $db->fetchRow("SELECT * FROM users WHERE username = '$username'");
			}
			
		}
		
		if ( 10 == strlen($check_user['birthday']) ){
			$from = new DateTime($check_user['birthday']);
			$to	= new DateTime('today');
		
			$check_user['age']	= $from->diff($to)->y ;
		}
		
		if ( $check_user['genre'] == 0 ) {
			$check_user['genre'] = 'Male';
		} else {
			$check_user['genre'] = 'Female';
		}
		
		return $check_user;
	}
	
	function add_image($image, $object_id, $type = '', $data = array()){
		global $db;

		$check_image = $db->fetchOne("SELECT COUNT(*) FROM images WHERE image='".$image."'");
		
		if ( $check_image == 1){
		
			$data = array( 
				"object_id" => $object_id ,
				"type" => $type);
			$update = $db->update("images", $data, 'image='.$image );

		
		} else {
		
			$data = array( 
				"object_id" => $object_id ,
				"image" => $image ,
				"type" => $type);
			$insert = $db->insert("images", $data );
		
		}

		
		return true;
	}
	
	function get_image_id($img){
		global $db;
	
		$image = explode('/', $img);
		
		$check_image = $db->fetchRow("SELECT * FROM images WHERE image='" . $image[4] ."'");
		
		return $check_image;
	}
	
	function get_avatar($user_id , $img = false , $class = null , $id = null){
		global $db;
	
		$avatar = $db->fetchOne("SELECT avatar FROM users WHERE id='$user_id'");
		
		if ( $avatar != 0 ){
	
			$get_avatar = $db->fetchRow("SELECT * FROM images WHERE object_id='$user_id' AND type='avatar'");
			
			$get_user_avatar = 'files/'.$get_avatar['image'];
		
		} else {
			$get_user_avatar = "files/default_avatar.png";
		}
		
		if ( $img == true ) {
			$get_user_avatar = "<img src='http://www.".get_option('web_site_domain')."/$get_user_avatar' class='$class' id='$id' />";
		}
		
		return $get_user_avatar;
	}
	
	function get_image_name($image_id){
	
		global $db;
	
		$get_image = $db->fetchRow("SELECT * FROM images WHERE id='$image_id'");
		
		return $get_image;
		
	}
	
	function get_filename($object_id, $type) {
    // Generate filename based on object_id and type
		return substr(md5( $object_id ), 0 , 20) . (empty($type) ? '' : "-$type"); 
	}
	
	function dareinfo($dare_id = null){
		global $db;
		
		$check_dare = $db->fetchRow("SELECT * FROM dares WHERE id='$dare_id'");
		
		return $check_dare;
	}
	
	function postinfo($post_id = null){
		global $db;
		
		$check_post = $db->fetchRow("SELECT * FROM dares WHERE id='$post_id'");
		
		return $check_post;
	}
	
	function challengeinfo($challenge_id = null){
		global $db;
		
		$check_challenge = $db->fetchRow("SELECT * FROM challenges WHERE id='$challenge_id'");
		
		return $check_challenge;
	}
	
	function get_membership ($user_id){
		global $db;
		
		if ( $user_id ){
		
			$userinfo = userinfo($user_id);
			
		} else {
			$userinfo = userinfo();
		}
		
		if ( $userinfo['expire'] < time() ){
		
			$get_membership = $db->fetchOne("SELECT name FROM memberships WHERE id = '".get_option('standard_membership')."'");
		
		} else {
		
			$get_membership = $db->fetchOne("SELECT name FROM memberships WHERE id = '".$userinfo['membership']."'");
			
		}
		
		return $get_membership;
	}
	
	function get_school($school_id){
		global $db;

		$get_school = $db->fetchOne("SELECT school_name FROM schools WHERE id = '".$school_id."'");
		
		return $get_school;
		
	}

	
	function get_birthday($birthDay){

		$from = new DateTime('1970-07-01');
		$to   = new DateTime('today');
		$age = $from->diff($to)->y ;
		
		return $age;
		
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
	
	function menu_active($menu){
		global $input;
		
		$output = "";
		if ( $input->gc['view'] == $menu ){
			$output = "class='current_page_item'";
		}
		
		return $output;
	}
	
	function count_rows ($table , $condition = null){
		global $db;
		
		$counter = $db->fetchOne("SELECT COUNT(*) AS NUM FROM $table $condition");
		
		return $counter;
		
	}
	
	function count_unique_visitors ($days = 1){
		global $db;
		
		$past = time() - 60*60*24*$days;
		
		$counter = $db->fetchOne("SELECT COUNT(DISTINCT `ip`) AS NUM FROM visitors WHERE `date` > $past");
		
		return $counter;
	}
	
	function count_hits ($days = 1){
		global $db;
		
		$past = time() - 60*60*24*$days;
		
		$counter = $db->fetchOne("SELECT COUNT(*) AS NUM FROM visitors WHERE `date` > $past");
		
		return $counter;
	}
	
	function most_visited_page (){
		global $db;
		
		$counter = $db->fetchOne("SELECT page, COUNT(*) AS magnitude FROM visitors GROUP BY page ORDER BY magnitude DESC");
		
		return $counter;
	}
	
	function all_users_balance (){
		global $db;
		
		$counter = $db->fetchOne("SELECT SUM(`money`) FROM `users`");
		
		return $counter;
	}
	
	function random_password() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
	
	}
	
	function top_comment_authors($amount = 5 , $type = 'widget', $id = null, $name = null, $counter = null ) {
		global $db;

		$results = $db->query('
			SELECT user_id, COUNT( * ) AS comments_count
			FROM comments
			WHERE anonymous !=1
			GROUP BY user_id
			ORDER BY comments_count DESC 
			LIMIT '.$amount
		);
		
		$output = "";
		
		if ( $type == 'widget' ) {
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				$current_user = userinfo($r['user_id']);
				
				$output .= "<p class='author-data'><i class='col-2 fa fa-lg fa-user'></i>".$current_user['username']. " - ".$r['comments_count']."</p>";
				
				}
			}
		} else {
		
			$output .= "<header class='font-bold padder-v'> $name </header><div class='panel-body flot-legend'><div id='flot-pie-$id' style='height:240px'></div></div><script>$(document).ready( function(){var da = [";
				
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
					$current_user = userinfo($r['user_id']);
					$output .= "{ label: '". $current_user['username'] ." - ".$r['comments_count']." $counter',data: ".$r['comments_count']."},";
				}
			}
			
			$output .= "], da1 = [],
			series = Math.floor(Math.random() * 4) + 3;

			for (var i = 0; i < series; i++) {
				da1[i] = {
					label: 'Series' + (i + 1),
					data: Math.floor(Math.random() * 100) + 1
				}
			}

			$('#flot-pie-$id').length && $.plot($('#flot-pie-$id'), da, {
				series: {
					pie: {
						innerRadius: 0.4,
						show: true,
						stroke: {
							width: 0
						},
						label: {
							show: false,
							threshold: 0.05
						},
					}
				},
				colors: ['#65b5c2','#4da7c1','#3993bb','#2e7bad','#23649e'],
				grid: {
					hoverable: true,
					clickable: false
				},
				tooltip: true,
				tooltipOpts: {
					content: '%s'
				}
			});});
		</script>";
		}
		
		return $output;
	}
	
	function top_school_cofessions($amount = 5 , $type = 'widget', $id = null, $name = null, $counter = null  ) {
		global $db;
		
		$results = $db->query('
			SELECT school, COUNT( * ) AS top_schools
			FROM posts
			WHERE school !=0
			GROUP BY school
			ORDER BY top_schools DESC 
			LIMIT '.$amount
		);
		
		$output = "";
		
		if ( $type == 'widget' ) {
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
					if ( get_school($r['school']) == ""){
					
					} else {
						$output .= "<p class='author-data'><i class='col-2 fa fa-lg fa-bank'></i>".get_school($r['school']). " - ".$r['top_schools']."</p>";
					}
				}
			}
		} else {
		
			$output .= "<header class='font-bold padder-v'> $name </header><div class='panel-body flot-legend'><div id='flot-pie-$id' style='height:240px'></div></div><script>$(document).ready( function(){var da = [";
				
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
					$output .= "{ label: '".get_school($r['school'])." - ".$r['top_schools']." $counter',data: ".$r['top_schools']."},";
				}
			}
			
			$output .= "], da1 = [],
			series = Math.floor(Math.random() * 4) + 3;

			for (var i = 0; i < series; i++) {
				da1[i] = {
					label: 'Series' + (i + 1),
					data: Math.floor(Math.random() * 100) + 1
				}
			}

			$('#flot-pie-$id').length && $.plot($('#flot-pie-$id'), da, {
				series: {
					pie: {
						innerRadius: 0.4,
						show: true,
						stroke: {
							width: 0
						},
						label: {
							show: false,
							threshold: 0.05
						},
					}
				},
				colors: ['#65b5c2','#4da7c1','#3993bb','#2e7bad','#23649e'],
				grid: {
					hoverable: true,
					clickable: false
				},
				tooltip: true,
				tooltipOpts: {
					content: '%s'
				}
			});});
		</script>";
		
		}
		
		return $output;
	}
	
	
	function top_school_user($amount = 5 , $type = 'widget', $id = null, $name = null, $counter = null  ) {
		global $db;
		
		$results = $db->query('
			SELECT school_id, COUNT( * ) AS top_schools
			FROM users
			WHERE school_id !=0
			GROUP BY school_id
			ORDER BY top_schools DESC 
			LIMIT '.$amount
		);
		
		$output = "";
		
		if ( $type == 'widget' ) {
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
					$output .= "<p class='author-data'><i class='col-2 fa fa-lg fa-bank'></i>".get_school($r['school_id']). " - ".$r['top_schools']."</p>";
				}
			}
		} else {
		
			$output .= "<header class='font-bold padder-v'> $name </header><div class='panel-body flot-legend'><div id='flot-pie-$id' style='height:240px'></div></div><script>$(document).ready( function(){var da = [";
				
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
					$current_user = userinfo($r['user_id']);
					$output .= "{ label: '".get_school($r['school_id'])." - ".$r['top_schools']." $counter',data: ".$r['top_schools']."},";
				}
			}
			
			$output .= "], da1 = [],
			series = Math.floor(Math.random() * 4) + 3;

			for (var i = 0; i < series; i++) {
				da1[i] = {
					label: 'Series' + (i + 1),
					data: Math.floor(Math.random() * 100) + 1
				}
			}

			$('#flot-pie-$id').length && $.plot($('#flot-pie-$id'), da, {
				series: {
					pie: {
						innerRadius: 0.4,
						show: true,
						stroke: {
							width: 0
						},
						label: {
							show: false,
							threshold: 0.05
						},
					}
				},
				colors: ['#65b5c2','#4da7c1','#3993bb','#2e7bad','#23649e'],
				grid: {
					hoverable: true,
					clickable: false
				},
				tooltip: true,
				tooltipOpts: {
					content: '%s'
				}
			});});
		</script>";
		}
		return $output;
	}
	
	function top_authors($amount = 5 , $type = 'widget', $id = null, $name = null, $counter = null  ) {
		global $db;
		
		$results = $db->query('
			SELECT user_id, COUNT( * ) AS top_authors
			FROM posts
			WHERE user_id !=0
			GROUP BY user_id
			ORDER BY top_authors DESC 
			LIMIT '.$amount
		);
		
		$output = "";
		
		if ( $type == 'widget' ) {
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
				$output .= "<p class='author-data'><i class='col-2 fa fa-lg fa-bank'></i>".get_username($r['user_id'])." - ".$r['top_authors']."</p>";
				
				}
			}
		} else {
		
			$output .= "<header class='font-bold padder-v'> $name </header><div class='panel-body flot-legend'><div id='flot-pie-$id' style='height:240px'></div></div><script>$(document).ready( function(){var da = [";
				
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
					$current_user = userinfo($r['user_id']);
					$output .= "{ label: '".get_username($r['user_id'])." - ".$r['top_authors']." $counter',data: ".$r['top_authors']."},";
				}
			}
			
			$output .= "], da1 = [],
			series = Math.floor(Math.random() * 4) + 3;

			for (var i = 0; i < series; i++) {
				da1[i] = {
					label: 'Series' + (i + 1),
					data: Math.floor(Math.random() * 100) + 1
				}
			}

			$('#flot-pie-$id').length && $.plot($('#flot-pie-$id'), da, {
				series: {
					pie: {
						innerRadius: 0.4,
						show: true,
						stroke: {
							width: 0
						},
						label: {
							show: false,
							threshold: 0.05
						},
					}
				},
				colors: ['#65b5c2','#4da7c1','#3993bb','#2e7bad','#23649e'],
				grid: {
					hoverable: true,
					clickable: false
				},
				tooltip: true,
				tooltipOpts: {
					content: '%s'
				}
			});});
		</script>";
		}
		return $output;
	}
	
	function top_challenges_takers($amount = 5 , $type = 'widget', $id = null, $name = null, $counter = null  ) {
		global $db;
		
		$results = $db->query('
			SELECT winner, COUNT( * ) AS top_challenges_takers
			FROM challenges
			WHERE winner !=0
			GROUP BY winner
			ORDER BY top_challenges_takers DESC 
			LIMIT '.$amount
		);
		
		$output = "";
		
		if ( $type == 'widget' ) {
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
				$output .= "<p class='author-data'><i class='col-2 fa fa-lg fa-bank'></i>".get_username($r['winner'])." - ".$r['top_challenges_takers']."</p>";
				
				}
			}
		} else {
		
			$output .= "<header class='font-bold padder-v'> $name </header><div class='panel-body flot-legend'><div id='flot-pie-$id' style='height:240px'></div></div><script>$(document).ready( function(){var da = [";
				
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
					$current_user = userinfo($r['user_id']);
					$output .= "{ label: '".get_username($r['winner'])." - ".$r['top_challenges_takers']." $counter',data: ".$r['top_challenges_takers']."},";
				}
			}
			
			$output .= "], da1 = [],
			series = Math.floor(Math.random() * 4) + 3;

			for (var i = 0; i < series; i++) {
				da1[i] = {
					label: 'Series' + (i + 1),
					data: Math.floor(Math.random() * 100) + 1
				}
			}

			$('#flot-pie-$id').length && $.plot($('#flot-pie-$id'), da, {
				series: {
					pie: {
						innerRadius: 0.4,
						show: true,
						stroke: {
							width: 0
						},
						label: {
							show: false,
							threshold: 0.05
						},
					}
				},
				colors: ['#65b5c2','#4da7c1','#3993bb','#2e7bad','#23649e'],
				grid: {
					hoverable: true,
					clickable: false
				},
				tooltip: true,
				tooltipOpts: {
					content: '%s'
				}
			});});
		</script>";
		}
		return $output;
	}
	
	function top_dares_takers($amount = 5 , $type = 'widget', $id = null, $name = null, $counter = null  ) {
		global $db;
		
		$results = $db->query('
			SELECT user_b, COUNT( * ) AS top_dares_takers
			FROM dares
			WHERE user_b !=0
			GROUP BY user_b
			ORDER BY top_dares_takers DESC 
			LIMIT '.$amount
		);
		
		$output = "";
		
		if ( $type == 'widget' ) {
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
				$output .= "<p class='author-data'><i class='col-2 fa fa-lg fa-user'></i>".get_username($r['user_b'])." - ".$r['top_dares_takers']."</p>";
				
				}
			}
		} else {
		
			$output .= "<header class='font-bold padder-v'> $name </header><div class='panel-body flot-legend'><div id='flot-pie-$id' style='height:240px'></div></div><script>$(document).ready( function(){var da = [";
				
			for ($x=0; $x < $amount; $x++) {
				if ($r = $db->fetch_array($results)) {
				
					$current_user = userinfo($r['user_id']);
					$output .= "{ label: '".get_username($r['user_b'])." - ".$r['top_dares_takers']." $counter',data: ".$r['top_dares_takers']."},";
				}
			}
			
			$output .= "], da1 = [], series = Math.floor(Math.random() * 4) + 3;
			for (var i = 0; i < series; i++) { da1[i] = { label: 'Series' + (i + 1), data: Math.floor(Math.random() * 100) + 1 } }
				$('#flot-pie-$id').length && $.plot($('#flot-pie-$id'), da, {
				series: { pie: { innerRadius: 0.4, show: true, stroke: { width: 0 }, label: { show: false, threshold: 0.05 }, } }, colors: ['#65b5c2','#4da7c1','#3993bb','#2e7bad','#23649e'],
				grid: { hoverable: true, clickable: false },
				tooltip: true,
				tooltipOpts: { content: '%s' } });});
		</script>";
		}
		return $output;
	}
	
	function badges_rewards($amount = 5, $current_user) {
		global $db;
		
		$results = $db->query('SELECT b.* FROM badges b INNER JOIN user_badges u ON b.id = u.badge_id WHERE u.user_id ='. $current_user);
		
		$output = "";
		
		for ($x=0; $x < $amount; $x++) {
			if ($r = $db->fetch_array($results)) {
			
			$output .= "<img class='badge-image' src='".$r['image']."' title='".$r['name']."'>";
			
			}
		}
		return $output;
	}
	
	function easymenu($group_id, $attr = '') {
		global $db;
		$tree = new Tree;

		$sql = sprintf(
			'SELECT * FROM %s WHERE group_id = %s ORDER BY %s, %s',
			MENU_TABLE,
			$group_id,
			MENU_PARENT,
			MENU_POSITION
		);
		$menu = $db->GetAll($sql);
		foreach ($menu as $row) {
			$label = '<a href="'.$row[MENU_URL].'">';
			$label .= $row[MENU_TITLE];
			$label .= '</a>';

			$li_attr = '';
			if ($row[MENU_CLASS]) {
				$li_attr = ' class="'.$row[MENU_CLASS].'"';
			}
			$tree->add_row($row[MENU_ID], $row[MENU_PARENT], $li_attr, $label);
		}
		$menu = $tree->generate_list($attr);
		return $menu;
	}
	
	function site_url($url = '') {
		if (!empty($url)) {
			return _BASE_URL . 'index.php?act=' . $url;
		}
		return _BASE_URL;
	}

	function redirect($url) {
		$url = site_url($url);
		header("Location: $url");
		die;
	}

	function selectList($name, $data, $selected = '') {
		$html = "\n<select name=\"$name\" id=\"select_$name\">";

		foreach ((array)$data as $k => $v) {
			$attr = '';
			if ($k == $selected) {
				$attr = ' selected="selected"';
			}
			$html.="\n\t<option value=\"$k\"$attr>$v</option>";
		}
		$html .= "\n</select>\n";
		return $html;
	}
	
	
	function sidebar_builder($sb_data , $current_user = null){

		switch( $sb_data['type'] ){
		
			case 'top-commenters':
			
			echo	"<div class='widget'>
					<h3>".$sb_data['title']."</h3>"
					.top_comment_authors($sb_data['content']).
					"</div>";
						
			break;
			
			case 'top-schools-confessions':
			
			echo	"<div class='widget'>
					<h3>".$sb_data['title']."</h3>".top_school_cofessions($sb_data['content'])."</div>";
				
			break;
				
			case 'top-schools-users':
				
			echo	"<div class='widget'>
					<h3>".$sb_data['title']."</h3>"
					.top_school_user($sb_data['content']).
					"</div>";
				
			break;	
				
			case 'top-authors':
				
			echo	"<div class='widget'>
					<h3>".$sb_data['title']."</h3>"
					.top_authors($sb_data['content']).
					"</div>";
				
			break;
				
			case 'top-challenges-takers':
				
				
			echo	"<div class='widget'>
					<h3>".$sb_data['title']."</h3>"
					.top_school_cofessions($sb_data['content']).
					"</div>";
				
			break;
			
			case 'top-dares-takers':
				
			echo	"<div class='widget'>
					<h3>".$sb_data['title']."</h3>"
					.top_school_cofessions($sb_data['content']).
					"</div>";
				
			break;
			
			case 'badges-rewards':
				
				if( isLogged() == 'true' ){
				echo	"<div class='widget'>
						<h3>".$sb_data['title']."</h3>"
						.badges_rewards($sb_data['content'], $current_user)."</div>";	
				}
				
			break;
			
			case 'youtube':
				
			$youtube = explode('=', $sb_data['content']);

			echo "<div class='widget video'>
					<iframe width='242' height='151' src='http://www.youtube.com/embed/".$youtube[1]."' frameborder='0' allowfullscreen=''></iframe>
					<p class='video-title'>".$sb_data['title']."</p>
				</div>";
				
			break;
			
			case 'text':
				
			$youtube = explode('=', $sb_data['content']);

			echo "<div class='widget'>
					<h3>".$sb_data['title']."</h3>
					<p>".$sb_data['content']."</p>
				</div>";
				
			break;
			
			case 'image':

			echo "<img width='100%' src='".$sb_data['content']."' />";
				
			break;
		}
	}
?>
