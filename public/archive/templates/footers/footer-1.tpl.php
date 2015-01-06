<!-- Footer Start -->
  <footer class="footer-1 <?php if (isset($footer_mode)) echo $footer_mode; ?>" id="footer">
    <div class="vc_footer-links">
      <div class="wrapper">
        <div class="container">
          <div class="vc_footer-line"> </div>
          <div class="row">
            <div id="vc_footer-about" class="footer-widget widget col-md-3">
				<?php include('templates/widgets/widget-about.tpl.php'); ?>
            </div>
            <div id="vc_footer-gallery" class="footer-widget widget col-md-3">
				<?php include('templates/widgets/widget-flickr.tpl.php'); ?>
            </div>
            <div id="vc_footer-twitter" class="footer-widget widget col-md-3">
				<?php include('templates/widgets/widget-twitter-mini.tpl.php'); ?>            
            </div>
            <div id="vc_footer-newsletter-form-widget" class="footer-widget widget col-md-3">
				<?php include('templates/widgets/widget-newsletter.tpl.php'); ?>
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->        
      </div>
      <!-- wrapper -->      
    </div>
    <!-- vc_footer-links -->  
      
    <div class="vc_bottom">
      <div class="wrapper">
        <div class="container">
          <div class="vc_footer-line"> </div>
          <div class="bg">
            <div class="row">
              <div class=" col-sm-12 col-md-6">
                <div class="copyright pull-left">
                  <h5> <?php if (isset($footer_message)) echo($footer_message); ?>  </h5>
                </div>
              </div>
              <div class=" col-sm-12 col-md-6">
                <div class="menu pull-right"> 
                	<?php include_once('templates/footers/bottom-menu.tpl.php'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<!-- Footer END -->

</div>
<!-- .vc_body END  -->


<a class="back-top" href="#" id="back-top"> <i class="fa fa-chevron-up icon-white"> </i> </a> 

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<?php include_once('templates/footers/scripts.tpl.php'); ?>
