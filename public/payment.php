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
}