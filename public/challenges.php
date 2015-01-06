<?php

	$publish_directly = '';
	if ( get_option('publish_challenges_directly') == 1){
		$publish_directly = 1;
	} else {
		$publish_directly = 0;
	}
	
	$message['exist'] = "";
	$message['text'] = "";
	
	if( $input->pc['delete_challenge'] ){		
		$db->delete("challenges", 'id='.$input->pc['delete_challenge']);
		$db->close();
	}
	
	if( $input->pc['admin-ed'] ){
		if ( $input->pc['user_b'] != ""){
			$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE id='".$input->pc['user_b']."'");
		} else{
			$verifyuser = 1;
		}
			
		if ( $verifyuser == 1 ){
			$data = array( "title" => $input->pc['title'], "user_a" => $user_info['id'] , "user_b" => $input->pc['user_b'] , "content" => $input->pc['content'] , "money" => $input->pc['money'] , "time_finish" => $input->pc['time'] , "proof" => $input->pc['proof'] , "status" => $input->pc['status'] );
			$insert = $db->update("challenges", $data, "id=".$input->pc['admin-ed']);
		}
	}
	
	if( $input->pc['challenge_add'] ){
		if ( $input->pc['money'] > 0 && $user_info['money'] > $input->pc['money']){
			
			if ( $input->pc['user_b'] != ""){
			$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE id='".$input->pc['user_b']."'");
			} else{
			$verifyuser = 1;
			}

			if ( $verifyuser == 1 ){
				$udata = array( "money" => $user_info['money'] - $input->pc['money'] );
				$new_user_money = $db->update("users", $udata, "id=".$input->pc['user_a']);
				
				$data = array( "title" => $input->pc['title'], "user_a" => $user_info['id'] , "user_b" => $input->pc['user_b'] , "content" => $input->pc['content'] , "money" => $input->pc['money'] , "date" => time() , "time_finish" => $input->pc['time'] ,"status" => $publish_directly );
				$insert = $db->insert("challenges", $data);
				add_points('challenge');
			}
		}
	}


	include ('header.php');
	
	$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE id='".$input->g['userid']."'");
	
	if (!$input->g['userid']){
		$verifyuser = 1;
	}
	
	if ( $verifyuser == 1 ) {
	
		if ( $user_info['role'] == 1 && $input->g['userid'] ){

			$conditions = "(user_a='".$input->g['userid']."' OR user_b='".$input->g['userid']."')";
			$conditions2 = " WHERE ( user_a='".$input->g['userid']."' OR user_b='".$input->g['userid']."')";
				
		} else if ( $user_info['role'] != 1 && $input->g['userid']){

			$conditions = 'status!=10 ( user_a='.$input->g['userid'].' OR user_b='.$user_info['id'].' )';
			$conditions2 = " WHERE user_a='".$input->g['userid']."'";
				
		} else if ( $input->g['userid'] != 1 && !$input->g['userid']){

			$conditions = "status!=0";
			$conditions2 = " WHERE status!=0";
				
		} else if ( $input->g['userid'] == 1 && !$input->g['userid']){

			$conditions = "";
			$conditions2 = "";
				
		}

		
		$paginator = new Pagination("challenges", $conditions);
		$paginator->setOrders("id", "ASC");
		$paginator->setMaxResult(10);
		$paginator->setPage($input->gc['page']);
		$paginator->allowedfield($allowed);
		$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
		$paginator->setLink("./?view=challenges&" . $adlink);
		$q = $paginator->getQuery();
		
		$count_challenges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM challenges$conditions2 ORDER BY id ASC");
	
	} else {
		$message['exist'] = "warning";
		$message['text'] = "<span>Warning!</span><br>This user doesn't exist.";
	}
