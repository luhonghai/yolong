<?php
	if( $_POST['slider_add'] ){
		$data = array("name" => $_POST['slider_name']);
		$insert = $db->insert("sliders", $data);
	}
	
	if( $_POST['delete_slider'] ){
		$db->delete("sliders", "id=" . $_POST['slider_id']);
	}

	$paginator = new Pagination("sliders", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=sliders&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Sliders</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<!--row start-->
        <div class="row">
			<!--col-md-12 start-->
			<div class="col-md-12">
			<div class="box-info">
              <h3>Add Slider</h3>
              <hr>
			  <!--form-horizontal row-border start-->
              <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="slider_add" value="yes">
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Slider Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="slider_name">
					</div>
				</div>
			 
				<input type="submit" class="btn-primary btn" value="Add Slider">
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
              <h4>Sliders List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Slider Name</th>
							<th>Slides</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_sliders = $db->fetchOne("SELECT COUNT(*) AS NUM FROM sliders ORDER BY id ASC");
						$n = 0;
						for ($x=0; $x < $count_sliders; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $r['id']; ?>">
							<td width="10%" class="center"><?php echo $n; ?></td>
							<td><?php echo $r['name']; ?></td>
							<td><?php echo count_slides($r['id']); ?></td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=edit-slider&sliderid=<?php echo $r['id']; ?>">Edit</a>
								<button class="btn btn-danger delete-slider" data-slider="<?php echo $r['id']; ?>" type="button">Delete</button>
							</td>
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
					$( ".delete-slider" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.slider).slideUp();
					  $.post( "index.php?view=sliders", { delete_slider: "yes", slider_id: info.slider } );
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