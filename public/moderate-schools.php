<?php
	
	if( $input->pc['add_school'] ){
	
		$school_name = $input->pc['name'];
		$school_state = $input->pc['state'];
		$school_city = $input->pc['city'];
		
		$timenow = time();
		
		$data = array(
			"name" => $school_name , 
			"state" => $school_state ,
			"city" => $school_city ,
			"time" => $timenow );
			
		$insert = $db->insert("schools", $data);
		
		$school_info = $db->fetchRow("SELECT * FROM schools WHERE time=" . $timenow);
	?>
	
	<section class="panel panel-default su<?php echo $school_info['id']; ?>" >
    <header class="panel-heading font-bold"> New School </header>
	<div class="panel-body">
        <form class="form-inline" role="form" method="post">
            <div class="form-group">
                <label class="sr-only">School Name</label>
                <input type="text" name="school_name" class="form-control" placeholder="School Name" id="edit-name-<?php echo $school_info['id']; ?>" value="<?php echo $school_info['name']; ?>">
            </div>
			<div class="form-group">
				<label class="sr-only">School State</label>
				<input type="text" name="school_state" class="form-control" placeholder="School State" id="edit-state-<?php echo $school_info['id']; ?>" value="<?php echo $school_info['state']; ?>">
			</div>
			<div class="form-group">
				<label class="sr-only">School Ciry</label>
				<input type="text" name="school_city" class="form-control" placeholder="School City" id="edit-city-<?php echo $school_info['id']; ?>" value="<?php echo $school_info['city']; ?>">
			</div>
			<a class="btn btn-success update-school" data-id="<?php echo $school_info['id']; ?>">Update School</a>
			<a class="btn btn-danger delete-school" data-id="<?php echo $school_info['id']; ?>">Delete School</a>
		</form>
	</div>
</section>	
	
<?php } ?>