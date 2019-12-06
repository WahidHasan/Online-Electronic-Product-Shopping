<?php 
	session_start();
	require'db.php';
    $_SESSION['visited']=$_SERVER['HTTP_REFERER'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<!--<link rel="stylesheet" type="text/css" href="login.css">-->
	<style>
		.container{
			background: url(images/bim4.png);
			background-size: cover;
			position: relative;
			border-style: 20px solid;
			border-radius: 10px;
			margin: 20px auto;
			padding-top: 190px;
			width:30%;
			height: 600px;
			display: flex;
			justify-content: center;
			text-decoration: none;
			font-family: sans-serif;
		}

		#submit_login
		{
			background-color: #383838 ;
			border-radius: 7px;
			font-family: sans-serif;
			font-size: large;
			color: white;

		}
		#submit_login:hover
		{
			background-color: #B81D22;
		}

		a.link
		{
			color:#800000;
			text-decoration: none;
		}


		a.link:hover
		{
			color: #94CB54;
		}
	</style>

	

</head>
<body>
	<div class="container">
		<form name="login" id="login" action="loginCheck.php" method="POST">
			<h2>Sign In</h2>
			<input type="text" id="name" name="userEmail" placeholder="Email as Username" required> <br><br>
			<input type="password" name="userPassword" placeholder="Password" required> <br><br>
			<!-- <input type="checkbox" name="rememberMe">Remember Me<br><br> -->
			<input type="submit" name="submit" id="submit_login" value="Login"> <br><br>
		
			Don't have an account?
			<a class="link" href="register.php" style=""><b>Sign Up</b></a>


		</form>

	</div>
	

	<!--<h3 align="center"><?php 

	if(isset($_SESSION['error'])){
		
	}
	?></h3>-->

</body>
</html>
