<?php
	
	if( $input->pc['delete_membership'] ){
			
		$delete = $db->delete("memberships", "id=".$input->pc['delete_membership']);
	}
	
	if( $input->pc['update_membership'] ){
	
		$name = $input->pc['name'];
		$duration = $input->pc['duration'];
		$messages = $input->pc['messages'];
		$friends = $input->pc['friends'];
		$price = $input->pc['price'];
		$p_post = $input->pc['p_post'];
		$p_comment = $input->pc['p_comment'];
		$p_dare = $input->pc['p_dare'];
		$p_challenge = $input->pc['p_challenge'];
		$active = $input->pc['active'];
		
		$data = array(
			"name" => $name , 
			"time" => $duration,
			"messages" => $messages,
			"friends" => $friends,
			"price" => $price,
			"p_post" => $p_post,
			"p_comment" => $p_comment,
			"p_dare" => $p_dare,
			"p_challenge" => $p_challenge,
			"active" => $active);
			
		$insert = $db->update("memberships", $data, "id=".$input->pc['update_membership']);
	
	}
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Memberships</h3>
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
                <div class="col-md-12">
					<label class="col-sm-3 control-label">Membership Option</label>
                    <div class="col-sm-7">
						<label class="switch">
							<input type="checkbox" id="membership" name="membership" value="1" <?php echo (1 == get_option('membership')) ? 'checked' : ''; ?>>
                        <span></span> </label>
                    </div>
					<button type="button" data-option="membership" class="col-md-2 btn btn-primary update-check">Update</button>
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-3 control-label">Standard Membership</label>
                <div class="col-sm-9">
                    <div class="input-group m-b">
                        <select name="account" id="standard_membership" name="standard_membership" class="form-control m-b">
							<?php
							$q = $db->query("SELECT * FROM memberships");

							for ($x=0; $x < count_rows('memberships'); $x++) {
								if ($r = $db->fetch_array($q)) {
								?> 
									<option value='<?php echo $r['id'] ?>' <?php echo ($r['id'] == get_option('standard_membership')) ? "selected='selected'" : ''; ?>><?php echo $r['name'] . " - ₦" . $r['price']; ?></option>
								<?php
								}
							}
							?>
						</select>
                        <span class="input-group-btn">
							<button data-option="standard_membership" class="btn btn-success update" type="button">Update</button>
                        </span>
					</div>
                </div>
            </div>
		</div>
</section>	

<section class="panel panel-default" id="append-membership">
    <header class="panel-heading font-bold"> Add New Membership </header>
	<div class="panel-body">
        <form role="form" method="post" id="new_membership">
		
			<input name="add_membership" type="hidden" value="true">
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Membership Name</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="name" placeholder="Name">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Membership Duration ( Days )</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="duration" placeholder="Days, eg. 30 ">
						</div>
					</div>
				</div>
            </div>
			
			<input name="add_membership" type="hidden" value="true">
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Post (Confessions)</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_post" placeholder="Points No. ( eg. 1 )">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Comment</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_comment" placeholder="Points No. ( eg. 1 ) ">
						</div>
					</div>
				</div>
            </div>
			
			<input name="add_membership" type="hidden" value="true">
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Dare</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_dare" placeholder="Points No. ( eg. 1 )">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Challenge</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_challenge" placeholder="Points No. ( eg. 1 )">
						</div>
					</div>
				</div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Price</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="price" placeholder="eg. 500">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
                <div class="col-md-6">
					<label class="col-sm-6 control-label">Active for Members ?</label>
                    <div class="col-sm-6">
						<label class="switch">
							<input type="checkbox" name="active" value="1">
							<span></span> 
						</label>
                    </div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>

			<div class="form-group">
                <div class="col-md-6">
					<label class="col-sm-6 control-label">Friends Addon ?</label>
                    <div class="col-sm-6">
						<label class="switch">
							<input type="checkbox" name="friends" value="1">
							<span></span> 
						</label>
                    </div>
                </div>
            </div>

			<div class="form-group">
                <div class="col-md-6">
					<label class="col-sm-6 control-label">PM Addon ?</label>
                    <div class="col-sm-6">
						<label class="switch">
							<input type="checkbox" name="messages" value="1">
							<span></span> 
						</label>
                    </div>
                </div>
            </div>			
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button type="reset" class="btn btn-default">Cancel</button>
					<button class="btn btn-success add_membership">Add Membership</button>
                </div>
            </div>
		</form>
	</div>
</section>	

 <?php
$gs = $db->query("SELECT * FROM memberships");
				
