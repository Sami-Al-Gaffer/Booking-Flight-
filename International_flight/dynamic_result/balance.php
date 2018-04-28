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
$balance="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $balance =$_POST['pnr'];


}

//$command = "*AC7W84~x";
$command1 = $balance."~x";
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

<h1 align="center">Displaying Balance Information </h1>


<table id="customers">
  <tr>
    <th>Official Code </th>
    <th>Official Name</th>
    <th>Status</th>
    <th>currency</th>
    <th>Limit</th>

  </tr>
      <td> <?= $return['officecode'];?>
    </td>
    <td><?= $return['officename'];?> </td>
    <td><?= $return['ticketmoneylimit']['@attributes']['Status'];?> </td>
    <td><?= $return['ticketmoneylimit']['@attributes']['cur'];?> </td>
    <td><?= $return['ticketmoneylimit']['@attributes']['limit'];?> </td>

  <tr>
 
  </tr>
  
</table>

</body>
</html>




<?php
echo "<pre>";

print_r($return);

echo "<pre>";



?>
