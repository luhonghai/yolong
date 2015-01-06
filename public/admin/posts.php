<?php

	if( $_POST['delete_post'] ){
		$db->delete("posts", "id=" . $_POST['post_id']);
	}

	$paginator = new Pagination("posts", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=posts&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Posts</h3>
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
    <header class="panel-heading"> Posts <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
    <div class="table-responsive">
        <table class="table table-striped m-b-none" data-ride="datatables">
            <thead>
                <tr>
					<th>Post Title</th>
					<th>User</th>
					<th>Date</th>
					<th>Comments</th>
					<th>Views</th>
					<th>Published</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
			<?php
			$n = 0;
			for ($x=0; $x < count_rows('posts'); $x++) {
				if ($r = $db->fetch_array($q)) {
				$n++;
			?>
				<tr class="gradeX" id="su<?php echo $r['id']; ?>">
					<td width="20%"><?php echo $r['title']; ?></td>
					<td width="20%"><?php echo get_username($r['user_id']); ?></td>
					<td width="15%"><?php echo date("m.d.y",$r['date']); ?></td>
					<td width="5%"><?php echo count_comments($r['id']); ?></td>
					<td width="5%"><?php echo $r['views']; ?></td>
					<td>
						<a href="#" class="active" data-toggle="class">
							<?php echo ( $r['published'] != 0 ) ? '<i class="fa fa-check text-success text-active"></i>' : '<i class="fa fa-times text-danger text"></i>' ?>
						</a>
					</td>
					<td width="20%">
						<a class="btn btn-danger" href="index.php?view=posts&id=<?php echo $r['id']; ?>">Edit</a>
						<button class="btn btn-danger delete-post" data-id="<?php echo $r['id']; ?>" type="button">Delete</button>
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
		<script>
		(function($) {
			$( ".delete-post" ).click(function() {
				var info = $( this ).data();
				$('#su' + info.id).slideUp();
				$.post( "index.php?view=posts", { delete_post: "yes", post_id: info.id } );
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