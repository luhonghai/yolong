<?php

 require_once('templates/headers/opening.tpl.php'); 

// Data to be passed to templates/headers/header-x.tpl.php -->
$title = 'One Page Parallax Home - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; 
$keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; 
$description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; 
$page = 'home-menu';   // To set active on the same id of primary menu 

require_once('templates/headers/'.$header.'.tpl.php'); 

	$paginator = new Pagination("posts", 'published=1');
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=confessions&" . $adlink);
	$q = $paginator->getQuery();

?>

<!-- InstanceBeginEditable name="content" -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Confessions</h1>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
<div class="vc_blog-list-mini block">
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-9 mini-image">
            <div class="vc_blog-list">
				<h2> Latest <span class="vc_main-color"> Confessions </span> </h2>
				<div class="vc_splitter"> <span class="bg"> </span> </div>
			
				<?php
					$count_posts = $db->fetchOne("SELECT COUNT(*) AS NUM FROM pages ORDER BY id ASC");
						
					$n = 0;
					for ($x=0; $x < $count_posts; $x++) {
						if ($r = $db->fetch_array($q)) {
					$n++;
					?>
					
				<article class="blog-row clearfix">
                <div class="blog-left">
                  <div class="vc_anim vc_anim-slide"> <a href="index.php?view=post&postid=<?php echo $r['id']; ?>" class="vc_preview"> <?php echo the_image($r['image']); ?> </a>
                    <div class="vc_hover">
                      <div class="hover-wrapper">
                        <div class="icon-wrapper">
                          <ul>
							<?php if ($r['youtube']){ ?>
                            <li class="vc_icon"> <a data-rel="prettyPhoto" href="<?php echo $r['youtube']; ?>" rel="prettyPhoto"> <i class="fa fa-play-circle"> </i> </a> </li>
							<?php } else if ( !$r['youtube'] && $r['image']) {?>
							<li class="vc_icon"> <a data-rel="prettyPhoto" href="<?php echo $r['image']; ?>" rel="prettyPhoto"> <i class="fa fa-search-plus"> </i> </a> </li>
							<?php } ?>
                            <li class="vc_icon"> <a href="index.php?view=post&postid=<?php echo $r['id']; ?>"> <i class="fa fa-link"> </i> </a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-right clearfix">
                  <div class="entry-date">
                    <div class="day"><?php echo date("d",$r['date']); ?></div>
                    <div class="month"><?php echo date("M",$r['date']); ?></div>
                  </div>
                  <div class="title">
                    <h3> <a href="index.php?view=post&postid=<?php echo $r['id']; ?>"> <?php echo $r['title']; ?> </a> </h3>
                    <span class="comments"> <i class="fa fa-comments"> </i> <?php echo count_comments($r['id']); ?> </span> <span class="taxonomy"> <i class="fa fa-globe"> </i> <a href="#"> <?php echo $r['views']; ?> </a> </span> </div>
                  <div class="description">
                    <p> <?php echo substr($r['content'],0,200); ?>... <a href="index.php?view=post&postid=<?php echo $r['id']; ?>" class="vc_read-more"> read more </a> </p>
                  </div>
                </div>
              </article>
				<?php	
							}
						}
						if ($paginator->totalResults() == 0) {
						?>
						<tr>
							<td colspan='7' align='center'>Records not found</td>
						</tr>
						<?php	
						}
						?>
			
			</div>
			</div>
			<div class="col-md-3 sidebar">
				<h3>Leaderboard</h3>
				
				<h3>Top 5 Schools</h3>
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