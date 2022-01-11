
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script src="../js/js.js"> </script>
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>


        <title> Gluten Free </title>
		<style> 

		</style>
   </head>
   <body>
		<header id="MYheader"></header>
		<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>


	<nav id="MYnav"></nav>
	<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>

	<main class="bodyPage pL D">
	<h4 class="hhh">About Us</h4>
	<article>Is a special place where you can find a variety of gluten-free products and special recipes that combine our unique products. 
	<br>The products and recipes are suitable for celiac patients and those who avoid gluten.
	<br><br>The products can be ordered 24/7.
	<br><br>The deliveries arrive at the customer's home.
	<br><br>The time of arrival of the shipment can be coordinated. 
	<br><br>for more details, contact us by email TNSglutenFree@gmail.com <br> </a></article>
	</main>

	<div class="upper1 D">
		<div class="telaviv"> 
			<div class="bodyPage">
				<p class="btnn">Tel Aviv</p>
				<p class="telavivDD myText">Address: Hayarkon 108.<br>
					Activity: Sunday-Thursday 08: 00-18: 00 and Fridays 08: 00-12: 00.<br>
					It is possible to make an order in advance or an order for delivery.</p>
			</div>	
		</div>
	
		<div class="herzliya"> 
			<div class="bodyPage">
				<p class="btnn">Herzliya</p>
				<p class="herzliyaDD myText">Address: Hayarkon 108.<br>
					Activity: Sunday-Thursday 08: 00-18: 00 and Fridays 08: 00-12: 00.<br>
					It is possible to make an order in advance or an order for delivery.</p>
			</div>
		</div>
	
		<div class="ramatgan"> 
			<div class="bodyPage">
				<p class="btnn">Ramat Gan</p>
				<p class="ramatganDD myText">Address: Hayarkon 108.<br>
					Activity: Sunday-Thursday 08: 00-18: 00 and Fridays 08: 00-12: 00.<br>
					It is possible to make an order in advance or an order for delivery.</p>
			</div>	
		</div>
	</div>
	</div>



<script>

$(document).ready(function() 
{
	$(".telaviv").click(function() 
	{ 
		$(".herzliya").toggle();
		$(".ramatgan").toggle();
		$(".telaviv").toggleClass("cityWidth");
		$(".telavivDD").toggle(1000);
	});
	$(".herzliya").click(function() 
	{ 
		$(".telaviv").toggle();
		$(".ramatgan").toggle();
		$(".herzliya").toggleClass("cityWidth");
		$(".herzliyaDD").toggle(1000);
	});
	$(".ramatgan").click(function() 
	{ 
		$(".telaviv").toggle(); 
		$(".herzliya").toggle();
		$(".ramatgan").toggleClass("cityWidth");
		$(".ramatganDD").toggle(1000);
	});
});

</script>

</body>

<footer id="MYfooter"></footer>
<script>  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );  </script>

</html>