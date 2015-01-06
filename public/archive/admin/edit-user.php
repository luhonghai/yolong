<?php
	$user_id = $_GET['userid'];
	$user_info = $db->fetchRow("SELECT * FROM users WHERE id=" . $user_id);

	include ('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-heading">
            <h1>Edit User</h1>
        </div>
	</div><!--col-md-12 end-->
</div><!--row end-->

<div class="row">
	<div class="col-md-9">
		<div class="box-info">
            <h3>Update Page</h3>
            <hr>
			<div class="row">
                <div class="bio-row">
					<p><span>Full Name </span>: <?php echo $user_info['fullname']; ?></p>
				</div>
                <div class="bio-row">
					<p><span>Username </span>: <?php echo $user_info['username']; ?></p>
				</div>
				<div class="bio-row">
					<p><span>Email </span>: <?php echo $user_info['email']; ?></p>
				</div>
                <div class="bio-row">
					<p><span>School</span>: <?php echo get_school($user_info['school_id']); ?></p>
				</div>
				<div class="bio-row">
					<p><span>Money </span>: <?php echo $user_info['money']; ?></p>
				</div>
				<div class="bio-row">
					<p><span>Points </span>: <?php echo $user_info['points']; ?></p>
				</div>
				<div class="bio-row">
					<p><span>Signed Up </span>: <?php echo date("m.d.y",$r['date']); ?></p>
				</div>
				<div class="bio-row">
					<p><span>Membership </span>: <?php echo get_membership($user_info['membership']); ?></p>
				</div>
				<div class="bio-row">
					<p><span>Genre </span>: <?php echo ($user_info['genre'] == 0) ? 'Male' : 'Female'; ?></p>
				</div>
			

			
				<input type="submit" class="btn-primary btn" value="Update Page">
			  </form><!--form-horizontal row-border end-->
			  <!--row start-->
            </div>
			<div class="box-info">
			<h3>Badges</h3>
            <hr>
			<ul id="sortable-todo" class="to-do-list ui-sortable">
				
				<?php
				$ub = $db->query("SELECT b.* FROM badges b INNER JOIN user_badges u ON b.id = u.badge_id WHERE u.user_id =" . $user_id);
				$count_badges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM user_badges WHERE user_id = ".$user_id);

				for ($x=0; $x < $count_badges; $x++) {
					if ($r = $db->fetch_array($ub)) {
				?> 
								
                <li class="clearfix" id="li<?php echo $r['id']?>"> 
					<span class="drag-marker"> <i></i> </span>

					<p class="todo-title"> <?php echo $r['name']?> </p>
					<div class="todo-actionlist pull-right clearfix"> 
						<a class="remove-badge" data-option="<?php echo $r['id']?>"><i class="fa fa-times icon-muted"></i></a> 
					</div>
                </li>
				
				<?php
					}
				}
				?>
            </ul>

			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="box-info">
			<h3>Profile Image</h3>
			<hr>
			<h3>Badges</h3>
			<div class="input-group">
				<select class="form-control" id="add-badge" name="add-badge">
				<?php
				$b = $db->query("SELECT * FROM badges");
				$count_badges = $db->fetchOne("SELECT COUNT(*) AS NUM FROM badges ORDER BY id ASC");

				for ($x=0; $x < $count_badges; $x++) {
					if ($r = $db->fetch_array($b)) {
				?> 
					<option value='<?php echo $r['id'] ?>'><?php echo $r['name']; ?></option>
				<?php
					}
				}
				?>
				</select>
				<div class="input-group-btn">
					<button type="button" data-option="add-badge" data-user="<?php echo $user_id ?>" class="btn btn-primary new-badge">Add Badge</button>
				</div>
			</div>
			<hr>
				<script>
				(function($) {
					$( ".new-badge" ).click(function() {
						var info = $( this ).data();
						var getvalue = $('#' + info.option).val();
						$.post( "index.php?view=user-badge", { new_badge: info.option, user_id: info.user , badge_id: getvalue } );	  
						$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
					});
					
					$( ".remove-badge" ).click(function() {
						var info = $( this ).data();
						var getvalue = $('#' + info.option).val();
						$('#li' + info.option).slideUp();
						$.post( "index.php?view=user-badge", { remove_badge: info.option, user_id: info.option, badge_id: getvalue } );	  
						$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
					});
				})(jQuery);
				</script>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<?php			
	include ('footer.php');	
?>