<html>
<head>
  <title></title>
</head>
<body>

</body>
</html><?php

session_start();

$_SESSION['booking'] = $_POST;

?>

<?php

if( isset($_POST["child_date1"]) )
{
         $date =$_POST["child_date1"];
        // new DateTime(); 
         $date = new DateTime($date);
         $now = new DateTime();
         $interval = $now->diff($date);
         $child_date= $interval->y ;
}

if(isset($_POST["infant_date1"])){

  $date1 =$_POST["infant_date1"];
// new DateTime(); 
 $date1 = new DateTime($date1);
 $now1 = new DateTime();
 $inter = $now1->diff($date1);
 $infant_date= $inter->y*12 + $inter->m;;
}



$total = $_SESSION['post-data']['adult']+$_SESSION['post-data']['child']+$_SESSION['post-data']['infant'];
$to =$_SESSION['post-data']['adult']+$_SESSION['post-data']['child'];

if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP' ){


        if($total<=1){
        $command1 = "-".$_POST['last_name1']."/".$_POST['first_name1']."". $_POST['title1']."^9E*".$_SESSION['lead_pax']['lead_email']."^9M*".$_SESSION['lead_pax']['lead_mobile']
        ."^0RX".$_SESSION['flight']['flight_no']. $_SESSION['class']."".date("dM",strtotime($_SESSION['post-data']['date']))."".$_SESSION['post-data']['departure']."". $_SESSION['post-data']['arr']
        ."NN1^FG^FS1^e*R~x";
       // echo $command1;

    }
    else{

//-4KHAN/SOYKETMR/FIRSTNAMEMRS/TOUSIFMSTR.CH10/MAISHAMISS.IN06^9E*test@videcom.com^9M*+189899^0RX0715Q20MARDACCGPNN3^4-1FPSPT/54454545/GB/09MAY84/KHAN/SOYKETMR^3-1FDOB 09-MAY-1984^3-1FGNDR MALE^FG^FS1^*R^MI^EZT*R^EZRE^*R~x

            $a="";
            for($i=1; $i<=$_SESSION['post-data']['adult'];$i++){

            $a .="/".$_POST['first_name'.$i]."".$_POST['title'.$i];

            }
            $b="";
            for($i=1; $i<=$_SESSION['post-data']['child'];$i++){

            $b .="/".$_POST['child_first_name'.$i]."".$_POST['child_title'.$i].".CH".$child_date;

            }
            $c="";
            for($i=1; $i<=$_SESSION['post-data']['infant'];$i++){

            $c .="/".$_POST['infant_first_name'.$i]."".$_POST['infant_title'.$i].".IN".$infant_date;

            }

            $command1= "-". $total."".$_POST['last_name1'].$a."".$b."".$c.
                        "^9E*".$_SESSION['lead_pax']['lead_email']."^9M*+".$_SESSION['lead_pax']['lead_mobile']."^0RX".$_SESSION['flight']['flight_no']."".$_SESSION['class']."".date("dM",strtotime($_SESSION['post-data']['date'])).
                     "".$_SESSION['post-data']['departure']."".$_SESSION['post-data']['arr']."NN".$to."^FG^FS1^e*R~x";
            }

        }
        else{

            if($total<=1){
        $command1 = "-".$_POST['last_name1']."/".$_POST['first_name1']."". $_POST['title1']."^9E*".$_SESSION['lead_pax']['lead_email']."^9M*+".$_SESSION['lead_pax']['lead_mobile']
        ."^0RX".$_SESSION['flight']['flight_no']. $_SESSION['class']."".date("dM",strtotime($_SESSION['post-data']['date']))."".$_SESSION['post-data']['departure']."". $_SESSION['post-data']['arr']
        ."NN1^4-1FPSPT/".$_POST['adult_passport1']."/GB/".date("dMY",strtotime($_POST['adult_date1']))."/".$_POST['last_name1']."/".$_POST['first_name1']."".$_POST['title1']."^3-1FDOB 09-MAY-1984^3-1FGNDR MALE^FG^FS1^e*R~x";
        //echo $command1;

    }
    else{  

//-4KHAN/SOYKETMR/FIRSTNAMEMRS/TOUSIFMSTR.CH10/MAISHAMISS.IN06^9E*test@videcom.com^9M*+189899^0RX0715Q20MARDACCGPNN3^4-1FPSPT/54454545/GB/09MAY84/KHAN/SOYKETMR^3-1FDOB 09-MAY-1984^3-1FGNDR MALE^FG^FS1^*R^MI^EZT*R^EZRE^*R~x

            $a="";
            for($i=1; $i<=$_SESSION['post-data']['adult'];$i++){

            $a .="/".$_POST['first_name'.$i]."".$_POST['title'.$i];

            }
            $b="";
            for($i=1; $i<=$_SESSION['post-data']['child'];$i++){

            $b .="/".$_POST['child_first_name'.$i]."".$_POST['child_title'.$i].".CH".$child_date;

            }
            $c="";
            for($i=1; $i<=$_SESSION['post-data']['infant'];$i++){

            $c .="/".$_POST['infant_first_name'.$i]."".$_POST['infant_title'.$i].".IN".$infant_date;

            }
            $adult_passport="";
            $adult_dob="";
            $adult_gender="";
            $add=0;
            for($i=1; $i<=$_SESSION['post-data']['adult'];$i++){

            $add++;
            $adult_passport .= "^4-".$add."FPSPT/".$_POST['adult_passport'.$i]."/GB/".date("dMY",strtotime($_POST['adult_date1']))."/".$_POST['last_name'.$i]."/".$_POST['first_name'.$i]."".$_POST['title'.$i];
            $adult_dob .="^3-". $add."FDOB ".date("d-M-Y",strtotime($_POST['adult_date1']));
            $adult_gender .="^3-". $add ."FGNDR ".$_POST['adult_gender'.$i];

            }

            $child_passport="";
            $child_dob="";
            $child_gender="";
            for($i=1; $i<=$_SESSION['post-data']['child'];$i++){

                $add++;
            $child_passport .= "^4-". $add."FPSPT/".$_POST['child_passport'.$i]."/GB/".date("dMY",strtotime($_POST['child_date'.$i]))."/".$_POST['child_last_name'.$i]."/".$_POST['child_first_name'.$i]."".$_POST['child_title'.$i];
            $child_dob .="^3-". $add."FDOB ".date("d-M-Y",strtotime($_POST['child_date1']));
            $child_gender .="^3-".$add."FGNDR ".$_POST['ch_gender'.$i];

            }

            $infant_passport="";
            $infant_dob="";
            $infant_gender="";
            for($i=1; $i<=$_SESSION['post-data']['infant'];$i++){

            $add++;
            $infant_passport .= "^4-". $add."FPSPT/".$_POST['infant_passport'.$i]."/GB/".date("dMY",strtotime($_POST['infant_date'.$i]))."/".$_POST['infant_last_name'.$i]."/".$_POST['infant_first_name'.$i]."".$_POST['infant_title'.$i];
            $infant_dob .="^3-". $add."FDOB ".date("d-M-Y",strtotime($_POST['infant_date' .$i]));
            $infant_gender .="^3-".$add."FGNDR ".$_POST['in_gender'.$i];

            }



            $command1= "-". $total."".$_POST['last_name1'].$a."".$b."".$c.
                        "^9E*".$_SESSION['lead_pax']['lead_email']."^9M*+".$_SESSION['lead_pax']['lead_mobile']."^0RX".$_SESSION['flight']['flight_no']."".$_SESSION['class']."".date("dM",strtotime($_SESSION['post-data']['date'])).
                     "".$_SESSION['post-data']['departure']."".$_SESSION['post-data']['arr']."NN".$to."".$adult_passport."".$adult_dob."".$adult_gender."^FG^FS1^e*R~x";
            





        }
    }


        //echo $command1;







