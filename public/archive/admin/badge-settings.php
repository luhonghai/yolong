<?php
    if( $_POST['badge_add'] ){
		echo "are anac sa";
		$data = array("name" => $_POST['name'], "image" => $_POST['image'], "require_for" => $_POST['require'], "option_one" => $_POST['option_one'], "option_two" => $_POST['option_two'] );
		$insert = $db->insert("badges", $data);
	}
	
	if( $_POST['update_badge'] ){
		$data = array("name" => $_POST['name'], "image" => $_POST['image'], "require_for" => $_POST['require'], "option_one" => $_POST['option_one'], "option_two" => $_POST['option_two']);
		$update = $db->update("badges", $data, 'id='.$_GET['badgeid']);
	}
	
	if( $_POST['delete_badge'] ){
		$db->delete("badges", "id=" . $_POST['badge_id']);
	}
	
	$edit_badge = 'false';
	
	if ( $_GET['badgeid'] ) {
	
		$edit_badge = 'true';
	
	}	
	
	$paginator = new Pagination("badges", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=badge-settings&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>Badges</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->
<div class="row">
	<?php if ( $edit_badge == 'false' ) {?>
	<div class="col-md-12">
		<div class="box-info">
            <h3>New Badge</h3>
            <hr>
			<!--form-horizontal row-border start-->
            <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="badge_add" value="yes">
				
				<div class="form-group col-md-12">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Name :</span>
							<input type="text" class="form-control" name="name">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Image :</span>
							<input type="text" class="form-control" name="image">
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Received For :</span>
							<select id="badge_for" name="require" class="form-control">
								<option value="1">Confessions</option>
								<option value="2">Points</option>
								<option value="3">Chalanges</option>
								<option value="4">Registration Date</option>
								<option value="5">Other(Manual Add To User)</option>
							</select>
						</div>
					</div>
				</div>
				
				
				<div class="form-group col-md-6 option_one">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon option_one_text">From :</span>
							<input type="text" class="form-control" name="option_one">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6 option_two">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon option_two_text">To :</span>
							<input type="text" class="form-control" name="option_two">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-12">
					<input type="submit" class="btn-primary btn" value="Add New Badge">
				</div>
			</form><!--form-horizontal row-border end-->
			<!--row start-->	
        </div>
	</div>
	<?php } else if ( $edit_badge == 'true' ){
		
		$badge_info = $db->fetchRow("SELECT * FROM badges WHERE id=" . $_GET['badgeid']);
		
	?>
	<div class="col-md-12">
		<div class="box-info">
            <h3>Update Badge</h3>
            <hr>
			<!--form-horizontal row-border start-->
            <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="update_badge" value="yes">
				
				<div class="form-group col-md-12">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Name :</span>
							<input type="text" class="form-control" name="name" value="<?php echo $badge_info['name']; ?>">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Image :</span>
							<input type="text" class="form-control" name="image" value="<?php echo $badge_info['image']; ?>">
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Received For :</span>
							<select id="badge_for" name="require" class="form-control">
								<option value="1" <?php echo ($badge_info['option_one'] == 1) ? 'selected="selected"' : ''; ?>>Confessions</option>
								<option value="2" <?php echo ($badge_info['option_one'] == 2) ? 'selected="selected"' : ''; ?>>Points</option>
								<option value="3" <?php echo ($badge_info['option_one'] == 3) ? 'selected="selected"' : ''; ?>>Chalanges</option>
								<option value="4" <?php echo ($badge_info['option_one'] == 4) ? 'selected="selected"' : ''; ?>>Registration Date</option>
								<option value="5" <?php echo ($badge_info['option_one'] == 5) ? 'selected="selected"' : ''; ?>>Other(Manual Add To User)</option>
							</select>
						</div>
					</div>
				</div>
				
				
				<div class="form-group col-md-6 option_one">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon option_one_text">From :</span>
							<input type="text" class="form-control" name="option_one" value="<?php echo $badge_info['option_one']; ?>">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6 option_two">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon option_two_text">To :</span>
							<input type="text" class="form-control" name="option_two" value="<?php echo $badge_info['option_two']; ?>">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-12">
					<input type="submit" class="btn-primary btn" value="Update Badge">
				</div>
			</form><!--form-horizontal row-border end-->
			<!--row start-->	
        </div>
	</div>
	
	<?php } ?>
	
	 <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Posts List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>							
							<th>Name</th>
							<th>Users Having it</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_badges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM badges ORDER BY id ASC");
						
						$n = 0;
						for ($x=0; $x < $count_badges; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $n; ?>">
							<td width="5%" class="center"><?php echo $r['id']; ?></td>
							<td><?php echo $r['name']; ?></td>
							<td>0</td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=badge-settings&badgeid=<?php echo $r['id']; ?>">Edit</a>
								<button class="btn btn-danger delete-badge" data-badge="<?php echo $r['id']; ?>" type="button">Delete</button>
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
			</div>
		</div>
		</div>
</div>
<script>
	(function($) {
		$( ".delete-badge" ).click(function() {
			var info = $( this ).data();
			$('#badge' + info.badge).slideUp();
			$.post( "index.php?view=badge-settings", { delete_badge: "yes", badge_id: info.badge } );
		});
		
		$( "#badge_for" ).change(function () {
			var getOpt = $( "#badge_for option:selected" ).val();
					
			if (getOpt == 1){
				$( ".option_one" ).slideDown();
				$( ".option_two" ).slideDown();
				$( ".option_one_text" ).text( "From 'n' Confessions" );
				$( ".option_two_text" ).text( "To 'n' Confessions" );
			} else if (getOpt == 2){
				$( ".option_one" ).slideDown();
				$( ".option_two" ).slideDown();
				$( ".option_one_text" ).text( "From 'n' Points" );
				$( ".option_two_text" ).text( "To 'n' Points" );
			} else if (getOpt == 3){
				$( ".option_one" ).slideDown();
				$( ".option_two" ).slideDown();
				$( ".option_one_text" ).text( "From 'n' Chalanges" );
				$( ".option_two_text" ).text( "To 'n' Chalanges" );
			} else if (getOpt == 4){
				$( ".option_one" ).slideDown();
				$( ".option_two" ).slideDown();
				$( ".option_one_text" ).text( "From (eg. 1Year)" );
				$( ".option_two_text" ).text( "To (eg. 2Years)" );
			} else if (getOpt == 5){
				$( ".option_one" ).slideUp();
				$( ".option_two" ).slideUp();
			}
		}).change();
	})(jQuery);
</script>	
<?php			
	include ('footer.php');	
?>