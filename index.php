<?php

require_once('includes/init.php');

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
        <link rel="stylesheet" type="text/css" href="css/phpStyle.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

        <script src="js/js.js"></script>

   </head>
   <body>
    
   <header id="MYheaderindex" class="pHeadC">

<div>
      <?php if(isset($firstName)){echo "<div class='dropdown'>
  <button class='dropbtn'>
  <i class='fas fa-user-alt' style='font-size:24px;color:white;'></i>
  Hello ".$firstName."</button>
  <div class='dropdown-content'>
    <a onclick='sendPersonalH()'>Personal Information</a>
    <a href='includes/talcart.php'>My cart</a>
  </div>
</div>";} ?>  
</div>

  <img class="logo" src="images/logo1.png" width="38%">


  <form action="includes/<?php echo $log_action; ?>" >	
  <button class="logs btnn"> <?php echo $log; ?> </button> 
  </form>

</header>

<nav id="MYnavindex" class="navbar navbar-light navbar-expand-lg my-nav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo "includes/".$store; ?>"><b class="myText">
            <i class='fas fa-shopping-cart'style='font-size:18px;color:#ff9966'></i>  
            Store</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="includes/recipes1.php"><b class="myText">
            <i class='fas fa-pepper-hot' style='font-size:18px;color:#ff9966'></i>  
            Recipes</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="includes/aboutUs.php"><b class="myText">
            <i class='fas fa-globe' style='font-size:18px;color:#ff9966'></i>
            About Us</b></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link active" href="includes/recommendations.php"><b class="myText">
            <i class='fas fa-star' style='font-size:18px;color:#ff9966'></i>  
            Recommendations</b></a>
        </li>
    </ul>
</nav>

      <main class="bodyPage E">


          <h4 class="hhh"> Recommended Recipes </h4>
              <div class="upper1 ">
              <div class="btnn sp"> <img onclick="send2Recipe()" width="100%" src="images/cake1.jpg"><br><b>Cheesecake</b></div>
            <div class="btnn sp"> <img onclick="send2Recipe()" width="100%" src="images/cake5.jpg"><br><b>Melabi</b></div>
            <div class="btnn sp"> <img onclick="send2Recipe()" width="100%" src="images/cockie3.jpg"><br><b>Karmogit</b></div>
          </div>
          <div class="upper1">
            <div class="btnn sp"> <img onclick="send2Recipe()" src="images/cockie1.jpg" width="100%"><br><b>Love cookie</b></div>
            <div class="btnn sp"> <img onclick="send2Recipe()" src="images/icecream.jpg" width="100%"><br><b>Vanilla cake</b></div>
            <div class="btnn sp"> <img onclick="send2Recipe()" src="images/cake2.jpg" width="100%"><br><b>Chocolate Cake</b></div>
    
          </div>
          <div class="upper1">
            <div class="btnn sp"> <img onclick="send2Recipe()" src="images/cockie4.jpg" width="100%"><br><b>Brownies</b></div>
            <div class="btnn sp"> <img onclick="send2Recipe()" src="images/cockie5.png" width="100%"><br><b>Crumble</b></div>
            <div class="btnn sp"> <img onclick="send2Recipe()" src="images/cockie2.jpg" width="100%"><br><b>Rozlech</b></div>   </div>

            <h4 class="hhh">  Best Sellers </h4>
              <div class="upper1">
        <?php
            require_once('includes/init.php');
            $prod=new Product();
            $res=$prod->getProducts();
            for ($i=0; $i<sizeof($res); $i++)
            {
              if($i==4)
              {
                echo "</div>";
                echo '<div class="upper1">';
              }
              echo '<div class="btnn sp"> 
              <img onclick="send2Recipe()" width="100%" src="'.$res[$i]['img'].'"><br><h5 class="delText">'.$res[$i]['name'].'<br>'.$res[$i]['cost'].' $</h5></div>';
            }
        ?>

            </div>
              <h4 class="hhh">Special Videos</h4>

              <div class="upper1">
                <iframe class="btnn" width="20%" hight="70%" src="https://www.youtube.com/embed/I2yW_VONWco" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <iframe class="btnn" width="20%" hight="70%" src="https://www.youtube.com/embed/dVk14Eg9qaY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe class="btnn" width="20%" hight="70%" src="https://www.youtube.com/embed/yEEGSDOePxM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
       </main>

<footer id="MYfooter"></footer>
<script>  $( "#MYfooter" ).load( "includes/headerFooter.php #MYfooter" );  </script>
</body>
</html>