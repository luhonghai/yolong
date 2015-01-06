<?php

	if( $_POST['delete_dare'] ){
		$db->delete("dares", "id=" . $_POST['dare_id']);
	}
		

	
	if( $_POST['save_dare'] ){
		$data = array("user_b" => $_POST['user_b'] , "money" => $_POST['money'] , "content" => $_POST['content'] , "proof" => $_POST['proof'] , "status" => 1 );
		$update = $db->update("dares", $data, "id=".$_POST['save_dare']);
		
		header("Location: /admin/index.php?view=dares&dareid=".$_POST['save_dare']);
	}
	
	$dare_id = $_GET['dareid'];	
	$dare_info = $db->fetchRow("SELECT * FROM dares WHERE id=" . $dare_id);
	
	if ( $_GET['winner'] ){
		$user_money = userinfo($_GET['winner']);
	
		$udata = array("money" => $dare_info['money'] + $user_money['money']);
		$update = $db->update("users", $udata, "id=".$_GET['winner']);
		
		header("Location: /admin/index.php?view=dares&dareid=".$dare_id);
	
	}	
	
	$paginator = new Pagination("dares", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=dares&" . $adlink);
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
			<?php if ($_GET['dareid']){?>
			<h3>Update Dare</h3>
              <hr>
			  <!--form-horizontal row-border start-->
              <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="save_dare" value="<?php echo $dare_info['id']; ?>">
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Dare By : <?php echo get_username($dare_info['user_a']); ?></span>
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">User Dared (User ID)</span>
							<input type="text" class="form-control" name="user_b" value="<?php echo $dare_info['user_b']; ?>" placeholder="User ID">
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Money</span>
							<input type="text" class="form-control" name="money" value="<?php echo $dare_info['money']; ?>" placeholder="Money">
						</div>
					</div>
				</div>
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Content</label>
					<div class="col-sm-12">
						<textarea class="form-control ceditor" name="content"><?php echo $dare_info['content']; ?></textarea>
					</div>
				</div>
				<div class="clearfix"></div>				
				
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Proof</label>
					<div class="col-sm-12">
						<textarea class="form-control ceditor" name="proof"><?php echo $dare_info['proof']; ?></textarea>
					</div>
				</div>
				
				<div class="clearfix"></div>
				<br>
				
				<input type="submit" class="btn-primary btn" value="Approve Dare">
				<button class="btn-primary btn">Close Dare ( Without Winner )</button>
				<a class="btn" href='./?view=dares&dareid=<?php echo $dare_info['id']; ?>&winner=<?php echo $dare_info['user_a']; ?>'>Set Winner (A User)</a>
				<a class="btn" href='./?view=dares&dareid=<?php echo $dare_info['id']; ?>&winner=<?php echo $dare_info['user_b']; ?>'>Set Winner (B User)</a>
				
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
							<th>Dare By</th>
							<th>User Dared</th>
							<th>Period</th>
							<th>Money In</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_dares = $db->fetchOne("SELECT COUNT(*) AS NUM FROM dares ORDER BY id ASC");
						
						$n = 0;
						for ($x=0; $x < $count_dares; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $n; ?>">
							<td width="10%" class="center"><?php echo $n; ?></td>
							<td width="20%"><?php echo get_username($r['user_a']); ?></td>
							<td width="20%"><?php echo get_username($r['user_b']); ?></td>
							<td width="20%"><?php echo $r['time_finish']; ?></td>
							<td width="5%"><?php echo $r['money']; ?></td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=dares&dareid=<?php echo $r['id']; ?>">Info</a>
								<button class="btn btn-danger delete-dare" data-dare="<?php echo $r['id']; ?>" type="button">Delete</button>
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
					$( ".delete-dare" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.dare).slideUp();
					  $.post( "index.php?view=dares", { delete_dare: "yes", dare_id: info.dare } );
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