<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Widgets List - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Widgets List Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'features';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<!-- This variable set manually just for demo purpose, you should set header for all pages in include/config.php -->
<?php $footer = 'footer-4';   // Footer Type ?>
<!-- End Demo -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Widgets <span class="vc_main-color">List</span></h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="features-typography.php">Features</a> </li>
          <li class="active">Widgets</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_grid">
    <div class="wrapper">
      <div class="container">
        <h2>Widgets Make it Easier to Reuseable</h2>
        <p class="block">With dividing our part of code into separateable widgets, make it easier for us to reuse the code by just using <strong>include</strong> php code and make it easier to maintain. Below are the lists of widgets, start creating your own widgets :)<br/><br/></p>
        <div class="row">
          <div class="col-md-3 widget block">
 				<?php include('templates/widgets/widget-about-mini.tpl.php'); ?>         
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-about.tpl.php'); ?>            
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-gallery.tpl.php'); ?>            
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-flickr.tpl.php'); ?>            
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 widget block">
 				<?php include('templates/widgets/widget-links.tpl.php'); ?>         
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-login.tpl.php'); ?>            
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-testimonial-slide.tpl.php'); ?>                      
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-our-expertise.tpl.php'); ?>            
          </div>
        </div>    
        <div class="row">
          <div class="col-md-3 widget block">
 				<?php include('templates/widgets/widget-portfolio.tpl.php'); ?>         
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-social-rounded.tpl.php'); ?>            
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-tabs.tpl.php'); ?>            
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-newsletter.tpl.php'); ?>            
          </div>
        </div>   
        <div class="row">
          <div class="col-md-8 widget block">
 				<?php include('templates/widgets/widget-latest-blog.tpl.php'); ?>         
          </div>
          <div class="col-md-4  widget block">
 				<?php include('templates/widgets/widget-quick-contact.tpl.php'); ?>            
          </div>
        </div>    
        <div class="row">
          <div class="col-md-3 widget block">
 				<?php include('templates/widgets/widget-map.tpl.php'); ?>         
          </div>        
          <div class="col-md-3 widget block">
 				<?php include('templates/widgets/widget-twitter.tpl.php'); ?>         
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-twitter-mini.tpl.php'); ?>            
          </div>
          <div class="col-md-3  widget block">
 				<?php include('templates/widgets/widget-instagram.tpl.php'); ?>            
          </div>          
        </div>   
        <div class="row">
          <div class="col-md-12 widget block">
 				<?php include('templates/widgets/widget-clients-slide.tpl.php'); ?>         
          </div>
        </div>                               
      </div>
      <!-- .container --> 
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_grid --> 
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="js/jquery.gmap.min.js"></script> 
<script type="text/javascript"  src="js/specific/map-small.js"></script>  

<script type="text/javascript" src="js/spectragram.min.js"></script>
<script type="text/javascript" src="js/specific/instagram-widget.js"></script>


<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>