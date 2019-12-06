<?php
	session_start();
	require 'db.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if($password == $confirmPassword)
	{
		$sql = "SELECT email FROM admin_table WHERE `email` = '$email'";
		$sql2 = "INSERT INTO admin_table( `email`, `password`) VALUES ('$email','$password')";

		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		if($row >= 1)
		{
			//$_SESSION['error'] = 'This email already registered';
			echo "ERROR: This email already registered";
			header('Location: admin_registration.php');
		} 
		else 
		{
			$act2 = $db->query($sql2);
			//$_SESSION['success'] = 'User registration successful...';
			echo "Another Admin added successfully";
			header('Location: adminLoginForm.php');
			#header('Location: register.php');
		}
	}


?>