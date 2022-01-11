<?php
require_once('init.php');
class Session{
    	private $signed_in;
    	private $user_name;
		private $user_email;

	public function __construct(){
        session_start();
        $this->check_login();
	}
	private function check_login(){
        if (isset($_SESSION['firstName'])){
            $this->user_name=$_SESSION['firstName'];
            $this->signed_in=true;
        }
        else{
            unset($this->user_name);
            $this->signed_in=false;
        }
    }

	public function login($user){
        if($user){
                $this->user_name=$user->firstName;
                $this->user_email=$user->email;

                $_SESSION['firstName']=$user->firstName;
                $_SESSION['email']=$user->email;
            	$this->signed_in=true;
        }
    }

	public function logout(){
            unset($_SESSION['firstName']);
            unset($_SESSION['email']);
  
            unset($this->user_name);
            unset($this->user_email);

        	$this->signed_in=false;
	} 

	public function __get($property){
        if (property_exists($this,$property))
            return $this->$property;
    }
}
$session=new Session();
?>
