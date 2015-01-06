<?php

 require_once('templates/headers/opening.tpl.php');

$message['exist'] = "";
$message['text'] = "";

if ( $_GET['logout'] ){
	
	$_SESSION['time'] = time() - 60*60*24*2;
	
}

if ( $_POST['signup'] ){

	$username = mysql_real_escape_string($_POST['username']);
	$pass = mysql_real_escape_string($_POST['password']);
	$email = mysql_real_escape_string($_POST['email']);
	$fullname = mysql_real_escape_string($_POST['fullname']);

	if(empty($username)){
		$message['exist'] = "danger";
		$message['text'] .= "You forgot your username <br>";
	} 
	if ( empty($email) ) {
		$message['exist'] = "danger";
		$message['text'] .= "You forgot your email <br>";
	} 
	if ( empty($fullname) ) {
		$message['exist'] = "danger";
		$message['text'] .= "You forgot your fullname <br>";
	}
	if ( empty($pass) ) {
		$message['exist'] = "danger";
		$message['text'] .= "You forgot your password <br>";
	}
	
	$check_user = $db->fetchRow("SELECT * FROM users WHERE username='$username'");
	
	if ($check_user['username'] == $username) {
		$message['exist'] = "danger";
		$message['text'] .= "This username already exist <br>";
	}
	if ($check_user['email'] == $email) {
		$message['exist'] = "danger";
		$message['text'] .= "This email already exist <br>";
	}
	if ( empty($message['exist']) ){
		$data = array("username" => $username , "password" => md5($pass) , "email" => $email , "fullname" => $fullname, 'date' => time() );
		$insert = $db->insert("users", $data);
		$message['exist'] = "success";
		$message['text'] = "Thanks for signing up.";
	}
}

if ( $_POST['login'] ){

	$username = mysql_real_escape_string($_POST['username']);
	$pass = mysql_real_escape_string($_POST['password']);
	$remember = $_POST['remember'];

	$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE username='$username' and password='".md5($pass)."'");

	if ($verifyuser == 1){
		if ( $remember == 'yes' ) {
			$_SESSION['time'] = time() + 60*60*24*30;
		} else {
			$_SESSION['time'] = time() + 60*60*24*2;
		}
		$_SESSION['username'] = $username;
	}else{
		$message['exist'] = "danger";
		$message['text'] = "Invalid Login Credentials.";
	}
	
} 

// Data to be passed to templates/headers/header-x.tpl.php -->
$title = 'One Page Parallax Home - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; 
$keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; 
$description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; 
$page = 'home-menu';   // To set active on the same id of primary menu 

$primary_menu = 'one-page-menu';   // Primary Menu 

require_once('templates/headers/'.$header.'.tpl.php'); 

?>

<div class="vc_banner-title background-14 block">
    <div class="wrapper">
      <div class="container">
        <h1>LogIn / SignUp</h1>
      </div>
    </div>
    <!-- wrapper --> 
  </div>

<div class="container">
    <div class="row"> 
		<?php if( $message['exist'] ){ ?>
		<div class="col-md-12">
			<div class="alert alert-<?php echo $message['exist']; ?>">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
				<?php echo $message['text']; ?>
			</div>
		</div>
		<?php } ?>
        <div class="col-md-4  widget block">
 			<div class="vc_login-widget">
				<h3 class="vc_widget-title">Login</h3>
				<div class="content">
					<form method="POST" action="#" class="form">
						<input type="hidden" name="login" value="true">
						<div class="form-group">
							<label class="sr-only" for="login-email">Search Here</label>
							<input type="text" placeholder="Username" name="username" id="login-user">
						</div>    
						<div class="form-group">                               
							<label class="sr-only" for="login-password">Search Here</label>
							<input type="password" placeholder="Password" name="password" id="login-password">
						</div>   
						<div class="form-group">  
							<label class="checkbox">
								<input type="checkbox" name="remember">
								<small>Remember me</small> 
							</label>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Sign in</button>
						</div>
					</form>
				</div>
			</div>    
        </div>
		<div class="col-md-8  widget block">
 			<div class="vc_login-widget">
				<h3 class="vc_widget-title">SignUp</h3>
				<div class="content">
					<form method="POST" action="#" class="form">
						<input type="hidden" name="signup" value="true">
						<div class="form-group col-md-6">
							<input type="text" placeholder="Username" name="username">
						</div>    
						<div class="form-group col-md-6">                               
							<input type="text" placeholder="Fullname" name="fullname">
						</div>
						<div class="form-group col-md-6">
							<input type="text" placeholder="Email" name="email">
						</div>    
						<div class="form-group col-md-6">                               
							<input type="password" placeholder="Password" name="password">
						</div>  
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
						</div>
					</form>
				</div>
			</div>    
        </div>
    </div>
</div>

<?php

require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="js/jquery.stellar.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="js/jquery.gmap.min.js"></script>



<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>