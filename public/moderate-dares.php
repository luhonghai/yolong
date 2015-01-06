<?php
	if( $input->pc['finish_dare'] ){
		
		$data = array( "proof" => $input->pc['proof'] , "status" => 2);
		$insert = $db->update("dares", $data, "id=".$input->pc['finish_dare']);

	}

	if( $input->pc['accept_dare'] ){
		$dare_info = dareinfo($input->pc['accept_dare']);
		
		if ( $dare_info['user_a'] != $user_info['id'] ){
		
			if ( $dare_info['user_b'] == 0 ){
			
				if ( $user_info['money'] > $dare_info['money'] ){
					
					$udata = array( "money" => $user_info['money'] - $dare_info['money'] );
					$new_user_money = $db->update("users", $udata, "id=".$user_info['id']);
						
					$data = array( "user_b" => $user_info['id'], "proof" => $user_info['proof'], "money" => $dare_info['money'] + $dare_info['money'] , "finish_at" => time() + 60*60*24*$dare_info['time_finish'], "status" => 1);
					$insert = $db->update("dares", $data, "id=".$input->pc['accept_dare']);
					
					$message['exist'] = "success";
					$message['text'] = "<span>".$dare_info['title']."</span><br>You have to finish this dare in ".$dare_info['time_finish']." Days.";
					
				} else {
					$message['exist'] = "warning";
					$message['text'] = "<span>Warning!</span><br>You don't have enough money to take this dare";
				}
				
			} else {
				$message['exist'] = "warning";
				$message['text'] = "<span>Warning!</span><br>This dare is already taked.";
			}
			
		} else {
			$message['exist'] = "warning";
			$message['text'] = "<span>Warning!</span><br>You can't dare yourself.";
		}
	}
	
	if( $input->pc['get_dare'] ){
	
	$r = dareinfo($input->pc['get_dare']);
	
	?>

<div class="post appended-dare-info" data-id="<?php echo $r['id'];?>">
	<div class="post-header">
		<h2><?php echo $r['title'];?></h2>
	</div>
	<form method="post" class='sky-form' id="working-form" style="padding: 15px;">
		<?php if ( $r['user_b'] == $user_info['id'] && $r['finish_at'] > time() && !$r['proof']) {?>
			<input name="finish_dare" type="hidden" value="<?php echo $r['id'];?>">
		<?php } ?>
		<?php if ( $r['user_b'] == '' || $r['user_b'] == 0) {?>
			<input name="accept_dare" type="hidden" value="<?php echo $r['id'];?>">
		<?php } ?>
		<div class="row">
			<div class="col col-12"><?php echo $r['content'];?></div>
		</div>
		<div class="row">
			<div class="col col-6">
				Money To Drop : ₦<?php echo $r['money'];?>
			</div>
			<div class="col col-6">
				<i class="fa fa-history"></i> Time to finish it : <?php echo $r['time_finish'];?> Days
			</div>
		</div>
		
		<?php if ( $r['user_b'] == $user_info['id'] && $r['finish_at'] > time() && !$r['proof']) {?>
		<div class="row" style="padding: 15px;">
			<label class="label">Proof of finish</label>
			<label class="textarea">
				<i class="icon-append fa fa-file-code-o"></i>
				<textarea name="proof" rows="4"></textarea>
			</label>
			<div class="note">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
		</div>
		<?php } else if ( $r['proof'] ) { ?>
		<div class="row">
			<div class="col col-6">
				Proof of finish :
			</div>
			<div class="col col-12">
				<?php echo $r['proof'];?>
			</div>
		</div>
		<?php } ?>
		
        <div class="row">
			<?php if ( $r['user_b'] == $user_info['id'] && $r['finish_at'] > time() && !$r['proof']) {?>
			<a class="button finish-dare">Finish Dare</a>
			<?php } ?>
			<?php if ( $r['user_b'] == '' || $r['user_b'] == 0 ) {?>
			<button type="submit" class="button accept-dare">Accept Dare</button>
			<?php } ?>
			<button type="reset" class="button close-dare">Cancel</button>
			<?php if ( $r['user_b'] == $user_info['id'] && $r['finish_at'] > time() && !$r['proof']) {?>
			<a class="button edit-img-proof" data-ip-modal="#avatarModal">Image Proof</a>
			<?php } ?>
		</div>
	</form>
</div>
<div class="clearfix"></div>
	
<?php } ?>