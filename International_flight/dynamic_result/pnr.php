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
</head>
<body>

  <?php
// define variables and set to empty values
$pnr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pnr =$_POST["pnr"];


}

//$command = "*AC7W84~x";
$command1 = "*".$pnr."~x";
//echo $command1;
//AC7WB4
 
?>


<?php

//parse the Data using SoapClient
 $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');


$order_return= $client->RunVRSCommand(array('Token'=>"NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=>$command1)); ////Using Post method command

$return = simplexml_load_string($order_return);   //output string convert in XML object


$return = json_decode(json_encode($return), true); //Xml object parse into json array

?>

<h1 align="center">Displaying PNR Value  </h1>


<table id="customers">
  <tr>
    <th>PNR No </th>
    <th>Name</th>
    <th>Itinerary</th>
    <th>Contact</th>
    <th>Ticket</th>
    <th>Payment </th>
    <th>Payments Reference </th>
    <th>Payment Currency </th>
    <th>Payment Date </th>

  </tr>

  <tr>
    <td><?= $return['@attributes']['RLOC'];?></td>
<?php
 if (empty($return['Names']['PAX']['0']))  
{  
    ?>
  
    <td><?= $return['Names']['PAX']['@attributes']['Title'].' '.$return['Names']['PAX']['@attributes']['FirstName'].' '.$return['Names']['PAX']['@attributes']['Surname'];?></td>
<?php }
    else{  ?>
       
        <td> <?php foreach($return['Names']['PAX'] as $value1){

            echo $value1['@attributes']['Title'].' '.$value1['@attributes']['FirstName'].' '.$value1['@attributes']['Surname']."(".$value1['@attributes']['PaxType'].")<br>";}?></td>
  <?php 



}?>
   
       <td><?= "Flight: ". $return['Itinerary']['Itin']['@attributes']['AirID']." ".$return['Itinerary']['Itin']['@attributes']['FltNo']."<br>"
    ."Departure Date : ".$return['Itinerary']['Itin']['@attributes']['DepDate']."<br>"
    ."Departure : ".$return['Itinerary']['Itin']['@attributes']['Depart'] ."   Arival:  ".$return['Itinerary']['Itin']['@attributes']['Arrive']."<br>"
    ."Status : ".$return['Itinerary']['Itin']['@attributes']['Status'] ."   Total Passenger:  ".$return['Itinerary']['Itin']['@attributes']['PaxQty'].
    "   Class:  ".$return['Itinerary']['Itin']['@attributes']['Class'];?></td>
    <td><?='Mobile No :'.$return['Contacts']['CTC']['1']."<br>"
    .'Email : '.$return['Contacts']['CTC']['0'];?>
  </td>
      <td> <?= 'Tickets ID :'.$return['Tickets']['TKT']['@attributes']['TKTID']."<br>".
     'Ticket No:'.$return['Tickets']['TKT']['@attributes']['TktNo'];?>
    </td>
  
    <td> <?= 'Payment Amount :'.$return['Payments']['FOP']['@attributes']['PayAmt']."<br>".
     'PNR Amount:'.$return['Payments']['FOP']['@attributes']['PNRAmt'];?>
    </td>
    <td><?= $return['Payments']['FOP']['@attributes']['PayRef'] ;?> </td>
    <td><?= $return['Payments']['FOP']['@attributes']['PNRCur'];?> </td>
    <td><?= $return['Payments']['FOP']['@attributes']['PayDate'] ;?> </td> 
  </tr>
  
</table>

</body>
</html>




<?php
echo "<pre>";

print_r($return);

echo "<pre>";



?>
