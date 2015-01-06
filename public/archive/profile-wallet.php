<?php 
##############################################################
##	Sample voguepay confirmation/order processing script.	##
##	This easy-to-use sample is provided as-is under the 	##
##	GNU LGPL Version 3 License which can be found at:		##
##	http://www.gnu.org/licenses/lgpl-3.0-standalone.html					## 
##	Script is hosted at http://vogue247.com/voguepay		## 
##	There is no warranty for this opensource script			## 
##############################################################

##It is assumed that you have put the URL to this file in the notification url (notify_url)
##of the form you submitted to voguepay.
##VoguePay Submits transaction id to this file as $_POST['transaction_id']
/*--------------Begin Processing-----------------*/
##Check if transaction ID has been submitted

if(isset($_POST['transaction_id'])){
	//get the full transaction details as an json from voguepay
	$json = file_get_contents('https://voguepay.com/?v_transaction_id='.$_POST['transaction_id'].'&type=json');
	//create new array to store our transaction detail
	$transaction = json_decode($json, true);
	
	/*
	Now we have the following keys in our $transaction array
	$transaction['merchant_id'],
	$transaction['transaction_id'],
	$transaction['email'],
	$transaction['total'], 
	$transaction['merchant_ref'], 
	$transaction['memo'],
	$transaction['status'],
	$transaction['date'],
	$transaction['referrer'],
	$transaction['method']
	*/
	
	if($transaction['total'] == 0)die('Invalid total');
	
	if($transaction['status'] == 'Approved'){
	
		$get_user = userinfo($transaction['merchant_ref']);
		
		$new_balance = $get_user['money'] + $transaction['total'];
		
		$data = array("user_id" => $transaction['merchant_ref'] , "transaction_id" => $transaction['transaction_id'] , "date" => time() , "deposit" => $transaction['total'] ,"status" => $transaction['status'] );
		$insert = $db->insert("transactions", $data);
		
		$new_data = array("money" => $transaction['total'] );
		$insert = $db->update("users", $data, "id=" . $transaction['merchant_ref']);
	
	} else {
		$data = array("user_id" => $transaction['merchant_ref'] , "transaction_id" => $transaction['transaction_id'] , "date" => time() , "deposit" => $transaction['total'] ,"status" => $transaction['status'] );
		$insert = $db->insert("transactions", $data);
	}
	/*You can do anything you want now with the transaction details or the merchant reference.
	You should query your database with the merchant reference and fetch the records you saved for this transaction.
	Then you should compare the $transaction['total'] with the total from your database.*/
}

	$paginator = new Pagination("transactions", 'user_id=' . $user_info['id']);
	$paginator->setOrders("id", "ASC");
	$paginator->setPage($_GET['page']);
	$paginator->allowedfield($allowed);
	$paginator->setNewOrders($input->gc['orderby'], $input->gc['sortby']);
	$paginator->setLink("./?view=profile&profile=wallet&" . $adlink);
	$q = $paginator->getQuery();
?>

<h3>Deposit Money</h3>

<form method="POST" action='https://voguepay.com/pay/' class="form">
	<input type="hidden" name="conf_add" value='true'>
	<div class="form-group col-md-6">                               
		<div class="input-group">
			<input type='hidden' name='v_merchant_id' value='<?php echo get_option('merchant_id'); ?>' />
			<input type='hidden' name='merchant_ref' value='<?php echo $user_info['id']; ?>' />
			<input type='hidden' name='memo' value='<?php echo get_option('site_name'); ?>' />

			<span class="input-group-addon">$</span>
            <input type="text" name="total" placeholder="Price" value="0">
            <span class="input-group-addon">.00</span>
			
			<input type='hidden' name='notify_url' value='http://www.<?php echo get_option('web_site_domain'); ?>/index.php?view=profile&profile=wallet' />
			<input type='hidden' name='success_url' value='http://www.<?php echo get_option('web_site_domain'); ?>/index.php?view=profile&profile=thank-you' />
        </div>
	</div>   
	
	<div class="form-group col-md-3">
		<button type="submit" class="btn btn-primary btn-block">Deposit</button>
	</div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%"> # </th>
            <th width="50%"> Transaction ID </th>
            <th> Date </th>
			<th> Deposited </th>
			<th> Status </th>
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
        <tr>
            <td> <?php echo $n; ?> </td>
            <td> <?php echo $r['transaction_id']; ?> </td>
            <td> <?php echo date("d M y",$r['date']); ?> </td>
			<td> <?php echo $r['deposit']; ?> </td>
			<td> <?php echo $r['status']; ?> </td>
        </tr>
		<?php	
			}
		}
		if ($paginator->totalResults() == 0) {
		?>
		<tr>
			<td colspan='5' align='center'>Records not found</td>
		</tr>
		<?php	
		}
		?>
    </tbody>
</table>


