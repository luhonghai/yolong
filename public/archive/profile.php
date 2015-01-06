<?php

 require_once('templates/headers/opening.tpl.php'); 

// Data to be passed to templates/headers/header-x.tpl.php -->
$title = 'One Page Parallax Home - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; 
$keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; 
$description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; 
$page = 'home-menu';   // To set active on the same id of primary menu 

require_once('templates/headers/'.$header.'.tpl.php'); 

$user_info = userinfo();

?>

<!-- InstanceBeginEditable name="content" -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Welcome - <?php echo $user_info['fullname']; ?></h1>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
	<div class="container">
        <div class="row">
        
        
			<div class="col-md-3 sidebar">
				<a href="index.php?view=profile&profile=add-conf" style="margin:3px;" class="btn btn-primary btn-block">Post A Confession</a>
			
				<a href="index.php?view=profile&profile=confessions" style="margin:3px;" class="btn btn-primary btn-block">My Confessions</a>

				<a href="index.php?view=profile&profile=main" style="margin:3px;" class="btn btn-success btn-block">Profile</a>

				<a href="index.php?view=profile&profile=wallet" style="margin:3px;" class="btn btn-success btn-block">Wallet - <?php echo $user_info['money'] ?></a>
				
				<a href="index.php?view=profile&profile=dares" style="margin:3px;" class="btn btn-success btn-block">Dares</a>
				
				<a href="index.php?view=profile&profile=challenges" style="margin:3px;" class="btn btn-success btn-block">Challenges</a>
				
				<a href="index.php?view=signup&logout=true" style="margin:3px;" class="btn btn-warning btn-block">Log Out</a>
			</div>
			
			<div class="col-md-9 sidebar">
			
				<?php 
				
				if (!$_GET['profile']){
					include( 'profile-main.php' ); 
				} else {
					include( 'profile-' . $_GET['profile'] . '.php' ); 
				}
				?>
			
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