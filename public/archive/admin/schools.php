<?php
	if( $_POST['school_add'] ){
		$data = array("school_name" => $_POST['school_name'] , "school_location" => $_POST['school_location'] );
		$insert = $db->insert("schools", $data);
	}
	
	if( $_POST['delete_school'] ){
		$db->delete("schools", "id=" . $_POST['school_id']);
	}

	$paginator = new Pagination("schools", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=schools&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Schools</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<!--row start-->
        <div class="row">
			<!--col-md-12 start-->
			<div class="col-md-12">
			<div class="box-info">
              <h3>Add School</h3>
              <hr>
			  <!--form-horizontal row-border start-->
              <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="school_add" value="yes">
				<div class="form-group col-md-6">
					<label class="col-sm-3 control-label">School Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="school_name">
					</div>
				</div>
			  
				<div class="form-group col-md-6">
					<label class="col-sm-3 control-label">School Location</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="school_location">
					</div>
				</div>
			 
				<input type="submit" class="btn-primary btn" value="Add School">
			  </form><!--form-horizontal row-border end-->
			  <!--row start-->
            </div>
			</div>
		</div>
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Schools List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>School Name</th>
							<th>School Location</th>
							<th>Confessions</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_schools = $db->fetchOne("SELECT COUNT(*) AS NUM FROM schools ORDER BY id ASC");
						$n = 0;
						for ($x=0; $x < $count_schools; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $r['id']; ?>">
							<td width="10%" class="center"><?php echo $n; ?></td>
							<td><?php echo $r['school_name']; ?></td>
							<td><?php echo $r['school_location']; ?></td>
							<td class="center"><?php echo $r['confessions']; ?></td>
							<td width="10%"><button class="btn btn-danger delete-school" data-school="<?php echo $r['id']; ?>" type="button">Delete</button></td>
						</tr>
						<?php	
							}
						}
						if ($paginator->totalResults() == 0) {
						?>
						<tr>
							<td colspan='4' align='center'>Records not found</td>
						</tr>
						<?php	
						}
						?>
					<tbody>
				</table>
				<script>
				(function($) {
					$( ".delete-school" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.school).slideUp();
					  $.post( "index.php?view=schools", { delete_school: "yes", school_id: info.school } );
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