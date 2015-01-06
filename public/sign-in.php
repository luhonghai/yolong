<?php

	if (isLogged() == 'true') {
		header("Location: /index.php?view=home");
	}

	$message['exist'] = "";
	$message['text'] = "";
	
	if ( $input->pc['signin'] ){

		$username = $input->pc['username'];
		$pass = $input->pc['password'];

		$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE ( username='$username' OR email='$username' ) and password='".md5($pass)."'");

		if ($verifyuser == 1){
		
			$_SESSION['time'] = time() + 60*60*24*7;
			$_SESSION['username'] = $username;
			
			header("Location: http://".get_option('web_site_domain')."/index.php?view=home");
		}else{
			$message['exist'] = "warning";
			$message['text'] = "<span>Warning!</span><br>Invalid Login Credentials.";
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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title><?php echo get_option('site_name'); ?> SignIn</title>
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
				<form class="form-2" method="post" action="#">
					<input type="hidden" name="signin" value="true">
					<h1><span class="log-in">Sign in</span> or <a href="index.php?view=sign-up" class="sign-up">sign up</a></h1>
					<p class="float">
						<label for="login"><i class="fa fa-user"></i>Username</label>
						<input type="text" name="username" placeholder="Username or email">
					</p>
					<p class="float">
						<label for="password"><i class="fa fa-lock"></i>Password</label>
						<input type="password" name="password" placeholder="Password" class="showpassword">
					</p>
					<p class="clearfix">
						<a href="index.php?view=sign-in&login&oauth_provider=facebook" style="background: url(images/fb.png);height: 48px;width: 48px;display: inline-block;background-size: cover;float: left;"></a>
						<a href="index.php?view=sign-in&login&oauth_provider=twitter" style="background: url(images/twitter.png);height: 48px;width: 48px;display: inline-block;background-size: cover;float: left;margin-left: 3%;"></a>
						<input type="submit" value="Sign in" name="submit">

					</p>
				</form>​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

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