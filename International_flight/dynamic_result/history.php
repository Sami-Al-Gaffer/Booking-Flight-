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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pnr =$_POST['pnr'];


}

$command1 = "*".$pnr."^*h~x";
 
?>


<?php

//parse the Data using SoapClient
 $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');


$order_return= $client->RunVRSCommand(array('Token'=>"NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=>$command1)); ////Using Post method command

$return = simplexml_load_string($order_return);   //output string convert in XML object


$return = json_decode(json_encode($return), true); //Xml object parse into json array

?>

<h1 align="center">Displaying  PNR Information </h1>


 

</body>
</html>




<?php
echo "<pre>";

print_r($return);

echo "<pre>";



?>
