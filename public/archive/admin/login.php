<?php  //Start the Session
session_start();

define('VERSION', '1.0.0');

define('PATH', '../');
define('IN_ADMIN', true);

require_once(PATH . 'includes/global.php');

if (isset($_POST['username']) and isset($_POST['password'])){

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$verifyadmin = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `admins` WHERE admin='$username' and password='$password'");

	if ($verifyadmin == 1){
		$_SESSION['admin'] = $username;
	}else{
		echo "Invalid Login Credentials.";
	}
}

if (isset($_SESSION['admin'])){

	header('Location: index.php?view=dashboard');
 
}else{

?>
<!DOCTYPE html>
<html>
<head>
<title>Confession</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bs3/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">
<link href="css/atom-style.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>
<body>

<div class="container login-bg">

<form action="login.php" method="POST" class="login-form-signin">
  <div class="login-logo"><img src="images/logo.png"></div>
    <h2 class="login-form-signin-heading">Login Your Account</h2>
        <div class="login-wrap">
            <input type="text" autofocus placeholder="Username" name="username" class="form-control">
			
            <input type="password" placeholder="Password" name="password" class="form-control">
			
            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
        </div>
      </form>
    </div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.10.2.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="bs3/js/bootstrap.min.js"></script>
</body>
</html> 

<?php } ?>