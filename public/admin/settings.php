<?php
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Settings</h3>
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

<section class="panel panel-default">
    <header class="panel-heading font-bold"> General Settings </header>
	<div class="panel-body">
			<div class="form-group">
                <label class="col-sm-3 control-label">Site Domain</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="web_site_domain" name="web_site_domain" value="<?php echo get_option('web_site_domain'); ?>">
                        <span class="input-group-btn">
							<button data-option="web_site_domain" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Site Name</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo get_option('site_name'); ?>">
                        <span class="input-group-btn">
							<button data-option="site_name" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Site Title</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo get_option('site_title'); ?>">
                        <span class="input-group-btn">
							<button data-option="site_title" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Site Email</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="email" class="form-control" id="site_email" name="site_email" value="<?php echo get_option('site_email'); ?>">
                        <span class="input-group-btn">
							<button data-option="site_email" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">HomePage Background</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="bg_home" name="bg_home" value="<?php echo get_option('bg_home'); ?>">
                        <span class="input-group-btn">
							<button data-option="bg_home" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Profile Page Background</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="bg_profile" name="bg_profile" value="<?php echo get_option('bg_profile'); ?>">
                        <span class="input-group-btn">
							<button data-option="bg_profile" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Membership Page Background</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="bg_membership" name="bg_membership" value="<?php echo get_option('bg_membership'); ?>">
                        <span class="input-group-btn">
							<button data-option="bg_membership" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">VoguePay Merchant ID</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="merchant_id" name="merchant_id" value="<?php echo get_option('merchant_id'); ?>">
                        <span class="input-group-btn">
							<button data-option="merchant_id" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Like System</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="like_system" name="like_system" value="1" <?php echo (1 == get_option('like_system')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="like_system" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Report System</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="report_system" name="report_system" value="1" <?php echo (1 == get_option('report_system')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="report_system" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Publish Confessions Directly</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="publish_directly" name="publish_directly" value="1" <?php echo (1 == get_option('publish_directly')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="publish_directly" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Publish Dares Directly</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="publish_dares_directly" name="publish_dares_directly" value="1" <?php echo (1 == get_option('publish_dares_directly')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="publish_dares_directly" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Publish Challenges Directly</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="publish_challenges_directly" name="publish_challenges_directly" value="1" <?php echo (1 == get_option('publish_challenges_directly')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="publish_challenges_directly" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Registration Subject</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="register_subject" name="register_subject" value="<?php echo get_option('register_subject'); ?>">
                        <span class="input-group-btn">
							<button data-option="register_subject" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Registration Email<br><button type="button" data-option="register_message" class="btn btn-primary update">Update</button></label>
                <div class="col-sm-9">
					<textarea class="form-control ceditor" id="register_message" name="register_message"><?php echo get_option('register_message'); ?></textarea>
				</div>
			</div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Reset Password Subject</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="reset_subject" name="reset_subject" value="<?php echo get_option('reset_subject'); ?>">
                        <span class="input-group-btn">
							<button data-option="reset_subject" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Reset Password Email<br><button type="button" data-option="reset_message" class="btn btn-primary update">Update</button></label>
                <div class="col-sm-9">
					<textarea class="form-control ceditor" id="reset_message" name="reset_message"><?php echo get_option('reset_message'); ?></textarea>
				</div>
			</div>
    </div>
</section>	
	
<section class="panel panel-default">
    <header class="panel-heading font-bold"> Facebook LogIn </header>	
	<div class="panel-body">
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Turn On Facebook LogIn</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="facebook_login" name="facebook_login" value="1" <?php echo (1 == get_option('facebook_login')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="facebook_login" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Facebook App Id</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="facebook_id" name="facebook_id" value="<?php echo get_option('facebook_id'); ?>">
                        <span class="input-group-btn">
							<button data-option="facebook_id" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Facebook Secret Key</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="facebook_secret" name="facebook_secret" value="<?php echo get_option('facebook_secret'); ?>">
                        <span class="input-group-btn">
							<button data-option="facebook_secret" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
    </div>
</section>

<section class="panel panel-default">
    <header class="panel-heading font-bold"> Twitter LogIn </header>	
	<div class="panel-body">
			
			<div class="form-group">
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Turn On Twitter LogIn</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="twitter_login" name="twitter_login" value="1" <?php echo (1 == get_option('twitter_login')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="twitter_login" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Twitter Key</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="twitter_key" name="twitter_key" value="<?php echo get_option('twitter_key'); ?>">
                        <span class="input-group-btn">
							<button data-option="twitter_key" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Twitter Secret Key</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <input type="text" class="form-control" id="twitter_secret" name="twitter_secret" value="<?php echo get_option('twitter_secret'); ?>">
                        <span class="input-group-btn">
							<button data-option="twitter_secret" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
			
    </div>
</section>

<script>
	$(document).ready(
		function(){
			$( '.ceditor' ).redactor();
			$( ".update" ).click(function() {
				var info = $( this ).data();
				var getvalue = $('#' + info.option).val();
				$.post( "index.php?view=update-settings", { field: info.option, value: getvalue } );	  
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