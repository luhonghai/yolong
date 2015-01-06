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
		$message['text'] .= "<span>Warning!</span><br>This username already exist <br>";
	}
	if ( $check_email == 1 ) {
		$message['exist'] = "warning";
		$message['text'] .= "<span>Warning!</span><br>This email already exist <br>";
	}
		
	if ($pass != $confpass) {
		$message['exist'] = "warning";
		$message['text'] .= "<span>Warning!</span><br>Password do not match <br>";
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
			
		header("Location: http://".get_option('web_site_domain')."/index.php?view=sign-in&sign-up=$fullname");
			
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title><?php echo get_option('site_name'); ?> SignUp</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(images/bg.jpg);
			}
		</style>
    </head>
    <body>
        <div class="container">
			
			<section class="main">
				<form action="index.php?view=sign-up&flag=register" method="post" name="signup" class="form-2">
					<input type="hidden" name="uid" size="20" value="<?php echo $uid; ?>">
					<input type="hidden" name="oauth_provider" size="20" value="<?php echo $oauth_provider; ?>">
					<input type="hidden" name="oauth_token" size="20" value="<?php echo $_SESSION['oauth_token']; ?>">
					<input type="hidden" name="oauth_token_secret" size="20" value="<?php echo $_SESSION['oauth_token_secret']; ?>"> 
					
					<h1><span class="log-in">sign up</span> or <a href="index.php?view=sign-in" class="sign-up">Log in</a></h1>
					<p class="float">
						<label for="username"><i class="fa fa-user"></i>Username</label>
						<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
					</p>
					<p class="float">
						<label for="email"><i class="fa fa-user"></i>Email</label>
						<input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
					</p>
					<p class="float" style="padding-right: 5px;">
						<label for="fullname"><i class="fa fa-user"></i>Fullname</label>
						<input type="text" name="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>">
					</p>
					<p class="float">
						<label for="password"><i class="fa fa-lock"></i>Password</label>
						<input type="password" name="password" placeholder="Password" class="showpassword">
					</p>
					<p class="float" style="padding-right: 5px;">
						<label for="conf_password"><i class="fa fa-lock"></i>Confirm Password</label>
						<input type="password" name="conf_password" placeholder="Password" class="showpassword">
					</p>
					<p class="clearfix">
						<input type="submit" value="Sign Up" name="submit">
					</p>
				</form>​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
    </body>
</html>