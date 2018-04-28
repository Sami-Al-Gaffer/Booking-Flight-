

 <?php

session_start();
$_SESSION['flight'] = $_POST; 


 $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');

////Using Post method command
$order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $_SESSION['command'])); ////Using Post method command


$return = simplexml_load_string($order_return);   //output string convert in XML object


$return = json_decode(json_encode($return), true); //Xml object parse into json array



 if ((!empty($return['itin']['0'])))  {
foreach($return['itin'] as $value){  

      $av = array();
      foreach( array_filter($value['flt']['fltav'] ['av'])as $value1){ 
      if($_SESSION['tot'] >$value1){
        continue;
      }else{
        $av[] = $value1;
        //echo min($av) ;
        $key = array_search( min($av), $value['flt']['fltav']['av'] );
      }
    }

    if(isset($_SESSION['flight'])){

      if($value['flt']['fltdet']['fltno'] == $_SESSION['flight']['flight_no']){
        $id_class= $value['flt']['fltav']['id'][$key];
        $_SESSION['class']=$id_class;
      } 
    }
  }
}else{

      $av = array();
      foreach( array_filter($return['itin']['flt']['fltav'] ['av'])as $value1){ 
      if($_SESSION['tot'] >$value1){
        continue;
      }else{
        $av[] = $value1;
        $key = array_search( min($av), $return['itin']['flt']['fltav']['av'] );
      }
    }

    if(isset($_SESSION['flight'])){

      if($return['itin']['flt']['fltdet']['fltno'] == $_SESSION['flight']['flight_no']){
        $id_class= $return['itin']['flt']['fltav']['id'][$key];
        $_SESSION['class']=$id_class;
      } 
    }

}
 
    
 ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Contact Form </title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/style.css">

  <title>Sign up</title>
</head>

<body>
  <div class="main" align="center">
    <p class="su">Contact Information</p>
    <form class="form1" align="center" method="post" action="pax.php">
        TITLE
        <select name='lead_title' class='country' required>
                <option value='MR'>MR</option>
                <option value='MRS'>MRS</option>
                <option value='MSTR'>MSTR</option>
                <option value='MISS'>MISS</option>
      </select>
      <input class='first' name='c_first_name1' type='text' placeholder='First Name' required autofocus />
      <input class='first' name='c_last_name1' type='text' placeholder='Last Name' required autofocus />
<br>
      Country
      <select name="lead_country" class="country" required >
         <option value="BANGLADESH">BANGLADESH</option> 
         <option value="CHITTAGONG">INDIA</option>
         <option value="USA">USA</option>
         <option value="SRILANKA">SRILANKA</option>
          
      </select>
     <input class='mail' name='lead_email' type='email' placeholder='Email Address' required autofocus  />
     <input class='mail' name='lead_email1' type='email' placeholder='Verify Email Address' required autofocus  /> 
     <input class='mail' name='lead_mobile' type='number' placeholder='Mobile NO' required autofocus  />


      
      <br>

      <input class="submit" type="submit" value="Submit" align="center"> </form>
  </div>

</body>

</html>
  
  

</body>

</html>
