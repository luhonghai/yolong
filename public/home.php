<?php

	$oauth_provider = $_GET['oauth_provider'];
	$uid 			= $_GET['uid'];
	$username		= $_GET['username'];
	$fullname		= $_GET['fullname'];
	$email			= $_GET['email'];


	if ( $_REQUEST['flag']=='register' ){

		$username = $input->pc['username'];
		$pass = $input->pc['password'];
		$confpass = $input->pc['conf_password'];
		$email = $input->pc['email'];
		$fullname = $input->pc['fullname'];
		$oauth_provider = $input->pc['oauth_provider'];	
		$oauth_uid = $input->pc['uid'];
		$twitter_oauth_token = $input->pc['oauth_token'];
		$twitter_oauth_token_secret = $input->pc['oauth_token_secret'];
			
		$check_username = $db->fetchOne("SELECT COUNT(*) FROM users WHERE username='$username'");
		$check_email = $db->fetchOne("SELECT COUNT(*) FROM users WHERE email='$email'");

		
		if ( $check_username == 1 ) {
			$message['exist'] = "warning";
			$message['text'] .= "This username already exist";
		}
		if ( $check_email == 1 ) {
			$message['exist'] = "warning";
			$message['text'] .= "This email already exist";
		}
			
		if ( empty($message['exist']) ){
			if ( $oauth_provider == 'facebook' ){
			
				$data = array(
					"username" => $username , 
					"password" => md5($pass) , 
					"email" => $email , 
					"fullname" => $fullname, 
					"facebook" => $oauth_uid,
					"date" => time() 
				);
					
			} else if ( $oauth_provider == 'twitter' ){
			
				$data = array(
					"username" => $username , 
					"password" => md5($pass) , 
					"email" => $email , 
					"fullname" => $fullname, 
					"twitter" => $oauth_uid,
					"oauth_provider" => $oauth_provider,
					"twitter_oauth_token" => $twitter_oauth_token,
					"twitter_oauth_token_secret" => $twitter_oauth_token_secret,
					"date" => time() 
				);
					
			} else if ( $oauth_provider == '' ){
			
				$data = array(
					"username" => $username , 
					"password" => md5($pass) , 
					"email" => $email , 
					"fullname" => $fullname,
					"date" => time() 
				);
					
			}
			
			$insert = $db->insert("users", $data);
			$message['exist'] = "success";
			$message['text'] = "Thanks for signing up.";
				
			$str2find = array("%fullname%", "%site_name%", "%site_url%", "%username%");
			$str2chan = array($fullname, get_option('site_name'), get_option('web_site_domain'), $username);
			$message = str_replace($str2find, $str2chan, get_option('register_message'));
			$subject = str_replace("%site_name%",get_option('site_name'), get_option('register_subject'));
				
			$mail = new mail();
			$mail->setFrom(get_option('site_email'), get_option('site_name'));
			$mail->addTo($email, $fullname);
			$mail->setSubject($subject);
			$mail->setBodyText($message);
			$mail->send();
				
			header("Location: http://".get_option('web_site_domain')."/index.php?view=home&sign-up=$fullname");
				
		}
	}

	if ( $input->pc['signin'] ){

		$username = $input->pc['username'];
		$pass = $input->pc['password'];

		$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE ( username='$username' OR email='$username' ) AND password='".md5($pass)."'");

		if ($verifyuser == 1){
		
			$_SESSION['time'] = time() + 60*60*24*7;
			$_SESSION['username'] = $username;
			
			header("Location: http://".get_option('web_site_domain')."/index.php?view=home");
		}else{
			$message['exist'] = "warning";
			$message['text'] = "Invalid Login Credentials.";
		}
	
	}

	if (array_key_exists("login", $_GET)) {
	
		$oauth_provider = $_GET['oauth_provider'];
		
		if ($oauth_provider == 'twitter') {
		
			header("Location: index.php?view=login-twitter");
			
		} else if ($oauth_provider == 'facebook') {
		
			header("Location: index.php?view=login-facebook");
			
		}
		
	}

	global $css;
	
	$css = "<link rel='stylesheet' type='text/css' href='css/home.css?ver=1.0.0' />";
	
	include ('header.php');
	
?>

<!-- header -->
  <!-- masterslider -->

