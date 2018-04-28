<?php

if(!isset($_POST['cust_CustomerName']))
	{
		header("location: payment_contact.php");
	}


$domain = "flyregent.com"; // or Manually put your domain name 
$ip = "192.168.0.100";//domain ip 
$urlparam = http_build_query( 
	array( 
		'mcnt_TxnNo' => $_POST['mcnt_TxnNo'], 
		'mcnt_ShortName' => $_POST['mcnt_ShortName'], //No Need to Change 
		'mcnt_OrderNo' => $_POST['mcnt_OrderNo'], 
		'mcnt_ShopId' => $_POST['mcnt_ShopId'], //No Need to Change 
		'mcnt_Amount' => $_POST['mcnt_Amount'], 
		'mcnt_Currency' => $_POST['mcnt_Currency'], 
		'cust_InvoiceTo' =>  $_POST['cust_InvoiceTo'], 
		'cust_CustomerServiceName' => $_POST['cust_CustomerServiceName'],
		'cust_CustomerName' => $_POST['cust_CustomerName'], 
		'cust_CustomerEmail' => $_POST['cust_CustomerEmail'], 
		'cust_CustomerAddress' => $_POST['cust_CustomerAddress'], 
		'cust_CustomerContact' => $_POST['cust_CustomerContact'], 
		'cust_CustomerCity' => $_POST['cust_CustomerCity'], 
		'cust_CustomerCountry' => 'Bangladesh', 
		'cust_Billingaddress' => $_POST['cust_Billingaddress'], 
		'cust_orderitems' => $_POST['cust_orderitems'],
		'success_url' =>$_POST['success_url'],
		'cancel_url' => $_POST['cancel_url'],
		'fail_url' => $_POST['fail_url'],
		'merchentdomainname' => $domain, 
		'merchentip' => $ip, 
		'mcnt_SecureHashValue' =>$_POST['mcnt_SecureHashValue']
	) 
);

 $url ="http://demo.fosterpayments.com/fosterpayments/receivemerchantpaymentrequestwsfc.php?".$urlparam;
 //echo $url;
header("Location:" . $url);
?>