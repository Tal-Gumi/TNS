<?php
require_once('init.php');

class Cart {
	
	private $orderNumber;
	private $barcode;
    private $cost;
	private $amount;

	public function __get($property){
        if (property_exists($this,$property))
            return $this->$property;
    }

	private function has_attribute($attribute){
		$object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
	}
	
	private function instantation($order_array){
        foreach ($order_array as $attribute=>$value){
            	if ($result=$this->has_attribute($attribute))
					$this->$attribute=$value;
       }
	}

	public function getCarts($number)
    {
        global $database;
		$result=$database->query("select * from cart where orderNum='".$number."'");
        if ($result){
            $carts = array();
            if ($result->num_rows>0)
            {
                while($row=$result->fetch_assoc()){
                  array_push($carts,$row);
                }
            }
        }
        return $carts;
	}
	
	public function find_cart_by_num($num){
		  global $database;
		  $error=null;
		  $result=$database->query("select * from cart where orderNum='".$num."'");
		  $found_order=$result->fetch_assoc();
		  if (!$result){
			$error='Can not find the order number. Error is:'.$database->get_connection()->error;
		  }
		  elseif ($result->num_rows>0){
			$this->instantation($found_order);
		  }
		  else{
		  $error="Can not find order by this number";}
		return $error;
	 }


	 public function find_num($num){
		global $database;
		$error=null;
		$result=$database->query("select * from cart where orderNum='".$num."'");
		$found_order=$result->fetch_assoc();
		if (!$result){
		 return false;
		}
		elseif ($result->num_rows>0){
		  return true;
		}
		else{
		return false;
		}
   }

	 public function fetch_orders(){
        global $database;
        $result=$database->query("select * from cart");
        $carts=null;
        if ($result){
           	 $i=0;
           	 if ($result->num_rows>0){ 
                	while($row=$result->fetch_assoc()){ 
						$cart=new Cart();
                    	$cart->instantation($row);
                    	$carts[$i]=$cart;
                    	$i+=1;      
					}
			 }
		}

       return $orders;      
	}
	
    public function addToCart($orderNum,$barcode,$cost)
    {
        global $database;
		$error=null;
		
        $sql="Insert into cart(orderNum, barcode, cost) values ('".$orderNum."','".$barcode."','".$cost."')";
        $result=$database->query($sql);
         if (!$result)
			$error='Can not add order. Error is:'.$database->get_connection()->error;
			
        return $error;          
	}

    public function emptyCart($num)
    {
        global $database;
		$error=null;
		
		$updateProducts=self::getCarts($num);

		$sql=$database->query("UPDATE orders set totalcost=0, amount=0 where orderNumber='".$num."'");
		$delete=$database->query("DELETE from cart where orderNum='".$num."'");

        $result=$database->query($delete);
         if (!$result)
			$error='Can not delete row. Error is:'.$database->get_connection()->error;
			
        return;          
	}

	public function __toString ()
	{
		return "Order number: ".$this->orderNumber."<br>product: ".$this->product."<br>amount: ".$this->amount."<br>cost: ".$this->cost; 
	}

}

$cart = new Cart ();



?>
