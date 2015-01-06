<?php
	
	include ('header.php');
	
	$is_liked = "";	
	
	if (isLogged() == 'true') {
		$is_liked = $db->fetchOne("SELECT COUNT(*) AS NUM FROM likes WHERE post_id=".$input->gc['id']." AND user_id=".$user_info['id']);
	}	
	
	if ($input->pc['like'] && isLogged() == 'true'){
		if( $is_liked == 0 ){
			$data = array( "post_id" => $input->gc['id'] , "user_id" => $user_info['id'] );		
			$db->insert("likes", $data);
		}
		exit;
	}
	
	if ($input->pc['unlike'] && isLogged() == 'true'){
		if( $is_liked == 1 ){	
			$post_id = $input->gc['id'];
			$user_id = $user_info['id'];
			$db->delete("likes", "post_id='$post_id' AND user_id='$user_id'");
		}
		exit;
	}
	
	$post_info = $db->fetchRow("SELECT * FROM posts WHERE id=" . $input->gc['id']);
	
	$get_user = userinfo($post_info['user_id']);
	
	$data = array( "views" => $post_info['views'] + 1 );		
	$update = $db->update("posts", $data, "id=".$post_info['id']);
	

	
	$count_comments = $db->fetchOne("SELECT COUNT(*) AS NUM FROM comments WHERE post_id=" . $input->gc['id']);
