<?php

	if( $_POST['delete_challenge'] ){
		$db->delete("challenges", "id=" . $_POST['challenge_id']);
	}
		

	
	if( $_POST['save_challenge'] ){
		$data = array("winner" => $_POST['user_b'] , "content" => $_POST['content'] , "proof" => $_POST['proof'] ,"money" => $_POST['money'] ,  "status" => 1 );
		$update = $db->update("challenges", $data, "id=".$_POST['save_challenge']);
		
		header("Location: /admin/index.php?view=challenges&challengeid=".$_POST['save_challenge']);
	}
	
	$challenge_id = $_GET['challengeid'];	
	$challenge_info = $db->fetchRow("SELECT * FROM challenges WHERE id=" . $challenge_id);
	
	if ( $_GET['winner'] ){
		$user_money = userinfo($_GET['winner']);
	
		$udata = array("money" => $challenge_info['money'] + $user_money['money']);
		$update = $db->update("users", $udata, "id=".$_GET['winner']);
		
		header("Location: /admin/index.php?view=challenges&challengeid=".$challenge_id);
	
	}	
	
	$paginator = new Pagination("challenges", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=challenges&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Dares</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<!--row start-->
        <div class="row">
			<!--col-md-12 start-->
			<div class="col-md-12">
			<div class="box-info">
			<?php if ($_GET['challengeid']){?>
			<h3>Update Challenge</h3>
              <hr>
			  <!--form-horizontal row-border start-->
              <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="save_challenge" value="<?php echo $challenge_info['id']; ?>">
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Challenge By : <?php echo get_username($challenge_info['user_a']); ?></span>
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Challenge Taker (User ID)</span>
							<input type="text" class="form-control" name="user_b" value="<?php echo $challenge_info['user_b']; ?>" placeholder="User ID">
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Money</span>
							<input type="text" class="form-control" name="money" value="<?php echo $challenge_info['money']; ?>" placeholder="Money">
						</div>
					</div>
				</div>
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Content</label>
					<div class="col-sm-12">
						<textarea class="form-control ceditor" name="content"><?php echo $challenge_info['content']; ?></textarea>
					</div>
				</div>
				<div class="clearfix"></div>				
				
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Proof</label>
					<div class="col-sm-12">
						<textarea class="form-control ceditor" name="proof"><?php echo $challenge_info['proof']; ?></textarea>
					</div>
				</div>
				
				<div class="clearfix"></div>
				<br>
				
				<input type="submit" class="btn-primary btn" value="Approve Dare">
				<button class="btn-primary btn">Close Challenge ( Without Winner )</button>
				<a class="btn" href='./?view=challenges&challengeid=<?php echo $challenge_info['id']; ?>&winner=<?php echo $challenge_info['user_b']; ?>'>Set Challenge Complete( Winner )</a>
				
			  </form><!--form-horizontal row-border end-->
			 
			 	<script type="text/javascript">
				$(document).ready(
					function()
					{
						$('.ceditor').redactor();
					}
				);
				</script>
				 <?php } ?>
            </div>
			</div>
		</div>
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Dares List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>							
							<th>Challenge By</th>
							<th>Challenge Taker</th>
							<th>Money In</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_challenges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM challenges ORDER BY id ASC");
						
						$n = 0;
						for ($x=0; $x < $count_challenges; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $n; ?>">
							<td width="10%" class="center"><?php echo $n; ?></td>
							<td width="20%"><?php echo get_username($r['user_a']); ?></td>
							<td width="20%"><?php echo get_username($r['winner']); ?></td>
							<td width="5%"><?php echo $r['money']; ?></td>
							<td>
							<?php 
							if ($r['status'] == 0 ) {
								echo "Pending Approval";
							} else if ($r['status'] == 1 ) {
								echo "Approved";
							} else if ($r['status'] == 2 ) {
								echo "<a class='btn' href='index.php?view=challenges&challengeid=".$r['id']."'>Verify Challenge</a>";
							} else if ($r['status'] == 3 ) {
								echo "Challenge Done";
							} 
							?>
							</td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=challenges&challengeid=<?php echo $r['id']; ?>">Info</a>
								<button class="btn btn-danger delete-challenge" data-challenge="<?php echo $r['id']; ?>" type="button">Delete</button>
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
					<tbody>
				</table>
				<script>
				(function($) {
					$( ".delete-challenge" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.challenge).slideUp();
					  $.post( "index.php?view=challenges", { delete_challenge: "yes", challenge_id: info.challenge } );
					});
				})(jQuery);
				</script>
			</div>
		</div>
		</div>
		</div>
	<?php		
	
	include ('footer.php');
	
	?>