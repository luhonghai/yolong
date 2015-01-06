<?php
require_once('templates/headers/opening.tpl.php'); 

if ($_GET['postid']){
$post_id = $_GET['postid'];
}
// Data to be passed to templates/headers/header-x.tpl.php -->
$title = 'One Page Parallax Home - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; 
$keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; 
$description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; 
$page = 'home-menu';   // To set active on the same id of primary menu 

require_once('templates/headers/'.$header.'.tpl.php'); 

$post_info = $db->fetchRow("SELECT * FROM posts WHERE id=" . $post_id);

?>

<div class="vc_banner-title background-14 block">
    <div class="wrapper">
      <div class="container">
        <h1>Confession</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="index.php?view=confessions">Confessions</a> </li>
          <li class="active"><?php echo $post_info['title']; ?></li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>

<div class="vc_single-blog block">
    <div class="wrapper">
      <div class="container">
        <div class="row">
	<div class="col-md-9 single-blog">
            <div class="vc_blog-list">
              <div class="header">
                <div class="entry-date">
                  <div class="day"><?php echo date("d",$post_info['date']); ?></div>
                  <div class="month"><?php echo date("M",$post_info['date']); ?></div>
                </div>
                <div class="title">
                  <h3> <a href="blog-single.php"> <?php echo $post_info['title']; ?> </a> </h3>
                  <span class="year info"><i class="glyphicon glyphicon-calendar"></i> <?php echo date("y",$post_info['date']); ?></span><span class="user info"> <i class="fa fa-user"> </i>  <?php echo ($r['anonymous'] == 1) ? '<a>Anonymous</a>' : "<a href=".$post_info['user_id'].">" . get_username($post_info['user_id']) . "</a>"; ?> </span> <span class="comments info"> <i class="fa fa-comments"> </i> <a href="#comment-title">16</a> </span> </div>
              </div>
              <div class="clearfix"></div>
              <article class="blog-row clearfix">
                <div class="blog-left">
                  <div class="vc_anim vc_anim-slide"> <a href="<?php echo ($post_info['image']) ? $post_info['image'] : get_option('post_image'); ?>" class="vc_preview"> <?php echo the_image($r['image']); ?> </a>
                    <div class="vc_hover">
                      <div class="hover-wrapper">
                        <div class="icon-wrapper">
                          <ul>
							<?php if ($post_info['youtube']){ ?>
                            <li class="vc_icon"> <a data-rel="prettyPhoto" href="<?php echo $post_info['youtube']; ?>" rel="prettyPhoto"> <i class="fa fa-play-circle"> </i> </a> </li>
							<?php } else if ( !$post_info['youtube'] && $post_info['image']) {?>
							<li class="vc_icon"> <a data-rel="prettyPhoto" href="<?php echo $post_info['image']; ?>" rel="prettyPhoto"> <i class="fa fa-search-plus"> </i> </a> </li>
							<?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="blog-right clearfix">
                  <div class="description">
                    <?php echo $post_info['content']; ?>
                  </div>
                </div>
              </article>
              <div class="vc_share-post">
              <div class="text">
                <h4 class="vc_main-color"><i class="icon-share-alt"></i></h4>
              </div>
			    <div class="widget"> 
                <!-- AddThis Button BEGIN -->
                <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-51f5ff9515d6d31e"><img alt="example image" src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" style="border:0"/></a>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51f5ff9515d6d31e"></script>
                <!-- AddThis Button END -->
              </div>
              </div>
              <div class="vc_separator comment-separator"></div>
            </div>
            <div class="vc_comments clearfix" id="comments">
              <h3 class="comments-title">Comments</h3>
              <ul class="commentlist clearfix">
				<?php
				$c = $db->query("SELECT * FROM comments WHERE post_id=".$post_id);
				$count_comments = $db->fetchOne("SELECT COUNT(*) AS NUM FROM comments WHERE post_id=".$post_id." ORDER BY id ASC");
						
				$n = 0;
				for ($x=0; $x < $count_comments; $x++) {
					if ($r = $db->fetch_array($c)) {
					$n++;
				?>
                <li id="li-comment-<?php echo $n; ?>" class="comment">
                  <div class="comment-wrap clearfix" id="comment-<?php echo $n; ?>">
                    <div class="comment-meta">
                      <div class="comment-author"> <img alt="example image" src="http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50"> </div>
                    </div>
                    <div class="comment-content clearfix">
                      <div class="comment-author"><?php echo get_username($post_info['user_id']); ?></div>
                      <div class="comment-date"><a title="Permalink to this comment" href="#"><?php echo date("Y-m-d at h:i:sa", $r['date']); ?></a> </div>
                      <div class="comment-arrow"></div>
                      <?php echo $r['comment']; ?>
                    </div>
                    <div class="clear"></div>
                  </div>
                </li>
				<?php
					}
				}
				?>
				
              </ul>
              <div class="clear"></div>
              <div class="vc_separator comment-separator"></div>
              <div class="clearfix" id="respond">
				
                <h3>Leave a <span>Comment</span></h3>
				<?php if ( isLogged() == 'true' ){ 
				$get_cu = userinfo();
				?>
                <form id="commentform" method="post" action="#" class="clearfix">
				<input type="hidden" value="<?php echo $get_cu['id']; ?>" name="user_id" >
				<input type="hidden" value="<?php echo $post_id; ?>" name="post_id" >
				<div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                    	<label for="comment">Comment</label>
                        <div class="controls">
							<textarea tabindex="4" rows="10" cols="58" name="comment" id="ecomment"></textarea>
                        </div>
                      </div>
                    </div> 
                </div> 
				<div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                    	<button class="vc_btn" value="Submit" tabindex="5" id="submit-button" type="submit" name="submit">Submit Comment</button>
                      </div>
                    </div> 
                </div>                                                                                  
                </form>
				<?php } else { ?>
				<p>You have to be logged in to add comment</p>
				<?php } ?>
				<script type="text/javascript">
				$(document).ready(
					function()
					{
						$('#ecomment').redactor();
					}
				);
				</script>
              </div>
            </div>
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
<script type="text/javascript" src="js/jquery.gmap.min.js"></script>


<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>