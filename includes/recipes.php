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
	<link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

	<script src="../js/js.js"> </script>

<style>



</style>

</head>
<body>

<header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>


<main class="bodyPage D">
    <h3 class="hhh">Chocolate Chip Cookies</h3>
		
	<h4>Explanatory video with all the steps:</h4>
	</p>
	<iframe width="40%" height="80%" src="https://www.youtube.com/embed/uJwekkbGPns" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</p>
    <h4 class="hhh"><b>Ingredients</b></h4>
	<ul><li>2 cups Gold Molino all-purpose flour</li>
    <li>teaspoon baking soda</li>
    <li>1 cup butter, softened</li>	
	<li>egg</li>
    <li>teaspoon vanilla</li>
    <li>cups semisweet chocolate chips</li> </ul>
	<form action="store.php">
		<button class="btnn">Buy Ingredients</button>
	</form>
	
	<h4 class="hhh"><b>Steps</b></h4>
	
	<ol>
	<li>Heat oven to 375°F. In small bowl, mix flour, baking soda and salt; set aside.</li>
	<p><img src="../images/step1.jpg" width="50%" height="20%"></p>
	<li>In large bowl, beat softened butter and sugars with electric mixer on medium speed, or mix with spoon about 1 minute or until fluffy, scraping side of bowl occasionally.</li>
	<p><img src="../images/step2.jpg" width="50%" height="20%"></p>
	<li>Beat in egg and vanilla until smooth. Stir in flour mixture just until blended (dough will be stiff). Stir in chocolate chips and nuts.</li>
	<p><img src="../images/step3.jpg" width="50%" height="20%"></p>
	<li>Onto ungreased cookie sheets, drop dough by rounded tablespoonfuls 2 inches apart.</li>
	<p><img src="../images/step4.jpg" width="50%" height="20%"></p>
	<li>Bake 8 to 10 minutes or until light brown (centers will be soft). Cool 2 minutes; remove from cookie sheet to cooling rack. Cool completely, about 30 minutes. Store covered in airtight container.</li>
	<p><img src="../images/step5.jpg" width="50%" height="20%">
	
    </ol>
</main>
<section class="bodyPage D pL">
<h5>Want to calculate the nutritional values ​​of the recipe?</h5>
	<button onclick="getRvalue()" class="btnn">Click here!</button>
</section>

<footer id="MYfooter"></footer>
<script>  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" ); </script>

</body>
</html>
