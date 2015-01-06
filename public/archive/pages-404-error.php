<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = '404 Error Page - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>404 Error</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="pages-team-members.php">Pages</a> </li>
          <li class="active">404 Error</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_404-error">
    <div class="wrapper">
      <div class="container">
        <div class="row block">
          <div class="vc_error-page text-center">
            <p class="info">Whoops... Page Not Found</p>
            <h1 class="vc_main-color"><i class="fa fa-cog"></i> 404</h1>
            <p>Your requested page could not be found or it is currently unavailable.<br/>
              Please <a href="index.php">click here</a> to go back to our home page or use the search form below</p>
            <form  class="form-inline" action="pages-404-error.php" method="post">
	          <label class="sr-only" for="error404-search">Search Here</label>
              <input type="text"  onfocus="if(this.value=='Search here') this.value='';" onblur="if(this.value=='') this.value='Search here';" value="Search here" name="error404-search" id="error404-search" class="vc_input-sm">
              <button type="submit" name="error404-search-submit" id="error404-search-submit" class="vc_btn">Go !</button>
              
            </form>

          </div>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- .wrapper -->
  </div><!-- .vc_404-error -->
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->




<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>