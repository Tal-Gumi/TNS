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


<title> Gluten Free </title>
<style>

</style>
</head>
<body>


    <header id="MYheader" class="pHeadC">

    <div>
      <?php if(isset($firstName)){echo "<div class='dropdown'>
  <button class='dropbtn'>
  <i class='fas fa-user-alt' style='font-size:24px;color:white;'></i>
  Hello ".$firstName."</button>
  <div class='dropdown-content'>
    <a href='personal.php'>Personal Info</a>
    <a href='talcart.php'>My cart</a>
  </div>
</div>";} ?>  
</div>

      <img class="logo" onclick="sendHome()" src="../images/logo1.png" width="38%">

      <form action="<?php echo $log_action; ?>">	
      <button class="logs btnn"><?php echo $log; ?> </button> 
    </form>
    </header>



<nav id="MYnav" class="navbar navbar-light navbar-expand-lg my-nav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo $store; ?>"><b class="myText">
            <i class='fas fa-shopping-cart'style='font-size:18px;color:#ff9966'></i>    
            Store</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="recipes1.php"><b class="myText">
            <i class='fas fa-pepper-hot' style='font-size:18px;color:#ff9966'></i>    
            Recipes</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="aboutUs.php"><b class="myText">
            <i class='fas fa-globe' style='font-size:18px;color:#ff9966'></i>  
            About Us</b></a>
        </li>       
 
        <li class="nav-item ">
            <a class="nav-link active" href="recommendations.php"><b class="myText">
            <i class='fas fa-star' style='font-size:18px;color:#ff9966'></i>  
            Recommendations</b></a>
        </li>
    </ul>
</nav>    


</body>
<footer  id="MYfooter" class="footer">
<div class="upper1">
      <div class="R h8"> Contact Us <hr class="line">
          <h8 class="fofo tool toolTop">Branches<span class="tooltext">Inactive button</span></h8><br><br>
          <h8 class="fofo tool toolTop">Addresses<span class="tooltext">Inactive button</span></h8><br><br>
          <h8 class="fofo tool toolTop">Coupons<span class="tooltext">Inactive button</span></h8><br><br>
      </div>
      <div class="R h8"> Company Information <hr class="line">
        <h8 class="fofo tool toolTop">About<span class="tooltext">Inactive button</span></h8><br><br>
        <h8 class="fofo tool toolTop">Blog<span class="tooltext">Inactive button</span></h8><br><br>
        <h8 class="fofo tool toolTop">Careers<span class="tooltext">Inactive button</span></h8><br><br>
      </div>
      <div class="R h8"> Terms of Use & Privacy <hr class="line">
          <h8 class="fofo tool toolTop">Support<span class="tooltext">Inactive button</span></h8><br><br>
          <h8 class="fofo tool toolTop">FAQ<span class="tooltext">Inactive button</span></h8><br><br>
          <h8 class="fofo tool toolTop">Help Docs<span class="tooltext">Inactive button</span></h8><br><br>
      </div>
      </div>
    <div id="FB" style="color:#ff9966;  background-color: white; padding:10px;"><b>©  2021  Copyright:  Tal Gumi  &  Neta Tuvian  &  Shaked Aroukh<b></div>

  </footer>

</html>
