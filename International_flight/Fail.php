
		<h2>Payment Successs</h2>

		<?php 

		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
			?>



<?php

session_start();

//$_SESSION['update_lead_pax'] = $_POST;

  // echo "<pre>";
  // print_r($_SESSION['update_lead_pax']);
  // echo "<pre>";
  //   echo "<pre>";
  // print_r( $_SESSION['booking']);
  // echo "<pre>";


?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

 <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <h1 align="center">COMPLETE BOOKING </h1>
    <br><br>


<?php

// if( isset($_POST["child_date1"]) )
// {
//          $date =$_POST["child_date1"];
//         // new DateTime(); 
//          $date = new DateTime($date);
//          $now = new DateTime();
//          $interval = $now->diff($date);
//          $child_date= $interval->y ;
// }

// if(isset($_POST["infant_date1"])){

//   $date1 =$_POST["infant_date1"];
// // new DateTime(); 
//  $date1 = new DateTime($date1);
//  $now1 = new DateTime();
//  $inter = $now1->diff($date1);
//  $infant_date= $inter->y*12 + $inter->m;;
// }




//$co = "*".$_POST['MerchantTxnNo']."^MI^EZT*R^EZRE^*R~x";
$co = "*AC7WLF^MI2998.00-123456^EZT*R^EZRE^*R~x";

//parse the Data using SoapClient
 $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');

////Using Post method command
$order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=>$co )); ////Using Post method command



$return = simplexml_load_string($order_return);   //output string convert in XML object


$return = json_decode(json_encode($return), true); //Xml object parse into json array


 
//Display the API value in Table



?>


