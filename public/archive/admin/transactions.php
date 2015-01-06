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
	<!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Transactions</h1>
            </div>
          </div><!--col-md-12 end-->
        </div><!--row end-->

        <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>Transactions List</h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
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
						$count_schools = $db->fetchOne("SELECT COUNT(*) AS NUM FROM transactions ORDER BY id ASC");
						
						$n = 0;
						for ($x=0; $x < $count_schools; $x++) {
							if ($r = $db->fetch_array($q)) {
							$n++;
						?>
						<tr class="gradeX" id="su<?php echo $n; ?>">
							<td width="10%" class="center"><?php echo $n; ?></td>
							<td width="20%"><?php echo get_username($r['user_id']); ?></td>
							<td width="20%"><?php echo $r['transaction_id']; ?></td>
							<td width="20%"><?php echo date("m.d.y",$r['date']); ?></td>
							<td width="5%"><?php echo $r['deposit']; ?></td>
							<td width="5%"><?php echo $r['status']; ?></td>
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
			</div>
		</div>
		</div>
		</div>
	<?php		
	
	include ('footer.php');
	
	?>