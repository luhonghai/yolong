<?php
	if( $input->pc['set_winner'] ){
	
		$gd = challengeinfo($input->pc['challenge_id']);
		$gu = userinfo($input->pc['set_winner']);
	
		$udata = array( "money" => ($gu['money'] + $gd['money']) );
		$new_user_money = $db->update("users", $udata, "id=".$input->pc['set_winner']);
	
		$data = array( "winner" => $input->pc['set_winner'] , "status" => '3');
		$insert = $db->update("challenges", $data, "id=".$input->pc['challenge_id']);

	}
	
	if( $input->pc['set_reset'] ){
	
		$data = array( "user_b" => 0 ,"winner" => 0 , "proof" => '' , "status" => 1);
		$insert = $db->update("challenges", $data, "id=".$input->pc['set_reset']);

	}
	
	if( $input->pc['get_challenge'] ){
	
	$r = challengeinfo($input->pc['get_challenge']);
	
	?>
	
<div class="row appended-challenge-info">
    <div class="col-sm-12">
        <section class="panel panel-default">
            <header class="panel-heading font-bold">Challenge : <?php echo $input->pc['set_winner'] . ' - ' . $r['title'];?></header>
            <div class="panel-body">
			
			<p class="text-center h4 m-t m-b"><?php echo $r['title'];?></p>
			
			<p><?php echo html_entity_decode($r['content']);?></p>
			
			<p class="text-center h4 m-t m-b">Proof Of Finish : </p>
			
			<p><?php echo html_entity_decode($r['proof']);?></p>
			
			<ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-bank"></i> Money : ₦<?php echo $r['money'];?></a></li>
				<?php if ( $r['status'] == 2 ) { ?>
				<li><a><i class="fa fa-user"></i> Waiting for you to choose if the challenge is finished</a></li>
				<?php } ?>
				<?php if ( $r['status'] == 3 ) {?>
					<li><a href="#"><i class="fa fa-user"></i> Winner : <?php echo get_username($r['winner']);?></a></li>
				<?php } ?>
            </ul>
			
			<div class="btn-group">
			
			<?php if ( $r['status'] == 2 ) { ?>
				
                <a class="btn btn-primary"  id="set-winner" data-id="<?php echo $r['user_b'];?>" data-challenge="<?php echo $r['id'];?>"><?php echo get_username($r['user_b']);?> Won</a>
				
                <a class="btn btn-success" id="set_reset" data-challenge="<?php echo $r['id'];?>">Incorrect ( Re-Open Challenge) </a>
				
			<?php } ?>
				
				
            </div>
			
			</div>
		</section>
    </div>
</div>	
	
<?php } ?>