<?php 
if($total<=1){  ?>
    <table id="customers">
  <tr>
    <th>Name</th>
    <th>Itinerary</th>
    <th>Contact Details</th>
    <th>Fare Details</th>
    <th>Payment</th>
    <th>Ticket</th>
    <th>Tax Breakdown</th> 
     <th>Action</th> 

  </tr>

   <form method = "post" action="update_booking1.php">
  <tr>
    <td><?=  $return['Names']['PAX']['@attributes']['Title']." ".$return['Names']['PAX']['@attributes']['FirstName']." ".$return['Names']['PAX']['@attributes']['Surname']." (".$return['Names']['PAX']['@attributes']['PaxType'] .")";?></td>
    
    <td><?= "PNR : ". $return['@attributes']['RLOC']."<br>".
    "Flight: ". $return['Itinerary']['Itin']['@attributes']['AirID']." ".$return['Itinerary']['Itin']['@attributes']['FltNo']."<br>"
    ."Departure Date : ".$return['Itinerary']['Itin']['@attributes']['DepDate']."<br>"
    ."Departure : ".$return['Itinerary']['Itin']['@attributes']['Depart'] ."   Arival:  ".$return['Itinerary']['Itin']['@attributes']['Arrive']."<br>"
    ."Status : ".$return['Itinerary']['Itin']['@attributes']['Status'] ."   Total Passenger:  ".$return['Itinerary']['Itin']['@attributes']['PaxQty'].
    "   Class:  ".$return['Itinerary']['Itin']['@attributes']['Class'];?></td>
     <td><?= $return['Contacts']['CTC']['0']."<br> " . $return['Contacts']['CTC']['1']?></td>

    <td><?= "Total Fare: ". $return['FareQuote']['FQItin']['@attributes']['Total']. " (".$return['FareQuote']['FQItin']['@attributes']['Cur']." )"."<br>".
    "Fare: ".$return['FareQuote']['FQItin']['@attributes']['Fare']."<br>".
     "Tax: ".$return['FareQuote']['FQItin']['@attributes']['Tax1'];?></td>


    <td><?= "Payment Amount: ". $return['Payments']['FOP']['@attributes']['PayAmt']."<br>".
     "Payment Reference: ".$return['Payments']['FOP']['@attributes']['PayRef']."<br>".
     "Payment Date: ".$return['Payments']['FOP']['@attributes']['PayDate'];?></td>

     <td><?= "Ticket Id: ". $return['Tickets']['TKT']['@attributes']['TKTID']."<br>".
     "Ticket No: ".$return['Tickets']['TKT']['@attributes']['TktNo']."<br>".
     "Flight Date: ".$return['Tickets']['TKT']['@attributes']['TktFltDate']."<br>".
     "Flight NO: ".$return['Tickets']['TKT']['@attributes']['TktFltNo'];?></td>
     <td><?php foreach ($return['FareQuote']['FareTax']['PaxTax'] as $val) {
              echo "Code : ". $val['@attributes']['Code'] ."  Amount : " . $val['@attributes']['Amnt']."<br>";
     }?></td>
     <td><input type="submit" name="action" value="Edit" />
    </td>


    
  </tr>
  </form>
  
</table>

<?php }
else{ ?>

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Itinerary</th>
    <th>Contact Details</th>
    <th>Fare Details</th>
    <th>Payment</th>
    <th>Ticket</th>
    <th>Tax Breakdown</th>


  </tr>

  <form method = "post" action="update_booking1.php">

  <tr>
    <td><?php foreach($return['Names']['PAX'] as $value1){  
      echo $value1['@attributes']['Title']." ".$value1['@attributes']['FirstName']." ".$value1['@attributes']['Surname']." (".$value1['@attributes']['PaxType'] .")"."<br>";}?></td>
    
    <td><?= "PNR : ". $return['@attributes']['RLOC']."<br>".
    "Flight: ". $return['Itinerary']['Itin']['@attributes']['AirID']." ".$return['Itinerary']['Itin']['@attributes']['FltNo']."<br>"
    ."Departure Date : ".$return['Itinerary']['Itin']['@attributes']['DepDate']."<br>"
    ."Departure : ".$return['Itinerary']['Itin']['@attributes']['Depart'] ."   Arival:  ".$return['Itinerary']['Itin']['@attributes']['Arrive']."<br>"
    ."Status : ".$return['Itinerary']['Itin']['@attributes']['Status'] ."   Total Passenger:  ".$return['Itinerary']['Itin']['@attributes']['PaxQty'].
    "   Class:  ".$return['Itinerary']['Itin']['@attributes']['Class'];?></td>
     <td><?= "Email: " .$return['Contacts']['CTC']['0']."<br> "."Mobile NO: ".$return['Contacts']['CTC']['1'];?></td>


         <td><?php $count = 0;
         foreach($return['FareQuote']['FareStore'] as $value1){
         $count++;
         $arr = count($return['FareQuote']['FareStore']);
               if( $count == $arr){
              continue;
      }
        echo "Total Fare: ". $value1['@attributes']['Total']. " (".$value1['@attributes']['Cur']." )"."<br>".
         "Fare: ".$value1['SegmentFS']['@attributes']['Fare']." ".
         "Tax: ".$value1['SegmentFS']['@attributes']['Tax1']."<br>";}?></td>



    <td><?= "Payment Amount: ". $return['Payments']['FOP']['@attributes']['PayAmt']."<br>".
     "Payment Reference: ".$return['Payments']['FOP']['@attributes']['PayRef']."<br>".
     "Payment Date: ".$return['Payments']['FOP']['@attributes']['PayDate'];?></td>



    <td><?php foreach($return['Tickets']['TKT']as $value1){  
    echo "Pax No: ".$value1['@attributes']['Pax']." Ticket ID:   ".$value1['@attributes']['TKTID']." Ticket NO: ".$value1['@attributes']['TktNo']."<br>";}?></td>

    <td><?php foreach ($return['FareQuote']['FareTax']['PaxTax']as $value1) {
              echo "Code : ". $value1['@attributes']['Code'] ."  Amount : " . $value1['@attributes']['Amnt']."<br>"; }?></td>
    <td><input type="submit" name="action" value="Edit" />
    </td>
    
  </tr>
  </form>
 
  
</table>
<?php } ?>



<?php 

// echo "<pre>";
// print_r($return);
// echo "</pre>";
?>

</body>
</html>
