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
        <link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

        <script src="../js/js.js"> </script>

        <title> Gluten Free </title>
		<style>

    
      .checked {
        color: orange;
        }
        p{font-size: 14px;}
  </style>
   </head>
   <body>


   <header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>

      <main class="bodyPage B E">


            <h4 class="hhh">  Recommended Restaurants </h4>
            
          <div class="store center"> 
            <h2> KI-SU </h2>
            <p><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span></p>
                <img src="../images/kisu.jpg" width="50%" height="50%">

            <p><b>Address:</b> Tel Aviv, HaYarcon 5</p>
            <p><b>Phon number:</b> 03-6895384 </p>
            <p><a href="#">click here to restaurants's site</a> </p>
            <p>Up-to-date Asian restaurant, combining traditional Asian food with an innovative cocktail bar.<br>
                A young place with a unique atmosphere where you come to eat and spend time with family and friends.<br>
                Whether it's a date at the bar, a meeting with friends around a table on the terrace, or just a craving for quality sushi,
                Kiso is definitely the ideal place for that.<br>We are open 7 days a week, Sunday-Thursday 12: 00-23: 00 and on Friday and Saturday 12: 00-23: 00
                A 15% lunch discount will be given on weekdays Sun-Thu, between 12:00 and 17:00.
                We'd be happy to see you amongst our guests.</p>
          </div>

      </main>

  <footer id="MYfooter"></footer>

<script>
  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );
  </script>
  
</body>
</html>