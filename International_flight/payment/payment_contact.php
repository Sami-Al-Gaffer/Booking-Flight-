<?php 
session_start();



//echo $_SESSION['hashinput'];
$domain = "flyregent.com"; // or Manually put your domain name $ip = $_SERVER["SERVER_ADDR"];//
$ip = "192.168.0.100"; // or Manually put your domain name $ip = $_SERVER["SERVER_ADDR"];//


?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Payment Contact</title>
  
  
  
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../css/style.css">

  
</head>


<body>


<div>
 <div class="main" align="center">
	 <div>
		<h2>Payment Gateway Testing Sample</h2>
	</div>
	<form name="postForm" class="form1" align="center" action="amount_to_paid.php" method="POST" >
	<input type="hidden"  name="mcnt_TxnNo" value="<?php echo $mcnt_TxnNo=$_SESSION['urlparamForPost']['mcnt_TxnNo']; ?>" size="64" />
	<input type="hidden" name="mcnt_ShortName" value="<?php echo $short_name = $_SESSION['urlparamForPost']['mcnt_ShortName'];?>" />
	<input type="hidden" name="mcnt_OrderNo" value="<?php echo $order_id= $_SESSION['urlparamForPost']['mcnt_OrderNo']; ?>" size="64" />
	<input type="hidden" name="mcnt_ShopId" value="<?php echo $shop_id= $_SESSION['urlparamForPost']['mcnt_ShopId']; ?>" size="64" />
	<input type="hidden" name="mcnt_Amount" value="<?php echo $amount= $_SESSION['urlparamForPost']['mcnt_Amount']; ?>" size="64" />
	<input type="hidden" name="mcnt_Currency" value="<?php echo $currency= $_SESSION['urlparamForPost']['mcnt_Currency']; ?>" size="64" />
	   <input type="text" class='first' name="cust_InvoiceTo" placeholder='Invoice To' value="" />
	 <input type="text" class='first' name="cust_CustomerServiceName" placeholder='Customer Service Name' value="" />
	 <input type="text" class='first' name="cust_CustomerName" placeholder='Customer FullName' value="" />
	 <input type="email" class='first' name="cust_CustomerEmail" placeholder='Email' value="" />
	 <input type="text"  class='first' name="cust_CustomerContact" placeholder='Phone' value="" />
	 <input type="text" class='first' name="cust_CustomerAddress" placeholder='Address' value="" />
	<input type="text" class='first'  name="cust_CustomerCity" placeholder='City' value="" />
	 <input type="text" class='first' name="cust_Billingaddress" placeholder='Billingaddress' value="" /><br>
	Item <select name="cust_orderitems" class="country" required >
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option> 
         <option value="4">4</option>
         <option value="5">5</option>
        <option value="6">6</option>
         <option value="7">7</option> 
         <option value="8">8</option>
         <option value="9">9</option>
      </select>


	<input type="hidden" name="success_url" value="http://127.0.0.1/Regent_Booking/International_Flight/Success.php" size="64" />
	<input type="hidden" name="fail_url" value="http://127.0.0.1/Regent_Booking/International_Flight/Fail.php" size="64" />
	<input type="hidden" name="cancel_url" value="http://127.0.0.1/Regent_Booking/International_Flight/Cancel.php" size="64" />
	<input type="hidden" name="domain_name" value="<?php echo $domain; ?>" size="64" />
	<input type="hidden" name="domain_ip" value="<?php echo $ip; ?>" size="64" />
	<input type="hidden" name="mcnt_SecureHashValue" value="<?php echo $mcnt_SecureHashValue= $_SESSION['hashinput']; ?>" size="64" /><br>

	<input class="submit" type="submit" value="Submit" align="center">
	</form>
 </div>
</div>
</body>
</html>