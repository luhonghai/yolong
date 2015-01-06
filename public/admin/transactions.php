<?php

	$paginator = new Pagination("transactions", $cond);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($input->gc['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=transactions&" . $adlink);
	$q = $paginator->getQuery();
	
	include ('header.php');
?>

<section class="row m-b-md">
    <div class="col-sm-6">
		<h3 class="m-b-xs text-black">Transactions</h3>
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
    <header class="panel-heading"><?php echo count_rows('transactions'); ?> Transactions <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
    <div class="table-responsive">
        <table class="table table-striped m-b-none" data-ride="datatables">
            <thead>
                <tr>
					<th>No.</th>							
					<th>User</th>
					<th>Transaction ID</th>
					<th>Date</th>
					<th>Deposit</th>
					<th>Status</th>
                </tr>
            </thead>
            <tbody>
			<?php
			$n = 0;
			for ($x=0; $x < count_rows('transactions'); $x++) {
				if ($r = $db->fetch_array($q)) {
				$n++;
			?>
				<tr class="gradeX">
					<td width="10%" class="center"><?php echo $n; ?></td>
					<td width="20%"><?php echo get_username($r['user_id']); ?></td>
					<td width="20%"><?php echo $r['transaction_id']; ?></td>
					<td width="20%"><?php echo date("m.d.y",$r['date']); ?></td>
					<td width="5%"><?php echo $r['deposit']; ?></td>
					<td>
						<a>
							<?php echo ( $r['status'] == "Approved" ) ? '<i class="fa fa-times text-danger text"></i>' : '<i class="fa fa-check text-success text-active"></i>' ?>
						</a>
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