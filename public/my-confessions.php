<?php
	
	if (isLogged() == 'false') {
		header("Location: http://".get_option('web_site_domain')."/index.php?view=sign-in");
		$db->close();
	}
	
	$publish_directly = '';
	if( $input->pc['edit_confession'] ){
	
		$title = $input->pc['title'];
		$content = $input->pc['content'];
		$anonymous = $input->pc['anonymous'];
		$image = $input->pc['image'];
		$youtube = $input->pc['youtube'];
		
		if ( get_option('publish_directly') == 1){
			$publish_directly = 1;
		} else {
			$publish_directly = 0;
		}
		
		
		$data = array(
			"user_id" => $user_info['id'] , 
			"anonymous" => $anonymous , 
			"title" => $title ,
			"content" => $content ,
			"image" => $image ,
			"youtube" => $youtube ,
			"date" => time() , 
			"published" => $publish_directly);
			
		$insert = $db->insert("posts", $data);
	}

	include ('header.php');
	
	$paginator = new Pagination("posts", 'published=1 AND user_id='.$user_info['id']);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=home&" . $adlink);
	$q = $paginator->getQuery();
	
	$count_posts = $db->fetchOne("SELECT COUNT(*) AS NUM FROM posts WHERE published=1 ORDER BY id ASC");
