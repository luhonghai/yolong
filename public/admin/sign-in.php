<?php
	if (isLogged() == 'true') {
		header("Location: ./index.php?view=dashboard");
	}

	if ( $input->gc['signout'] ){
		$_SESSION['time'] = time() - 60*60*24*7;
	}
	
	$message['exist'] = "";
	$message['text'] = "";
	
	if ( $input->pc['signin'] ){

		$username = $input->pc['username'];
		$pass = $input->pc['password'];

		$verifyuser = $db->fetchRow("SELECT * FROM `users` WHERE username='$username' AND password='".md5($pass)."'");

		if ($verifyuser['username'] != ''){
		
			if ($verifyuser['admin'] == 1){
		
				$_SESSION['time'] = time() + 60*60*24*7;
				$_SESSION['username'] = $username;
				
				header("Location: ./admin/index.php?view=dashboard");
				
			} else {
				$message['exist'] = "warning";
				$message['text'] = "<p>Warning!<br>You don't have admin rights.</p>";
			}
			
		} else {
			$message['exist'] = "warning";
			$message['text'] = "<p>Warning!<br>Invalid Login Credentials.</p>";
		}
	
	}
 ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title><?php echo get_option('site_name'); ?> | Web Application</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
	<div class="container aside-xl"> <a class="navbar-brand block" href="index.html"><?php echo get_option('site_name'); ?></a>
		<section class="m-b-lg">
			<header class="wrapper text-center"> <strong>Sign in to get in touch</strong> </header>
			<form  method="post" action="#">
				<input type="hidden" name="signin" value="true">
				<div class="list-group">
					<div class="list-group-item">
						<input type="text" name="username" placeholder="Username" class="form-control no-border">
					</div>
					<div class="list-group-item">
						<input type="password" name="password" placeholder="Password" class="form-control no-border">
					</div>
				</div>
				<button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
				<div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
				<div class="line line-dashed"></div>
			</form>
		</section>
	</div>
</section>
<!-- footer -->
<footer id="footer">
	<div class="text-center padder">
    <?php if( $message['exist'] ){ ?>
		
	<?php }?>
	</div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>