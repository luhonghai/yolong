<?php
	
	if( $_POST['delete_comment'] ){
		$db->delete("comments", "id=" . $_POST['comment_id']);
	}

	$paginator = new Pagination("comments", $cond);
	$paginator->setOrders("id", "DESC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=comments&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Comments</h3>
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
    <header class="panel-heading"> Comments <i class="fa fa-info-sign text-muted"></i> </header>
    <div class="table-responsive">
        <table class="table table-striped m-b-none" data-ride="datatables">
            <thead>
                <tr>
					<th>User</th>
					<th>Post</th>
					<th>Comment</th>				
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
			<?php
			$n = 0;
			for ($x=0; $x < count_rows('comments'); $x++) {
				if ($r = $db->fetch_array($q)) {
				$n++;
			?>
				<tr class="gradeX" id="su<?php echo $r['id']; ?>">
					<td><?php echo get_username($r['user_id']); ?></td>
					<td><?php echo get_post_title($r['post_id']); ?></td>
					<td><?php echo substr($r['comment'], 0, 50)."..."; ?></td>
					<td>
						<a class="btn btn-danger" href="index.php?view=comments&id=<?php echo $r['id']; ?>">Edit</a>
						<button class="btn btn-danger delete-comment" data-id="<?php echo $r['id']; ?>" type="button">Delete</button>		
					</td>
				</tr>
			<?php	
				}
			}
			if ($paginator->totalResults() == 0) {
			?>
				<tr>
					<td colspan='4' align='center'>Records not found</td>
				</tr>
			<?php	
			}
			?>
            </tbody>
		</table>
		<script>
		(function($) {
			$( ".delete-comment" ).click(function() {
				var info = $( this ).data();
				$('#su' + info.id).slideUp();
				$.post( "index.php?view=comments", { delete_comment: "yes", comment_id: info.id } );
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