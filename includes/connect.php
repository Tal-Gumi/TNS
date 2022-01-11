<?php
require_once('init.php');
$info="";

    $firstName = $lastName = $email = $password = $address = $birthday = "";
    $firstNameErr = $lastNameErr = $addressErr = $emailErr = $passwordErr = "";
    $count=0;
    $error="";

    if ($_POST) 
    {
      if (empty($_POST["firstName"])) 
      {
        $firstNameErr = "Name is required";
      } 
      else 
      {
        $firstName = test_input($_POST["firstName"]);
        $count++;
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) 
        {
          $firstNameErr = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["email"])) 
      {
        $emailErr = "Email is required";
      } 
      else 
      {
        $email = test_input($_POST["email"]);
        $count++;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
          $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["lastName"])) 
      {
        $lastNameErr = "Last name is required";
      } 
      else 
      {
        $lastName = test_input($_POST["lastName"]);
        $count++;
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) 
        {
          $lastNameErr = "Only letters and white space allowed";
        }
      }
      if (empty($_POST["password"])) 
      {
        $passwordErr = "Password is required";
      } 
      else 
      {
        $password = $_POST["password"];
        $count++;
      }
      if (empty($_POST["address"])) 
      {
        $addressErr = "Address is required";
      } 
      else 
      {
        $address = $_POST["address"];
        $count++;
      }
    }

    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if($count==5)
    {
      $birthday = $_POST['birthday'];
      $passwordd=md5($password);		
      $user1 = new User();
      $error=$user1->add_user($email,$firstName,$lastName,$address,$birthday,$passwordd);

      if($error==null)
      {
          $info="User successfully set up!";
					session_start();
					$error= "Hello ".$firstName."!";
					$_SESSION['firstName']=$firstName;
					$session->login($user1);
					header('Location: login.php');
					exit;      }
      else
      {
          $info=$error;
      }
    }


?>

<!DOCTYPE html> 
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

        <script src="../js/js.js"> </script>

  <style> 
  
    </style>
	
    <title> connect </title>
    </head>
    <body>
	    <header class="pHeadB">	
            <img class="logo" onclick="sendHome()" src="../images/logo1.png" width="38%"> </div>
    </header>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>

<main>
        <fieldset class="mainS K"> 
                <p> <?php echo $info; ?> </p>
                <legend class="join">Join us!</legend>
                <form method="post" >
                    <label for="fname">First Name:</label>
                    <p>
                    <input class="myINPUT" type="text" id="firstName" name="firstName"
                     value="<?php echo $firstName;?>"><span class="error"> * <?php echo $firstNameErr;?></span>
                    </p>
                     <label for="lname">Last Name:</label>
                     <p>
                    <input class="myINPUT" type="text" id="lastName" name="lastName"
                    value="<?php echo $lastName;?>"><span class="error"> * <?php echo $lastNameErr;?></span>
                    </p>
                    <label for="Email">Email:</label>
                    <p>
                    <input class="myINPUT" type="email" id="email" name="email"
                    value="<?php echo $email;?>"><span class="error"> * <?php echo $emailErr;?></span>
                    </p>

                    <label for="Password">Password:</label>
                    <p>
                    <input class="myINPUT" type="password" id="password" name="password"
                    value="<?php echo $password;?>"><span class="error"> * <?php echo $passwordErr;?></span>
                    </p>

                    <label for="address">Address:</label> 
                    <p>
                    <input class="myINPUT" type="text" id="address" name="address"
                    value="<?php echo $address;?>"><span class="error"> * <?php echo $addressErr;?></span>
                    </p>


                    <label for="birthday">BirthDay:</label> 
                    <p>
                    <input class="myINPUT" type="date" id="birthday" name="birthday">
                    </p>


                    <input class="btnn Rcenter" type="submit" value="Send">
              </form> 
        </fieldset>
				
        </main>		  
    </body>
    <footer id="MYfooter"></footer>

<script>
  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );
  </script>
</html>