<?php
require_once('init.php');

class Product {
    
    private $barcode;
    private $name;
    private $cost;
    private $amount;
    private $img;
    private $orderAmount=0;  

    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }
    public function setAmount()
    {
        $this->orderAmount=intval($this->orderAmount)+1;
        return $this->orderAmount;
    }

    public function getProducts()
    {
        global $database;
        $result=$database->query("select * from product");
        if ($result){
            $products = array();
            if ($result->num_rows>0)
            {
                while($row=$result->fetch_assoc()){
                  array_push($products,$row);
                }
            }
        }
        return $products;
    }

public function find_product_by_barcode($barcode)
    {
        global $database;
        $error=null;
        $result=$database->query("select * from product where barcode='".$barcode."'");
        $found_product=$result->fetch_assoc();
        if (!$result)
        {
             $error='Can not find the user. Error is:'.$database->get_connection()->error;
        }
   
        elseif ($result->num_rows>0)
        {
             $this->instantation($found_product);
        }
        else
        {
            $error="Can not find product by this barcode.<br>";
        }
        return $error;
    }
    
    
    public function find_product_by_name($name)
    {
        global $database;
        $error=null;
        $result=$database->query("select * from product where name LIKE '%".$name."%'");
        $found_product=$result->fetch_assoc();
        if (!$result)
        {
             $error='Can not find the product. Error is:'.$database->get_connection()->error;
        }
   
        elseif ($result->num_rows>0)
        {
             $this->instantation($found_product);
        }
        else
        {
            $error="Can not find product by this name.<br>";
        }
        return $error;
    }

public function by_barcode($barcode)
    {
        global $database;

        $result=$database->query("select * from product where barcode='".$barcode."'");
		 if (!$result)
        {
             return true;
        }
		else
		{
			return false;
		}
		
	}

    public function stock($barcode)
    {
        self::find_product_by_barcode($barcode);

            if($this->amount>0)
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function MYstock($barcode)
    {
        self::find_product_by_barcode($barcode);
        return $this->amount;
    }

    public function update_stock($orderNumber)
    {
        global $database;

        $res=$database->query("select * from cart where orderNum='".$orderNumber."'");
        if($res)
        {
            $i=0;
            if ($res->num_rows>0)
             { 
                while($row=$res->fetch_assoc())
                { 
                    $product=new Product();
                    $product->instantation($row);
                    $barcode=$product->barcode;
                    if(self::stock($barcode))
                    {
                        $res2=$database->query("UPDATE product SET amount=amount-1 where barcode='".$barcode."'");
                    } 
                    else
                    {
                        echo "Out of stock";
                    }    
                    $i++;           
                }
            }
        }

    }

    public function has_attribute($attribute)
    {
        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }
    
    public function instantation($product_array)
    {
        foreach ($product_array as $attribute=>$value)
        {
            	if ($result=$this->has_attribute($attribute))
                	$this->$attribute=$value;
        }
		
    }

    
public static function fetch_products()
    {
        global $database;
        $result=$database->query("select * from product");
        $products=null;
        if ($result)
        {
           	 $i=0;
           	 if ($result->num_rows>0)
             { 
                	while($row=$result->fetch_assoc())
                    { 
                        	$product=new Product();
                    		$product->instantation($row);
                    		$products[$i]=$product;
                    		$i+=1;      
                    }
            }
        }
        return $products;    
    }
    
public function add_product ($barcode,$name,$cost,$amount)
    {
        global $database;
        $error=null;

        $sql="Insert into product(barcode,name,cost,amount) values ('".$barcode."','".$name."', '".$cost."','".$amount. "')";

         if (self::by_barcode($barcode))
		 {
			$result=$database->query($sql);
		 }
		 else
		 {
			$error='Can not add product. This barcode is already exist.';

		 }
		
        echo $error;          
	
    }


public function __toString ()
         {
             return 'Product name: '.$this->name.'<br> Product barcode: '.$this->barcode.'<br> Product cost: '.$this->cost.'<br> 
Product amount: '.$this->amount.'<br>';
         }
    
}
$product = new Product ();         

?>