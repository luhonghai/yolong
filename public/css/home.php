<?php

	$publish_directly = '';
	
	if( $input->pc['delete_confession'] ){		
		$db->delete("posts", 'id='.$input->pc['delete_confession']);
		$db->close();
		exit();
	}
	
	if( $input->pc['add_confession'] ){
	
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
			"school" => $user_info['school_id'] , 
			"title" => $title ,
			"content" => $content ,
			"image" => $image ,
			"youtube" => $youtube ,
			"date" => time() , 
			"published" => $publish_directly);
			
		$insert = $db->insert("posts", $data);
		
	}
	
	if( $input->pc['edit_confession'] ){
	
		$title = $input->pc['title'];
		$content = $input->pc['content'];
		$anonymous = $input->pc['anonymous'];
		$image = $input->pc['image'];
		$youtube = $input->pc['youtube'];
		$published = $input->pc['published'];		
		
		$data = array( 
			"anonymous" => $anonymous , 
			"title" => $title ,
			"content" => $content ,
			"image" => $image ,
			"youtube" => $youtube , 
			"published" => $published);
			
		$insert = $db->update("posts", $data, 'id='.$input->pc['edit_confession']);
		
	}
	
	global $css;
	
	$css = "<link rel='stylesheet' type='text/css' href='css/home.css?ver=1.0.0' />";
	
	include ('header.php');
	
	$verifyuser = $db->fetchOne("SELECT COUNT(*) AS NUM FROM `users` WHERE id='".$input->g['userid']."'");
	
	if (!$input->g['userid']){
		$verifyuser = 1;
	}
	
	if ( $verifyuser == 1 ) {
	
		if ( $user_info['role'] == 1 && $input->g['userid'] ){

			$conditions = "user_id=".$input->g['userid'];
			$conditions2 = " WHERE user_id=".$input->g['userid'];
				
		} else if ( $user_info['role'] != 1 && $input->g['userid']){

			$conditions = 'published!=10 ( user_a='.$input->g['userid'].' OR user_b='.$user_info['id'].' )';
			$conditions2 = " WHERE user_a='".$input->g['userid']."'";
				
		} else if ( $user_info['role'] != 1 && !$input->g['userid']){

			$conditions = "published!=0";
			$conditions2 = " WHERE published=1";
				
		} else if ( $user_info['role'] == 1 && !$input->g['userid']){

			$conditions = "";
			$conditions2 = "";
				
		}
	
		$paginator = new Pagination("posts", $conditions);
		$paginator->setOrders("id", "ASC");
		$paginator->setMaxResult(10);
		$paginator->setPage($input->gc['p']);
		$paginator->allowedfield($allowed);
		$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
		$paginator->setLink("./?view=home&" . $adlink);
		$q = $paginator->getQuery();
		
		$count_posts = $db->fetchOne("SELECT COUNT(*) AS NUM FROM posts$conditions2 ORDER BY id ASC");
	
	}
?>

<!-- header -->
  <!-- masterslider -->

<div class="home-login" style="background-image:url('<?php echo get_option('bg_home'); ?>');">

	<div class="login">
		<a type="button" class="l_bt facebook" value="Login">facebook</a>
	</div>

	<form class="login" style="display:none;">
		<input type="text" placeholder="username" name="user"><br>
		<input type="password" placeholder="password" name="password"><br>
		<input type="button" value="Login">
	</form>

</div>

<script>

	$(document).ready(
		function(){
			var g_width = $('.home-login').width();
			
			$('.home-login').height( g_width / 2.5 );
		}
	);
	
	var slider = new MasterSlider();
	slider.setup('masterslider' , {
		width:1400,    // slider standard width
		height:580,   // slider standard height
		space:1,
		fullwidth:true,
		loop:true,
		preload:0,
		autoplay:true
	});
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('timebar' , {insertTo:'#masterslider'});
	slider.control('bullets');
	
</script>

<?php
	include ('footer.php');
?>