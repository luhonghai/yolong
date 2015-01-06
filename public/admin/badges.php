<?php
	
	if( $input->pc['delete_badge'] ){
			
		$delete = $db->delete("badges", "id=".$input->pc['delete_badge']);
	}
	
	if( $input->pc['update_badge'] ){
	
		$name = $input->pc['name'];
		$image = $input->pc['image'];
		
		$data = array(
			"name" => $name , 
			"image" => $image);
			
		$insert = $db->update("badges", $data, "id=".$input->pc['update_badge']);
	
	}
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Badges</h3>
	</div>
    <div class="col-sm-6 text-right text-left-xs m-t-md">
        <div class="btn-group"> <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
            <ul class="dropdown-menu text-left pull-right">
                <li><a href="#">Notification</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Analysis</a></li>
                <li class="divider"></li>
                <li><a href="#">More settings</a></li>
            </ul>
        </div>
		<a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a> 
		<a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a> 
	</div>
</section>

<section class="panel panel-default" id="append-badge">
    <header class="panel-heading font-bold"> Add New Badge </header>
	<div class="panel-body">
        <form role="form" method="post" id="new_badge">
		
			<input name="add_badge" type="hidden" value="true">
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Badge Name</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="name" placeholder="Name">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Badge Image</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="image" placeholder="Image URL">
						</div>
					</div>
				</div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>		
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button type="reset" class="btn btn-default">Cancel</button>
					<button class="btn btn-success add_badge">Add Badge</button>
                </div>
            </div>
		</form>
	</div>
</section>	

 <?php
$gs = $db->query("SELECT * FROM badges");
				
$n = 0;				
for ($x=0; $x < count_rows('badges'); $x++) {				
	if ($r = $db->fetch_array($gs)) {
	$n++;
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
							<input type="text" class="form-control" name="duration" id="edit-image-<?php echo $r['id']; ?>" placeholder="Image URL" value="<?php echo $r['image']; ?>">
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
<?php	
	}
}
?>
<script>
$(document).ready(
	function(){
		
		var form = $('#new_badge');
		var submit = $('.add_badge');

		$( ".add_badge" ).click(function() {
		// prevent default action
			// send ajax request
						
			$.ajax({
				url: 'index.php?view=moderate-badges',
				type: 'POST',
				cache: false,
				data: form.serialize(), //form serizlize data
				beforeSend: function(){
					// change submit button value text and disabled it
					submit.val('Saving...').attr('disabled', 'disabled');
				},
				success: function(data){
				
					// Append with fadeIn see http://stackoverflow.com/a/978731
					var item = $(data).hide().fadeIn(800);
					$('#append-badge').after(item);
					
					// reset form and button
					form.trigger('reset');
					submit.val('Save').removeAttr('disabled');
				},
				error: function(e){
					alert(e);
				}
			});
		});
		
		$( ".delete-badge" ).click(function() {
			var info = $( this ).data();
			$('.su' + info.id).slideUp();
			$.post( "index.php?view=badges", { delete_badge: info.id } );
		});
		
		$( ".update-badge" ).click(function() {
			var info = $( this ).data();
			
			var badge_n = $('#edit-name-' + info.id).val();
			var badge_i = $('#edit-image-' + info.id).val();
			
			var m_active = '';
			
			if ( badge_v == true ) {
				m_active = 1;
			} else {
				m_active = 0;
			}
			
			$.post( "index.php?view=badges", { update_badge: info.id , name: badge_n , image: badge_i } );
		});
		
	});
</script>		
<?php include('footer.php'); ?>