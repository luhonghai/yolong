<?php
	
	$message['exist'] = "";
	$message['text'] = "";
	
	if (isLogged() == 'false') {
			
		header("Location: http://".get_option('web_site_domain')."/index.php?view=sign-in");
		$db->close();
	}
	
	$userid = $input->pc['update_profile'];
	
	if( $input->pc['update_profile'] ){
	
		$fullname = $input->pc['fullname'];
		$pass = $input->pc['confirm-password'];
		$confpass = $input->pc['password'];
		$email = $input->pc['email'];
		$birthday = $input->pc['birthday'];
		$school = $input->pc['school'];
		$genre = $input->pc['genre'];
		$avatar = $input->pc['user_avatar'];
		$new_avatar = $input->pc['new_user_avatar'];
		
		if ( $new_avatar != "" ){
			$get_avatar = get_image_id($new_avatar);
			$avatar = $get_avatar['id'];
		}
		
		if ($pass == ''){
			$data = array(
				"fullname" => $fullname , 
				"email" => $email , 
				"birthday" => $birthday , 
				"school_id" => $school , 
				"genre" => $genre ,
				"avatar" => $avatar 
			);
			$update = $db->update("users", $data, "id=$userid");	
			$message['exist'] = "success";
			$message['text'] = "<p><span>Success!</span><br>Account Updated Successfully</p>";			
		} else if ( $pass && $pass == $confpass){
			$data = array(
				"fullname" => $fullname , 
				"email" => $email , 
				"password" => md5($pass) , 
				"birthday" => $birthday , 
				"school_id" => $school , 
				"genre" => $genre ,
				"avatar" => $avatar 
			);
			$update = $db->update("users", $data, "id=$userid");	
			$message['exist'] = "success";
			$message['text'] = "<p><span>Success!</span><br>Account Updated Successfully . <br> Your new password is $pass</p>";
		} else if ( $pass && $pass != $confpass){
			$message['exist'] = "warning";
			$message['text'] = "<p><span>Warning!</span><br>Password do not match with Confirmation Password</p>";
		}
	}
	
	$user_info = userinfo();
	
	include ('header.php');	

