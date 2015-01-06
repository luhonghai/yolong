<?php
	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>Settings</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->
<div class="row">
	<div class="col-md-12">
		<div class="box-info">
            <h3>General Settings</h3>
            <hr>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Site Domain</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="web_site_domain" name="web_site_domain" value="<?php echo get_option('web_site_domain'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="web_site_domain" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Site Name</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo get_option('site_name'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="site_name" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Site Title</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo get_option('site_title'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="site_title" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
				
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Site Email</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="site_email" name="site_email" value="<?php echo get_option('site_email'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="site_email" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">VoguePay Merchant ID</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="merchant_id" name="merchant_id" value="<?php echo get_option('merchant_id'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="merchant_id" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Phone No.</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="phone_no" name="phone_no" value="<?php echo get_option('phone_no'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="phone_no" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>	
        </div>
		
		<div class="box-info">
            <h3>Page Settings</h3>
            <hr>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">HomePage</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="homepage" name="homepage">
						<?php
							$q = $db->query("SELECT * FROM pages");
							$count_pages = $db->fetchOne("SELECT COUNT(*) AS NUM FROM pages ORDER BY id ASC");

							for ($x=0; $x < $count_pages; $x++) {
								if ($r = $db->fetch_array($q)) {
								?> 
									<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == get_option('homepage')) ? "selected='selected'" : ''; ?>><?php echo $r['title']; ?></option>
								<?php
								}
							}
						?>
					</select>
					<div class="input-group-btn">
						<button type="button" data-option="homepage" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">AboutUs</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="aboutus" name="aboutus">
						<option value='none'>Disabled</option>
						<?php
							$q = $db->query("SELECT * FROM pages");
							$count_pages = $db->fetchOne("SELECT COUNT(*) AS NUM FROM pages ORDER BY id ASC");

							for ($x=0; $x < $count_pages; $x++) {
								if ($r = $db->fetch_array($q)) {
								?> 
									<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == get_option('aboutus')) ? "selected='selected'" : ''; ?>><?php echo $r['title']; ?></option>
								<?php
								}
							}
						?>
					</select>
					<div class="input-group-btn">
						<button type="button" data-option="aboutus" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">ThankYou For Deposit</label>
				<div class="col-sm-9">
				<div class="input-group">
					<select class="form-control" id="thank-you" name="thank-you">
						<option value='none'>Disabled</option>
						<?php
							$q = $db->query("SELECT * FROM pages");
							$count_pages = $db->fetchOne("SELECT COUNT(*) AS NUM FROM pages ORDER BY id ASC");

							for ($x=0; $x < $count_pages; $x++) {
								if ($r = $db->fetch_array($q)) {
								?> 
									<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == get_option('thank-you')) ? "selected='selected'" : ''; ?>><?php echo $r['title']; ?></option>
								<?php
								}
							}
						?>
					</select>
					<div class="input-group-btn">
						<button type="button" data-option="thank-you" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Default Post Image</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="post_image" name="post_image" value="<?php echo get_option('post_image'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="post_image" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
				
        </div>
		
		<div class="box-info">
            <h3>Social</h3>
            <hr>
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Facebook</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo get_option('facebook'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="facebook" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Twitter</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo get_option('twitter'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="twitter" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
				
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Google Plus</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="google_plus" name="google_plus" value="<?php echo get_option('google_plus'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="google_plus" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>
			  
			<div class="form-group col-md-6">
				<label class="col-sm-3 control-label">Pinterest</label>
				<div class="col-sm-9">
				<div class="input-group">
					<input type="text" class="form-control" id="pinterest" name="pinterest" value="<?php echo get_option('pinterest'); ?>">
					<div class="input-group-btn">
						<button type="button" data-option="pinterest" class="btn btn-primary update">Update</button>
					</div>
				</div>
				</div>
			</div>	
        </div>
		
		<script>
			(function($) {
				$( ".update" ).click(function() {
					var info = $( this ).data();
					var getvalue = $('#' + info.option).val();
					$.post( "index.php?view=update-settings", { field: info.option, value: getvalue } );	  
					$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
				});
			})(jQuery);
		</script>
	</div>
</div>

<?php			
	include ('footer.php');	
?>