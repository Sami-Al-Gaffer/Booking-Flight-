

 <?php

  session_start();
  //     echo "<pre>";
  // print_r($_SESSION['booking']);
  // echo "<pre>";
  //   echo "<pre>";
  // print_r($_SESSION['update_lead_pax']);
  // echo "<pre>";


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
    <?php 
    for ($i = 1; $i <= $_SESSION['post-data']['adult'] ; $i++) { ?>
        <p class='su'>ADULT <?= $i ?></p><br>
        TITLE<select name='title<?= $i ?>'   class='country' required>
                 <option value='MR' <?php echo (($_SESSION['update_lead_pax']['title'.$i]== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['update_lead_pax']['title'.$i]== 'MRS')?"selected":"") ?> >MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['update_lead_pax']['title'.$i]== 'MSTR')?"selected":"") ?> >MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['update_lead_pax']['title'.$i]== 'MISS')?"selected":"") ?> >MISS</option>
            </select>
        <input class='first' name='first_name<?= $i ?>'  type='text' placeholder='First Name' value="<?php echo $_SESSION['update_lead_pax']['first_name'.$i] ; ?>" required autofocus />
        <input class='first' name='last_name<?= $i ?>'   type='text' placeholder='Last Name'  value="<?php echo $_SESSION['update_lead_pax']['last_name'.$i] ; ?>" required autofocus />
        <p>Gendar:</p>
        <input type='radio' name='adult_gender<?= $i ?>' value='MALE'  <?php echo ($_SESSION['update_lead_pax']['adult_gender'.$i]=='MALE')?'checked':'' ?> > Male  <input type='radio' name='adult_gender<?= $i ?>' value='FEMALE' <?php echo ($_SESSION['update_lead_pax']['adult_gender'.$i]=='FEMALE')?'checked':'' ?>  > FeMale
        <br>
        
        <?php if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP' ){}
          else{  ?>

           Date Of Birth <br><input class='cal' name='adult_date<?= $i ?>' type='date' value="<?php echo $_SESSION['update_lead_pax']['adult_date'.$i] ; ?>"  required autofocus  />
           <br>Country<select name='country<?= $i ?>' class='country' required>
                        <option value='BANGLADESH' <?php echo (($_SESSION['update_lead_pax']['country'.$i]== 'BANGLADESH')?"selected":"") ?> >BANGLADESH</option>
                        <option value='INDIA' <?php echo (($_SESSION['update_lead_pax']['country'.$i]== 'INDIA')?"selected":"") ?>>INDIA</option>
                       <option value='USA' <?php echo (($_SESSION['update_lead_pax']['country'.$i]== 'INDIA')?"selected":"") ?>>USA</option>
                       <option value='SRILANKA'<?php echo (($_SESSION['update_lead_pax']['country'.$i]== 'SRILANKA')?"selected":"") ?>>SRILANKA</option>
            </select>
            
            <input class='first' name='adult_passport<?= $i ?>' type='text' placeholder='Passport Number'  value="<?php echo $_SESSION['update_lead_pax']['adult_passport'.$i] ; ?>" required autofocus />
            <br>
            Passport expirre:<input class='cal' name='adult_expire_date<?= $i ?>' type='date' value="<?php echo $_SESSION['update_lead_pax']['adult_expire_date'.$i] ; ?>"  required autofocus />



      

       <?php }
       
    }
        for ($i = 1; $i <= $_SESSION['post-data']['child'] ; $i++) { ?>
        <p class='su'>Child <?= $i ?> </p><br>
        TITLE<select name='child_title<?= $i ?>' class='country' required>
                 <option value='MR' <?php echo (($_SESSION['update_lead_pax']['child_title'.$i]== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['update_lead_pax']['child_title'.$i]== 'MRS')?"selected":"") ?> >MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['update_lead_pax']['child_title'.$i]== 'MSTR')?"selected":"") ?> >MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['update_lead_pax']['child_title'.$i]== 'MISS')?"selected":"") ?> >MISS</option>
            </select>
        <input class='first' name='child_first_name<?= $i ?>' type='text' value="<?php echo $_SESSION['update_lead_pax']['child_first_name'.$i] ; ?>" placeholder='First Name' required autofocus />
        <input class='first' name='child_last_name<?= $i ?>' type='text' value="<?php echo $_SESSION['update_lead_pax']['child_last_name'.$i] ; ?>" placeholder='Last Name' required autofocus /><br>
        <p>Gendar:</p>
        <input type='radio' name='ch_gender<?= $i ?>' value='MALE' <?php echo ($_SESSION['update_lead_pax']['ch_gender'.$i]=='MALE')?'checked':'' ?>> Male <input type='radio' name='ch_gender<?= $i ?>' value='FEMALE' <?php echo ($_SESSION['update_lead_pax']['ch_gender'.$i]=='FEMALE')?'checked':'' ?> > Female
        <br>
        Date Of Birth <br><input class='cal' name='child_date<?= $i ?>' type='date' value="<?php echo $_SESSION['update_lead_pax']['child_date'.$i] ; ?>"  required autofocus />

        <?php if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP'){}
           else{ ?>
                        <option value='BANGLADESH' <?php echo (($_SESSION['update_lead_pax']['child_country'.$i]== 'BANGLADESH')?"selected":"") ?> >BANGLADESH</option>
                        <option value='INDIA' <?php echo (($_SESSION['update_lead_pax']['child_country'.$i]== 'INDIA')?"selected":"") ?>>INDIA</option>
                       <option value='USA' <?php echo (($_SESSION['update_lead_pax']['child_country'.$i]== 'INDIA')?"selected":"") ?>>USA</option>
                       <option value='SRILANKA'<?php echo (($_SESSION['update_lead_pax']['child_country'.$i]== 'SRILANKA')?"selected":"") ?>>SRILANKA</option>
            </select>
          
            <input class='first' name='child_passport".$i."' type='text' placeholder='Passport Number' value="<?php echo $_SESSION['update_lead_pax']['child_passport'.$i] ; ?>" required autofocus />
            <br>
            Passport expirre:<input class='cal' name='child_expire_date<?= $i ?>' type='date' value="<?php echo $_SESSION['update_lead_pax']['child_expire_date'.$i] ; ?>" required autofocus/>

       <?php }
       
    }

     for ($i = 1; $i <= $_SESSION['post-data']['infant'] ; $i++) { ?>
        <p class='su'>INFANT <?= $i ?>  </p><br>
        TITLE<select name='infant_title<?= $i ?>' class='country' required>
                 <option value='MR' <?php echo (($_SESSION['update_lead_pax']['infant_title'.$i]== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['update_lead_pax']['infant_title'.$i]== 'MRS')?"selected":"") ?> >MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['update_lead_pax']['infant_title'.$i]== 'MSTR')?"selected":"") ?> >MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['update_lead_pax']['infant_title'.$i]== 'MISS')?"selected":"") ?> >MISS</option>
            </select>
        <p>Gendar:</p>
        <input type='radio' name='in_gender<?= $i ?>' value='MALE' <?php echo ($_SESSION['update_lead_pax']['in_gender'.$i]=='MALE')?'checked':'' ?>> Male <input type='radio' name='in_gender<?= $i ?>' value='FEMALE' <?php echo ($_SESSION['update_lead_pax']['in_gender'.$i]=='FEMALE')?'checked':'' ?> > Female
        <br>
        <input class='first' name='infant_first_name<?= $i ?>' type='text' placeholder='First Name' value="<?php echo $_SESSION['update_lead_pax']['infant_first_name'.$i] ; ?>" required autofocus />
        <input class='first' name='infant_last_name<?= $i ?>' type='text' placeholder='Last Name' value="<?php echo $_SESSION['update_lead_pax']['infant_last_name'.$i] ; ?>" required autofocus /><br>
        Date Of Birth<br>
        <input class='cal' name='infant_date<?= $i ?>' type='date' value="<?php echo $_SESSION['update_lead_pax']['infant_date'.$i] ; ?>" required autofocus  />
       
   <?php }
