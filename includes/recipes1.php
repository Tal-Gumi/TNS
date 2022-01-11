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
        <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/js.js"> </script>

        <title> Gluten Free </title>

   </head>
   <body>


   <header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>


<main class="bodyPage E">
      <h4 class="hhh">  Recipes </h4>
        <div class="upper1">

            <div class="btnn R">
              <h3>Cookies</h3>
              <details>
              <summary>Description</summary>
              Cupcakes, Waffles and more</details>
              <img onclick="sendRecipe()" src="../images/Choc.jpg" width="100%">
            </div>
        
            <div class="btnn R">
              <h3>Cakes</h3>
              <details>
              <summary>Description</summary>  
              All kinds of Cakes</details>
              <img onclick="sendRecipe()" src="../images/cake.jpg" width="100%">
            </div>
          
            <div class="btnn R">
              <h3>Pasta</h3>
              <details>
              <summary>Description</summary>

              Pasta, Gnocchi and more</details>
              <img onclick="sendRecipe()" src="../images/pasta.jpg" width="100%">
            </div>
          
            <div class="btnn R">
              <h3>Breads</h3>
              <details>
              <summary>Description</summary>
              Breads, Rolls and more</details>
              <img onclick="sendRecipe()" src="../images/bread.webp" width="100%">
            </div>

        </div>

        <div class="upper1">

<div class="btnn R">
  <h3>Sushi</h3>
  <details>              <summary>Description</summary>
Cupcakes, Waffles and more</details>
  <img onclick="sendRecipe()" src="../images/sushi.jpg" width="100%">
</div>

<div class="btnn R">
  <h3>Cakes</h3>
  <details>              <summary>Description</summary>
All kinds of Cakes</details>
  <img onclick="sendRecipe()" src="../images/spa.jpg" width="100%">
</div>

<div class="btnn R">
  <h3>Pizza</h3>
  <details>              <summary>Description</summary>
Pizza, Gnocchi and more</details>
  <img onclick="sendRecipe()" src="../images/pizza.jpg" width="100%">
</div>

<div class="btnn R">
  <h3>Others</h3>
  <details>              <summary>Description</summary>
Breads, Rolls and more</details>
  <img onclick="sendRecipe()" src="../images/salad.jpg" width="100%">
</div>

</div>

</main>
<footer id="MYfooter"></footer>
<script>
  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );
  </script>
    
</body>
</html>