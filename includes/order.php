<?php
    require_once('init.php');


    $cardname = $cardnumber = $expmonth = $expyear = $cvv = "";
    $cvvErr = $yearErr = $monthErr = $cardnameErr = $cardnumErr = "";
    $count=0;
    $error="";

    if ($_POST) 
    {
      if (empty($_POST["cardname"])) 
      {
        $cardnameErr = "Name is required";
      } 
      else 
      {
        if (ctype_alpha($cardname)) 
        {
          $cardnameErr = "Only letters and white space allowed";
        }
        else
        {
          $cardname = $_POST["cardname"];
          $count++;
        }
      }
      if (empty($_POST["cardnumber"])) 
      {
        $cardnumErr = "Card number is required";
      } 
      else 
      {
        if(is_numeric(($_POST["cardnumber"]))==false)
        {
          $cardnumErr = "Card number is not valid";
        }
        else
        {
          $cardnumber = $_POST["cardnumber"];
          $count++;
        }
      }
      if (empty($_POST["expmonth"])) 
      {
        $monthErr = "Exp month number is required";
      } 
      else 
      {
        if(is_numeric(($_POST["expmonth"]))==false)
        {
          $monthErr = "Month is not valid";
        }
        else
        {
          $expmonth = $_POST["expmonth"];
          $count++;
        }
      }
      if (empty($_POST["expyear"])) 
      {
        $yearErr = "Exp year number is required";
      } 
      else 
      {
        if(is_numeric(($_POST["expyear"]))==false)
        {
          $yearErr = "Year is not valid";
        }
        else
        {
          $expyear = $_POST["expyear"];
          $count++;
        }
      }
      if (empty($_POST["cvv"])) 
      {
        $cvvErr = "CVV number is required";
      } 
      else 
      {
        if(is_numeric(($_POST["cvv"]))==false)
        {
          $cvvErr = "CVV is not valid";
        }
        else
        {
          $cvv = $_POST["cvv"];
          $count++;
        }
      }
    }
    
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    /* numeric, decimal passes */
    function validate_numeric($variable)
    {
        return is_numeric($variable);
    }

    /* digits only, no dots */
    function is_digits($element)
    {
        return !preg_match ("/[^0-9]/", $element);
    }

    if($count==5)
    {
      $LOVE=$order->find_email($_SESSION['email']);
      $temp=$LOVE->close_order();
      $details=$LOVE;
    }

  
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
<link rel="stylesheet" type="text/css" href="../css/order.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

<script src="../js/js.js"> </script>

<title> Gluten Free </title>

</head>
<body >

<header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>

 <div class="bodyPage B D">
    <div class="container">

    <?php 
      if(isset($details))
      {
        echo "<p class='hhh'>Order Details</p><p>Thank you for order!<br>".$details."</p>";
        echo "<style> #mypayment{display:none;} </style>";
      }

      ?>

      <p id="mypayment" class="hhh"> My cart </p>
<table>


<?php
            require_once('init.php');

            $email=$_SESSION['email'];
            $order=new Order();
            $LOVE=$order->find_email($email);
            if($order->find_email($email))
            {
              $cart=new Cart();
              $product=new Product();
              $res=$cart->getCarts($LOVE->orderNumber);
                             
              for ($i=0; $i<sizeof($res); $i++)
              {
                $product->find_product_by_barcode($res[$i]['barcode']);
                echo "<p>".$product->name;
                echo "<span class='price'>".$product->cost." $</span></p>";
              }
            }

?>
</table>
      <hr id="mypayment">
      <p id="mypayment"><b>Total</b> <span class="price" style="color:black"><b><?php echo $LOVE->totalcost ?> $ </b></span></p>
    </div>
</div>

    <div  id="mypayment" class="mycontainer bodyPage D">
      <form method="POST">
     
            <p class="hhh">Payment</p>
            <label for="fname">Accepted Cards</label><br>
            <div class="icon-container">
            <i class="fab fa-cc-paypal" style="color:navy;"></i>
              <i class="fab fa-cc-visa" style="color:blue;"></i>
              <i class="fab fa-cc-mastercard" style="color:red;"></i>
              <i class="fab fa-cc-amex" style="color:orange;"></i>
            </div><br><br>
            <label for="cname">Name on Card</label><p>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" class="myINPUT"
            value="<?php echo $cardname;?>"><span class="error"> * <?php echo $cardnameErr;?></span>
          </p>
            <label for="ccnum">Credit card number</label><p>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" class="myINPUT"
            value="<?php echo $cardnumber;?>"><span class="error"> * <?php echo $cardnumErr;?></span>
          </p>
            <label for="expmonth">Exp Month</label><p>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" class="myINPUT"
            value="<?php echo $expmonth;?>"><span class="error"> * <?php echo $monthErr;?></span>
          </p>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" class="myINPUT"
                value="<?php echo $expyear;?>"><span class="error"> * <?php echo "<br>".$yearErr;?></span>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" class="myINPUT"
                value="<?php echo $cvv;?>"><span class="error"> * <?php echo "<br>".$cvvErr;?></span>
              </div>
            </div>
         </div> 
  
  
       <div class="D">

        <input id="mypayment" name="checkout" type="submit" value="Continue to checkout" class="btnn">
        </div>

      </form>
 

</body>
<footer id="MYfooter"></footer>

<script>   $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );  </script>
</html>
