<?php
	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>Header Settings</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->
<div class="row">
	<div class="col-md-12">
		<div class="box-info">
            <h3>Header</h3>
            <hr>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Header Style</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="header_style" name="header_style">
						<?php
						for ($x=1; $x < 5; $x++) {
						?> 
							<option value='header-<?php echo $x; ?>' <?php echo ( 'header-' . $x == theme_option('header_style')) ? "selected='selected'" : ''; ?>>Header Style <?php echo $x; ?></option>
						<?php
						}
						?>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="header_style" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Header Mode</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="header_mode" name="header_mode">
						<option value="">None</option>
						<?php
						for ($x=1; $x < 4; $x++) {
						?> 
							<option value='mode-<?php echo $x; ?>' <?php echo ( 'mode-' . $x == theme_option('header_mode')) ? "selected='selected'" : ''; ?>>Header Mode <?php echo $x; ?></option>
						<?php
						}
						?>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="header_mode" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">TopBar Text</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="top_bar_text" name="top_bar_text" value="<?php echo theme_option('top_bar_text'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="top_bar_text" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Background</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="title_background" name="title_background">
						<option value="">None</option>
						<?php
						for ($x=1; $x < 15; $x++) {
						?> 
							<option value='background-<?php echo $x; ?>' <?php echo ( 'background-' . $x == theme_option('title_background')) ? "selected='selected'" : ''; ?>>Background <?php echo $x; ?></option>
						<?php
						}
						?>
					</select>					
					<div class="input-group-btn">
						<button type="button" data-option="title_background" class="btn btn-primary update">Update</button>
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