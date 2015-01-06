<?php
	
	if (isLogged() == 'false') {
			
		header("Location: http://".get_option('web_site_domain')."/index.php?view=home");
		$db->close();
	}

	global $css, $js;
	
	$css = "<link rel='stylesheet' type='text/css' href='css/membership.css?ver=1.0.0' />";
	$js = "<script type='text/javascript' src='js/prefixfree.min.js' ></script>";
	
	$count_memberships = $db->fetchOne("SELECT COUNT(*) AS NUM FROM memberships WHERE active='1'");
	

	
	if ( $input->gc['buy'] ){
	
		$current_user = userinfo();
		$c_u_membership = get_membership($current_user['id']);	
		
		$get_membership = $db->fetchRow("SELECT * FROM memberships WHERE id='".$input->gc['buy']."'");
		
		if($get_membership['price'] < $current_user['money']){
			$new_money = $current_user['money'] - $get_membership['price'];
			$expire = time() + 60 * 60 * 24 * $get_membership['time'];
			$data = array(
				"money" => $new_money , 
				"membership" => $get_membership['id'] , 
				"expire" => $expire
			);
			$update = $db->update("users", $data, "id=".$current_user['id']);
		}
	}
	
	$current_user = userinfo();
	$c_u_membership = get_membership($current_user['id']);
	
	include ('header.php');
?>

<!-- header -->
  <!-- masterslider -->

<div class="membership-page" style="background-image:url('http://www.<?php echo get_option('bg_membership'); ?>'); display: inline-block;">

	<div class="pricing">
		<center>
			<?php
			$gs = $db->query("SELECT * FROM memberships WHERE active='1' ORDER BY price ASC");
					
			for ($x=0; $x < $count_memberships; $x++) {				
				if ($r = $db->fetch_array($gs)) {

			?>
			<div class="price-option price">
				<a class="price-option-title" style="background-color:<?php echo rand_color('yellow'); ?>;"><?php echo $r['name']; ?></a>
				<div class="price-option-detail">
				
					<span class="price-option-cost">₦<?php echo $r['price']; ?></span>
					<span class="price-option-type"><?php echo $r['time']; ?> Days</span>
					<span class="price-option-type">Friend System : <?php echo ( $r['friends'] == 1 ) ? "Yes" : "No"; ?></span>
					<span class="price-option-type">PM System : <?php echo ( $r['messages'] == 1 ) ? "Yes" : "No"; ?></span>
					<span class="price-option-type">Points/Confession : <?php echo $r['p_post']; ?></span>
					<span class="price-option-type">Points/Comment : <?php echo $r['p_comment']; ?></span>
					<span class="price-option-type">Points/Dare : <?php echo $r['p_dare']; ?></span>
					<span class="price-option-type">Points/Challenge : <?php echo $r['p_challenge']; ?></span>
					
				</div>
				<a <?php echo ( $r['id'] == $c_u_membership['id'] ) ? "" : "href='./index.php?view=membership&buy=".$r['id']."'"; ?> class="price-option-purchase" style="background-color:<?php echo ( $r['id'] == $c_u_membership['id'] ) ? rand_color('green') : rand_color('red'); ?>;"><?php echo ( $r['id'] == $c_u_membership['id'] ) ? "Current" : "Buy"; ?></a>
			</div>
			<?php
				}
			}
			?>
		</center>
	</div>
	
</div>

<script>

	$(document).ready(
		function(){
			var g_width = $('.membership-page').width();
			
			$('.membership-page').height( g_width / 2.5 );
			
		}
	);
	
</script>

<?php
	include ('footer.php');
?>