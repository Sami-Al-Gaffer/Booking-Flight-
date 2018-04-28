<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Awesome sign up form </title>
  
  
  
      <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>

  <html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/style.css">

  <title>BOOKING SYSTEM</title>
</head>

<body>
  <div class="main" align="center">
    <p class="su">BOOK A FLIGHT</p>
    <form class="form1" align="center" method="post" action="return_price.php">

      FROM
      <select name="departure" class="country" required >
         <option value="DAC">DHAKA(DAC)</option>
         <option value="CGP">CHITTAGONG(CGP)</option>
         <option value="BKK">BANGKOK(BKK)</option>
         <option value="CCU">KOLKATA(CCU)</option>
         <option value="DMM">DAMMAM(DMM)</option>
           <option value="DOH">DOHA(DOH)</option>


          
      </select>
      <br>
      TO
      <select name="arr" class="country" required >
         <option value="CGP">CHITTAGONG(CGP)</option>
         <option value="DAC">DHAKA(DAC)</option>
         <option value="BKK">BANGKOK(BKK)</option>
         <option value="CCU">KOLKATA(CCU)</option>
        <option value="DMM">DAMMAM(DMM)</option>
        <option value="DOH">DOHA(DOH)</option>
         
      </select>
      <br>
      Date:
      <input placeholder="Date" class="cal" type="date" name="date"  id="date" required>

      <br>
      <br>
      Date:
      <input placeholder="Date" class="cal" type="date" name="return_date"  id="date1" required>

      <br>
      Adult:
      
      <select name="adult" class="country" required >
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option> 
         <option value="4">4</option>
         <option value="5">5</option>
        <option value="6">6</option>
         <option value="7">7</option> 
         <option value="8">8</option>
         <option value="9">9</option>
      </select>
            <br>
      CHILD:
      <select name="child" class="country" required >
        <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option> 
         <option value="4">4</option>
         
      </select>
      <br>
      Infant:
      <select name="infant" class="country" required >
        <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option> 
         <option value="4">4</option>

      </select>
      
      <br>

      <input type="submit" name="submit" value="Submit">  


   </form>
  </div>
  <div class="bottom">
    <p class="mb" align="center"><strong>-</strong> Designed By <a href="https://www.khaledmneimneh.me" target="_blank"><span class="mb-2">Khaled Mneimneh</span></a></p>
  </div>
</body>

</html>
  
  

