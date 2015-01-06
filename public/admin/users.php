<?php
	
	if( $_POST['delete_user'] ){
		$db->delete("users", "id=" . $_POST['user_id']);
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

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Users</h3>
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


<section class="panel panel-default" id="user-append" >
    <header class="panel-heading"> Users <i class="fa fa-info-sign text-muted"></i> </header>
    <div class="table-responsive">
        <table class="table table-striped m-b-none">
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
			$n = 0;
			for ($x=0; $x < count_rows('users'); $x++) {
				if ($r = $db->fetch_array($q)) {
				$n++;
			?>
				<tr class="gradeX" id="su<?php echo $r['id']; ?>">
					<td><?php echo $r['username']; ?></td>
					<td><?php echo $r['fullname']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo count_rows('posts', 'WHERE user_id='.$r['id']); ?></td>
					<td><?php echo $r['points']; ?></td>
					<td>
						<a class="btn btn-danger user-info" data-id="<?php echo $r['id']; ?>">Info</a>
						<button class="btn btn-danger delete-user" data-id="<?php echo $r['id']; ?>" type="button">Delete</button>		
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
            </tbody>
		</table>
		<script>
		(function($) {
			$( ".user-info" ).click(function() {
				// prevent default action
				// send ajax request
				$( ".appended-user-info").remove();
				var info = $( this ).data();
				
				$.ajax({
					url: 'index.php?view=moderate-users',
					type: 'POST',
					cache: false,
					data: 'get_user='+info.id, //form serizlize data
					beforeSend: function(){
						// change submit button value text and disabled it
						$( this ).val('Info...').attr('disabled', 'disabled');
					},
					success: function(data){
						var item = $(data).hide().fadeIn(800);
						$('#user-append').before(item);
						$('.badge-image').tooltip()
					},
					error: function(e){
						alert(e);
					}
				});
			});
			
			$(document).on('click', '.save-user-balance', function(){
			
				var info = $( this ).data();
				
				var money = $("#user-balance").val();
			
				$.post( "index.php?view=moderate-users", { set_user_balance : money, user_id: info.id } );
				
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 );
			
			});
			
			$(document).on('click', '.add-user-badge', function(){
			
				var info = $( this ).data();
				
				var badge = $("#user-badge").val();
			
				$.post( "index.php?view=moderate-users", { add_user_badge : badge, user_id: info.id } );
				
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 );
			
			});
			
			$(document).on('click', '.save-user-role', function(){
			
				var r_info = $( this ).data();
				
				var role = $('#user-role').val();
			
				$.post( "index.php?view=moderate-users", { set_role : role , user_id: r_info.id } );
				
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 );
			
			});
			
			$(document).on('click', '.feature-user', function(){
			
				var r_info = $( this ).data();
			
				$.post( "index.php?view=moderate-users", { feature_user: r_info.id, user_id: r_info.id } );
				
				$( this ).fadeTo( "slow", 0.33 ).html('User Featured').delay( 1200 ).fadeTo( "slow", 1 );
			
			});
			
			$( ".delete-user" ).click(function() {
				var info = $( this ).data();
				$('#su' + info.id).slideUp();
				$.post( "index.php?view=users", { delete_user: "yes", user_id: info.id } );
			});
			
			
		})(jQuery);
		</script>
    </div>
</section>

<section class="panel panel-default">
    <div class="panel-body">
		<?php 
			if ($paginator->totalPages() == 1 || $paginator->getPage() == 1) {
				echo "";
			} else {
				echo "<a class='peter-river-fb small-fb radius-fb' href='" . $paginator->prevpage() . "'>Prev</a>";
			}
			
			if ($paginator->totalPages() == 0 || $paginator->totalPages() == $paginator->getPage()) {
				echo "";
			} else {
				echo "<a class='peter-river-fb small-fb radius-fb' style='float:right;' href='" . $paginator->nextpage() . "'>Next</a>";
			}
		?> 
    </div>
</section>
			
<?php include('footer.php'); ?>