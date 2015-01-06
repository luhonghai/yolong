<?php

	if( $_POST['delete_membership'] ){
		$db->delete("memberships", "id=" . $_POST['membership_id']);
		die();
	}

	if( $_POST['new_membership'] ){
		$data = array("name" => $_POST['name'] , "description" => $_POST['description'] , "time" => $_POST['time'] , "price" => $_POST['price'], "active" => $_POST['active'] );
		$insert = $db->insert("memberships", $data);
	}
	
	if( $_POST['update_membership'] ){
		$data = array("name" => $_POST['name'] , "description" => $_POST['description'] , "time" => $_POST['time'] , "price" => $_POST['price'] );
		$insert = $db->update("memberships", $data, 'id='.$_GET['membershipid']);
	}
	
	$edit_membership = 'false';
	
	if ( $_GET['membershipid'] ){
		$edit_membership = 'true';
	}
	
	$paginator = new Pagination("memberships", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=memberships&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
	
?>
<!--row start-->
<div class="row">
    <!--col-md-12 start-->
    <div class="col-md-12">
        <div class="page-heading">
			<h1>Memberships</h1>
		</div>
	</div><!--col-md-12 end-->
	<div class="col-md-9">
		<label class="col-sm-3 control-label">Standard Membership</label>
		<div class="col-sm-9">
			<div class="input-group">
				<select class="form-control" id="standard_membership" name="standard_membership">
				<?php
				$d = $db->query("SELECT * FROM memberships");
				$count_m = $db->fetchOne("SELECT COUNT(*) AS NUM FROM memberships ORDER BY id ASC");
				for ($x=0; $x < $count_m; $x++) {
					if ($r = $db->fetch_array($d)) {
				?> 
					<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == get_option('standard_membership')) ? "selected='selected'" : ''; ?>><?php echo $r['name'] . ' - ' . $r['price']; ?></option>
				<?php
					}
				}
				?>
				</select>
				<div class="input-group-btn">
					<button type="button" data-option="standard_membership" class="btn btn-primary update">Update</button>
				</div>
			</div>
		</div>
		<script>
			(function($) {
				$( ".update" ).click(function() {
					var info = $( this ).data();
					var getvalue = $('#' + info.option).val();
					$.post( "index.php?view=update-settings", { field: info.option, value: getvalue } );	  
					$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
				});
			})(jQuery);
		</script>
	</div>
</div><!--row end-->
		<!--row start-->
		
		<?php if ( $edit_membership == 'false' ) {?>
		
        <div class="row">
			<div class="col-md-12">
			<div class="page-heading">
              <h1>New Memberships</h1>
            </div>
			<!--col-md-12 start-->
			<form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="new_membership" value="yes">
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Name</span>
							<input type="text" class="form-control" name="name" value="" placeholder="Name">
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Time</span>
							<input type="text" class="form-control" name="time" value="" placeholder="Time in days">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Description</span>
							<input type="text" class="form-control" name="description" value="" placeholder="Description">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Price</span>
							<input type="text" class="form-control" name="price" value="" placeholder="Price">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<span class="btn">Active For Users <input type="checkbox" name="active" value="1" style="display:block;">
						</span>			
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary">Add Membership</button>
				</div>
			</form>
		</div>
		</div>
		
		<?php } else if ( $edit_membership == 'true' ){
		
		$membership_info = $db->fetchRow("SELECT * FROM memberships WHERE id=" . $_GET['membershipid']);
		
		?>
		<div class="row">
			<div class="col-md-12">
			<div class="page-heading">
              <h1>Edit Memberships</h1>
            </div>
			<!--col-md-12 start-->
			<form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="update_membership" value="yes">
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Membership Name</span>
							<input type="text" class="form-control" name="name" value="<?php echo $membership_info['name']; ?>" placeholder="Name">
						</div>
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Membership Time</span>
							<input type="text" class="form-control" name="time" value="<?php echo $membership_info['time']; ?>" placeholder="Time in days">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Membership Description</span>
							<input type="text" class="form-control" name="description" value="<?php echo $membership_info['description']; ?>" placeholder="Description">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Membership Price</span>
							<input type="text" class="form-control" name="price" value="<?php echo $membership_info['price']; ?>" placeholder="Price">
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<div class="col-sm-12">
						<div class="input-group"> 
							<span class="input-group-addon">Active For Users <input type="checkbox" name="active" value="1" <?php echo ($membership_info['name'] == 1) ? 'checked' : ''; ?>></span>						
						</div>
					</div>
				</div>
				
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary">Update Membership</button>
				</div>
			</form>
		</div>
		</div>
		
		<?php } ?>
		
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Pages List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Time ( Days )</th>
							<th>Price</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_memberships = $db->fetchOne("SELECT COUNT(*) AS NUM FROM memberships ORDER BY id ASC");
						
						$n = 0;
						for ($x=0; $x < $count_memberships; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $n; ?>">
							<td width="5%" class="center"><?php echo $n; ?></td>
							<td><?php echo $r['name']; ?></td>
							<td><?php echo $r['time']; ?></td>
							<td><?php echo $r['price']; ?></td>
							<td><?php echo $r['active']; ?></td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=memberships&membershipid=<?php echo $r['id']; ?>">Edit</a>
								<button class="btn btn-danger delete-membership" data-membership="<?php echo $r['id']; ?>" type="button">Delete</button>
							</td>
						</tr>
						<?php	
							}
						}
						if ($paginator->totalResults() == 0) {
						?>
						<tr>
							<td colspan='6' align='center'>Records not found</td>
						</tr>
						<?php	
						}
						?>
					<tbody>
				</table>
				<script>
				(function($) {
					$( ".delete-membership" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.membership).slideUp();
					  $.post( "index.php?view=memberships", { delete_membership: "yes", membership_id: info.membership } );
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