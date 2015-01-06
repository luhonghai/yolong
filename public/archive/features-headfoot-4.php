<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Header and Footer Style 2 - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'features';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<!-- This variable set manually just for demo purpose, you should set header for all pages in include/config.php -->
<?php $header = 'header-4';   // Header Type ?>
<?php $footer = 'footer-4';   // Footer Type ?>
<!-- End Demo -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Header and Footer Style 4</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="features-typography.php">Features</a> </li>
          <li class="active">Header 4 &amp; Footer 4</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_header-footer-1">
    <div class="wrapper">
      <div class="container">
        <div class="row block">
        <div class="col-md-12">
          <h2>Setting Up Header and Footer is Very Easy</h2>
          <p>Just by configuring our config.php, you can change whatever style you want.<br/><br/></p>
          <pre class="prettyprint">
     
	$author = 'Venmond'; // for author meta data: &lt;meta name=&quot;author&quot; content=&quot;$author; &quot;&gt;<br>	$website_name = 'Vencorp'; // for closing title every page: &lt;title&gt;$title;  | $website_name;&lt;/title&gt; <br>	$footer_message = 'Copyright &amp;copy;2013 Venmond Inc. All Rights Reserved'; // Set Copyright message on footer<br>	<br>	$responsive = 1; // 1= Responsive, 0 = Non Responsive <br>	$boxed = 0; // 1= Boxed Layout, 0 = Full Width Layout<br>	<br>	$background = ''; // '' = none, or 'background-1'  to 'background-14'<br>	$banner_title_bg = 'background-14'; // '' = original, or 'background-1'  to 'background-14'<br>	$theme_color = 'color-blue'; // 'color-blue', 'color-green', 'color-orange', 'color-purple', 'color-red', color-yellow'<br>	<br>	$header = 'header-1'; // 'header-1' or 'header-2' or 'header-3' or 'header-4'<br>	$footer = 'footer-1'; // 'footer-1' or 'footer-2' or 'footer-3' or 'footer-4'<br>	<br>	$header_mode = 'mode-1'; // 'mode-1'= Slash, 'mode-2'= Stylish<br>	$footer_mode = 'mode-1'; // 'mode-1'= Slash, 'mode-2'= Stylish	
          </pre>
		</div>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- .wrapper -->
  </div><!-- .vc_404-error -->
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->
<?php include_once('templates/footers/prettify.tpl.php'); ?>



<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>