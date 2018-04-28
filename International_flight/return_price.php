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
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<h1 align="center">Price and Avaibality </h1>
	<br><br>

  <?php

  session_start();
   $_SESSION['post-data'] = $_POST;

   echo "<pre>";
   print_r($_SESSION['post-data']);
   echo "</pre>";

  $date=$departure=$arrival=$adult=$child=$infant=$date1= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $date =$_POST["date"];
   $date1 =$_POST["return_date"];
    $departure =$_POST["departure"];
    $arrival = $_POST["arr"];
    $adult =$_POST["adult"];
    $child =$_POST["child"];
    $infant =$_POST["infant"];


} 

$total = $adult +$child+$infant;
$_SESSION['tot'] = $total;
//$_SESSION['total'] = $total +$infant;
//$command = "A10MARDACCGP[SalesCity=DAC,VARS=True,ClassBands=True,StartCity=DAC,SingleSeg=s,FGNoAv=True,qtyseats=1]";
$command1 = "A".date("dM",strtotime($date))."".$departure."".$arrival."[SalesCity=".$departure.",VARS=True,ClassBands=True,StartCity=DAC,SingleSeg=s,FGNoAv=True,qtyseats=".$total."]";
//echo $command1;
$command2 = "A".date("dM",strtotime($date1))."".$arrival."".$departure."[SalesCity=".$departure.",VARS=True,ClassBands=True,StartCity=DAC,SingleSeg=s,FGNoAv=True,qtyseats=".$total."]";
$_SESSION['command'] =$command1;
$_SESSION['command1'] =$command2;


//parse the Data using SoapClient
 $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');

////Using Post method command
$order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $command1)); ////Using Post method command


$return = simplexml_load_string($order_return);   //output string convert in XML object


$return = json_decode(json_encode($return), true); //Xml object parse into json array


 $client1 = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');

////Using Post method command
$order_return1 = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $command2)); ////Using Post method command


$return1 = simplexml_load_string($order_return1);   //output string convert in XML object


$return1 = json_decode(json_encode($return1), true); //Xml object parse into json array



//Display the API value in Table



?>
<?php
if(empty($return['itin'])){
  echo "<h1 align='center'>No availability information for this city pair/date</h1>";
}else{

      //$val=is_array($return['itin']['0']);
      //!empty(['itin']['0']


 if (!empty($return['itin']['0']))  
{
  ?>
  <table id="customers">
  <tr>
    <th>Date</th>
    <th>Departure and Arrival</th>
    <th>Time Schedule</th>
    <th>Flight No</th>
    <th>Available</th>
    <th>Class</th>
    <th>Price</th>
    <th>Tax</th>
  </tr>
<?php
foreach($return['itin'] as $value){  
  $av = array();
?>
  <tr>
     <td><?= $value['flt']['time']['ddaylcl' ];?></td>
    <td><?= " Departure: ". $value['@attributes']['dep'] ."  Arrival: ".$value['@attributes']['arr'];?></td>
    <td><?= "Departure Time : ".$value['flt']['time']['dtimlcl']. " Arrival Time : ".$value['flt']['time']['atimlcl'] ;?></td>
    <td><?= $value['flt']['fltdet']['fltno'];?></td>
    <td><?php foreach( array_filter($value['flt']['fltav'] ['av'])as $value1){ 
      if($total>$value1){
        continue;
      }else{
        $av[] = $value1;
        //echo min($av) ;
        $key = array_search( min($av), $value['flt']['fltav']['av'] );
      }
    }
     echo min($av) ;
    ?>
  </td>
    <td><?= $value['flt']['fltav']['id'][$key] ?>
    </td>

  
    <td> <?= $value['flt']['fltav']['pri'][$key] ;?>
    </td>
    <td><?= $value['flt']['fltav']['tax'][$key];?>
    </td>
    
  </tr>
  <?php } ?>
  
</table>

  <div class="main" align="center">
    <p class="su">SELECT A FLIGHT </p>
    <form class="form1" align="center" method="post" action="contact.php">

      <input class="first" type="text" placeholder="FLIGHT NO" name= "flight_no" required autofocus>
      
      <br>
      <input type="submit" name="submit" value="Submit">  


   </form>
  </div>

<?php }
else
{
  $av = array();
  ?>

  <table id="customers">
  <tr>
    <th>Date</th>
    <th>Departure and Arrival</th>
    <th>Time Schedule</th>
    <th>Flight No</th>
    <th>Available</th>
    <th>Class</th>
    <th>Price</th>
    <th>Tax</th>
  </tr>
  <tr>
     <td><?= $return['itin']['flt']['time']['ddaylcl' ];?></td>
    <td><?= " Departure: ". $return['itin']['@attributes']['dep'] ."  Arrival: ".$return['itin']['@attributes']['arr'];?></td>
    <td><?= "Departure Time : ".$return['itin']['flt']['time']['dtimlcl']. " Arrival Time : ".$return['itin']['flt']['time']['atimlcl'] ;?></td>
    <td><?= $return['itin']['flt']['fltdet']['fltno'];?></td>
    <td><?php 
    if(array_filter($return['itin']['flt']['fltav'] ['av']) == "" || array_filter($return['itin']['flt']['fltav'] ['av']) == NULL){
      echo "NOT Available";
    }else{
      foreach( array_filter($return['itin']['flt']['fltav'] ['av'])as $value1){ 
      if($total>$value1){
        continue;
      }else{
        $av[] = $value1;
        //echo min($av) ;
        $key = array_search( min($av), $return['itin']['flt']['fltav']['av'] );
      }
    }
     echo min($av) ;
   }
    ?>
  </td>
    <td><?php if(array_filter($return['itin']['flt']['fltav'] ['av']) == "" || array_filter($return['itin']['flt']['fltav'] ['av']) == NULL){
      echo "NOT Available";
    }else{
     echo $return['itin']['flt']['fltav']['id'][$key];

    } ?>
    </td>
    <td><?php if(array_filter($return['itin']['flt']['fltav'] ['av']) == "" || array_filter($return['itin']['flt']['fltav'] ['av']) == NULL){
      echo "  ";
    }else{
     echo $return['itin']['flt']['fltav']['pri'][$key] ;

    } ?>
    </td>
    <td><?php if(array_filter($return['itin']['flt']['fltav'] ['av']) == "" || array_filter($return['itin']['flt']['fltav'] ['av']) == NULL){
      echo "  ";
    }else{
     echo $return['itin'] ['flt']['fltav']['tax'][$key] ;

    } ?>
    </td>
    
  </tr>

  
</table>


  <div class="main" align="center">
    <p class="su">SELECT A FLIGHT </p>
    <form class="form1" align="center" method="post" action="contact.php">

      <input class="first" type="text" placeholder="FLIGHT NO" name= "flight_no" required autofocus>
      
      <br>
      <input type="submit" name="submit" value="Submit">  


   </form>
  </div>

 
  <?php }}?>



</body>
</html>
  <?php 
  // echo "<pre>";
  // print_r($return);
  // echo "<pre>";

    echo "<pre>";
  print_r($return1);
  echo "<pre>";
  ?>