?>




    <?php

   if(isset($_SESSION['return'])){
    $return = $_SESSION['return'];

  if($_SESSION['lead_pax']['lead_email'] != $_SESSION['update_lead_pax']['lead_email'] && $_SESSION['lead_pax']['lead_mobile'] != $_SESSION['update_lead_pax']['lead_mobile']){

          //parse the Data using SoapClient
           $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');
           //echo $co;

          ////Using Post method command
           $order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $co)); ////Using Post method command



          $return = simplexml_load_string($order_return);   //output string convert in XML object


          $return = json_decode(json_encode($return), true);
  }
    elseif($_SESSION['lead_pax']['lead_mobile'] != $_SESSION['update_lead_pax']['lead_mobile'] && $_SESSION['lead_pax']['lead_email'] == $_SESSION['update_lead_pax']['lead_email'] ){
   //parse the Data using SoapClient
       $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');
      // echo $co;
      ////Using Post method command
      $order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $co1)); ////Using Post method command



      $return = simplexml_load_string($order_return);   //output string convert in XML object


      $return = json_decode(json_encode($return), true);
  }

     elseif($_SESSION['lead_pax']['lead_mobile'] == $_SESSION['update_lead_pax']['lead_mobile'] && $_SESSION['lead_pax']['lead_email'] != $_SESSION['update_lead_pax']['lead_email'] ){
   //parse the Data using SoapClient
       $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');
      // echo $co;
      ////Using Post method command
      $order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $co1)); ////Using Post method command



      $return = simplexml_load_string($order_return);   //output string convert in XML object


      $return = json_decode(json_encode($return), true);
  }else{


             $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');
      // echo $co;
      ////Using Post method command
      $order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> "*".$_SESSION['return']['@attributes']['RLOC']."^*r~x")); ////Using Post method command



      $return = simplexml_load_string($order_return);   //output string convert in XML object


      $return = json_decode(json_encode($return), true);
  }



 } else{

//parse the Data using SoapClient
 $client = new SoapClient('https://customertest.videcom.com/RegentAirways/vars/public/webservices/VRSXMLWebservice3.asmx?wsdl');

////Using Post method command
$order_return = $client->RunVRSCommand(array('Token'=> "NulFjgDfdI74Tpm0Y6lfqgpcsEDXjX07J3hVE01Qb60=", 'Command'=> $command1)); ////Using Post method command



$return = simplexml_load_string($order_return);   //output string convert in XML object


$return = json_decode(json_encode($return), true); //Xml object parse into json array

}




