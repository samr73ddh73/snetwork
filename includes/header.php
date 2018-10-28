<?php  
require 'config/config.php';

if(isset($_SESSION['username']))
{
	$userLoggedIn=$_SESSION['username'];
	$userDetailsQuery = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	if (!$userDetailsQuery)
	{
    	printf("Error: %s\n", mysqli_error($con));
    	exit();
	}
	$user = mysqli_fetch_array($userDetailsQuery);
}
else
{
	header("Location: register.php");
}
?>
<html>
<head>
	<title>Welcome to S-network</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/javascript/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/javascript/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap3.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap4.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
	    	<div class="navbar-header">
	             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	            </button>
	            <a href="index.php" class="navbar-brand"><span class="sonder">Sonder </span><span class="glyphicon glyphicon-star-empty"></a>
	        </div>
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                  <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search Friend">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                  
                  <ul class="nav navbar-nav navbar-right">

			    	<li>
			    		<a href="#">
			    			<?php
			    				echo $user['first_name'];
			    			?>
			    		</a>
			  		</li>

			  		<li>
			  			<a href="#"> <span class="glyphicon glyphicon-home"></a>
			  		</li>

			  		<li>
			  			<a href="#"> <span class="glyphicon 	glyphicon-envelope"></span></a>
			  		</li>

			  		<li>
			  			<a href="#">   <span class="glyphicon 	glyphicon-bell"></span></a>
			  		</li>

			  		<li>
			  			<a href="#">   <span class="glyphicon 	glyphicon-user"></span></a>
			  		</li>

			  		<li>
			  			<a href="#">  <span class="glyphicon 	glyphicon-cog"></span></a>
			  		</li>

			  		<li>
			  			<a href="includes/handlers/logout.php">  <span class="glyphicon 	glyphicon-off"></span></a>
			  		</li>
			    </ul>
                </div>

			
	</nav>


    <div class="wrapper">