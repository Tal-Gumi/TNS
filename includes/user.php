<?php
require_once('init.php');

class User {
	
	private $firstName;
	private $lastName;
	private $email;
	private $fulladdress;
	private $birthday;
	private $password;
	
	public function __get($property){
        if (property_exists($this,$property))
            return $this->$property;
    }

	private function has_attribute($attribute){
        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
	}
	
	private function  instantation($user_array){
        foreach ($user_array as $attribute=>$value){
            	if ($result=$this->has_attribute($attribute))
                	$this->$attribute=$value;
       }
	}
	
	public function find_user_by_email($email){
		  global $database;
		  $error=null;
		  $result=$database->query("select * from users where email='".$email."'");
		  $found_user=$result->fetch_assoc();
		  if (!$result){
			$error='Can not find the user.  Error is:'.$database->get_connection()->error;
		  }
		  elseif ($result->num_rows>0){
			$this->instantation($found_user);
		  }
		  else{
		  $error="Can no find user by this email";}
		return $error;
	 }
	 
	 public static function fetch_users(){
        global $database;
        $result=$database->query("select * from users");
        $users=null;
        if ($result){
           	 $i=0;
           	 if ($result->num_rows>0){ 
                	while($row=$result->fetch_assoc()){ 
						$user=new User();
                    	$user->instantation($row);
                    	$users[$i]=$user;
                    	$i+=1;      
					}
			 }
		}

       return $users;      
	}
	
	public static function add_user($email,$firstName,$lastName,$fulladdress,$birthday,$password){
        global $database;
        $error=null;
        $sql="Insert into users(password,firstName,lastName,fulladdress,birthday,email) values ('".$password."','".$firstName."','".$lastName."','".$fulladdress."','".$birthday."','".$email. "')";
        $result=$database->query($sql);
         if (!$result)
            $error='Can not add user. Error is:'.$database->get_connection()->error;
        return $error;          
	}
	public function __toString ()
	{
			return 'User name: '.$this->firstName.' '.$this->lastName.'<br> Email: '.$this->email.'<br> 
	Address: '.$this->fulladdress.'<br>';
		}

	}


$user = new User ();



?>
