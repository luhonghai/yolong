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
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Posts</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<!--row start-->
        <div class="row">
			<!--col-md-12 start-->
			<div class="col-md-12">
			<div class="box-info">
				<a href="index.php?view=new-post" class="btn-primary btn">Add New Post</a>
            </div>
			</div>
		</div>
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Posts List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>							
							<th>Post Title</th>
							<th>User</th>
							<th>Date</th>
							<th>Comments</th>
							<th>Views</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count_schools = $db->fetchOne("SELECT COUNT(*) AS NUM FROM pages ORDER BY id ASC");
						
						$n = 0;
						for ($x=0; $x < $count_schools; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $n; ?>">
							<td width="10%" class="center"><?php echo $r['id']; ?></td>
							<td width="20%"><?php echo $r['title']; ?></td>
							<td width="20%"><?php echo get_username($r['user_id']); ?></td>
							<td width="20%"><?php echo date("m.d.y",$r['date']); ?></td>
							<td width="5%"><?php echo count_comments($r['id']); ?></td>
							<td width="5%"><?php echo $r['views']; ?></td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=edit-post&postid=<?php echo $r['id']; ?>">Edit</a>
								<button class="btn btn-danger delete-post" data-post="<?php echo $r['id']; ?>" type="button">Delete</button>
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
					<tbody>
				</table>
				<script>
				(function($) {
					$( ".delete-post" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.post).slideUp();
					  $.post( "index.php?view=posts", { delete_post: "yes", post_id: info.post } );
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