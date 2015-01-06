<?php
	
	if (isLogged() == 'false') {
			
		header("Location: http://".get_option('web_site_domain')."/index.php?view=home");
		$db->close();
	}
	
	$user_info = userinfo();
	$user_id = $user_info['id'];
	$friend_id = $input->gc['friend_id'];
	
	$friend_info = userinfo($input->gc['friend_id']);
	
	if ($input->pc['new_message']){
		$data = array(
			"from_user" => $user_id , 
			"to_user" => $friend_id , 
			"message" => $input->pc['new_message'] , 
			"date" => time(),
			"unique_id" => md5(time().$user_id)
		);
		$db->insert("messages", $data);
	}
	
	include ('header.php');	

?>
<div class="main clearfix">
    <div class="content">
		<?php 
			if( $friend_id == ''){
			$count_f = $db->fetchOne("SELECT COUNT(*) AS NUM FROM friends WHERE (friend_one='$user_id' OR friend_two='$user_id')");
			$count_f_r_r = $db->fetchOne("SELECT COUNT(*) AS NUM FROM friends WHERE friend_two='$user_id' AND status='0'");
			$count_f_r_s = $db->fetchOne("SELECT COUNT(*) AS NUM FROM friends WHERE friend_one='$user_id' AND status='0'");
		?>
		<div class="post edit-company">
			<div class="post-header">
				<h2>Friends Statistics</h2>
			</div> 
			<form method="POST" class='sky-form' style="padding: 15px;" action="">
				<div class="row">
					<div class="col col-4" style="float:left;">
						<p class="user-message">Friends : <?php echo $count_f; ?></p>
					</div>
					<div class="col col-4" style="float:left;">
						<p class="user-message">New Friend Request : <?php echo $count_f_r_r; ?></p>
					</div>
					<div class="col col-4" style="float:left;">
						<p class="user-message">Friend Request Sent : <?php echo $count_f_r_s; ?></p>
					</div>
				</div>
			</form>
		</div>
		
		<?php } 
		if ( $message['exist'] ){?>
		<div class="<?php echo $message['exist']; ?>">
			<div class="mode-img"></div>
				<?php echo $message['text']; ?>
			<div class="close-btn"></div>
		</div>
		<?php }
		
		$memberships_feature = get_membership($user_info['id']);
		
		if( $memberships_feature['messages'] == 1 && $friend_id != ''){ ?>
		<div class="post edit-company">
			<div class="post-header">
				<h2>Chat - <?php echo $friend_info['fullname']. " ( " .$friend_info['username']. " ) " ; ?></h2>
			</div> 
			<form method="POST" class='sky-form' style="padding: 15px;" action="./index.php?view=friends&friend_id=<?php echo $friend_id;?>">
				
				<div class="row chat" style="height:400px; overflow-y: scroll;">
					<?php
					
					$messages = $db->query("SELECT * FROM messages WHERE (from_user='$user_id' OR to_user='$user_id') AND (from_user='$friend_id' OR to_user='$friend_id')");
		
					$count_messages = $db->fetchOne("SELECT COUNT(*) AS NUM FROM messages WHERE (from_user='$user_id' OR to_user='$user_id') AND (from_user='$friend_id' OR to_user='$friend_id')");
					
					$is_from = 0;
					$is_to = 0;
					
					for ($x=0; $x < $count_messages; $x++) {
						if ($r = $db->fetch_array($messages)) { 
							if ($r['from_user'] == $user_id && $r['to_user'] == $friend_id) { 
								if ($is_from == 0){
							?>
							<div class="col col-12" style="height:15px;"></div>
							<div class="col col-2">
								<img src="<?php echo get_avatar($user_id);?>" class="round-50" width="80" height="80" id="avatar" >
							</div>
							
							<?php } ?>
							
							<div class="col col-10" style="float:right;">
								<p class="user-message"><?php echo $r['message'];?></p>
							</div>

						<?php 
							$is_from = 1;
							$is_to = 0;
							
							} else if ($r['from_user'] == $friend_id && $r['to_user'] == $user_id) { 
							
							?>
							<?php if ($is_to == 0){ ?>
							<div class="col col-12" style="height:15px;"></div>
							<?php } ?>
							<div class="col col-10" style="float:left;">
								<p class="user-message"><?php echo $r['message'];?></p>
							</div>
							
							<?php if ($is_to == 0){ ?>
							<div class="col col-2" style="float:right;">
								<img src="<?php echo get_avatar($friend_id);?>" class="round-50" width="80" height="80" id="avatar" >
							</div>
							<?php } ?>
							
							<br>
						<?php
							$is_from = 0;
							$is_to = 1;
							}
						} 
					}
					?>
				</div>
				
				<div class="row">
					<div class="col col-10">
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input required="" type="text" name="new_message" placeholder="Message" value="">
						</label>
					</div>
					
					<div class="col col-2">
						<button type="submit" class="button" style="margin:0;">Send</button>
					</div>
				</div>
				
			</form>
		</div>  
		<?php } ?>
		
      <!-- form -->

   </div>
    <!-- .content -->
    <aside class="sidebar" style="height:500px; overflow-y: scroll;">
		
		<?php
		
		$friends = $db->query("SELECT * FROM friends WHERE (friend_one='$user_id' OR friend_two='$user_id')");
		
		$count_friends = $db->fetchOne("SELECT COUNT(*) AS NUM FROM friends WHERE (friend_one='$user_id' OR friend_two='$user_id')");
		
		for ($x=0; $x < $count_friends; $x++) {
			if ($r = $db->fetch_array($friends)) {
				$status = "";
				if ( $r['friend_one'] == $user_id ){
				
				$friend_info = userinfo($r['friend_two']); 
				
					if ( $r['status'] == 0 ){
						$status = "style='border-right: 5px solid #E04E4E;'"; 
					} else if ( $r['status'] == 1 && is_online($friend_info['id']) == 1){
						$status = "style='border-right: 5px solid #3F9729;'"; 
					}				
				?> 
				
				<a class="friend-link" href="index.php?view=friends&friend_id=<?php echo $friend_info['id'];?>" <?php echo ($status != "") ? $status : '';?>>
					<img src="<?php echo get_avatar($friend_info['id']);?>" class="" width="48" height="48" id="avatar">
					<p><?php echo $friend_info['fullname'];?></p>
				</a>
				
				<?php
				} else if ($r['friend_two'] == $user_id){
				
				$friend_info = userinfo($r['friend_one']);
				
					if ( $r['status'] == 0 ){
						$status = "style='border-right: 5px solid #E04E4E;'"; 
					} else if ( $r['status'] == 1 && is_online($friend_info['id']) == 1){
						$status = "style='border-right: 5px solid #3F9729;'"; 
					}				
				?>
				
				<a class="friend-link" href="index.php?view=friends&friend_id=<?php echo $friend_info['id'];?>" <?php echo ($status != "") ? $status : '';?>>
					<img src="<?php echo get_avatar($friend_info['id']);?>" class="" width="48" height="48" id="avatar">
					<p><?php echo $friend_info['fullname'];?></p>
				</a>
				
				<?php
				}
			}
		}
		?>
      <!-- text widget -->
    </aside>
    <!-- .sidebar -->
  </div>

  <script type="text/javascript">
$(document).ready(
	$(function(){
	
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
	
		var current_check = '';
		
		$('.deposit_amount').change(function(){
			var new_total = $(this).val();
			current_check = $(this);
			$('#deposit_total').val( new_total );
			$('#deposit_custom_amount').val();
		}); 
	
		$('#deposit_custom_amount').click(function(){
			if (current_check != ""){
				current_check.prop('checked', false);
			}
		});  
		
		$('#deposit_custom_amount').change(function(){
			var new_total = $('#deposit_custom_amount').val();
			$('#deposit_total').val( new_total );
		});  
	
		$( ".my-confessions" ).click(function() {
			window.location = './index.php?view=my-confessions';
		});
		
		$( ".my-dares" ).click(function() {
			window.location = './index.php?view=dares&user-id=<?php echo $user_info['id'];?>';
		});
		
		$( ".my-challenges" ).click(function() {
			window.location = './index.php?view=challenges&user-id=<?php echo $user_info['id'];?>';
		});
	})
);
</script>
<?php
	include ('footer.php');
?>