?>

  <!-- .slider -->
  <div class="main clearfix">

    <div class="content">
		<?php if (isLogged() == 'true') {?>
		
        <div class="post new-post" style="display:none;">
          <div class="post-header">
            <h2>Edit Confession</h2>
          </div>

			<form method="post" class='sky-form' style="padding: 15px;" action="./index.php?view=home">
				<input name="add_confession" type="hidden" value="true">
				<div class="row">
					<div class="col col-12">
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="title" id="edit-title" placeholder="Title">
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-image"></i>
							<input type="text" name="image" placeholder="Image Link" id="edit-image">
						</label>
					</div>
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-youtube"></i>
							<input type="text" name="youtube" placeholder="YouTube Video Link" id="edit-youtube">
						</label>
					</div>
				</div>
				
				<div class="row" style="padding: 15px;">
					<label class="label">Content</label>
					<label class="textarea">
						<i class="icon-append fa fa-file-code-o"></i>
						<textarea name="content" rows="4"  id="edit-content"></textarea>
					</label>
					<div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
				</div>
            <!-- .settings-field -->
            <!-- .settings-field -->
				<div class="row">
					<div class="col col-10">
						<label class="checkbox"><input type="checkbox" name="anonymous" id="edit-anonymous"><i></i>Post as Anonymous</label>
					</div>
					<div class="col col-2"></div>
				</div>
				<div class="row">
					<button type="submit" class="button">Update Confession</button>
					<button type="reset" class="button close-post">Cancel</button>
				</div>
			
            <!-- .settings-field -->
			</form>
          <!-- .post-footer -->
        </div>

	   <div class="clearfix"></div>
		<?php }?>
      <div class="post">
        <div class="post-header">
          <p class="results"><span> <?php echo $count_posts; ?> </span> Confessions</p>
          <label class="sort">
			<?php echo $paginator->linkorder("date", "Oldest / Latest", "peter-river-fb small-fb");?>
			<?php echo $paginator->linkorder("views", "Popularity", "peter-river-fb small-fb");?>
          </label>
          <!-- .sort -->
        </div>
        <!-- .post_header -->
        <div class="table-wrapper">
          <table class="openings">
            <tbody>
				<?php
					$n = 0;
					for ($x=0; $x < $count_posts; $x++) {
						if ($r = $db->fetch_array($q)) {
					$n++;
				?>
				<tr class="opening">
					<td class="opening-logo">
						<a href="opening.html"><img src="images/opening-logo.png" alt="Logo"></a>
					</td>
					<td class="opening-meta">
						<h2>
							<a href="index.php?view=post&postid=<?php echo $r['id']; ?>" class="opening-name"><?php echo $r['title']; ?></a> - <a class="opening-name edit-post" data-title="<?php echo $r['title']; ?>" data-image="<?php echo $r['image']; ?>" data-youtube="<?php echo $r['youtube']; ?>" data-content="<?php echo $r['content']; ?>" data-anonymous="<?php echo $r['anonymous']; ?>"><i class="fa fa-edit"></i></a>
						</h2>
						<div class="post-meta">
							<?php if ( $r['anonymous'] == 1 ) { ?>
							<span class="post-author"><i class="fa fa-user"></i> <a title="Anonymous Post" rel="author">Posted as Anonymous</a></span>
							<?php } else { ?>
							<span class="post-author"><i class="fa fa-user"></i> <a href="./index.php?view=user&user-id=<?php echo $r['user_id']; ?>" title="Posts by <?php echo $user_info['username']; ?>" rel="author">Posted as <?php echo get_username($r['user_id']); ?></a></span>
							<?php } ?>
							<span class="post-date"><time datetime="<?php echo date("y-m-d",$r['date']); ?>"><i class="fa fa-clock-o"></i> <?php echo date("M d, y",$r['date']); ?></time></span>
							<span class="post-comments"><i class="fa fa-comments"></i> <a href="index.php?view=post&postid=<?php echo $r['id']; ?>#respond" class="comments-link"><?php echo count_comments($r['id']); ?></a></span>
						</div>
					</td>
				</tr>
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
            <!-- .opening -->
          </tbody><div class="opening-loader"></div></table>
          <!-- .openings -->
        </div>
        <!-- .table-wrapper -->
      </div>
      <!-- .paging -->
    </div>
    <!-- .content -->
    <aside class="sidebar">
      <!-- .newsletter -->
            	<?php 
		
		if ( $user_info['role'] == 1 && $input->gc['enable-edit'] == 'true' ){
		
		$current_page = $input->gc['view'];
		
		$count_sidebar_items = $db->fetchOne("SELECT COUNT(*) AS NUM FROM sidebars WHERE page='$current_page'");
		$si = $db->query("SELECT * FROM sidebars WHERE page='$current_page' ORDER BY position ASC");
					
		for ($x=0; $x < $count_sidebar_items; $x++) {
			if ($r = $db->fetch_array($si)) {

		?>
		<div class="post new-post" id="ssu<?php echo $r['id'];?>" style="">
			<form method="post" class="sky-form" id="update-sidebar-<?php echo $r['id'];?>" style="padding: 15px;">
				<input name="update_sidebar_item" type="hidden" value="<?php echo $r['id']; ?>">
				<input name="page" type="hidden" value="<?php echo $r['page']; ?>">
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="title" placeholder="Title" value="<?php echo $r['title'];?>" >
						</label>
					</div>
				</div>
				<div class="row">
					<label class="label"><span style="color:red;">*</span></label>
					<label class="select">
						<select name="type">
							<option value='top-commenters' <?php echo ('top-commenters' == $r['type']) ? "selected='selected'" : ''; ?>>Top Commenters</option>
							<option value='top-schools-confessions' <?php echo ('top-schools-confessions' == $r['type']) ? "selected='selected'" : ''; ?>>Top Schools(Confessions)</option>
							<option value='top-schools-users' <?php echo ('top-schools-users' == $r['type']) ? "selected='selected'" : ''; ?>>Top Schools(Confessions)</option>
							<option value='top-authors' <?php echo ('top-authors' == $r['type']) ? "selected='selected'" : ''; ?>>Top Authors</option>
							<option value='top-challenges-takers' <?php echo ('top-challenges-takers' == $r['type']) ? "selected='selected'" : ''; ?>>Top Challenge Takers</option>
							<option value='top-dares-takers' <?php echo ('top-dares-takers' == $r['type']) ? "selected='selected'" : ''; ?>>Top Dare Takers</option>
							<option value='badges-rewards' <?php echo ('badges-rewards' == $r['type']) ? "selected='selected'" : ''; ?>>Badges & Rewards</option>
							<option value='youtube' <?php echo ('youtube' == $r['type']) ? "selected='selected'" : ''; ?>>YouTube</option>
							<option value='text' <?php echo ('text' == $r['type']) ? "selected='selected'" : ''; ?>>Text</option>
							<option value='image' <?php echo ('image' == $r['type']) ? "selected='selected'" : ''; ?>>Image</option>
						</select>
						<i></i>
					</label>
				</div>
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="content" placeholder="Amount | YouTube Link" value="<?php echo $r['content'];?>">
						</label>
					</div>
				</div>
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="position" placeholder="Position" value="<?php echo $r['position'];?>">
						</label>
					</div>
				</div>
				<div class="row">
					<a class="button delete-sidebar" data-id="<?php echo $r['id'];?>"><i class="fa fa-trash-o"></i></a>
					<a data-id="<?php echo $r['id'];?>" class="button save-sidebar">Save</a>
				</div>
			</form>
        </div>
			<?php
			}
		}
		
		?>
		<div class="post new-post" style="">
			<form method="post" class="sky-form" id="new-sidebar" style="padding: 10px;">
				<input name="new_sidebar_item" type="hidden" value="true">
				<input name="page" type="hidden" value="<?php echo $input->gc['view'];?>">
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="title" placeholder="Title" >
						</label>
					</div>
				</div>
				<div class="row">
					<label class="label"><span style="color:red;">*</span>Type</label>
					<label class="select">
						<select name="type">
							<option value='top-commenters'>Top Commenters</option>
							<option value='top-schools-confessions'>Top Schools(Confessions)</option>
							<option value='top-schools-users'>Top Schools(Confessions)</option>
							<option value='top-authors'>Top Authors</option>
							<option value='top-challenges-takers'>Top Challenge Takers</option>
							<option value='top-dares-takers'>Top Dare Takers</option>
							<option value='badges-rewards'>Badges & Rewards</option>
							<option value='youtube'>YouTube</option>
							<option value='text'>Text Widget</option>
							<option value='image'>Image Widget</option>
						</select>
						<i></i>
					</label>
				</div>
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="content" placeholder="Amount | YouTube Link">
						</label>
					</div>
				</div>
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input type="text" name="position" placeholder="Position">
						</label>
					</div>
				</div>
				<div class="row">
					<button type="submit" class="button add-sidebar">Add Sidebar Item</button>
				</div>
			</form>
        </div>
		<?php
		
		} elseif ( !$input->gc['enable-edit'] || $input->gc['enable-edit'] == 'false' ) {
		
			$current_page = $input->gc['view'];
			
			$count_sidebar_items = $db->fetchOne("SELECT COUNT(*) AS NUM FROM sidebars WHERE page='$current_page'");
			$si = $db->query("SELECT * FROM sidebars WHERE page='$current_page' ORDER BY position ASC");
			
			$sb_item = '';
			
			for ($x=0; $x < $count_sidebar_items; $x++) {
				if ($r = $db->fetch_array($si)) {
				
					$sb_item['title'] = $r['title'];
					$sb_item['content'] = $r['content'];
					$sb_item['type'] = $r['type'];
					
					echo sidebar_builder($sb_item);
				}
			}
		
		}
		?>
      <!-- .video -->
    </aside>
    <!-- .sidebar -->
  </div>
  <!-- .main -->
  	<script>
	$(document).ready(
		function(){
		$( ".edit-post" ).click(function() {
			var info = $( this ).data();
			
			$( "#edit-title" ).val(info.title);
			$( "#edit-image" ).val(info.image);
			$( "#edit-youtube" ).val(info.youtube);
			$( "#edit-content" ).val(info.content);
			
			if (info.anonymous == 1){
				$( "#edit-anonymous").prop('checked', true);
			}
			
			$('.new-post').slideDown(1500);
		});
		}
	);
		</script>

<?php
	include ('footer.php');
?>