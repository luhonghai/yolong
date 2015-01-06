<?php
	
	if( $input->pc['add_membership'] ){
	
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
		$timenow = time();
		
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
			"unique_id" => $timenow);
			
		$insert = $db->insert("memberships", $data);
		
		$r = $db->fetchRow("SELECT * FROM memberships WHERE unique_id=" . $timenow);
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
	
<?php } ?>