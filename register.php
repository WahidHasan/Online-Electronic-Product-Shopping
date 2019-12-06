<!--<?php
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	/* Validation to check if gender is selected */
	if(!isset($error_message)) {
	if(!isset($_POST["gender"])) {
	$error_message = " All Fields are required";
	}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
		}
	}

	if(!isset($error_message)) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO registered_users (user_name, first_name, last_name, password, email, gender) VALUES
		('" . $_POST["userName"] . "', '" . $_POST["firstName"] . "', '" . $_POST["lastName"] . "', '" . md5($_POST["password"]) . "', '" . $_POST["userEmail"] . "', '" . $_POST["gender"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
	}
}
?> -->
<?php
	session_start();
	require'db.php';
?>

<!DOCTYPE html>
<head>
<title>PHP User Registration Form</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="home/css/register_login.css">

	<style>
		div.container
		{
			
			background: url(images/bim4.png);
			background-size: cover;
			position: relative;
			border-style: 20px solid;
			border-radius: 10px;
			margin: 20px auto;
			padding-top: 190px;
			width:31%;
			height: 610px;
			display: flex;
			justify-content: center;
			text-decoration: none;
			text-decoration-color:  #000000
		}

		.btnRegister 
		{
			font-family: sans-serif;
			border: 0;
			height: 30px;
			cursor: pointer;
			border-radius: 7px;
			margin: 5px auto;
			display: flex;
			justify-content: center;
			background-color: #383838 ;
			font-family: sans-serif;
			font-size: large;
			color: white;
		}

		.btnRegister:hover
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

		td{
			color: black;
		}

	</style>
</head>

<body>
	<div class="container">
	<form name="frmRegistration" method="post" action="registerCheck.php">
	<table border="0"  align="center" class="demo-table">
		<!--<?php if(!empty($success_message)) { ?>	
		<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
		<?php } ?>
		<?php if(!empty($error_message)) { ?>	
		<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
		<?php } ?>-->
		<tr>
			<td colspan="2"><h1 align="center">User Regisration</h1></td>
		</tr>

		<tr>
			<td>Full Name</td>
			<td><input type="text" class="demoInputBox" name="fullname" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
		</tr>

		<tr>
			<td>Password</td>
		<td><input type="password" class="demoInputBox" name="password" value=""></td>
		</tr>

		<tr>
			<td>Confirm Password  </td>
			<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['userEmail']; ?>"></td>
		</tr>

		<tr>
			<td>Gender</td>
			<td><input type="radio" name="gender" value="Male"> Male
				<input type="radio" name="gender" value="Female"> Female
			</td>
		</tr>

		<tr>
			<td colspan=2>
			<input type="checkbox" name="terms"> I accept Terms and Conditions  <br>
			<input type="submit" name="submit" value="Register" id="btnRegister" class="btnRegister"></td>
		</tr>

	</table>
	<h7>Already registered??</h7>
	 <a class="link" href="login.php"><b>Sign In</b></a>
	</form> 		

	</div>

	<h3 align="center"><?php 

	// if(isset($_SESSION['error'])){
	// 	echo '<li>'.$_SESSION['error']. '</li>';
	// }
	// else
	// {
	// 	echo '<li>'.$_SESSION['success']. '</li>';
	// 	header('Location: login.php');
	// }
	?></h3>


</body>
</html>