?>

<!DOCTYPE html>
<html>
<head>

<title>Payment Processing</title>
	<script>
    function submitForm() {
      var postForm = document.forms.postForm;
      postForm.submit();
    }
</script>
</head>
<body onload="submitForm();">



<div>
<table>
	<form name="postForm" action="payment.php" method="POST" >
	<tr><td><input type="hidden" name="mcnt_AccessCode" value="160818072857" /></td></tr>
	<tr><td><input type="hidden" name="mcnt_TxnNo" value="<?php echo $return['@attributes']['RLOC'] ;?>" size="64" /></td></tr>
	<tr><td><input type="hidden" name="mcnt_ShortName" value="Regent" /></td></tr>
	<tr><td><input type="hidden" name="mcnt_OrderNo" value="<?php echo $mcnt_OrderNo=time().rand(1000,99999); ?>" size="64" /></td></tr>
	<tr><td><input type="hidden" name="mcnt_ShopId" value="49" size="64" /></td></tr>
	<tr><td><input type="hidden" name="mcnt_Amount" value="<?php echo $return['FareQuote']['FareStore'][$total]['@attributes']['Total'] ;?>" size="64" /></td></tr>
	<tr><td><input type="hidden" name="mcnt_Currency" value="BDT" size="64" /></td></tr>
	
	<tr><td><input type="submit" /></tr>
	</form>
</table>
</div>
</body>
</html>

