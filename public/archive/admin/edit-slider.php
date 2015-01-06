<?php
	$slider_id = $_GET['sliderid'];
	
	if( $_POST['slide_add'] ){
		$data = array("slider_id" => $_POST['slider_id'], "image" => $_POST['new_slide_image'], "content" => $_POST['new_slide_content']);
		$insert = $db->insert("slides", $data);
	}
	
	if( $_POST['delete_slide'] ){
		$db->delete("slides", "id=" . $_POST['slide_id']);
	}
	
	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>Edit Slider</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->
<div class="row">
	<div class="col-md-12">
		<div class="box-info">
            <h3>Add Slide</h3>
            <hr>
			<!--form-horizontal row-border start-->
            <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="slide_add" value="yes">
				<input type="hidden" name="slider_id" value="<?php echo $slider_id; ?>">
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Slide Image</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="new_slide_image">
					</div>
				</div>
			  
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Slide Content</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="new_slide_content"></textarea>
					</div>
				</div>
			 
				<input type="submit" class="btn-primary btn" value="Add New Slide">
			</form><!--form-horizontal row-border end-->
			<!--row start-->
        </div>
	</div>
</div>

	<?php
	$q = $db->query("SELECT * FROM slides");	
	$count_slides = $db->fetchOne("SELECT COUNT(*) AS NUM FROM slides ORDER BY id ASC");
	
	$n = 0;
	for ($x=0; $x < $count_slides; $x++) {
		if ($r = $db->fetch_array($q)) {
		$n++;
	?>
	<div class="row" id="slide<?php echo $r['id']; ?>">
	<div class="col-md-12">
		<div class="box-info">
            <h3>Edit Slide <?php echo $n; ?></h3>
            <hr>
			<!--form-horizontal row-border start-->
            <form method="POST" action="#" class="form-horizontal row-border">
				<input type="hidden" name="slide_edit" value="yes">
				<input type="hidden" name="slide_id" value="<?php echo $r['id']; ?>">
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Slide Image</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="slide_image" value="<?php echo $r['image']; ?>">
					</div>
				</div>
			  
				<div class="form-group col-md-12">
					<label class="col-sm-3 control-label">Slide Content</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="slide_content"><?php echo $r['content']; ?></textarea>
					</div>
				</div>
			 
				<input type="submit" class="btn-primary btn" value="Update Slide">
				<button type="button" data-option="<?php echo $r['id']; ?>" class="btn btn-danger delete-slide">Delete Slide</button>
			</form><!--form-horizontal row-border end-->
			<!--row start-->
        </div>
	</div>
	</div>
	<?php	
	}
	}
	if ($paginator->totalResults() == 0) {
	?>
		<div class="row">
			<!--col-md-12 start-->
			<div class="col-md-12">
				<div class="box-info">
					<h3>No Slides Available</h3>
				</div>
			</div>
		</div>
	<?php	
	}
	?>
	<script>
	(function($) {
		$( ".delete-slide" ).click(function() {
			var info = $( this ).data();
			$('#slide' + info.option).slideUp();
			$.post( "index.php?view=edit-slider", { delete_slide: "yes", slide_id: info.option } );
		});
	})(jQuery);
	</script>	
	<?php	
			
	include ('footer.php');	
?>