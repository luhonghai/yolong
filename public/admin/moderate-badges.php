<?php
	
	if( $input->pc['add_badge'] ){
	
		$name = $input->pc['name'];
		$image = $input->pc['image'];
		$timenow = time();
		
		$data = array(
			"name" => $name , 
			"image" => $image,
			"unique_id" => $timenow);
			
		$insert = $db->insert("badges", $data);
		
		$r = $db->fetchRow("SELECT * FROM badges WHERE unique_id=" . $timenow);
	?>
	
<section class="panel panel-default su<?php echo $r['id']; ?>">
    <header class="panel-heading font-bold"> <?php echo $r['name']; ?> </header>
	<div class="panel-body">
        <form role="form" method="post" id="new_school">
		
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Badge Name</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="name" id="edit-name-<?php echo $r['id']; ?>" placeholder="Name" value="<?php echo $r['name']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Badge Image</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="image" id="edit-image-<?php echo $r['id']; ?>" placeholder="Image URL " value="<?php echo $r['image']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>		
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <a data-id="<?php echo $r['id']; ?>" class="btn btn-default delete-badge">Delete</a>
					<a data-id="<?php echo $r['id']; ?>" class="btn btn-success update-badge">Update Badge</a>
                </div>
            </div>
		</form>
	</div>
</section>	
	
<?php } ?>