?>
  <!-- header -->
  <div class="main clearfix">
    <div class="content">
      <div class="post about">
        <div class="post-header">
			<h2><?php echo $post_info['title']; ?></h2>
			
			<?php if (isLogged() == 'true') { ?>
			<label class="post-bar-buttons">
			
				<?php if ( get_option('like_system') == 1 && $is_liked == 0) { ?>
					<a class="peter-river-fb mini-fb round-fb-5 like" style="margin-right: 10px;">Like <i class="fa fa-thumbs-o-up"></i></a>
				<?php } else if ( get_option('like_system') == 1 && $is_liked == 1) { ?>
					<a class="peter-river-fb mini-fb round-fb-5 unlike" style="margin-right: 10px;">Unlike <i class="fa fa-thumbs-o-down"></i></a>
				<?php } 
				
				if ( get_option('report_system') == 1 ) { ?>
				<a class="peter-river-fb mini-fb round-fb-5" href="">Report <i class="fa fa-warning"></i></a>          
				<?php } ?>
				
			</label>
			<?php } ?>
			
        </div>
        <!-- .post-header -->
        <table class="see-width">
			
			<?php if ( $post_info['image'] ) {?>
			<div class="post-image" style="background-image:url(<?php echo $post_info['image'];?>);background-size:cover;">		
			</div>
			<?php } else if ( !$post_info['image'] || $post_info['image'] && $post_info['youtube']) {
			$youtube = explode('=', $post_info['youtube']);
			?>
			<iframe class="post-image" src="//www.youtube.com/embed/<?php echo $youtube[1];?>" frameborder="0" allowfullscreen></iframe>
			<?php } ?>
			<tr>
				<td><?php echo $post_info['content'];?></td>
			</tr>
        </table>
		
		<div class="post-footer">
			<div class="post-meta">
				<span><time datetime="<?php echo date("y-m-d",$post_info['date']); ?>"><i class="fa fa-clock-o"></i> <?php echo date("M d, y",$post_info['date']); ?></time></span>
				<span><i class="fa fa-comments"></i> <a href="index.php?view=post&id=<?php echo $post_info['id']; ?>#respond" class="comments-link"><?php echo count_comments($post_info['id']); ?></a></span>
				<span><i class="fa fa-globe"></i> <?php echo $post_info['views']; ?></span>
			</div>
		</div>
      </div>

      <!-- .paging -->
    </div>
	
	<!-- .content -->
    <aside class="sidebar">
      <!-- .add-opening -->
	  
	  <?php if ( $post_info['anonymous'] == 1 ) {?>
		<div class="widget company-widget">
			<h3>Author : Anonymous</h3>
			<p>The author wanted to remain anonymous</p>
		</div>
	   <?php } else {?>
	    <div class="widget company-widget">
			<h3>Author : <?php echo $get_user['username'];?></h3>
			<p class="author-data"><i class="col-2 fa fa-lg fa-user"></i> <?php echo $get_user['fullname'];?></p>
			<p class="author-data"><?php echo ($get_user['genre'] == 'Male') ? "<i class='col-2 fa fa-lg fa-male'></i>" : "<i class='col-2 fa fa-lg fa-female'></i>"; ?> <?php echo $get_user['genre'];?></p>
			<p class="author-data"><i class="col-2 fa fa-lg fa-heart-o"></i> <?php echo $get_user['age'];?> Years Old</p>
			<p class="author-data"><i class="col-2 fa fa-lg fa-history"></i> Registered at <?php echo date("M d, y",$get_user['date']);?> </p>
		</div>
	    <?php }?>

      <!-- .add-openings -->
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
		
		} else {
		
			$current_page = $input->gc['view'];
			
			$count_sidebar_items = $db->fetchOne("SELECT COUNT(*) AS NUM FROM sidebars WHERE page='$current_page'");
			$si = $db->query("SELECT * FROM sidebars WHERE page='$current_page' ORDER BY position ASC");
			
			$sb_item = '';
			
			for ($x=0; $x < $count_sidebar_items; $x++) {
				if ($r = $db->fetch_array($si)) {
				
					$sb_item['title'] = $r['title'];
					$sb_item['content'] = $r['content'];
					$sb_item['type'] = $r['type'];
					
					echo sidebar_builder($sb_item, $user_info['id']);
				}
			}
		
		}
		?>
      <!-- .newsletter -->
    </aside>
    <!-- .sidebar -->
	
	<div class="content">
      <div class="post about">
        <div class="post-header" id="respond">
			<h2><?php echo $count_comments; ?> Comments</h2>
        </div>
        <!-- .post-header -->
        <table class="see-width openings" id="append_comment">
				<?php	
					$c = $db->query("SELECT * FROM comments WHERE post_id=".$input->gc['id']);
					
					$n = 0;
					for ($x=0; $x < $count_comments; $x++) {
						if ($r = $db->fetch_array($c)) {
					$n++;
					
					$current_user = userinfo($r['user_id']);
				?>
				<tr class="opening" id="su<?php echo $r['id']; ?>">
					<td class="opening-logo">
						<a href="opening.html"><img src="<?php echo ( $r['anonymous'] == 1 ) ? 'http://www.gravatar.com/avatar/00000000000000000000000000000000?s=60' : get_gravatar($current_user['email'], 60); ?>" alt="Logo"></a>
					</td>
					<td class="opening-meta">
						<h2>
							<a href="index.php?view=post&id=<?php echo $r['id']; ?>" class="opening-name"><?php echo ( $r['anonymous'] == 1 ) ? "Anonymous" : $current_user['username']; ?></a>
								<?php if ( $user_info['role'] == 1 || $user_info['id'] == $current_user['id']){ ?>
								- <a class="opening-name edit-comment" data-id="<?php echo $comment_info['id']; ?>" data-comment="<?php echo $comment_info['comment']; ?>"><i class="fa fa-edit"></i></a> - <a class="opening-name edit-comment" data-id="<?php echo $comment_info['id']; ?>"><i class="fa fa-trash-o"></i></a>
								<?php } ?>
						</h2>
						<p>
						<?php echo $r['comment']; ?>
						</p>
						<div class="post-meta">
							<?php if ( $r['anonymous'] == 1 ) { ?>
							<span class="post-author"><i class="fa fa-user"></i> <a title="Anonymous Post" rel="author">Anonymous</a></span>
							<?php } else { ?>
							<span class="post-author"><i class="fa fa-user"></i> <a href="./index.php?view=user&user-id=<?php echo $r['user_id']; ?>" title="Posts by <?php echo $current_user['username']; ?>" rel="author"><?php echo get_username($r['user_id']); ?></a></span>
							<span class="post-author"><i class="fa fa-user"></i> <?php echo $current_user['genre']; ?> </span>
							<span class="post-author"><i class="fa fa-user"></i> <?php echo $current_user['age']; ?></span>
							<?php } ?>
							<span class="post-date"><time datetime="<?php echo date("y-m-d",$r['date']); ?>"><i class="fa fa-clock-o"></i> <?php echo date("M d, y",$r['date']); ?></time></span>
						</div>
					</td>
				</tr>
				<?php	
					}
				}
				if ($count_comments == 0) {
				?>
				<tr id="no-comments">
					<td colspan='7' align='center'>Here are no comments</td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>
	</div>
	
	<?php if (isLogged() == 'true') {?>
	
	<div class="content">
      <div class="post about">
        <div class="post-header">
			<h2>Add Comment</h2>
        </div>
        <!-- .post-header -->
        	<form method="post" class='sky-form' style="padding: 15px;" id="add-comment">
				<input name="add_comment" type="hidden" value="<?php echo $input->gc['id']; ?>">
				<div class="row" style="padding: 15px;">
					<label class="label">Comment</label>
					<label class="textarea">
						<i class="icon-append fa fa-file-code-o"></i>
						<textarea required name="comment" rows="4"></textarea>
					</label>
				</div>
				<div class="row">
					<div class="col col-10">
						<label class="checkbox"><input type="checkbox" name="anonymous" value='1'><i></i>Post as Anonymous</label>
					</div>
					<div class="col col-2"></div>
				</div>
            <!-- .settings-field -->
            <!-- .settings-field -->
				<div class="row">
					<button type="submit" class="button post-comment">Post Comment</button>
				</div>		
            <!-- .settings-field -->
			</form>
		</div>
	</div>
	
	<?php } ?>
	

  </div>
  
    	<script>
	$(document).ready(
		function(){
			$(document).on('click', '.like', function(){
			
				var action = 'like';
			
				$.post( "index.php?view=post&id=<?php echo $input->gc['id']; ?>", { like : action } );
				
				$( this ).html('Unlike <i class="fa fa-thumbs-o-down"></i>').fadeTo( "fast", 0.33 ).fadeTo( "fast", 1 );
				
				$( this ).removeClass( 'like' );
				
				$( this ).addClass( 'unlike' );
			
			});
			
			$(document).on('click', '.unlike', function(){
			
				var action = 'unlike';
			
				$.post( "index.php?view=post&id=<?php echo $input->gc['id']; ?>", { unlike : action } );
				
				$( this ).html('Like <i class="fa fa-thumbs-o-up"></i>').fadeTo( "fast", 0.33 ).fadeTo( "fast", 1 );
				
				$( this ).removeClass( 'unlike' );
				
				$( this ).addClass( 'like' );				
			
			});
		
			<?php if ( $user_info['role'] == 1 && $input->gc['enable-edit'] == 'true' ){ ?>	
			var n_s_form = $('#new-sidebar');
			var n_s_submit = $('.add-sidebar');
			
			$( ".delete-sidebar" ).click(function() {
				var d_info = $( this ).data();
				$('#ssu' + d_info.id).slideUp();
				$.post( "index.php?view=moderate-sidebars", { delete_sidebar: d_info.id } );
			});

			$( ".save-sidebar" ).click(function() {
			
				var info = $( this ).data();
				// send ajax request
				var u_s_form = $('#update-sidebar-'+info.id);
						
				$.post( "./index.php?view=moderate-sidebars", u_s_form.serialize() );
				
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
				
				u_s_form = '';
			});
			
			n_s_form.on('submit', function(e) {
				// prevent default action
				e.preventDefault();
				// send ajax request
						
				$.ajax({
					url: 'index.php?view=moderate-sidebars',
					type: 'POST',
					cache: false,
					data: n_s_form.serialize(), //form serizlize data
					beforeSend: function(){
						// change submit button value text and disabled it
						n_s_submit.val('Saving...').attr('disabled', 'disabled');
					},
					success: function(data){
						$( "#new-sidebar" ).before(data);
						// reset form and button
						n_s_form.trigger('reset');
						n_s_submit.val('Save').removeAttr('disabled');
					},
					error: function(e){
						alert(e);
					}
				});
			});
			
			<?php } ?>	
		
			var form = $('#add-comment');
			var submit = $('.post-comment');

			  form.on('submit', function(e) {
				// prevent default action
				e.preventDefault();
				// send ajax request
				
				$.ajax({
						url: 'index.php?view=moderate-comments',
						type: 'POST',
						cache: false,
						data: form.serialize(), //form serizlize data
						beforeSend: function(){
						// change submit button value text and disabled it
							submit.val('Submitting...').attr('disabled', 'disabled');
						},
						success: function(data){
							// Append with fadeIn see http://stackoverflow.com/a/978731
							var item = $(data).hide().fadeIn(800);
							$('#append_comment').append(item);
							
							$('#no-comments').hide();

							// reset form and button
							form.trigger('reset');
							submit.val('Post Comment').removeAttr('disabled');
						},
						error: function(e){
							alert(e);
						}
					});
				});
		
			var img_width = $( ".see-width" ).width();
			var new_height = ( img_width / 1.77 );
			$( ".post-image" ).width(img_width);
			$( ".post-image" ).height(new_height);
		}
	);
	</script>
<?php
	include ('footer.php');
?>