<?php

	if( $_POST['delete_post'] ){
		$db->delete("posts", "id=" . $_POST['post_id']);
	}
	
	$paginator = new Pagination("posts", 'user_id=' . $user_info['id']);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($_GET['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=profile&profile=confessions&" . $adlink);
	$q = $paginator->getQuery();
	
?>

<h3>My Confession</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%"> # </th>
            <th width="50%"> Title </th>
            <th> Date </th>
			<th> Views </th>
            <th width="20%"> Actions </th>
        </tr>
    </thead>
    <tbody>
		<?php
		$count_posts = $db->fetchOne("SELECT COUNT(*) AS NUM FROM posts ORDER BY id ASC");
						
		$n = 0;
		for ($x=0; $x < $count_posts; $x++) {
			if ($r = $db->fetch_array($q)) {
			$n++;
		?>
        <tr id="su<?php echo $n; ?>">
            <td> <?php echo $n; ?> </td>
            <td> <?php echo $r['title']; ?> </td>
            <td> <?php echo date("m.d.y",$r['date']); ?> </td>
			<td> <?php echo $r['views']; ?> </td>
            <td> 
				<a class="btn btn-primary" href="index.php?view=profile&profile=edit-conf&postid=<?php echo $r['id']; ?>">Edit</a>
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
    </tbody>
</table>

<script>
(function($) {
	$( ".delete-post" ).click(function() {
	var info = $( this ).data();
	$('#su' + info.post).slideUp();
	$.post( "index.php?view=profile&profile=confessions", { delete_post: "yes", post_id: info.post } );
	});
})(jQuery);
</script>