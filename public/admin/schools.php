<?php
	
	if( $input->pc['delete_school'] ){
			
		$delete = $db->delete("schools", "id=".$input->pc['delete_school']);
	}
	
	if( $input->pc['update_school'] ){
	
		$school_name = $input->pc['name'];
		$school_state = $input->pc['state'];
		$school_city = $input->pc['city'];
		
		$data = array(
			"name" => $school_name ,
			"state" => $school_state ,
			"city" => $school_city );
			
		$insert = $db->update("schools", $data, "id=".$input->pc['update_school']);
	
	}
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Schools</h3>
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

<section class="panel panel-default" id="append-school">
    <header class="panel-heading font-bold"> Add New School </header>
	<div class="panel-body">
        <form class="form-inline" role="form" method="post" id="new_school">
			<input name="add_school" type="hidden" value="true">
            <div class="form-group">
                <label class="sr-only">School Name</label>
                <input type="text" name="name" class="form-control" placeholder="School Name">
            </div>
			<div class="form-group">
                <label class="sr-only">School State</label>
                <input type="text" name="state" class="form-control" placeholder="School State">
            </div>
			<div class="form-group">
				<label class="sr-only">School City</label>
				<input type="text" name="city" class="form-control" placeholder="School City">
			</div>
			<button type="submit" class="btn btn-success add_school">Add School</button>
		</form>
	</div>
</section>	

 <?php
$gs = $db->query("SELECT * FROM schools");
				
$n = 0;				
for ($x=0; $x < count_rows('schools'); $x++) {				
	if ($r = $db->fetch_array($gs)) {
	$n++;
?>

<section class="panel panel-default su<?php echo $r['id']; ?>" >
    <header class="panel-heading font-bold"> School #<?php echo $n; ?> </header>
	<div class="panel-body">
        <form class="form-inline" role="form" method="post">
            <div class="form-group">
                <label class="sr-only">School Name</label>
                <input type="text" name="school_name" class="form-control" placeholder="School Name" id="edit-name-<?php echo $r['id']; ?>" value="<?php echo $r['name']; ?>">
            </div>
			<div class="form-group">
				<label class="sr-only">School State</label>
				<input type="text" name="school_location" class="form-control" placeholder="School State" id="edit-state-<?php echo $r['id']; ?>" value="<?php echo $r['state']; ?>">
			</div>
			<div class="form-group">
				<label class="sr-only">School City</label>
				<input type="text" name="school_location" class="form-control" placeholder="School City" id="edit-city-<?php echo $r['id']; ?>" value="<?php echo $r['city']; ?>">
			</div>
			<a class="btn btn-success update-school" data-id="<?php echo $r['id']; ?>">Update School</a>
			<a class="btn btn-danger delete-school" data-id="<?php echo $r['id']; ?>">Delete School</a>
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
		
			var form = $('#new_school');
			var submit = $('.add_school');

			form.on('submit', function(e) {
			// prevent default action
				e.preventDefault();
				// send ajax request
						
				$.ajax({
					url: 'index.php?view=moderate-schools',
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
						$('#append-school').after(item);
						
						// reset form and button
						form.trigger('reset');
						submit.val('Save').removeAttr('disabled');
					},
					error: function(e){
						alert(e);
					}
				});
			});
		
		$( ".delete-school" ).click(function() {
			var info = $( this ).data();
			$('.su' + info.id).slideUp();
			$.post( "index.php?view=schools", { delete_school: info.id } );
		});
		
		$( ".update-school" ).click(function() {
			var info = $( this ).data();
			
			school_n = $('#edit-name-' + info.id).val();
			school_s = $('#edit-state-' + info.id).val();
			school_c = $('#edit-city-' + info.id).val();
			
			$.post( "index.php?view=schools", { update_school: info.id , name: school_n , state: school_s , city: school_c } );
			
			$( this ).fadeTo( "slow", 0.33 ).html('Updating...').delay( 1200 ).fadeTo( "slow", 1 ).html('Update School');
		});
		
	});
</script>		
<?php include('footer.php'); ?>