<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Team Members Page - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Team <span class="vc_main-color">Members</span></h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="pages-team-members.php">Pages</a> </li>
          <li class="active">Team Members</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_team-members">
  <div class="wrapper">
    <div class="container">
      <div class="row block">
        <div class="col-md-9">
          <h3>Company Leadership</h3>
          <p>Ut sit amet dignissim libero. Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero, a adipiscing arcu sapien eu nisi. Proin vehicula lacus non lacus lobortis ultricies. Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla. Suspendisse convallis rutrum arcu nec rutrum. Pellentesque sed felis ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
          <div class="vc_splitter"></div>
          <div class="row text-center">
            <div class="col-md-4">
              <div class="vc_icon-round vc_center"  >
                <div class="bg-wrapper">
                  <div class="bg"> <img alt="example image" src="img/about/01.jpg"> </div>
                </div>
              </div>
              <div class="vc_splitter"></div>
              <h3 style="margin-bottom:0;">Anna Mariane</h3>
              <p> <em>CEO</em> </p>
              <a class="vc_btn btn-small" href="">About</a> </div>
            <div class="col-md-4">
              <div class="vc_icon-round vc_center"  >
                <div class="bg-wrapper">
                  <div class="bg"> <img alt="example image" src="img/about/02.jpg"> </div>
                </div>
              </div>
              <div class="vc_splitter"></div>
              <h3 style="margin-bottom:0;">John Verydoe </h3>
              <p> <em>President</em> </p>
              <a class="vc_btn btn-small" href="">About</a> </div>
            <div class="col-md-4">
              <div class="vc_icon-round vc_center"  >
                <div class="bg-wrapper">
                  <div class="bg"> <img alt="example image" src="img/about/03.jpg"> </div>
                </div>
              </div>
              <div class="vc_splitter"></div>
              <h3 style="margin-bottom:0;">Bryan Fury</h3>
              <p> <em>Co-Founder</em> </p>
              <a class="vc_btn btn-small" href="">About</a> </div>
          </div><!-- row -->
          <div class="vc_separator"></div>
          <h3>Our Staff</h3>          
          <div class="vc_splitter"></div>

          <div class="row text-center worker">
            <div class="col-md-3"> <img alt="example image"  src="img/about/04.jpg">
              <h4 class="name">Goerge Lucas</h4>
              <p class="job"> Head Developer </p>
            </div>
            <div class="col-md-3"> <img alt="example image" src="img/about/05.jpg">
              <h4 class="name">Michael Codney</h4>
              <p class="job"> Head Designer </p>
            </div>
            <div class="col-md-3"> <img alt="example image" src="img/about/06.jpg">
              <h4 class="name">Rebecca S.</h4>
              <p class="job"> Head Analyst </p>
            </div>
            <div class="col-md-3"> <img alt="example image"  src="img/about/07.jpg">
              <h4 class="name">Bradley R.</h4>
              <p class="job"> Senior Developer </p>
            </div>
          </div>
          <div class="row text-center worker">
            <div class="col-md-3"> <img alt="example image"  src="img/about/08.jpg">
              <h4 class="name">Goerge Lucas</h4>
              <p class="job"> Head Developer </p>
            </div>
            <div class="col-md-3"> <img alt="example image" src="img/about/09.jpg">
              <h4 class="name">Michael Codney</h4>
              <p class="job"> Head Designer </p>
            </div>
            <div class="col-md-3"> <img alt="example image" src="img/about/10.jpg">
              <h4 class="name">Rebecca S.</h4>
              <p class="job"> Head Analyst </p>
            </div>
            <div class="col-md-3"> <img alt="example image"  src="img/about/01.jpg">
              <h4 class="name">Bradley R.</h4>
              <p class="job"> Senior Developer </p>
            </div>
          </div>                    
        </div>
        <!-- .col-md-9 --> 
        <div class="col-md-3 sidebar">
			<?php include_once('templates/sidebars/sidebar-mini.tpl.php'); ?>
        </div>
        <!-- .sidebar .col-md-3-->  
        </div>        
        <!-- .row --> 
      </div>
      <!-- .container --> 
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_team-members --> 
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->




<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>