?>


      
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
     <?php 
  for ($i = 1; $i <= $_SESSION['post-data']['adult'] ; $i++) { ?>
        <p class='su'>ADULT <?= $i ?></p><br>
        TITLE<select name='title<?= $i ?>'   class='country' required>
                 <option value='MR' <?php echo (($_SESSION['booking']['title'.$i]== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['booking']['title'.$i]== 'MRS')?"selected":"") ?> >MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['booking']['title'.$i]== 'MSTR')?"selected":"") ?> >MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['booking']['title'.$i]== 'MISS')?"selected":"") ?> >MISS</option>
            </select>
        <input class='first' name='first_name<?=$i?>'  type='text' placeholder='First Name' value="<?php echo $_SESSION['booking']['first_name'.$i] ; ?>" required autofocus />
        <input class='first'  name='last_name<?=$i?>'   type='text' placeholder='Last Name'  value="<?php echo $_SESSION['booking']['last_name'.$i] ; ?>" required autofocus />
        <p>Gendar:</p>
        <input type='radio' name='adult_gender<?= $i ?>' value='MALE'  <?php echo ($_SESSION['booking']['adult_gender'.$i]=='MALE')?'checked':'' ?> > Male  <input type='radio' name='adult_gender<?= $i ?>' value='FEMALE' <?php echo ($_SESSION['booking']['adult_gender'.$i]=='FEMALE')?'checked':'' ?>  > FeMale
        <br>

        <?php if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP' ){}
          else{  ?>

           Date Of Birth <br><input class='cal' name='adult_date<?= $i ?>' type='date' value="<?php echo $_SESSION['booking']['adult_date'.$i] ; ?>"  required autofocus  />
           <br>Country<select name='country<?= $i ?>' class='country' required>
                        <option value='BANGLADESH' <?php echo (($_SESSION['booking']['country'.$i]== 'BANGLADESH')?"selected":"") ?> >BANGLADESH</option>
                        <option value='INDIA' <?php echo (($_SESSION['booking']['country'.$i]== 'INDIA')?"selected":"") ?>>INDIA</option>
                       <option value='USA' <?php echo (($_SESSION['booking']['country'.$i]== 'INDIA')?"selected":"") ?>>USA</option>
                       <option value='SRILANKA'<?php echo (($_SESSION['booking']['country'.$i]== 'SRILANKA')?"selected":"") ?>>SRILANKA</option>
            </select>
            
            <input class='first' name='adult_passport<?= $i ?>' type='text' placeholder='Passport Number'  value="<?php echo $_SESSION['booking']['adult_passport'.$i] ; ?>" required autofocus />
            <br>
            Passport expirre:<input class='cal' name='adult_expire_date<?= $i ?>' type='date' value="<?php echo $_SESSION['booking']['adult_expire_date'.$i] ; ?>"  required autofocus />



      

       <?php }
       
    }
        for ($i = 1; $i <= $_SESSION['post-data']['child'] ; $i++) { ?>
        <p class='su'>Child <?= $i ?> </p><br>
        TITLE<select name='child_title<?= $i ?>' class='country' required>
                 <option value='MR' <?php echo (($_SESSION['booking']['child_title'.$i]== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['booking']['child_title'.$i]== 'MRS')?"selected":"") ?> >MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['booking']['child_title'.$i]== 'MSTR')?"selected":"") ?> >MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['booking']['child_title'.$i]== 'MISS')?"selected":"") ?> >MISS</option>
            </select>
        <input class='first' name='child_first_name<?= $i ?>' type='text' value="<?php echo $_SESSION['booking']['child_first_name'.$i] ; ?>" placeholder='First Name' required autofocus />
        <input class='first' name='child_last_name<?= $i ?>' type='text' value="<?php echo $_SESSION['booking']['child_last_name'.$i] ; ?>" placeholder='Last Name' required autofocus /><br>
        <p>Gendar:</p>
        <input type='radio' name='ch_gender<?= $i ?>' value='MALE' <?php echo ($_SESSION['booking']['ch_gender'.$i]=='MALE')?'checked':'' ?>> Male <input type='radio' name='ch_gender<?= $i ?>' value='FEMALE' <?php echo ($_SESSION['booking']['ch_gender'.$i]=='FEMALE')?'checked':'' ?> > Female
        <br>
        Date Of Birth <br><input class='cal' name='child_date<?= $i ?>' type='date' value="<?php echo $_SESSION['booking']['child_date'.$i];?>"  required autofocus />

        <?php if($_SESSION['post-data']['arr'] =='DAC' || $_SESSION['post-data']['arr'] =='CGP' && $_SESSION['post-data']['departure'] =='DAC' || $_SESSION['post-data']['departure'] =='CGP'){}
           else{ ?>
                        <option value='BANGLADESH' <?php echo (($_SESSION['booking']['child_country'.$i]== 'BANGLADESH')?"selected":"") ?> >BANGLADESH</option>
                        <option value='INDIA' <?php echo (($_SESSION['booking']['child_country'.$i]== 'INDIA')?"selected":"") ?>>INDIA</option>
                       <option value='USA' <?php echo (($_SESSION['booking']['child_country'.$i]== 'INDIA')?"selected":"") ?>>USA</option>
                       <option value='SRILANKA'<?php echo (($_SESSION['booking']['child_country'.$i]== 'SRILANKA')?"selected":"") ?>>SRILANKA</option>
            </select>
          
            <input class='first' name='child_passport<?= $i ?>' type='text' placeholder='Passport Number'  value="<?php echo $_SESSION['booking']['child_passport'.$i] ; ?>"required autofocus />
            <br>
            Passport expirre:<input class='cal' name='child_expire_date<?= $i ?>' type='date' value="<?php echo $_SESSION['booking']['child_expire_date'.$i] ; ?>" required autofocus/>

       <?php }
       
    }

     for ($i = 1; $i <= $_SESSION['post-data']['infant'] ; $i++) { ?>
        <p class='su'>INFANT <?= $i ?>  </p><br>
        TITLE<select name='infant_title<?= $i ?>' class='country' required>
                 <option value='MR' <?php echo (($_SESSION['booking']['infant_title'.$i]== 'MR')?"selected":"") ?> >MR</option>
                <option value='MRS' <?php echo (($_SESSION['booking']['infant_title'.$i]== 'MRS')?"selected":"") ?> >MRS</option>
                <option value='MSTR' <?php echo (($_SESSION['booking']['infant_title'.$i]== 'MSTR')?"selected":"") ?> >MSTR</option>
                <option value='MISS' <?php echo (($_SESSION['booking']['infant_title'.$i]== 'MISS')?"selected":"") ?> >MISS</option>
            </select>
        <p>Gendar:</p>
        <input type='radio' name='in_gender<?= $i ?>' value='MALE' <?php echo ($_SESSION['booking']['in_gender'.$i]=='MALE')?'checked':'' ?>> Male <input type='radio' name='in_gender<?= $i ?>' value='FEMALE' <?php echo ($_SESSION['booking']['in_gender'.$i]=='FEMALE')?'checked':'' ?> > Female
        <br>
        <input class='first' name='infant_first_name<?= $i ?>' type='text' placeholder='First Name' value="<?php echo $_SESSION['booking']['infant_first_name'.$i] ; ?>" required autofocus />
        <input class='first' name='infant_last_name<?= $i ?>' type='text' placeholder='Last Name' value="<?php echo $_SESSION['booking']['infant_last_name'.$i] ; ?>" required autofocus /><br>
        Date Of Birth<br>
        <input class='cal' name='infant_date<?= $i ?>' type='date' value="<?php echo $_SESSION['booking']['infant_date'.$i] ; ?>" required autofocus  />
       
   <?php }
?>


      
      <br>
    <?php } ?> 

      <input class="submit" type="submit" value="Submit" align="center"> </form>

  </div>

</body>

</html>
  
  

</body>

</html>


