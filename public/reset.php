<?php
	if (isLogged() == 'true') {
		header("Location: /index.php?view=home");
	}

	if ( $input->pc['reset'] ){

		$username = $input->pc['username'];
		$email = $input->pc['email'];

		$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE username='$username' and email='$email'");

		if ($verifyuser == 1){
		
			$password = random_password();
			
			$data = array( "password" => md5($password) );
			$update = $db->update("users", $data, "username='$username'");
			
			$str2find = array("%password%", "%site_name%", "%site_url%", "%username%");
			$str2chan = array($password, get_option('site_name'), get_option('web_site_domain'), $username);
			$message = str_replace($str2find, $str2chan, get_option('reset_message'));
			$subject = str_replace("%site_name%",get_option('site_name'), get_option('reset_subject'));
			
			$mail = new mail();
			$mail->setFrom(get_option('site_email'), get_option('site_name'));
			$mail->addTo($email, $fullname);
			$mail->setSubject($subject);
			$mail->setBodyText($message);
			$mail->send();
			
			$message['exist'] = "success";
			$message['text'] = "<span>Success!</span><br>Your new password has been send to $email";
		}else{
			$message['exist'] = "warning";
			$message['text'] = "<span>Warning!</span><br>Invalid Username / Email.";
		}
	
	}
 ?>

<!DOCTYPE html>
<!--[if IE 7]><html class = "ie7"><![endif]-->
<!--[if IE 8]><html class = "ie8"><![endif]-->
<!--[if IE 9]><html class = "ie9"><![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html>
<!--<![endif]-->
<head>
<title><?php echo get_option('site_name'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css?ver=1.0.0">
<link rel="stylesheet" href="css/sky-forms.css?ver=1.0.0">
<script type="text/javascript" src="js/jquery-1.11.0.js" ></script>
<script type="text/javascript" src="js/script.js" ></script>
<!--[if IE]><script src="js/html5.js"></script><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->
</head>
<body class="login">
<div class="wrapper login-wrapper">
  <header><img src="images/logo.png" alt="*" />
    <h1><?php echo get_option('site_name'); ?></h1>
  </header>
  	<?php if ( $message['exist'] ){?>
	<div class="<?php echo $message['exist']; ?>">
		<div class="mode-img"></div>
		<?php echo $message['text']; ?>
	<div class="close-btn"></div>
	</div>
	<?php }?>
  <!-- header -->
  <div class="post">
    <div class="post-header">
      <h2>Sign in</h2>
    </div>
    <!-- .post-header -->
    <form class="clearfix sky-form" method="post" action="#" style="padding: 15px;">
		<input name="reset" value="true" type="hidden">
		<div class="row">
			<label class="label col col-4">Username</label>
			<div class="col col-8">
				<label class="input">
					<i class="icon-append fa fa-user"></i>
					<input type="text" name="username">
				</label>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<label class="label col col-4">Email</label>
			<div class="col col-8">
				<label class="input">
					<i class="icon-append fa fa-lock"></i>
					<input type="text" name="email">
				</label>
			</div>
		</div>	
		<input type="submit" value="Reset Password">
    </form>
    <!-- .login-form -->
    <div class="post-footer">
      <p>Don't have an account yet? <a href="./index.php?view=sign-up">Sign Up</a></p>
    </div>
    <!-- .post-footer -->
  </div>
  <!-- .post -->
</div>
<!-- .wrapper -->
</body>
</html>