?>
<div class="main clearfix">
    <div class="content">
		<?php if ( $message['exist'] ){?>
		<div class="<?php echo $message['exist']; ?>">
			<div class="mode-img"></div>
				<?php echo $message['text']; ?>
			<div class="close-btn"></div>
		</div>
		<?php }?>
		<div class="post edit-company">
			<div class="post-header">
				<h2>My Account - <?php echo $user_info['username']; ?></h2>
			</div> 
			<form method="POST" class='sky-form' style="padding: 15px;" action="#">
			<!-- .post-header -->
				<input name="update_profile" type="hidden" value="<?php echo $user_info['id']; ?>"/>
				<input name="user_avatar" id="user_avatar" type="hidden" value="<?php echo $user_info['avatar']; ?>"/>
				<input name="new_user_avatar" id="new_user_avatar" type="hidden" value=""/>
				<div class="row">
					<div class="col col-12">
						<div class="avatar-container">
							<!-- This button opens the avatar modal ( data-ip-modal="#avatarModal" ) -->
							<button type="button" class="btn btn-default edit-avatar" data-ip-modal="#avatarModal" title="Edit avatar"><i class="fa fa-edit"></i></button>
							<?php echo get_avatar($user_info['id'] , true , '' , 'avatar'); ?>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col col-12">
						<label class="label"><span style="color:red;">*</span>Fullname</label>
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input required="" type="text" name="fullname" placeholder="Fullname" value="<?php echo $user_info['fullname']; ?>">
						</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col col-6">
						<label class="label"><span style="color:red;">*</span>Email</label>
						<label class="input">
							<i class="icon-append fa fa-envelope-o"></i>
							<input name="email" type="text" placeholder="email@domain.com"  value="<?php echo $user_info['email']; ?>"/>
						</label>
					</div>
					<div class="col col-6">
						<label class="label"><span style="color:red;">*</span>Birthday</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input name="birthday" type="date" value="<?php echo $user_info['birthday']; ?>"/>
						</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col col-6">
						<label class="label"><span style="color:red;">*</span>School</label>
						<label class="select">
							<select name="school">
								<?php
								$d = $db->query("SELECT * FROM schools");
								$count_m = $db->fetchOne("SELECT COUNT(*) AS NUM FROM schools ORDER BY id ASC");
								for ($x=0; $x < $count_m; $x++) {
									if ($r = $db->fetch_array($d)) {
								?> 
									<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == $user_info['school_id']) ? "selected='selected'" : ''; ?>><?php echo $r['name'] . ' - ' . $r['state']; ?></option>
								<?php
									}
								}
								?>
							</select>
							<i></i>
						</label>
					</div>
					<div class="col col-6">
						<label class="label"><span style="color:red;">*</span>Genre</label>
						<label class="select">
							<select name="genre">
								<option value='0' <?php echo (0 == $user_info['genre']) ? "selected='selected'" : ''; ?>>Male</option>
								<option value='1' <?php echo (1 == $user_info['genre']) ? "selected='selected'" : ''; ?>>Female</option>
							</select>
							<i></i>
						</label>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col col-6">
						<label class="label">Optional | Only if you want to change it</label>
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input name="password" type="password" placeholder="New password" />
						</label>
					</div>
					<div class="col col-6">
						<label class="label">Optional | Repeat Password</label>
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input name="confirm-password" type="password" placeholder="Confirm new password"/>
						</label>
					</div>
				</div>
				<div class="row">
					<button type="submit" class="button">Save</button>
				</div>
			</form>
		</div>  
      <!-- form -->
	  
	   	<div class="post edit-company">
			<div class="post-header">
				<h2>My Wallet - ₦<?php echo $user_info['money']; ?></h2>
			</div>
			<form method="post" class="sky-form" style="padding: 15px;" action="https://voguepay.com/pay/">
			<!-- .post-header -->
				<div class="row">
					<div class="col col-4">
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="500"><i></i>₦500</label>
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="2000"><i></i>₦2000</label>
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="5000"><i></i>₦5000</label>
					</div>
					<div class="col col-4">
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="1000"><i></i>₦1000</label>
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="2500"><i></i>₦2500</label>
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="10000"><i></i>₦10000</label>
					</div>
					<div class="col col-4">
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="1500"><i></i>₦1500</label>
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="3000"><i></i>₦3000</label>
						<label class="radio state-success"><input type="radio" name="deposit_amount" class="deposit_amount" value="15000"><i></i>₦15000</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-12">
						<label class="input">
							<i class="icon-append">₦</i>
							<input type="text" name="deposit_custom_amount" id="deposit_custom_amount" placeholder="eg. 1000">
						</label>
					</div>
				</div>
				<input type='hidden' name='v_merchant_id' value='<?php echo get_option('merchant_id'); ?>' />
				<input type='hidden' name='merchant_ref' value='<?php echo $user_info['id']; ?>' />
				<input type='hidden' name='memo' value='<?php echo get_option('site_name'); ?>' />
				<input type="hidden" required id="deposit_total" name="total">
				<input type='hidden' name='notify_url' value='http://www.<?php echo get_option('web_site_domain'); ?>/index.php?view=payment' />
				<input type='hidden' name='success_url' value='http://www.<?php echo get_option('web_site_domain'); ?>/index.php?view=thank-you' />
				<div class="row">
					<button type="submit" class="button">Deposit</button>
				</div>
			</form>
		</div>
    </div>
    <!-- .content -->
    <aside class="sidebar">
		<a class="my-confessions peter-river-fb small-fb radius-fb" style="margin-bottom:10px;display: inline-block;width: 100%;box-sizing: border-box;">My Confessions</a>
		
		<a class="my-dares peter-river-fb small-fb radius-fb" style="margin-bottom:10px;display: inline-block;width: 100%;box-sizing: border-box;">My Dares</a>
		
		<a class="my-challenges peter-river-fb small-fb radius-fb" style="margin-bottom:10px;display: inline-block;width: 100%;box-sizing: border-box;">My Challenges</a>
		
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
      <!-- text widget -->
    </aside>
    <!-- .sidebar -->
  </div>

  <script type="text/javascript">
$(document).ready(
	$(function(){
	
	$('.edit-avatar').imgPicker({
		el: '.avatar',
		type: 'avatar',
		minWidth: 90,
		minHeight: 90,
		title: 'Change your avatar',
		obj_id: <?php echo $user_info['id']; ?> ,
		complete: function(imageUrl) {
			// Set body background
			$('#new_user_avatar').val(imageUrl);
			$('.new-avatar').attr("src",imageUrl);
		}
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