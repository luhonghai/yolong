
<?php
	$post_id = $_GET['postid'];
	
	if( $_POST['conf_edit'] ){
		$anonymous = $_POST['anonymous'];
		if ($anonymous == "") $anonymous = 0 ;
		$data = array( "anonymous" => $anonymous , "title" => $_POST['title'] , "content" => $_POST['content'], "image" => $_POST['image'] );
		$insert = $db->update("posts", $data, "id=".$post_id);
	}
	
	
	$post_info = $db->fetchRow("SELECT * FROM posts WHERE id=" . $post_id);
?>

<h3>Edit Confession</h3>
<form method="POST" action="#" class="form">
	<input type="hidden" name="conf_edit" value='true'>
	<div class="form-group col-md-6">                               
		<input type="text" placeholder="Title" name="title" value="<?php echo $post_info['title']; ?>" class="vc_input-inverse">
	</div>   
	<div class="form-group col-md-6">  
		<label class="checkbox">
			<input type="checkbox" name="anonymous" value='1' <?php echo ( $post_info['anonymous'] == 1 ) ? "checked" : "" ;?>>
			<small>Anonymous Confession</small> 
		</label>
	</div>
	<div class="clearfix"></div>
	<div class="form-group col-md-12">                               
		<input type="text" placeholder="Image URL" name="image" value="<?php echo $post_info['image']; ?>" class="vc_input-inverse">
	</div>
	<div class="clearfix"></div>
	<div class="form-group col-md-12">  
	<textarea name="content" rows="4" class="ceditor"><?php echo $post_info['content']; ?></textarea>
	</div>
	
	<div class="form-group col-md-3">
		<button type="submit" class="btn btn-primary btn-block">Update Confession</button>
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