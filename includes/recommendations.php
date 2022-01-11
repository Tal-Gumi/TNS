<?php

require_once('init.php');

$log="";
$log_action="";

if($_SESSION)
{
    $firstName = $_SESSION['firstName'];
    $log="Log out";
    $log_action="logout.php";
    $store="talcart.php";
}
else
{
  $log="Log in";
  $log_action="login.php";
  $store="store.php";

}

?>
<!DOCTYPE html> 
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

        <script src="../js/js.js"> </script>
        <title> Gluten Free </title>
	
   </head>
   <body>
       

   <header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>

      <main class="bodyPage E">

          <h4 class="hhh">  Recommended Restaurants </h4>
              <div class="upper1">

                <div class="btnn Q" onclick="sendRec()">
                  <h3>MOON</h3>
                  <img class="" src="../images/moon.jpg" width="100%">
                </div>
              
                <div class="btnn Q" onclick="sendRec()">
                  <h3>KI-SU</h3>
                  <img class="" src="../images/kisu.jpg" width="100%">
                </div>
              
                <div class="btnn Q" onclick="sendRec()">
                  <h3>GLUTERIA</h3>
                  <img src="../images/glu.jpg" width="100%">
                </div>
              </div>
              <div class="upper1">

                <div class="btnn Q" onclick="sendRec()">
                  <h3>LORA</h3>
                  <img class="" src="../images/res3.jpg" width="100%">
                </div>
              
                <div class="btnn Q" onclick="sendRec()">
                  <h3>KI-TU</h3>
                  <img class="" src="../images/res2.jpg" width="100%">
                </div>
              
                <div class="btnn Q" onclick="sendRec()">
                  <h3>Tu-Shi</h3>
                  <img src="../images/res1.jpg" width="100%">
                </div>
              </div>
          

  </main>

  <footer id="MYfooter"></footer>
<script>  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );  </script>

</body>
</html>