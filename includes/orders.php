<?php
require_once('init.php');

class Order {
	
	private $orderNumber;
	private $email;
	private $fulladdress;
    private $totalcost=0;
	private $orderTime;
	private $amount;
	private $done=false;
	
	public function __get($property){
        if (property_exists($this,$property))
            return $this->$property;
    }

	public function close_order()
	{
		global $database;
	
		$this->done=true;
		$database->query("UPDATE orders set done=1 where orderNumber='".$this->orderNumber."'");
		$product=new Product();
		$product->update_stock($this->orderNumber);
		return true;

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
	
	public function find_order_by_num($num){
		  global $database;
		  $error=null;
		  $result=$database->query("SELECT * from orders where orderNumber='".$num."'");
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



public static function find_email($email){
	global $database;
	$error=null;
	$result=$database->query("SELECT * from orders where email='".$email."' and done=0");
	if ($result)
	{
		$i=0;
		if ($result->num_rows>0)
		{ 
			while($row=$result->fetch_assoc())
			{ 
				$order=new Order();
				$order->instantation($row);
				$orders[$i]=$order;
				$i+=1;   
			}
			return $orders[0];
		} 
	}
	else
	{
		return null;
	}
}

	 public function find_num($num){
		global $database;
		$error=null;
		$result=$database->query("SELECT * from orders where orderNumber='".$num."'");
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
        $result=$database->query("SELECT * from orders");
        $orders=null;
        if ($result){
           	 $i=0;
           	 if ($result->num_rows>0){ 
                	while($row=$result->fetch_assoc()){ 
						$order=new Order();
                    	$order->instantation($row);
                    	$orders[$i]=$order;
                    	$i+=1;      
					}
			 }
		}

       return $orders;      
	}
	public function fetch_MYorders($email){
        global $database;
        $result=$database->query("SELECT * from orders where email='".$email."'");
        $orders=null;
        if ($result){
           	 $i=0;
           	 if ($result->num_rows>0){ 
                	while($row=$result->fetch_assoc()){ 
						$order=new Order();
                    	$order->instantation($row);
                    	$orders[$i]=$order;
                    	$i+=1;      
					}
			 }
		}

       return $orders;      
	}
	public function calc_total_cost($number)
    {
        global $database;
		$result=$database->query("SELECT cost from cart where orderNum='".$number."'");
        if ($result){
            if ($result->num_rows>0)
            {
				$this->totalcost=0;
                while($row=$result->fetch_assoc()){
					$Ccost=intval($row['cost']);
					$this->totalcost+=$Ccost;
				}
			}
		}
		$myamount=$database->query("SELECT COUNT(*) FROM cart WHERE orderNum='".$number."'");
		$this->amount+=$myamount->num_rows;
		$database->query("UPDATE orders set totalcost='".$this->totalcost."', amount='".$this->amount."' where orderNumber='".$number."'");
		return $this->totalcost;
	}

    public function add_order($email, $fulladdress)
    {
		global $database;
		
		$orderNumber = rand();
		while (!self::find_order_by_num($orderNumber))
		{
			$orderNumber = rand();
		}

		$error=null;
		$orderTime=date("Y-m-d h:i:sa");
        $sql="INSERT into orders(orderNumber, email,fulladdress,orderTime) values ('".$orderNumber."','".$email."','".$fulladdress."','".$orderTime."')";
        $result=$database->query($sql);
         if (!$result)
			$error='Can not add order. Error is:'.$database->get_connection()->error;
			
        return $error;          
	}

	public function __toString ()
	{
		return "<b>Order number:</b> ".$this->orderNumber."<br><b>Email:</b> ".$this->email."<br><b>Address:</b> ".$this->fulladdress."<br><b>Total cost:</b> ".$this->totalcost." $"; 
	}

}

$order = new Order ();



?>