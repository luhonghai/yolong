<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Mega Menu Features - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'features';   // To set active on the same id of primary menu ?>
<?php $primary_menu = 'mega-menu' ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Mega Menu Examples</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="features-mega-menu.php">Features</a> </li>
          <li class="active">Mega Menu</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_mega-menu-features">
    <div class="wrapper">
      <div class="container">
        <div class="row block">
        <div class="col-md-12">

          	<h2>Mega Menu Features</h2>
            <p>Browse <a href="#">top menu</a> to see the mega menu examples. Also try the responsiveness on smaller device.<br/> Our Mega Menu features: </p>
            <ul class="vc_li">
                <li>It's Responsive !</li>
                <li>Unique Design of Mega Menu</li>
                <li>Integrate with bootstrap .col-md-* class</li>
                <li>Form support</li>
                <li>It's custom build ! So the design follows the themes design feels</li> 
            </ul>
		</div>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- .wrapper -->
  </div><!-- .vc_mega-menu-features -->
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script src="js/specific/quick-contact.js"  type="text/javascript"></script>



<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>