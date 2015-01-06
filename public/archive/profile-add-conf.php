
<?php

	if( $_POST['conf_add'] ){
		$anonymous = $_POST['anonymous'];
		if ($anonymous == "") $anonymous = 0 ;
		$data = array("user_id" => $user_info['id'] , "anonymous" => $anonymous , "title" => $_POST['title'] , "content" => $_POST['content'] ,"image" => $_POST['image'] , "date" => time() , "published" => 0);
		$insert = $db->insert("posts", $data);
	}
?>

<h3>Add Confession</h3>
<form method="POST" action="#" class="form">
	<input type="hidden" name="conf_add" value='true'>
	<div class="form-group col-md-6">                               
		<input type="text" placeholder="Title" name="title" class="vc_input-inverse">
	</div>   
	<div class="form-group col-md-6">  
		<label class="checkbox">
			<input type="checkbox" name="anonymous" value='1'>
			<small>Anonymous Confession</small> 
		</label>
	</div>
	<div class="clearfix"></div>
	<div class="form-group col-md-6">                               
		<input type="text" placeholder="Image URL" name="image" class="vc_input-inverse">
	</div> 
	<div class="form-group col-md-6">                               
		<input type="text" placeholder="YouTube URL" name="youtube" class="vc_input-inverse">
	</div> 
	<div class="clearfix"></div>
	<div class="form-group col-md-12">  
	<textarea name="content" rows="4" class="ceditor"></textarea>
	</div>
	
	<div class="form-group col-md-3">
		<button type="submit" class="btn btn-primary btn-block">Add Confession</button>
	</div>
</form>
<script type="text/javascript">
$(document).ready(
	function()
	{
		$('.ceditor').redactor();
	}
);
</script>