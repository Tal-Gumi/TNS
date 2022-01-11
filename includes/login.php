<?php
require_once('init.php');

$error = "";

if ($_POST)
{
	if ($_POST['email']== null || $_POST['password']== null)
	{
		$error= "please enter email and password";
	}
	else
	{
			$email=$_POST['email'];
			$passwordd=$_POST['password'];
			$password=md5($passwordd);
			
			$user1 = new User ();

			$user1->find_user_by_email($email);
			$firstName = $user1->firstName;
			
			if ($firstName!=null)
			{
				if ($user1->password==$password)
				{
					session_start();
					$error= "Hello ".$firstName."!";
					$_SESSION['firstName']=$firstName;
					$session->login($user1);
					header('Location: ../index.php');
					exit;
				}
				else
				{
					$error= "Incorrect password.";
				}
			}
			else
			{
				$error= "User not found.";
			}
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

    <title> Login </title>

    </head>
    <body>

	<header class="pHeadB">	
            <img class="logo" onclick="sendHome()" src="../images/logo1.png" width="38%"> </div>
		</header>


<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>
			
		<main class="K">
		<p>
			<?php echo $error; ?>
		</p>

            <fieldset class="mainJ"> 

                <legend  class="join">Log in</legend>
                <form method="post">
				<br>
					<label for="email">Email:</label>
					<p>
					<input class="myINPUT" type="email" id="email" name="email"></p>
					<label for="password">Password:</label>
					<p>
					<input class="myINPUT" type="password" id="password" name="password"></p>
					<input class="btnn" type="submit" value="Log in">
				</form> 
				
			</fieldset>
			
				<div><br>
					<p>Not a member yet?<a href= "connect.php">  Sign up for TNS</a></p>
					<p>Log in later?<a href= "../index.php"> Back to home page </a></p>
				</div>
		</main>
	</body>
    <footer id="MYfooter"></footer>

<script>
  $( "#MYfooter" ).load( "headerFooter.php #MYfooter" );
  </script>
</html>