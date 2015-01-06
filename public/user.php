<?php

	global $css;
	
	$current_user = userinfo();
	
	$c_u_membership = get_membership($current_user['id']);	
	
	if ($input->pc['add_friend']){
		$data = array( 
			"friend_one" => $current_user['id'] , 
			"friend_two" => $input->gc['user_id'] ,
			"status" => 0 ,
			"created" => time() 
		);		
		$db->insert("friends", $data);
	}
	
	if ($input->pc['confirm_friend']){
		$data = array( 
			"status" => 1 
		);		
		$db->update("friends", $data, "friend_one='".$input->gc['user_id']."' AND friend_two='".$current_user['id']."'");
	}
	
	$css = "<link rel='stylesheet' type='text/css' href='css/home.css?ver=1.0.0' />";
	
	include ('header.php');
	
?>

<!-- header -->
  <!-- masterslider -->

<div class="home-login" style="background-image:url('http://<?php echo get_option('bg_profile'); ?>'); display: inline-block;">

	<?php

	if ( $input->gc['user_id'] ) {
	
	$user_info = userinfo( $input->gc['user_id'] );

	
	?>
		
	<?php if ( $user_info['id'] != $current_user['id'] && isLogged() == 'true') { ?>
		<div class="home-top">
			<center>
				<?php 	if ( $c_u_membership['friends'] == 1 ) { 
						
						$check_friends = check_friends($current_user['id'], $user_info['id']);
						
							if ( !$check_friends['created'] ) { ?>
							<button id="s_f_request" class="peter-river-fb small-fb" data-id="<?php echo $user_info['id']; ?>" style="border-radius: 5px;">Send Friend Request <i class="fa fa-user"></i></button>
				<?php		} else if ( $check_friends['friend_one'] == $current_user['id'] && $check_friends['status'] == 0) { ?>
							<button id="f_r_sent" class="peter-river-fb small-fb" data-id="<?php echo $user_info['id']; ?>" style="border-radius: 5px;">Friend Request Sent <i class="fa fa-user"></i></button>
				<?php		} else if ( $check_friends['friend_one'] == $user_info['id'] && $check_friends['status'] == 0) { ?>
							<button id="c_request" class="peter-river-fb small-fb" data-id="<?php echo $user_info['id']; ?>" style="border-radius: 5px;">Confirm Request <i class="fa fa-user"></i></button>
				<?php		} else if ( $check_friends['status'] == 1) { ?>
							<button id="friends" class="peter-river-fb small-fb" style="border-radius: 5px;">Friends <i class="fa fa-user"></i></button>
				<?php		} 
						}
				if ( $c_u_membership['messages'] == 1 ) { ?>
				
				<a href="index.php?view=friends&friend_id=<?php echo $user_info['id'];?>" class="peter-river-fb small-fb" style="border-radius: 5px;display: inline-block;">Send Private Message <i class="fa fa-envelope"></i></a>
				
				<?php } ?>
			</center>
		</div>
		
		<?php

		}
		
		?>
		
		<div class="home-profile right-text">
		
			<p class="big-p">Username</p>
			<p class="small-p"><?php echo $user_info['username']; ?></p>
			<br>
			<p class="big-p">Confessions</p>
			<a href='./index.php?view=confessions&userid=<?php echo $user_info['id'];?>' class="small-p"><?php echo count_rows('posts', 'WHERE user_id='.$user_info['id']); ?></p>
			<br>
			<p class="big-p">Challenges</p>
			<a href='./index.php?view=challenges&userid=<?php echo $user_info['id'];?>' class="small-p"><?php echo count_rows('challenges', 'WHERE user_a='.$user_info['id']); ?></p>
			
		</div>
		
		<div class="home-profile">
			<center>
				<img class="avatar" src="<?php echo get_avatar($user_info['id']); ?>">
			</center>
		</div>
		
		<div class="home-profile left-text">
			
			<p class="big-p">Fullname</p>
			<p class="small-p"><?php echo $user_info['fullname']; ?></p>	
			<br>
			<p class="big-p">Dares</p>
			<a href='./index.php?view=dares&userid=<?php echo $user_info['id'];?>' class="small-p"><?php echo count_rows('dares', 'WHERE user_a='.$user_info['id']); ?></p>
			<br>
			<p class="big-p">Birthday</p>
			<p class="small-p"><?php echo $user_info['birthday']; ?> (<?php echo $user_info['age']; ?> Years Old) </p>			
			
		</div>
		
	<?php } ?>
	
</div>

<script>

	$(document).ready(
		function(){

			var g_width = $('.home-login').width();
			
			$('.home-login').height( g_width / 2.5 );
			
			$(document).on('click', '#s_f_request', function(){
			
				var action = 'add-friend';
			
				$.post( "index.php?view=user&user_id=<?php echo $input->gc['user_id']; ?>", { add_friend : action } );		
				
				$( this ).html('Friend Request Sent <i class="fa fa-user"></i>').fadeTo( "fast", 0.33 ).fadeTo( "fast", 1 );
			
			});
			
			$(document).on('click', '#c_request', function(){
			
				var action = 'confirm-friend';
			
				$.post( "index.php?view=user&user_id=<?php echo $input->gc['user_id']; ?>", { confirm_friend : action } );		
				
				$( this ).html('Friends <i class="fa fa-user"></i>').fadeTo( "fast", 0.33 ).fadeTo( "fast", 1 );
			
			});
			
		}
	);
	
</script>

<?php
	include ('footer.php');
?>