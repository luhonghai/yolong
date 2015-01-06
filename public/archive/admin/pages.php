<?php

	if( $_POST['delete_page'] ){
		$db->delete("pages", "id=" . $_POST['page_id']);
	}

	$paginator = new Pagination("pages", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=pages&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Pages</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->
		<!--row start-->
        <div class="row">
			<!--col-md-12 start-->
			<div class="col-md-12">
			<div class="box-info">
				<a href="index.php?view=new-page" class="btn-primary btn">Add New Page</a>
            </div>
			</div>
		</div>
        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Pages List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Page Title</th>
							<th>Page Slug</th>
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
							<td width="35%"><?php echo $r['title']; ?></td>
							<td width="35%"><?php echo $r['slug']; ?></td>
							<td width="20%">
								<a class="btn btn-danger" href="index.php?view=edit-page&pageid=<?php echo $r['id']; ?>">Edit</a>
								<button class="btn btn-danger delete-page" data-page="<?php echo $r['id']; ?>" type="button">Delete</button>
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
					<tbody>
				</table>
				<script>
				(function($) {
					$( ".delete-page" ).click(function() {
					  var info = $( this ).data();
					  $('#su' + info.page).slideUp();
					  $.post( "index.php?view=pages", { delete_page: "yes", page_id: info.page } );
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