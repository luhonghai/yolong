<?php
	if( $input->pc['finish_challenge'] ){
		
		$data = array( "proof" => $input->pc['proof'] , "status" => 2);
		$insert = $db->update("challenges", $data, "id=".$input->pc['finish_challenge']);

	}

	if( $input->pc['accept_challenge'] ){
		$challenge_info = challengeinfo($input->pc['accept_challenge']);
		
		if ( $challenge_info['user_a'] != $user_info['id'] ){
		
			if ( $challenge_info['user_b'] == 0 ){
			
				$udata = array( "money" => $user_info['money'] - $challenge_info['money'] );
				$new_user_money = $db->update("users", $udata, "id=".$user_info['id']);
						
				$data = array( "user_b" => $user_info['id'], "proof" => $user_info['proof'], "finish_at" => time() + 60*60*24*$challenge_info['time_finish'], "status" => 1);
				$insert = $db->update("challenges", $data, "id=".$input->pc['accept_challenge']);
					
				$message['exist'] = "success";
				$message['text'] = "<span>".$challenge_info['title']."</span><br>You have to finish this challenge in ".$challenge_info['time_finish']." Days.";
				
			} else {
				$message['exist'] = "warning";
				$message['text'] = "<span>Warning!</span><br>This challenge is already taked.";
			}
			
		} else {
			$message['exist'] = "warning";
			$message['text'] = "<span>Warning!</span><br>You can't challenge yourself.";
		}
	}
	
	if( $input->pc['get_challenge'] ){
	
	$r = challengeinfo($input->pc['get_challenge']);
	
	?>

<div class="post appended-challenge-info">
	<div class="post-header">
		<h2><?php echo $r['title'];?></h2>
	</div>
	<form method="post" class='sky-form' id="working-form" style="padding: 15px;">
		<?php if ( $r['user_b'] == $user_info['id'] && $r['finish_at'] > time() && !$r['proof']) {?>
			<input name="finish_challenge" type="hidden" value="<?php echo $r['id'];?>">
		<?php } ?>
		<?php if ( $r['user_b'] == '' || $r['user_b'] == 0) {?>
			<input name="accept_challenge" type="hidden" value="<?php echo $r['id'];?>">
		<?php } ?>
		<div class="row">
			<div class="col col-12"><?php echo $r['content'];?></div>
		</div>
		<div class="row">
			<div class="col col-6">
				Challenge Money : ₦<?php echo $r['money'];?>
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
			<a class="button finish-challenge">Finish challenge</a>
			<?php } ?>
			<?php if ( $r['user_b'] == '' || $r['user_b'] == 0 && $r['user_a'] != $user_info['id'] ) {?>
			<button type="submit" class="button accept-challenge">Accept challenge</button>
			<?php } ?>
			<button type="reset" class="button close-challenge">Cancel</button>
		</div>
	</form>
</div>
<div class="clearfix"></div>
	
<?php } ?>