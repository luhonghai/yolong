<?php
	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>Footer Settings</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->
<div class="row">
	<div class="col-md-12">
		<div class="box-info">
            <h3>Footer</h3>
            <hr>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Footer Style</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="footer_style" name="footer_style">
						<?php
						for ($x=1; $x < 5; $x++) {
						?> 
							<option value='footer-<?php echo $x; ?>' <?php echo ( 'footer-' . $x == theme_option('footer_style')) ? "selected='selected'" : ''; ?>>Footer Style <?php echo $x; ?></option>
						<?php
						}
						?>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="footer_style" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Footer Mode</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="footer_mode" name="footer_mode">
						<?php
						for ($x=1; $x < 4; $x++) {
						?> 
							<option value='mode-<?php echo $x; ?>' <?php echo ( 'mode-' . $x == theme_option('footer_mode')) ? "selected='selected'" : ''; ?>>Footer Mode <?php echo $x; ?></option>
						<?php
						}
						?>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="footer_mode" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Footer Text</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="top_bar_text" name="top_bar_text" value="<?php echo theme_option('top_bar_text'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="top_bar_text" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<script type="text/javascript" src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			<link rel="stylesheet" type="text/css" href="plugins/bootstrap-colorpicker/css/colorpicker.css" />
        </div>
		
		<script>
			(function($) {
				//$('.top_bar_color').colorpicker();
				//$('.top_bar_background').colorpicker();
				
				//$('.top_bar_color').colorpicker().on('changeColor', function(ev){
				//	$('.tbc_update').css('background-color', ev.color.toHex());
				//});
				
				//$('.top_bar_background').colorpicker().on('changeColor', function(ev){
				//	$('.tbb_update').css('background-color', ev.color.toHex());
				//});
				
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