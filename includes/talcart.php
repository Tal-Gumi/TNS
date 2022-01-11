<?php
  require_once('init.php');

  if($_GET)
  {
    $try=$cart->emptyCart($_GET['emptyCart']);
    echo $try;
    unset($_GET['emptyCart']);
    header('Location: ../index.php');
  }

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

<style> 

</style>
</head>
<body>

<header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>



<div class="container bodyPage"> 
   <h4 class="hhh">Store</h4>
   <div id="alerts"></div>

   <?php
            require_once('init.php');
            $prod=new Product();
            $res=$prod->getProducts();

            echo "<div class='productcont'>";                
            for ($i=0; $i<sizeof($res); $i++)
            {
              if($i == 3 || $i ==6)
              {
                echo "<div class='productcont'>"; 
              }

              echo "<div class='product'>";
              echo "<img class='goom' src='../".$res[$i]['img']."'alt='item pic'>";
              echo "<h5 class='productname'>".$res[$i]['name']."</h5>";
              echo "<details class='des'>Contains: oats, corn flour, sweetener and preservative.</details>";
              echo "<p class='price'>".$res[$i]['cost']." $</p>";
              echo "<p class='item-stock'><b>Available in Stock: </b>" .$res[$i]['amount']."</p>";
              echo "<button class='addtocart' value='".$res[$i]['barcode']."' onclick='showHint(this.value)'>Add To Cart</button>";
              echo "</div>";

              if($i==2 || $i==5 || $i==7)
              {
                echo "</div>";
              }
            }


            ?>




            <?php
            require_once('init.php');

            $email=$_SESSION['email'];
            $order1=new Order();
            $love= $order1->find_email($email);

            if($order1->find_email($email))
            {
              $cart=new Cart();
              $product=new Product();
              $res=$cart->getCarts($love->orderNumber);
              echo '<div class="cart-container">
              <h4 class="hhh">Cart</h4>
              <table>
                <thead>
                  <tr>
                  <th class="hidePic"><strong> </strong></th>
                  <th><strong>Product</strong></th>
                  <th><strong>Price</strong></th>
                </tr>
                </thead>
                <tbody id="carttable">';

              for ($i=0; $i<sizeof($res); $i++)
              {
                echo "<tr>"; 
                $product->find_product_by_barcode($res[$i]['barcode']);
                echo "<td class='hidePic'><img class='goom22' src='../".$product->img."'></td>";
                echo "<td>".$product->name."</td>";
                echo "<td>".$product->cost." $</td>";
                echo "</tr>";
              }
              
              echo '</tbody>
              </table>
              <hr>
              <table id="carttotals">
                <tr>
                  <td><strong>Items</strong>
                </td>
                  <td><strong>Total</strong></td>
                </tr>
                <tr>
                  <td>x <span id="itemsquantity">'.$love->amount.'</span></td>
                 
                  <td>$ <span id="total">'.$love->totalcost.'</span></td>
                </tr></table>';
    
                if($love->totalcost>0)
                {
                  echo '<div class="cart-buttons">
                  <form><button onclick="emptyTheCart()" value='.$love->orderNumber.' name="emptyCart" type="submit" id="emptycart">Empty Cart</button></form>
                   <button onclick="checkout()" id="checkout">Checkout</button>
                 </div>';
                }
            }

?>
 <tbody id="carttable"></tbody>
        </div>

</div>

</body>


<footer id="MYfooter"></footer>
<script>  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );  </script>

</html>