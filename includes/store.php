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

  </style>
   </head>
   <body>
       

   <header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>

      <main class="bodyPage E">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products.." title="Type in a product">
        
        <ul id="myUL">
          <h4 class="hhh">New</h4>
          <form>
          <div class="upper1">
          <li class="pro1"> 
              <img class="" src="../images/%D7%90%D7%9E%D7%A1%D7%98.jpg" width="100%"> 
              <p>Special Cookies<br> 22 $</p> 
              <button type="submit" name="333" value="333" id="Special Cookies" class="btnn BT" onclick="AddToCart()">add to cart</button>
            </li> 

          <li class="pro1">
            <img src="../images/%D7%A7%D7%9E%D7%97%20%D7%9E%D7%95%D7%9C%D7%99%D7%A0%D7%95.jpeg"  width="100%">
            <p>Molino Flour<br> 22 $</p>
            <button type="submit" name="123" value="123" id="molino flour" class="btnn BT" onclick="AddToCart()">add to cart</button>
          </li> 

          <li class="pro1">
            <img src="../images/%D7%98%D7%95%D7%A8%D7%98%D7%99%D7%94.jpeg"  width="100%" >
            <p>Tortilla Leaves <br> 10 $</p> 
            <button type="submit" name="444" value="444" id="Tortilla Leaves" class="btnn BT" onclick="AddToCart()">add to cart</button>
          </li> 

          <li class="pro1">
              <img src="../images/%D7%AA%D7%A4%D7%95%D7%97%D7%95%D7%A0%D7%99%D7%9D.jpeg"  width="100%">
              <p>Apples <br> 21.5 $</p>
              <button type="submit" name="666" value="666" id="Apples" class="btnn BT" onclick="AddToCart()">add to cart</button>
          </li>
        </div>
          <h4 class="hhh">Recommended</h4>

          <div class="upper1">
            <li class="pro1">               
              <img src="../images/%D7%90%D7%A4%D7%99%D7%A4%D7%99%D7%AA.jpeg"  width="100%" >
                <p>Waffles <br> 11.9 $</p>
                <button type="submit" name="222" value="222" id="waffle" class="btnn BT" onclick="AddToCart()">add to cart</button>
              </li>

              <li class="pro1">               
                <img src="../images/%D7%97%D7%9E%D7%90%D7%94.jpeg"  width="100%">
                <p>Butter Cookie <br> 12.5 $</p>
                <button type="submit" name="456" value="456" id="Butter Cookie" class="btnn BT" onclick="AddToCart()">add to cart</button>
              </li>

              <li class="pro1">                 
                <img src="../images/%D7%A4%D7%AA%D7%99%D7%91%D7%A8.jpeg" width="100%">
                    <p>Petiber <br> 21.5 $</p>
                    <button type="submit" name="555" value="555" id="Petiber" class="btnn BT" onclick="AddToCart()">add to cart</button>
                  </li>

                  <li class="pro1">                 
                    <img src="../images/%D7%9C%D7%97%D7%9E%D7%A0%D7%99%D7%95%D7%AA.jpg" width="100%">
                    <p> Sesame Rolls <br> 13.9 $</p>
                    <button type="submit" name="111" value="111" id="Sesame Rolls" class="btnn BT" onclick="AddToCart()">add to cart</button>
                  </li>
        </div>
        </form>
        </ul>



      </main>

      <footer id="MYfooter"></footer>
  <script>  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );  </script>


</body>
</html>