?>

  <!-- .slider -->
  <div class="main clearfix">

    <div class="content">
	
		<?php if ( $message['exist'] != ""){?>
			<div class="<?php echo $message['exist']; ?>">
				<div class="mode-img"></div>
				<?php echo $message['text']; ?>
				<div class="close-btn"></div>
			</div>
		<?php }?>
		
		<?php if (isLogged() == 'true') {?>
		
        <div class="post new-post" style="display:none;">
          <div class="post-header">
            <h2>New Challenge</h2>
          </div>

			<form method="post" class='sky-form' style="padding: 15px;" action="./index.php?view=challenges">
				<input name="challenge_add" type="hidden" value="true">
				<div class="row">
					<div class="col col-12">
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input type="text" name="title" placeholder="Title (eg. I challenge you to ...)">
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-12">
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" name="user_b" placeholder="challenge a user ( Username ) | Optional">
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-dollar"></i>
							<input type="text" name="money" placeholder="Drop Your Money ;)">
						</label>
					</div>
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-history"></i>
							<input type="text" name="time" placeholder="Time To Finish ( Days )">
						</label>
					</div>
				</div>
				
				<div class="row" style="padding: 15px;">
					<label class="label">Content</label>
					<label class="textarea">
						<i class="icon-append fa fa-file-code-o"></i>
						<textarea name="content" rows="4"></textarea>
					</label>
					<div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
				</div>
            <!-- .settings-field -->
            <!-- .settings-field -->
				<div class="row">
					<button type="submit" class="button">Post It (challenge it)</button>
					<button type="reset" class="button close-post">Cancel</button>
				</div>
			
            <!-- .settings-field -->
			</form>
          <!-- .post-footer -->
        </div>
		
		<?php if ( $user_info['role'] == 1){ ?>
		<div class="post admin-edit-challenge" style="display:none;">
          <div class="post-header">
            <h2>Edit challenge</h2>
          </div>

			<form method="post" class='sky-form' style="padding: 15px;" action="./index.php?view=challenges">
				<input name="admin-ed" id="admin-echallenges" type="hidden" value="true">
				<div class="row">
					<div class="col col-12">
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input type="text" name="title" id="admin-etitle" placeholder="Title (eg. I challenge you to ...)">
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" name="user_a" id="admin-eusera" placeholder="challenge By">
						</label>
					</div>
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" name="user_b" id="admin-euserb" placeholder="challenge a user ( Username ) | Optional">
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-dollar"></i>
							<input type="text" name="money" id="admin-emoney" placeholder="Drop Your Money ;)">
						</label>
					</div>
					<div class="col col-6">
						<label class="input">
							<i class="icon-append fa fa-history"></i>
							<input type="text" name="time" id="admin-efinish" placeholder="Time To Finish ( Days )">
						</label>
					</div>
				</div>
				
				<div class="row" style="padding: 15px;">
					<label class="label">Content</label>
					<label class="textarea">
						<i class="icon-append fa fa-file-code-o"></i>
						<textarea name="content" id="admin-econtent" rows="4"></textarea>
					</label>
					<div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
				</div>
				
				<div class="row" style="padding: 15px;">
					<label class="label">Proof of finish</label>
					<label class="textarea">
						<i class="icon-append fa fa-file-code-o"></i>
						<textarea name="proof" id="admin-eproof" rows="4"></textarea>
					</label>
					<div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
				</div>
				
				<div class="row">
					<div class="col col-10">
						<label class="checkbox"><input type="checkbox" name="status" value='1' id="admin-estatus"><i></i>Published</label>
					</div>
					<div class="col col-2"></div>
				</div>
            <!-- .settings-field -->
            <!-- .settings-field -->
				<div class="row">
					<button class="button set-winner-a" data-id='' data-userid='' >Winner </button>
					<button class="button set-winner-b" data-id='' data-userid='' >Winner </button>
					<button type="submit" class="button">Save challenge</button>
					<button type="reset" class="button close-admin-challenge">Cancel</button>
					<a class="button admin-delete-challenge" data-id=''>Delete</a>
				</div>
			
            <!-- .settings-field -->
			</form>
          <!-- .post-footer -->
        </div>
		<?php } ?>

	   <div class="clearfix"></div>
		<?php } else { ?>
		<div style="display:none;" class="new-post td-info warning">
			<div class="mode-img"></div>
			<p><span>Warning!</span><br>
			You have to be logged in to post a challenge</p>
		<div class="close-btn"></div>
		</div>
		<?php }?>
      <div class="post" id="challenge-append">
        <div class="post-header">
          <p class="results"><span> <?php echo $count_challenges; ?> </span> challenges</p>
          <label class="sort">
			<?php echo $paginator->linkorder("date", "Date", "peter-river-fb small-fb");?>
			<?php echo $paginator->linkorder("time_finish", "Finish Time", "peter-river-fb small-fb");?>
			<?php echo $paginator->linkorder("money", "Money", "peter-river-fb small-fb");?>
          </label>
          <!-- .sort -->
        </div>
        <!-- .post_header -->
        <div class="table-wrapper">
          <table class="openings">
            <tbody>
				<?php
					$n = 0;
					for ($x=0; $x < $count_challenges; $x++) {
						if ($r = $db->fetch_array($q)) {
					$n++;
					$current_user = userinfo($r['user_a']);
				?>
				<tr class="opening" id="su<?php echo $r['id']; ?>">
					<td class="opening-logo">
						<a href="opening.html"><img src="images/opening-logo.png" alt="Logo"></a>
					</td>
					<td class="opening-meta">
						<h2>
							<a class="opening-name take-challenge" data-id="<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a>
							<?php if ( $user_info['role'] == 1){ ?>
								- <a class="opening-name edit-challenge" data-id="<?php echo $r['id']; ?>" data-title="<?php echo $r['title']; ?>" data-user_a="<?php echo $r['user_a']; ?>" data-username_a="<?php echo get_username($r['user_a']); ?>" data-user_b="<?php echo $r['user_b']; ?>" data-username_b="<?php echo get_username($r['user_b']); ?>" data-content="<?php echo $r['content']; ?>" data-proof="<?php echo $r['proof']; ?>" data-money="<?php echo $r['money']; ?>" data-finish="<?php echo $r['time_finish']; ?>" data-status="<?php echo $r['status']; ?>" data-opened="<?php echo date("M d, y",$r['date']); ?>"><i class="fa fa-edit"></i></a>
							<?php } ?>
						</h2>
						<div class="post-meta">
							<span class="post-author"><i class="fa fa-user"></i> <a href="./index.php?view=user&user-id=<?php echo $r['user_a']; ?>" title="Posts by <?php echo $current_user['username']; ?>" rel="author">Challenge by <?php echo get_username($r['user_a']); ?></a></span>
							<span class="post-author"><i class="fa fa-user"></i> <?php echo $current_user['genre']; ?> </span>
							<span class="post-author"><i class="fa fa-user"></i> <?php echo $current_user['age']; ?></span>
							<span class="post-date"><time datetime="<?php echo date("y-m-d",$r['date']); ?>"><i class="fa fa-clock-o"></i> <?php echo date("M d, y",$r['date']); ?></time></span>
							<span class="post-date"><i class="fa fa-clock-o"></i>Time to finish - <?php echo $r['time_finish']; ?> Days</time></span>
							<span><i class="fa">₦</i> <?php echo $r['money']; ?></span>
						</div>
						
						<div class="post-meta">
							<?php if ( $r['user_b'] != 0 && $r['status'] == 1) {?>
							<span class="post-author"><i class="fa fa-user"></i> <a href="./index.php?view=user&user-id=<?php echo $r['user_b']; ?>" title="challenge taked by <?php echo $current_user['username']; ?>" rel="author">Challenge taked by <?php echo get_username($r['user_b']); ?></a></span>
							<span class="post-author"><i class="fa fa-history"></i> Challenge Closed </span>
							<?php } else if ( $r['user_b'] != 0 && $r['status'] == 2 ) {?>
							<span class="post-author"><i class="fa fa-user"></i> <a href="./index.php?view=user&user-id=<?php echo $r['user_b']; ?>" title="challenge taked by <?php echo $current_user['username']; ?>" rel="author">Challenge WON by <?php echo get_username($r['winner']); ?></a></span>
							<span class="post-author"><i class="fa fa-history"></i> Challenge Closed </span>
							<?php } else if ( $r['user_b'] == 0 && $r['status'] == 1 ) {?>
							<span class="post-author"><i class="fa fa-history"></i> Opened Challenge , take it </span>
							<?php } ?>
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
      <!-- .openings -->
        <nav>
		<?php 
			if ($paginator->totalPages() == 1 || $paginator->getPage() == 1) {
				echo "";
			} else {
				echo "<a class='peter-river-fb small-fb radius-fb' href='" . $paginator->prevpage() . "'>Prev</a>";
			}
			
			if ($paginator->totalPages() == 0 || $paginator->totalPages() == $paginator->getPage()) {
				echo "";
			} else {
				echo "<a class='peter-river-fb small-fb radius-fb' style='float:right;' href='" . $paginator->nextpage() . "'>Next</a>";
			}
		?> 
		</nav>
      <!-- .paging -->
    </div>
    <!-- .content -->
    <aside class="sidebar">

		<button id="add_post" class="peter-river-fb small-fb radius-fb" style="margin-bottom:10px;display: inline-block;width: 100%;box-sizing: border-box;">Add Challenge</button>
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
							<option value='top-challenges-takers' <?php echo ('top-challenges-takers' == $r['type']) ? "selected='selected'" : ''; ?>>Top challenge Takers</option>
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
							<option value='top-challenges-takers'>Top challenge Takers</option>
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
      <!-- .video -->
    </aside>
    <!-- .sidebar -->
  </div>
  
	<script>
	$(document).ready(
		function(){
		
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
		
		$( ".take-challenge" ).click(function() {
			// prevent default action
			// send ajax request
			$( ".appended-challenge-info").remove();
			var info = $( this ).data();
				
			$.ajax({
				url: 'index.php?view=moderate-challenges',
				type: 'POST',
				cache: false,
				data: 'get_challenge='+info.id, //form serizlize data
				beforeSend: function(){

				},
				success: function(data){
					var item = $(data).hide().fadeIn(800);
					$('#challenge-append').before(item);
				},
				error: function(e){
					alert(e);
				}
			});
		});
		
		 $(document).on('click', '.finish-challenge', function(){
		
			var uform = $( "#working-form" );
		
			$.post( "index.php?view=moderate-challenges", uform.serialize() );
			
			$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
			
			$( ".appended-challenge-info").remove();
		});
		
		$(document).on('click', '.accept-challenge', function(){
		
			var uform = $( "#working-form" );
		
			$.post( "index.php?view=moderate-challenges", uform.serialize() );
			
			$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
			
			$( ".appended-challenge-info").remove();
		});
		
		<?php if ($user_info['role'] == 1) {?>
		$( ".edit-challenge" ).click(function() {
		
			var info = $( this ).data();	
			
			if ( info.user_b == 0){
				$( '.set-winner-a' ).hide();
				$( '.set-winner-b' ).hide();
			} else {

				$( ".set-winner-a" ).html('Winner ' + info.username_a);
				$( ".set-winner-b" ).html('Winner ' + info.username_b);
				$( '.set-winner-a' ).data('id' , info.id);
				$( '.set-winner-b' ).data('id' , info.id);
				$( '.set-winner-a' ).data('userid' , info.user_a);
				$( '.set-winner-b' ).data('userid' , info.user_b);
			}
			
			$( "#admin-echallenges" ).val(info.id);			
			$( "#admin-etitle" ).val(info.title);
			$( "#admin-econtent" ).html(info.content);
			$( "#admin-eusera" ).val(info.username_a);
			$( "#admin-euserb" ).val(info.username_b);
			$( "#admin-emoney" ).val(info.money);
			$( "#admin-efinish" ).val(info.finish);
			$( "#admin-eproof" ).html(info.proof);
			$( ".admin-delete-challenge" ).data('id' , info.id)
			
			if (info.status == 1){
				$( "#admin-estatus").prop('checked', true);
			}
				
			$('.new-post').slideUp(1500);
			$('.admin-edit-challenge').slideDown(1500);
		});
		
		$( ".admin-delete-challenge" ).click(function() {
			var d_info = $( this ).data();
			$('#su' + d_info.id).slideUp();
			$.post( "./index.php?view=challenges", { delete_challenge: d_info.id } );
			$('.admin-edit-challenge').slideUp(1500);
		});
		
		$( ".close-admin-challenge" ).click(function() {
			$('.admin-edit-challenge').slideUp(1500);
		});
		<?php } ?>
		
		$( ".close-challenge" ).click(function() {
			$('.appended-challenge-info').slideUp(1500);
		});
		}
	);
	</script>

<?php
	include ('footer.php');
?>