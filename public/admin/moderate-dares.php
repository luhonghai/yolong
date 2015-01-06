<?php
	if( $input->pc['set_winner'] ){
	
		$gd = dareinfo($input->pc['dare']);
		$gu = userinfo($input->pc['set_winner']);
	
		$udata = array( "money" => $gu['money'] + $gd['money'] );
		$new_user_money = $db->update("users", $udata, "id=".$input->pc['set_winner']);
	
		$data = array( "winner" => $input->pc['set_winner'] , "status" => '3' );
		$insert = $db->update("dares", $data, "id=".$input->pc['dare']);

	}
	
	
	if( $input->pc['get_dare'] ){
	
	$r = dareinfo($input->pc['get_dare']);
	
	?>
	
<div class="row appended-dare-info">
    <div class="col-sm-12">
        <section class="panel panel-default">
            <header class="panel-heading font-bold">Dare : <?php echo $r['title'];?></header>
            <div class="panel-body">
			
			<p class="text-center h4 m-t m-b"><?php echo $r['title'];?></p>
			
			<p><?php echo html_entity_decode($r['content']);?></p>
			
			<p class="text-center h4 m-t m-b">Proof Of Finish : </p>
			
			<p><?php echo html_entity_decode($r['proof']);?></p>
			
			<ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-bank"></i> Money : ₦<?php echo $r['money'];?></a></li>
                <li><a><i class="fa fa-calendar"></i> Time To Finish : <?php echo $r['time_finish'];?></a></li>
                <li><a><i class="fa fa-user"></i> User Dared : <?php echo get_username($r['user_b']);?></a></li>
				<?php if ( $r['status'] == 2 && $r['finish_at'] < time() && $r['user_b'] != 0) { ?>
				<li><a><i class="fa fa-user"></i> Waiting for you to choose the winner</a></li>
				<?php } ?>
				<?php if ( $r['status'] == 3 ) {?>
					<li><a href="#"><i class="fa fa-user"></i> Winner : <?php echo get_username($r['winner']);?></a></li>
				<?php } ?>
            </ul>
			
			<div class="btn-group">
			
			<?php if ( $r['winner'] == 0 &&  $r['status'] == 2 && $r['user_b'] != 0 && ( $r['finish_at'] < time() || $r['proof'] != "" ) ) { ?>
				
                <a class="btn btn-primary set-winner" data-id="<?php echo $r['user_a'];?>" data-dare="<?php echo $r['id'];?>"><?php echo get_username($r['user_a']);?> Won</a>
				
                <a class="btn btn-success set-winner" data-id="<?php echo $r['user_b'];?>" data-dare="<?php echo $r['id'];?>"><?php echo get_username($r['user_b']);?> Won</a>
				
			<?php } ?>
				
				
            </div>
			
			</div>
		</section>
    </div>
</div>	
	
<?php } ?>