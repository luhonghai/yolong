<?php

	if( $_POST['delete_challenge'] ){
		$db->delete("challenges", "id=" . $_POST['challenge_id']);
	}

	$paginator = new Pagination("challenges", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=challenges&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Challenges</h3>
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

<section class="panel panel-default" id="challenge-append">
    <header class="panel-heading"><?php echo count_rows('challenges'); ?> Challenges <i class="fa fa-info-sign text-muted"></i> </header>
    <div class="table-responsive">
        <table class="table table-striped m-b-none">
            <thead>
                <tr>
					<th>Title</th>
					<th>User</th>
					<th>Need Approve</th>
					<th>Money</th>
					<th>Published</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
			<?php
			$n = 0;
			for ($x=0; $x < count_rows('challenges'); $x++) {
				if ($r = $db->fetch_array($q)) {
				$n++;
			?>
				<tr class="gradeX" id="su<?php echo $r['id']; ?>">
					<td width="20%"><?php echo $r['title']; ?></td>
					<td><?php echo get_username($r['user_a']); ?></td>
					<td>
						<?php if ( $r['status'] == 1 ) { 
							echo '<a class="btn btn-primary">No</a>'; 
							} else if ( $r['status'] == 2 ) { 
							echo '<a class="btn btn-warning">Yes</a>';
							} else if ( $r['status'] == 3 ) { 
							echo '<a class="btn btn-success">Finished</a>';
							}
						?>
					</td>
					<td width="15%">₦<?php echo $r['money']; ?></td>
					<td>
						<a href="#" class="active" data-toggle="class">
							<?php echo ( $r['status'] != 0 ) ? '<i class="fa fa-check text-success text-active"></i>' : '<i class="fa fa-times text-danger text"></i>' ?>
						</a>
					</td>
					<td width="20%">
						<div class="btn-group">
							<a class="btn btn-primary edit-challenge" data-id="<?php echo $r['id']; ?>"><i class="fa fa-edit"></i></a>
							<button class="btn btn-danger delete-challenge" data-id="<?php echo $r['id']; ?>" type="button"><i class="fa fa-trash-o"></i></button>
						</div>
					</td>
				</tr>
			<?php	
				}
			}
			if ($paginator->totalResults() == 0) {
			?>
				<tr>
					<td colspan='7' align='center'>Records not found</td>
				</tr>
			<?php	
			}
			?>
            </tbody>
		</table>

    </div>
</section>

		<script>
		(function($) {
			$( ".edit-challenge" ).click(function() {
				// prevent default action
				// send ajax request
				$( ".appended-challenge-info").remove();
				var info = $( this ).data();
				
				$.ajax({
					url: 'index.php?view=moderate-challenges',
					type: 'POST',
					cache: false,
					data: 'get_challenge='+info.id, //form serizlize data
					beforeSend: function(){

					},
					success: function(data){
						var item = $(data).hide().fadeIn(800);
						$('#challenge-append').before(item);
					},
					error: function(e){
						alert(e);
					}
				});
			});
			
			$(document).on('click', '#set-winner', function(){
		
				var info = $( this ).data();
				
				$.post( "index.php?view=moderate-challenges", { set_winner : info.id, challenge_id: info.challenge } );
				
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
				
				$( ".appended-challenge-info").remove();
				
				$.ajax({
					url: 'index.php?view=moderate-challenges',
					type: 'POST',
					cache: false,
					data: 'get_challenge='+info.challenge, //form serizlize data
					beforeSend: function(){

					},
					success: function(data){
						var item = $(data).hide().fadeIn(800);
						$('#challenge-append').before(item);
					},
					error: function(e){
						alert(e);
					}
				});
			});
			
			$(document).on('click', '#set_reset', function(){
		
				var info = $( this ).data();
			
				$.post( "index.php?view=moderate-challenges", { set_reset : info.challenge } );
				
				$( this ).fadeTo( "slow", 0.33 ).delay( 1200 ).fadeTo( "slow", 1 )
				
				$( ".appended-challenge-info").remove();
				
				$.ajax({
					url: 'index.php?view=moderate-challenges',
					type: 'POST',
					cache: false,
					data: 'get_challenge='+info.challenge, //form serizlize data
					beforeSend: function(){

					},
					success: function(data){
						var item = $(data).hide().fadeIn(800);
						$('#challenge-append').before(item);
					},
					error: function(e){
						alert(e);
					}
				});
			});
		
			$( ".delete-challenge" ).click(function() {
				var info = $( this ).data();
				$('#su' + info.id).slideUp();
				$.post( "index.php?view=challenges", { delete_challenge: "yes", challenge_id: info.id } );
			});
		})(jQuery);
		</script>
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