<?php

session_start();

$_SESSION['lead_pax'] = $_POST;
//$conditon = $_SESSION['tot'];

// if($conditon <= 1){

//    header("Location: booking.php");
//     exit;
// }


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Awesome sign up form </title>
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
    <p class="su">PAssenger Details</p>
    <form class="form1" align="center" method="post" action="payment/pay.php">
      <?php 
    for ($i = 1; $i <= $_SESSION['post-data']['adult'] ; $i++) { 
        echo "<p class='su'>ADULT ".$i."  </p><br>";
        echo "TITLE<select name='title". $i . "' class='country' required>
                <option value='MR'>MR</option>
                <option value='MRS'>MRs</option>
                <option value='MSTR'>MSTR</option>
                <option value='MISS'>MISS</option> 
            </select>";
        echo "<input class='first' name='first_name". $i . "' type='text' placeholder='First Name' required autofocus " . $i . "' />";
        echo "<input class='first' name='last_name". $i . "' type='text' placeholder='Last Name' required autofocus " . $i . "' />";
        echo " <p>Gendar:</p>
        <input type='radio' name='adult_gender".$i."' value='MALE'> Male
        <input type='radio' name='adult_gender".$i."' value='FEMALE'> Female
        <br>";
        if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP' ){}
          else{
           echo "Date Of Birth <br><input class='cal' name='adult_date". $i . "' type='date'  required autofocus " . $i . "' />";
           echo "<br>Country<select name='country". $i . "' class='country' required>
                        <option value='BANGLADESH'>BANGLADESH</option>
                        <option value='INDIA'>INDIA</option>
                       <option value='USA'>USA</option>
                       <option value='SRILANKA'>SRILANKA</option>
            </select>";
            
            echo " <input class='first' name='adult_passport".$i."' type='text' placeholder='Passport Number' required autofocus />";
            echo "<br>";
             echo "Passport expirre:<input class='cal' name='adult_expire_date". $i . "' type='date'  required autofocus " . $i . "' />";



        }
       
    }
        for ($i = 1; $i <= $_SESSION['post-data']['child'] ; $i++) { 
        echo "<p class='su'>Child ".$i."  </p><br>";
        echo "TITLE<select name='child_title". $i . "' class='country' required>
                <option value='MR'>MR</option>
                <option value='MRS'>MRs</option>
                <option value='MSTR'>MSTR</option>
                <option value='MISS'>MISS</option>
            </select>";
        echo "<input class='first' name='child_first_name". $i . "' type='text' placeholder='First Name' required autofocus " . $i . "' />";
        echo "<input class='first' name='child_last_name". $i . "' type='text' placeholder='Last Name' required autofocus " . $i . "' /><br>";
        echo " <p>Gendar:</p>
        <input type='radio' name='ch_gender".$i."' value='MALE'> Male
        <input type='radio' name='ch_gender".$i."' value='FEMALE'> Female
        <br>";
        echo "Date Of Birth <br><input class='cal' name='child_date". $i . "' type='date'  required autofocus " . $i . "' />";
        if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP'){}
           else{
            echo "<br>Country<select name='child_country". $i . "' class='country' required>
                        <option value='BANGLADESH'>BANGLADESH</option>
                        <option value='INDIA'>INDIA</option>
                       <option value='USA'>USA</option>
                       <option value='SRILANKA'>SRILANKA</option>
            </select><br>";
          
            echo " <input class='first' name='child_passport".$i."' type='text' placeholder='Passport Number' required autofocus />";
            echo "<br>";
             echo "Passport expirre:<input class='cal' name='child_expire_date". $i . "' type='date'  required autofocus " . $i . "' />";

        }
       
    }

     for ($i = 1; $i <= $_SESSION['post-data']['infant'] ; $i++) { 
        echo "<p class='su'>INFANT ".$i."  </p><br>";
        echo "TITLE<select name='infant_title". $i . "' class='country' required>
                <option value='MR'>MR</option>
                <option value='MRS'>MRs</option>
                <option value='MSTR'>MSTR</option>
                <option value='MISS'>MISS</option>
            </select>";
         echo " <p>Gendar:</p>
        <input type='radio' name='in_gender".$i."' value='MALE'> Male
        <input type='radio' name='in_gender".$i."' value='FEMALE'> Female
        <br>";
        echo "<input class='first' name='infant_first_name". $i . "' type='text' placeholder='First Name' required autofocus " . $i . "' />";
        echo "<input class='first' name='infant_last_name". $i . "' type='text' placeholder='Last Name' required autofocus " . $i . "' /><br>";
        echo "Date Of Birth<br><input class='cal' name='infant_date". $i . "' type='date'  required autofocus " . $i . "' />";
        if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP' ){}
           else{
            echo "<br>Country<select name='country". $i . "' class='country' required>
                        <option value='BANGLADESH'>BANGLADESH</option>
                        <option value='INDIA'>INDIA</option>
                       <option value='USA'>USA</option>
                       <option value='SRILANKA'>SRILANKA</option>
            </select>";
            echo " <input class='first' name='infant_passport".$i."' type='text' placeholder='Passport Number' required autofocus />";
            echo "<br>";
            echo "Passport expirre:<input class='cal' name='child_expire_date". $i . "' type='date'  required autofocus " . $i . "' />";

        }
       
    }
?>

      <input class="submit" type="submit" value="Submit" align="center"> </form>
  </div>

</body>

</html>
  
  

</body>

</html>