<div class="home-login" style="background-image:url('http://<?php echo get_option('bg_home'); ?>');<?php echo (isLogged() == 'true') ? 'display: inline-block;' : ''; ?>">

	<?php

	if (isLogged() == 'true') {
	
	?>
		
		<div class="home-profile right-text">
		
			<p class="big-p">Username</p>
			<p class="small-p"><?php echo $user_info['username']; ?></p>
			<br>
			<p class="big-p">Confessions</p>
			<a href='./index.php?view=confessions&userid=<?php echo $user_info['id'];?>' class="small-p"><?php echo count_rows('posts', 'WHERE user_id='.$user_info['id']); ?></p>
			<br>
			<p class="big-p">Challenges</p>
			<a href='./index.php?view=challenges&userid=<?php echo $user_info['id'];?>' class="small-p"><?php echo count_rows('challenges', 'WHERE user_a='.$user_info['id']); ?></p>
			
		</div>
		
		<div class="home-profile">
			<center>
				<img class="avatar" src="<?php echo get_avatar($user_info['id']); ?>">
			</center>
		</div>
		
		<div class="home-profile left-text">
			
			<p class="big-p">Fullname</p>
			<p class="small-p"><?php echo $user_info['fullname']; ?></p>	
			<br>
			<p class="big-p">Dares</p>
			<a href='./index.php?view=dares&userid=<?php echo $user_info['id'];?>' class="small-p"><?php echo count_rows('dares', 'WHERE user_a='.$user_info['id']); ?></p>
			<br>
			<p class="big-p">Birthday</p>
			<p class="small-p"><?php echo $user_info['birthday']; ?> (<?php echo $user_info['age']; ?> Years Old) </p>			
			
		</div>
		
	<?php } else { ?>
	
	<div class="login button_panel" <?php echo ( $oauth_provider != '' ) ? "style='display:none;'" : "";?>>
	
		<?php if ($message['exist'] != ""){ ?>
			<a class="l_bt" style="color: #fff;border: none;<?php echo ($message['exist'] == 'success') ? "background-color: #48C231;" : "background-color:#C23131;" ;?>"><?php echo $message['text']; ?></a>
		<?php } ?>
		
		<?php if ($input->gc['sign-up']){ ?>
			<a class="l_bt" style="color: #fff;border: none;background-color: #48C231;">Welcome <?php echo $input->gc['sign-up']; ?></a>
		<?php } ?>
		
		<a href="index.php?view=home&login&oauth_provider=facebook" class="l_bt facebook">facebook</a>
		<a href="index.php?view=home&login&oauth_provider=twitter" class="l_bt twitter">twitter</a>
		<a class="l_bt" id="signin">sign in</a>
		<a class="l_bt" id="signup">sign up</a>
	</div>

	<form class="login signin_panel" style="display:none;" method="post" action="./index.php?view=home">
		<input type="hidden" name="signin" value="true">
		<input type="text" placeholder="username" name="username"><br>
		<input type="password" placeholder="password" name="password"><br>
		<input type="button" id="s_signin" value="sign in">
		<a class="l_bt" id="signinback">back</a>
	</form>
	
	<form class="login signup_panel" <?php echo ( $oauth_provider != '' ) ? "" : "style='display:none;'";?> action="index.php?view=home&flag=register" method="post" name="signup">
		<input type="hidden" name="uid" size="20" value="<?php echo $uid; ?>">
		<input type="hidden" name="oauth_provider" size="20" value="<?php echo $oauth_provider; ?>">
		<input type="hidden" name="oauth_token" size="20" value="<?php echo $_SESSION['oauth_token']; ?>">
		<input type="hidden" name="oauth_token_secret" size="20" value="<?php echo $_SESSION['oauth_token_secret']; ?>"> 
		<input type="text" placeholder="username" name="username" value="<?php echo $username; ?>"><br>
		<input type="text" placeholder="fullname" name="fullname" value="<?php echo $fullname; ?>"><br>
		<input type="text" placeholder="email" name="email" value="<?php echo $email; ?>"><br>
		<input type="password" placeholder="password" name="password"><br>
		<input type="button" id="s_signup" value="sign up">
		<a class="l_bt" id="signupback">back</a>
	</form>
	
	<?php

		}
	
	?>
	
	<div class="home-featured">	
	<center>
	<?php
		$gs = $db->query("SELECT * FROM featured_users ORDER BY date DESC");
					
		for ($x=0; $x < 10; $x++) {				
			if ($r = $db->fetch_array($gs)) {
			$verify_user = $db->fetchOne("SELECT COUNT(*) AS NUM FROM users WHERE id='".$r['user_id']."'");
			if ( $verify_user == 1){
		?>
	
		<a href="index.php?view=user&user_id=<?php echo $r['user_id']; ?>">
			<img src="<?php echo get_avatar($r['user_id']); ?>" width="64" height="64">
		</a>
	
		<?php
			}
		}
	}
	?>
	</center>
	</div>	
</div>

<script>

	$(document).ready(
		function(){
			var g_width = $('.home-login').width();
			
			$('.home-login').height( g_width / 2.5 );
			
			$('#signin').on( "click", function() {
				$('.button_panel').fadeOut( 'slow' , function(){
					$('.signin_panel').fadeIn( 'slow' );
				});
			});
			
			$('#signup').on( "click", function() {
				$('.button_panel').fadeOut( 'slow' , function(){
					$('.signup_panel').fadeIn( 'slow' );
				});
			});
			
			$('#signinback').on( "click", function() {
				$('.signin_panel').fadeOut( 'slow' , function(){
					$('.button_panel').fadeIn( 'slow' );
				});
			});
			
			$('#signupback').on( "click", function() {
				$('.signup_panel').fadeOut( 'slow' , function(){
					$('.button_panel').fadeIn( 'slow' );
				});
			});
			
			$('#s_signin').on( "click", function() {
				$('.signin_panel').submit();
			});
			
			$('#s_signup').on( "click", function() {
				$('.signup_panel').submit();
			});
		}
	);
	
</script>

<?php
	include ('footer.php');
?>