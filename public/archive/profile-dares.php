<?php

	if( $_POST['dare_add'] ){
		if ( $_POST['money'] > 0 && $user_info['money'] > $_POST['money']){
		
		$udata = array("money" => $user_info['money'] - $_POST['money'] );
		$new_user_money = $db->update("users", $udata, "id=".$_POST['user_a']);
		
		$data = array("user_a" => $_POST['user_a'] , "content" => $_POST['content'] , "money" => $_POST['money'] , "date" => time() , "time_finish" => $_POST['time_to_finish'] ,"status" => 0 );
		$insert = $db->insert("dares", $data);
		}
	}
	
	$paginator = new Pagination("dares", 'user_a=' . $user_info['id']);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($_GET['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=profile&profile=dares&" . $adlink);
	$q = $paginator->getQuery();
?>

<h3>Add Dare</h3>
<form method="POST" action="#" class="form">
	<input type="hidden" name="dare_add" value='true'>
	<input type="hidden" name="user_a" value='<?php echo $user_info['id']; ?>'>
	<div class="form-group col-md-6">  
		<div class="input-group">
			<span class="input-group-addon">$</span>
            <input type="text" name="money" placeholder="Price" value="0">
            <span class="input-group-addon">.00</span>
        </div>
	</div>
	<div class="form-group col-md-6">                               
		<input type="text" placeholder="Days to finish the dare" name="time_to_finish" class="vc_input-inverse">
	</div> 
	<div class="clearfix"></div>
	<div class="form-group col-md-12">  
	<textarea name="content" rows="4" class="ceditor"></textarea>
	</div>
	
	<div class="form-group col-md-3">
		<button type="submit" class="btn btn-primary btn-block">Add Dare</button>
	</div>
</form>

<h3>My Dares</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%"> # </th>
            <th width="50%"> Content </th>
			<th> Money In </th>
			<th> User Dared </th>
            <th width="20%"> Status </th>
        </tr>
    </thead>
    <tbody>
		<?php
		$count_dares = $db->fetchOne("SELECT COUNT(*) AS NUM FROM dares ORDER BY id ASC");
						
		$n = 0;
		for ($x=0; $x < $count_dares; $x++) {
			if ($r = $db->fetch_array($q)) {
			$n++;
		?>
        <tr id="su<?php echo $n; ?>">
            <td> <?php echo $n; ?> </td>
            <td> <?php echo substr($r['content'],0,80); ?> </td>
            <td> <?php echo $r['money']; ?> </td>
			<td> <?php echo get_username($r['user_b']); ?> </td>
			<td> <?php echo $r['status']; ?> </td>
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

<script type="text/javascript">
$(document).ready(
	function()
	{
		$('.ceditor').redactor();
	}
);
</script>