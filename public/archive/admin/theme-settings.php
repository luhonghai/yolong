<?php
	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>General Theme Settings</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->
<div class="row">
	<div class="col-md-12">
		<div class="box-info">
            <h3>Theme</h3>
            <hr>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Responsive</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="responsive" name="responsive">
						<option value='0' <?php echo ( 0 == theme_option('responsive')) ? "selected='selected'" : ''; ?>>Non Responsive</option>
						<option value='1' <?php echo ( 1 == theme_option('responsive')) ? "selected='selected'" : ''; ?>>Responsive</option>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="responsive" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Boxed</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="boxed" name="boxed">
						<option value='0' <?php echo ( 0 == theme_option('boxed')) ? "selected='selected'" : ''; ?>>Full Width Layout</option>
						<option value='1' <?php echo ( 1 == theme_option('boxed')) ? "selected='selected'" : ''; ?>>Boxed Layout</option>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="boxed" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Background</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="background" name="background">
						<option value="">None</option>
						<?php
						for ($x=1; $x < 15; $x++) {
						?> 
							<option value='background-<?php echo $x; ?>' <?php echo ( 'background-' . $x == theme_option('background')) ? "selected='selected'" : ''; ?>>Background <?php echo $x; ?></option>
						<?php
						}
						?>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="background" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Theme Color</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="theme_color" name="theme_color">
						<option value='color-blue' <?php echo ( 'color-blue' == theme_option('theme_color')) ? "selected='selected'" : ''; ?>>Blue</option>
						<option value='color-green' <?php echo ( 'color-green' == theme_option('theme_color')) ? "selected='selected'" : ''; ?>>Green</option>
						<option value='color-orange' <?php echo ( 'color-orange' == theme_option('theme_color')) ? "selected='selected'" : ''; ?>>Orange</option>
						<option value='color-purple' <?php echo ( 'color-purple' == theme_option('theme_color')) ? "selected='selected'" : ''; ?>>Purple</option>
						<option value='color-red' <?php echo ( 'color-red' == theme_option('theme_color')) ? "selected='selected'" : ''; ?>>Red</option>
						<option value='color-yellow' <?php echo ( 'color-yellow' == theme_option('theme_color')) ? "selected='selected'" : ''; ?>>Yellow</option>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="theme_color" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<script type="text/javascript" src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			<link rel="stylesheet" type="text/css" href="plugins/bootstrap-colorpicker/css/colorpicker.css" />
        </div>
		
		<script>
			(function($) {
				$('.top_bar_color').colorpicker();
				$('.top_bar_background').colorpicker();
				
				$('.top_bar_color').colorpicker().on('changeColor', function(ev){
					$('.tbc_update').css('background-color', ev.color.toHex());
				});
				
				$('.top_bar_background').colorpicker().on('changeColor', function(ev){
					$('.tbb_update').css('background-color', ev.color.toHex());
				});
				
				$( ".update" ).click(function() {
					var info = $( this ).data();
					var getvalue = $('#' + info.option).val();
					$.post( "index.php?view=update-theme", { field: info.option, value: getvalue } );	  
					$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
				});
			})(jQuery);
		</script>
	</div>
</div>

<?php			
	include ('footer.php');	
?>