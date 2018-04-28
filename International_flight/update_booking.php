

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
        <form class="form1" align="center" method="post" action="booking1.php">
        <?php if(isset($_SESSION['update_lead_pax'])){ ?>
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


      
      <br>
  <?php }else{ ?>
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


      
      <br>
    <?php } ?> 

      <input class="submit" type="submit" value="Submit" align="center"> </form>

  </div>

</body>

</html>
  
  

</body>

</html>
