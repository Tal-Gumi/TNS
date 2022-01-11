<?php

require_once('init.php');


$email = $_SESSION['email'];
$total=0;
$product = new Product ();
$cart = new Cart ();
$order = new Order ();
$totalAmount;
$totalCost;

if($_REQUEST)
{
  $q = $_REQUEST["q"];
  if($LOVE=$order->find_email($email))
  {  
      $query = $product->find_product_by_barcode($q);
      if(intval($product->MYstock($q))>intval($product->orderAmount))
      {
        $cart->addToCart($LOVE->orderNumber,$q,$product->cost);
        echo "<tr><td><img class='goom22' src='../".$product->img."'></td><td>".$product->name."</td><td>".$product->cost." $ </td></tr>";
        $totalAmount=$order->amount;
        $totalCost=$order->totalcost;
        $num=$LOVE->orderNumber;
        $LOVE->calc_total_cost($num);
        $magic=$product->setAmount();
      }
      else
      {
        echo false;
      }
  }
  else
  {
    $user = new User ();
    $try1=$user->find_user_by_email($email);
    $try2=$order->add_order($user->email, $user->fulladdress);
    $query = $product->find_product_by_barcode($q);
  
    $try3=$cart->addToCart($order->orderNumber,$product->barcode,$product->cost);
    echo "<tr><td><img class='goom22' src='../".$product->img."'></td><td>".$product->name."</td><td>".$product->cost." $ </td></tr>";
    $num=$order->orderNumber;
    $order->calc_total_cost($num);
    
  }
  
}


?>

