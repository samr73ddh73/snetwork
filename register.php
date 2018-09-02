<?php 
require 'config/config.php';
require 'includes\form_handler/register_handler.php';
require 'includes\form_handler/login_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Our site</title>
</head>
<body>
	<!-- LOGIN FORM -->
	<form action="register.php" method="POST">
		<input type="email" name="log_email" placeholder="email">
		<br>
		<input type="password" name="log_password" placeholder="password">
		<br>
		<input type="submit" name="log_button" value="login">
	</form>
    <br><br>
    <!-- REGISTER FORM -->
	<form  action="register.php" method="POST">
		<!-- first name -->
		<input type="text" name="reg_fname" placeholder="first name" value=
		"<?php
		  if(isset($_SESSION['reg_fname']))
		  {
		  	echo $_SESSION['reg_fname'];
		  }
		  ?>" required>
		<br>
		<?php
         if(in_array("first name must be between 2 and 27 character", 
         	$error_array)) 
         	echo "first name must be between 2 and 27 character <br>";

   
         if(in_array("first name should only contain alphabets", $error_array)) 
         	echo "first name should only contain alphabets <br>";
		?>
<!-- 
		last-name -->
		<input type="text" name="reg_lname" placeholder="last name"
		value=
		"<?php
		  if(isset($_SESSION['reg_lname']))
		  {
		  	echo $_SESSION['reg_lname'];
		  }
		  ?>" required> 
		<br>
		<?php
         if(in_array("last name must be between 2 and 27 character", 
         	$error_array)) 
         	echo "last name must be between 2 and 27 character <br>";
       	
         if(in_array("last name should only contain alphabets", $error_array)) 
         	echo "last name should only contain alphabets <br>";

		?>
		<input type="email" name="reg_email" placeholder="email"
		value=
		"<?php
		  if(isset($_SESSION['reg_email']))
		  {
		  	echo $_SESSION['reg_email'];
		  }
		  ?>" required>
		<br> 
		<?php
         if(in_array("email already exists", 
         	$error_array)) 
         	echo "email already exists <br>";
         ?>
		<input type="password" name="reg_password" placeholder="password" required>
		<br>
		<?php
         // if(in_array("password can contain only english charcters or numbers", 
         // 	$error_array)) 
         // 	echo "password can contain only english charcters or numbers <br>";
         
         if(in_array("password must be between 8 and 30 characters", 
         	$error_array)) 
         	echo "password must be between 8 and 30 characters <br>";
         if(in_array("passwords don't match", 
         	$error_array)) 
         	echo "passwords don't match <br>";
         ?>

		<input type="password" name="reg_password2" placeholder="confirm password" required>
		<br>
		<input type="submit" name="register_button" value="register">
	</form>
     
</body>
</html>