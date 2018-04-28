<?php 
session_start();
if(!isset($_POST['mcnt_Amount']))
	{
		header("location: index.php");
	}

	$urlparamForHash = http_build_query( array( 
	 'mcnt_AccessCode' => $_POST['mcnt_AccessCode'],
	 'mcnt_TxnNo' => $_POST['mcnt_TxnNo'],//Ymdhmsu//PNR 
	 'mcnt_ShortName' => $_POST['mcnt_ShortName'], 
	 'mcnt_OrderNo' => $_POST['mcnt_OrderNo'],
	  'mcnt_ShopId' => $_POST['mcnt_ShopId'], 
	  'mcnt_Amount' => $_POST['mcnt_Amount'], 
	  'mcnt_Currency' => $_POST['mcnt_Currency'] ) );

	$urlparamForPost = $_POST;
	$_SESSION['urlparamForPost'] =$urlparamForPost;


	$secretkey='9c6418ef719e1d2999dd3c8c442373f4';
	$secret = strtoupper($secretkey);
	$hashinput =hash_hmac("SHA256", $urlparamForHash, pack('H*', $secret)); 
	//hash_hmac(algo, data, key)

	$_SESSION['hashinput'] = $hashinput;
	//echo  $hashinput;
	echo $urlparamForHash;

	header("location: payment_contact.php");
	

?>