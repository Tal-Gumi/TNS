<?php

require_once('init.php');
global $database;

$log="";
$log_action="";
$firstName="";

if($_SESSION)
{
    $firstName = $_SESSION['firstName'];
    $log="Log out";
    $log_action="includes/logout.php";
}
else
{
  $log="Log in";
  $log_action="includes/login.php";
}

$error = "";

$forUser=$database->query("SELECT DATE(orderTime) as date,COUNT(email) AS people
FROM orders GROUP BY date(orderTime)
ORDER BY people DESC 
LIMIT 1");
if ($forUser){
    $users = array();
    if ($forUser->num_rows>0)
    {
        while($row=$forUser->fetch_assoc()){
          array_push($users,$row);
        }
    }
}
$userDetails="The date when the most purchases were made is in ".$users[0]['date']."<br> The number of purchases made is: ".$users[0]['people'];

?>


<!DOCTYPE html> 
<html> 
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
      <link rel="stylesheet" type="text/css" href="../css/cartcss.css">
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

        <script src="../js/js.js"> </script>


    <title>  </title>
	<style>
	

	</style>
    </head>
    <body>

<header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>
		
<main class="bodyPage E pL">
    <h4 class="hhh">Personal Information</h4>
    <p> <?php echo "<b><h3>JUST FOR YOU:</h3><br>".$userDetails."</b>"; ?> </p>

    <p>Here at TNS they take care of you!
Because we care about you and your experience on our site -<br>
You are given the opportunity to receive information <br>
 about the best-selling products in our store <br>
 and in addition - <br> a comparison of the average of your purchases<br>
  compared to the average of purchases of other users on the site.</p>
    <button class="btnn" onclick="goToGraph1()">Click to see the best seller product</buttun>
    <button class="btnn" onclick="goToGraph2()">Click to see your average purchases compared to others</buttun>

</main>

</body>
<footer id="MYfooter"></footer>
<script>  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );  </script>
</html>