<?php
	$slider_id = $input->gc['sliderid'];
	
	if( $_POST['slide_add'] ){
		$data = array("slider_id" => $_POST['slider_id'], "image" => $_POST['new_slide_image'], "content" => $_POST['new_slide_content']);
		$insert = $db->insert("slides", $data);
	}
	
	if( $_POST['delete_slide'] ){
		$db->delete("slides", "id=" . $_POST['slide_id']);
	}
	
	$sn = $db->fetchOne("SELECT name FROM sliders WHERE id='$slider_id'");
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Sliders</h3>
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
    <header class="panel-heading font-bold"> Edit Slider </header>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-sm-3 control-label">Slider Name</label>
            <div class="col-sm-9">
                <div class="input-group m-b">
                    <input type="text" class="form-control" id="slider_name" name="slider_name" value="<?php echo $sn; ?>">
                    <span class="input-group-btn">
						<button data-option="slider_name" class="btn btn-success update-name" type="button">Update</button>
                    </span>
				</div>
            </div>
        </div>
		
		<div class="line line-dashed b-b line-lg pull-in"></div>
			
		<div class="form-group">
            <div class="col-md-12">
				<label class="col-sm-3 control-label">Home Slider ?</label>
                <div class="col-sm-7">
					<label class="switch">
						<input type="checkbox" id="home_slider" name="home_slider" value="<?php echo $slider_id; ?>" <?php echo ($slider_id == get_option('home_slider')) ? 'checked' : ''; ?>>
						<span></span> 
					</label>
                </div>
				<button type="button" data-option="home_slider" class="col-md-2 btn btn-primary update-check">Update</button>
            </div>
        </div>
	</div>
</section>

<section class="panel panel-default" id="append-school">
    <header class="panel-heading font-bold">New Slide</header>
	<div class="panel-body">
        <form role="form" method="post" id="new_school">
			<input type="hidden" name="add_slide" value="true">
			<input type="hidden" name="slider_id" value="<?php echo $slider_id; ?>">
			
			<div class="form-group col-sm-6">
                <label class="col-sm-3 control-label">Slide Image</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="new_slide_image">
				</div>
			</div>
			
			<div class="form-group col-sm-6">
                <label class="col-sm-3 control-label">Slide Video</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="new_slide_video">
				</div>
			</div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group col-sm-12">
                <label class="col-sm-3 control-label">Slide Content</label>
                <div class="col-sm-9">
                    <textarea class="form-control ceditor" id="new_slide_content" name="new_slide_content"></textarea>
				</div>
			</div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group col-sm-12">
				<div class="col-sm-12">
					<input class="btn btn-success" type="submit" value="Add Slide">
				</div>
			</div>
		</form>
	</div>
</section>	

<script>
	$(document).ready(
		function(){
			$( '.ceditor' ).redactor();
			$( ".update-name" ).click(function() {
				var info = $( this ).data();
				var getvalue = $('#' + info.option).val();
				$.post( "index.php?view=update-slider-name", { slider_name: <?php echo $slider_id; ?> + '-' + getvalue } );	  
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
			});
			
			$( ".update-check" ).click(function() {
				var info = $( this ).data();
				var getvalue = $('#' + info.option).prop('checked');
				
				if ( getvalue == true ) {
					$.post( "index.php?view=update-settings", { field: info.option, value: 1 } );	  				
				} else {
					$.post( "index.php?view=update-settings", { field: info.option, value: 0 } );	  				
				}
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
			});
		}
	);
</script>
			
<?php include('footer.php'); ?>