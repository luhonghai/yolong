<?php
	
	if( $_POST['delete_user'] ){
		$db->delete("users", "user_id=" . $_POST['user_id']);
	}

	$paginator = new Pagination("users", $cond);
	$paginator->setOrders("id", "DESC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=users&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Users</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Users List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>Username</th>
							<th>Full Name</th>
							<th>Email</th>				
							<th>Confessions</th>
							<th>Points</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_users = $db->fetchOne("SELECT COUNT(*) AS NUM FROM users ORDER BY id ASC");

						for ($x=0; $x < $count_users; $x++) {
							if ($r = $db->fetch_array($q)) {
						?>
						<tr class="gradeX" id="su<?php echo $r['id']; ?>">
							<td><?php echo $r['username']; ?></td>
							<td><?php echo $r['fullname']; ?></td>
							<td><?php echo $r['email']; ?></td>
							<td><?php echo $r['confessions']; ?></td>
							<td><?php echo $r['points']; ?></td>
							<td width="10%">
								<a class="btn btn-danger" href="index.php?view=edit-user&userid=<?php echo $r['id']; ?>">Edit</a>
								<button class="btn btn-danger delete-user" data-user="<?php echo $r['id']; ?>" type="button">Delete</button>		
							</td>
						</tr>
						<?php	
							}
						}
						if ($paginator->totalResults() == 0) {
						?>
						<tr>
							<td colspan='6' align='center'>Records not found</td>
						</tr>
						<?php	
						}
						?>
					<tbody>
				</table>
				<script>
				(function($) {
					$( ".delete-user" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.user).slideUp();
					  $.post( "index.php?view=users", { delete_user: "yes", user_id: info.user } );
					});
				})(jQuery);
				</script>
			</div>
		</div>
		</div>
		</div>
	<?php		
	
	include ('footer.php');
	
	?>