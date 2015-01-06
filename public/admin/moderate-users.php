<?php
	if ( $input->pc['set_user_balance'] ){
	
		$money = $input->pc['set_user_balance'];
		$user_id = $input->pc['user_id'];
		
		$data = array( "money" => $money  );
		
		$update = $db->update("users", $data, 'id='.$user_id);
	}
	
	if ( $input->pc['add_user_badge'] ){
	
		$badge = $input->pc['add_user_badge'];
		$user_id = $input->pc['user_id'];
		
		$data = array( 'user_id' => $user_id , "badge_id" => $badge);
		
		$insert = $db->insert("user_badges", $data);
	}
	
	if ( $input->pc['set_role'] ){
	
		$role = $input->pc['set_role'];
		$user_id = $input->pc['user_id'];
		
		$data = array( "role" => $role  );
		
		$update = $db->update("users", $data, 'id='.$user_id);
	}
	
	if ( $input->pc['feature_user'] ){
	
		$user_id = $input->pc['user_id'];
		
		$time_now = time();
		
		$data = array( "user_id" => $user_id , "date" => $time_now );
		
		$insert = $db->insert("featured_users", $data);
	}

	if( $input->pc['get_user'] ){
	
	$r = userinfo($input->pc['get_user']);
	
	$f_user_id = $r['id'];
	
	$is_featured = $db->fetchOne("SELECT COUNT(*) FROM featured_users WHERE user_id='" . $f_user_id . "'");

	?>
	
<div class="row appended-user-info">
    <div class="col-sm-12">
        <section class="panel panel-default">
            <header class="panel-heading font-bold"><?php echo $r['username'];?> Profile</header>
            <div class="panel-body">
                <div class="row m-t-xl">
                    <div class="col-xs-12 text-center">
						<img src="<?php echo get_avatar($r['id'], false, null, null, true); ?>" class="img-circle">
						<div class="h4 m-t m-b-xs font-bold text-lt"><?php echo $r['fullname'];?></div>
                        <small class="text-muted m-b"><?php echo get_membership( $r['id'] );?> Membership</small><br> 
						
						<?php if ( $is_featured == 0 ){ ?>
						
						<a class="btn btn-primary feature-user" data-id="<?php echo $r['id'];?>">Feature User</a>
						
						<?php } else if ( $is_featured == 1){ ?>
						
						<a class="btn btn-danger" style="opacity:0.8;">User Featured</a>
						
						<?php } ?>
						
					</div>
                </div>
				
				
				<div class="wrapper m-t-xl m-b">
					<div class="row m-b">
						<div class="col-xs-6 text-right"> <small>Username</small>
							<div class="text-lt font-bold"><?php echo $r['username'];?></div>
						</div>
						<div class="col-xs-6"> <small>Email</small>
							<div class="text-lt font-bold"><?php echo $r['email'];?></div>
						</div>
					</div>
					<div class="row m-b">
						<div class="col-xs-6 text-right"> <small>School</small>
							<div class="text-lt font-bold"><?php echo get_school($r['school_id']);?></div>
						</div>
						<div class="col-xs-6"> <small>Age</small>
							<div class="text-lt font-bold"><?php echo $r['age'];?></div>
						</div>
					</div>
					<div class="row m-b">
						<div class="col-xs-6 text-right"> <small>Genre</small>
							<div class="text-lt font-bold"><?php echo $r['genre'];?></div>
						</div>
						<div class="col-xs-6"> <small>Money</small>
							<div class="text-lt font-bold">
							<div class="input-group">
								<span class="input-group-addon">₦</span>
								<input type="text" class="form-control" id="user-balance" value="<?php echo $r['money'];?>">
								<span class="input-group-btn">
									<button class="btn btn-default save-user-balance" type="button" data-id="<?php echo $r['id'];?>">Save</button>
								</span> 
							</div>
							</div>
						</div>
					</div>
					<div class="row m-b">
						<div class="col-xs-6 text-right"> <small>Points</small>
							<div class="text-lt font-bold"><?php echo $r['points'];?></div>
						</div>
						<div class="col-xs-6"> <small>Confessions</small>
							<div class="text-lt font-bold"><?php echo count_rows( 'posts', 'WHERE user_id='.$r['id'] );?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 text-right"> <small>Dares</small>
							<div class="text-lt font-bold"><?php echo count_rows( 'dares', 'WHERE user_a='.$r['id'] );?></div>
						</div>
						<div class="col-xs-6"> <small>Challenges</small>
							<div class="text-lt font-bold"><?php echo count_rows( 'challenges', 'WHERE user_a='.$r['id'] );?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 text-right"> <small>Add Badge</small>
							<div class="text-lt font-bold">
								<div class="input-group">
									<select name="user-badge" class="form-control m-b" id="user-badge" >
										<?php
										$b = $db->query("SELECT * FROM badges");
										$count_badges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM badges ORDER BY id ASC");

										for ($x=0; $x < $count_badges; $x++) {
											if ($ab = $db->fetch_array($b)) {
										?> 
											<option value='<?php echo $ab['id'] ?>'><?php echo $ab['name']; ?></option>
										<?php
											}
										}
										?>
									<select>
									<span class="input-group-btn">
										<button class="btn btn-default add-user-badge" type="button" data-id="<?php echo $r['id'];?>" >Add Badge</button>
									</span> 
								</div>
							</div>
						</div>
						<div class="col-xs-6"> <small>User Role</small>
							<div class="text-lt font-bold">
								<div class="input-group">
									<select name="user-role" class="form-control m-b" id="user-role" >
										<option value='1' <?php echo ( $r['role'] == 1 ) ? 'selected="selected"' : ''; ?>> Administrator</option>
										<option value='2' <?php echo ( $r['role'] == 2 || $r['role'] == 0) ? 'selected="selected"' : ''; ?>> Subscriber</option>
										<option value='3' <?php echo ( $r['role'] == 3 ) ? 'selected="selected"' : ''; ?>> Blocked</option>
									<select>
									<span class="input-group-btn">
										<button class="btn btn-default save-user-role" type="button" data-id="<?php echo $r['id'];?>" >Save</button>
									</span> 
								</div>
							</div>
						</div>
					</div>
					 <div class="col-xs-12 text-center">
						<div class="h4 m-t m-b-xs font-bold text-lt">Badges & Rewards</div>
						<?php 
							$ub = $db->query("SELECT b.* FROM badges b INNER JOIN user_badges u ON b.id = u.badge_id WHERE u.user_id =" . $r['id']);
							$count_badges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM user_badges WHERE user_id = ".$r['id']);
		
							for ($x=0; $x < $count_badges; $x++) {
								if ($b = $db->fetch_array($ub)) {
								
									echo "<img class='badge-image' width='25' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='".$b['name']."' src='".$b['image']."'>";
								
								}
							}
						?>
					</div>
				</div>
			</div>
		</section>
    </div>
</div>	
	
<?php } ?>