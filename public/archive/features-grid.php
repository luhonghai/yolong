<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Grid Features - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'features';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Grid <span class="vc_main-color">System</span></h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="features-typography.php">Features</a> </li>
          <li class="active">Grid System</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_grid">
    <div class="wrapper">
      <div class="container">
        <h2>Bootstrap Grid System</h2>
        <p>The default Bootstrap grid system utilizes <strong>12 columns</strong>, making for a 940px wide container without responsive features enabled. With the responsive CSS file added, the grid adapts to be 724px and 1170px wide depending on your viewport. Below 767px viewports, the columns become fluid and stack vertically.<br/>
          <br/>
          For more information go to <a class="vc_read-more" href="http://twitter.github.io/bootstrap/scaffolding.php#gridSystem">bootstrap grid system</a>.</p>
        <div class="row show-grid">
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1">1</div>
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1">1</div>
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1">1</div>
          <div class="col-md-1">1</div>
          <div class="col-md-1" data-original-title="" title="">1</div>
          <div class="col-md-1">1</div>
        </div>
        <div class="row show-grid">
          <div class="col-md-3" data-original-title="" title="">3</div>
          <div class="col-md-3">3</div>
          <div class="col-md-3" data-original-title="" title="">3</div>
          <div class="col-md-3" data-original-title="" title="">3</div>
        </div>
        <div class="row show-grid">
          <div class="col-md-4" data-original-title="" title="">4</div>
          <div class="col-md-4" data-original-title="" title="">4</div>
          <div class="col-md-4" data-original-title="" title="">4</div>
        </div>
        <div class="row show-grid">
          <div class="col-md-6" data-original-title="" title="">6</div>
          <div class="col-md-6" data-original-title="" title="">6</div>
        </div>
        <div class="row show-grid">
          <div class="col-md-8" data-original-title="" title="">8</div>
          <div class="col-md-4" data-original-title="" title="">4</div>
        </div>
        <div class="row show-grid">
          <div class="col-md-9" data-original-title="" title="">9</div>
          <div class="col-md-3" data-original-title="" title="">3</div>
        </div>
        <div class="row show-grid">
          <div class="col-md-12" data-original-title="" title="">12</div>
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




<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>