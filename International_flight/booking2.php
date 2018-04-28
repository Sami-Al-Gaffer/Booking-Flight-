

 <?php

  session_start();
  //$_SESSION['edit'] =$_POST;
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
    <p class="su">Contact Information</p>
    <?php if(isset($_SESSION['update_lead_pax'])){ ?>
        <form class="form1" align="center" method="post" action="booking1.php">
        TITLE
        <select name='lead_title' class='country' required>
                <option value='MR' <?php echo (($_SESSION['update_lead_pax']['lead_title']== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['update_lead_pax']['lead_title']== 'MRS')?"selected":"") ?>>MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['update_lead_pax']['lead_title']== 'MSTR')?"selected":"") ?>>MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['update_lead_pax']['lead_title']== 'MISS')?"selected":"") ?>>MISS</option>
      </select>
      <input class='first' name='c_first_name1' type='text' placeholder='First Name' value="<?php echo $_SESSION['update_lead_pax']['c_first_name1'] ; ?>"  required autofocus />
      <input class='first' name='c_last_name1' type='text' placeholder='Last Name' value="<?php echo $_SESSION['update_lead_pax']['c_last_name1'] ; ?>" required autofocus />
<br>
      Country
      <select name="lead_country" class="country" required >
         <option value="BANGLADESH" <?php echo (($_SESSION['update_lead_pax']['lead_country']== 'BANGLADESH')?"selected":"") ?> >BANGLADESH</option>
         <option value="CHITTAGONG" <?php echo (($_SESSION['update_lead_pax']['lead_country']== 'CHITTAGONG')?"selected":"") ?>>INDIA</option>
         <option value="USA" <?php echo (($_SESSION['update_lead_pax']['lead_country']== 'USA')?"selected":"") ?>>USA</option>
         <option value="SRILANKA" <?php echo (($_SESSION['update_lead_pax']['lead_country']== 'SRILANKA')?"selected":"") ?> >SRILANKA</option>
          
      </select>
     <input class='mail' name='lead_email' type='email' placeholder='Email Address' value="<?php echo $_SESSION['update_lead_pax']['lead_email'] ; ?>" required autofocus  />
     <input class='mail' name='lead_email1' type='email' placeholder='Verify Email Address' value="<?php echo $_SESSION['update_lead_pax']['lead_email1'] ; ?>" required autofocus  /> 
     <input class='mail' name='lead_mobile' type='number' placeholder='Mobile NO' value="<?php echo $_SESSION['update_lead_pax']['lead_mobile'] ; ?>"  required autofocus  />
     <p class="su">PAssenger Details</p>
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
            echo "<br>Country<select name='country". $i . "' class='country' required>
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


      
      <br>

      <input class="submit" type="submit" value="Submit" align="center"> </form>
  <?php }else{ ?>
    <form class="form1" align="center" method="post" action="booking1.php">
        TITLE
        <select name='lead_title' class='country' required>
                <option value='MR' <?php echo (($_SESSION['lead_pax']['lead_title']== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['lead_pax']['lead_title']== 'MRS')?"selected":"") ?>>MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['lead_pax']['lead_title']== 'MSTR')?"selected":"") ?>>MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['lead_pax']['lead_title']== 'MISS')?"selected":"") ?>>MISS</option>
      </select>
      <input class='first' name='c_first_name1' type='text' placeholder='First Name' value="<?php echo $_SESSION['lead_pax']['c_first_name1'] ; ?>"  required autofocus />
      <input class='first' name='c_last_name1' type='text' placeholder='Last Name' value="<?php echo $_SESSION['lead_pax']['c_last_name1'] ; ?>" required autofocus />
<br>
      Country
      <select name="lead_country" class="country" required >
         <option value="BANGLADESH" <?php echo (($_SESSION['lead_pax']['lead_country']== 'BANGLADESH')?"selected":"") ?> >BANGLADESH</option>
         <option value="CHITTAGONG" <?php echo (($_SESSION['lead_pax']['lead_country']== 'CHITTAGONG')?"selected":"") ?>>INDIA</option>
         <option value="USA" <?php echo (($_SESSION['lead_pax']['lead_country']== 'USA')?"selected":"") ?>>USA</option>
         <option value="SRILANKA" <?php echo (($_SESSION['lead_pax']['lead_country']== 'SRILANKA')?"selected":"") ?> >SRILANKA</option>
          
      </select>
     <input class='mail' name='lead_email' type='email' placeholder='Email Address' value="<?php echo $_SESSION['lead_pax']['lead_email'] ; ?>" required autofocus  />
     <input class='mail' name='lead_email1' type='email' placeholder='Verify Email Address' value="<?php echo $_SESSION['lead_pax']['lead_email1'] ; ?>" required autofocus  /> 
     <input class='mail' name='lead_mobile' type='number' placeholder='Mobile NO' value="<?php echo $_SESSION['lead_pax']['lead_mobile'] ; ?>"  required autofocus  />
     <p class="su">PAssenger Details</p>
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
            echo "<br>Country<select name='country". $i . "' class='country' required>
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


      
      <br>

      <input class="submit" type="submit" value="Submit" align="center"> </form>
      <?php } ?> 
  </div>

</body>

</html>
  
  

</body>

</html>