$n = 0;				
for ($x=0; $x < count_rows('memberships'); $x++) {				
	if ($r = $db->fetch_array($gs)) {
	$n++;
?>
<section class="panel panel-default su<?php echo $r['id']; ?>">
    <header class="panel-heading font-bold"> <?php echo $r['name']; ?> </header>
	<div class="panel-body">
        <form role="form" method="post" id="new_school">
		
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Membership Name</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="name" id="edit-name-<?php echo $r['id']; ?>" placeholder="Name" value="<?php echo $r['name']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Membership Duration ( Days )</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="duration" id="edit-duration-<?php echo $r['id']; ?>" placeholder="Days, eg. 30 " value="<?php echo $r['time']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Post (Confessions)</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_post" id="edit-points-post-<?php echo $r['id']; ?>" placeholder="Points No. ( eg. 1 )" value="<?php echo $r['p_post']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Comment</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_comment" id="edit-points-comment-<?php echo $r['id']; ?>" placeholder="Points No. ( eg. 1 ) " value="<?php echo $r['p_comment']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<input name="add_membership" type="hidden" value="true">
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Dare</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_dare" id="edit-points-dare-<?php echo $r['id']; ?>" placeholder="Points No. ( eg. 1 )" value="<?php echo $r['p_dare']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Points / Challenge</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="p_challenge" id="edit-points-challenge-<?php echo $r['id']; ?>" placeholder="Points No. ( eg. 1 )" value="<?php echo $r['p_challenge']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label class="col-sm-6 control-label">Price</label>
					<div class="col-sm-6">
						<div class="input-group m-b">
							<input type="text" class="form-control" name="price" id="edit-price-<?php echo $r['id']; ?>" placeholder="eg. 500" value="<?php echo $r['price']; ?>">
						</div>
					</div>
				</div>
            </div>
			
			<div class="form-group">
                <div class="col-md-6">
					<label class="col-sm-6 control-label">Active for Members ?</label>
                    <div class="col-sm-6">
						<label class="switch">
							<input type="checkbox" name="active" value="1" id="edit-visible-<?php echo $r['id']; ?>" <?php echo ( $r['active'] == 1 ) ? 'checked' : '' ; ?>>
							<span></span> 
						</label>
                    </div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>
			
			<div class="form-group">
                <div class="col-md-6">
					<label class="col-sm-6 control-label">Friends Addon ?</label>
                    <div class="col-sm-6">
						<label class="switch">
							<input type="checkbox" name="friends" value="1" id="edit-friends-<?php echo $r['id']; ?>" <?php echo ( $r['friends'] == 1 ) ? 'checked' : '' ; ?>>
							<span></span> 
						</label>
                    </div>
                </div>
            </div>

			<div class="form-group">
                <div class="col-md-6">
					<label class="col-sm-6 control-label">PM Addon ?</label>
                    <div class="col-sm-6">
						<label class="switch">
							<input type="checkbox" name="messages" value="1" id="edit-messages-<?php echo $r['id']; ?>" <?php echo ( $r['messages'] == 1 ) ? 'checked' : '' ; ?>>
							<span></span> 
						</label>
                    </div>
                </div>
            </div>
			
			<div class="line line-dashed b-b line-lg pull-in"></div>			
			
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <a data-id="<?php echo $r['id']; ?>" class="btn btn-default delete-membership">Delete</a>
					<a data-id="<?php echo $r['id']; ?>" class="btn btn-success update-membership">Update Membership</a>
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
		
		var form = $('#new_membership');
		var submit = $('.add_membership');

		$( ".add_membership" ).click(function() {
		// prevent default action
			// send ajax request
						
			$.ajax({
				url: 'index.php?view=moderate-memberships',
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
					$('#append-membership').after(item);
					
					// reset form and button
					form.trigger('reset');
					submit.val('Save').removeAttr('disabled');
				},
				error: function(e){
					alert(e);
				}
			});
		});
		
		$( ".delete-membership" ).click(function() {
			var info = $( this ).data();
			$('.su' + info.id).slideUp();
			$.post( "index.php?view=memberships", { delete_membership: info.id } );
		});
		
		$( ".update-membership" ).click(function() {
			var info = $( this ).data();
			
			var membership_n = $('#edit-name-' + info.id).val();
			var membership_d = $('#edit-duration-' + info.id).val();
			var membership_f = $('#edit-friends-' + info.id).prop('checked');
			var membership_m = $('#edit-messages-' + info.id).prop('checked');
			var membership_p_post = $('#edit-points-post-' + info.id).val();
			var membership_p_comment = $('#edit-points-comment-' + info.id).val();
			var membership_p_dare = $('#edit-points-dare-' + info.id).val();
			var membership_p_challenge = $('#edit-points-challenge-' + info.id).val();
			var membership_p = $('#edit-price-' + info.id).val();
			var membership_v = $('#edit-visible-' + info.id).prop('checked');
			
			var m_active = '';
			var m_friends = '';
			var m_messages = '';
			
			if ( membership_v == true ) {
				m_active = 1;
			} else {
				m_active = 0;
			}
			
			if ( membership_f == true ) {
				m_friends = 1;
			} else {
				m_friends = 0;
			}
			
			if ( membership_m == true ) {
				m_messages = 1;
			} else {
				m_messages = 0;
			}
			
			$.post( "index.php?view=memberships", { 
				update_membership: info.id , 
				name: membership_n , 
				duration: membership_d , 
				friends: m_friends , 
				messages: m_messages , 
				price: membership_p, 
				p_post: membership_p_post,
				p_comment: membership_p_comment,
				p_dare: membership_p_dare,
				p_challenge: membership_p_challenge,
				active: m_active } );
		});
		
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
		
	});
</script>		
<?php include('footer.php'); ?>