<?php 

require 'db.php';

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$gender = $_POST['gender'];
	$terms = $_POST['terms'];
	$type = "user";
	if(empty($_POST['fullname']) || empty($_POST['password']) || empty($_POST['confirm_password']) || empty($_POST['email']) ||  empty($_POST['gender']) || empty($_POST['terms']))
	{
		$_SESSION['error'] = 'ERROR: All input field is required !!!!';
		header('Location: register.php');
	}
	
	/*elseif(!(strlen($fullname)>=3 && strlen($fullname) <16))
	{
		$_SESSION['error'] = 'ERROR: name length must be 3-15 characters long !!!!';
		header('Location: register.php');
	}*/
		
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['error'] = 'ERROR: Invalid EMAIL format';
		header('Location: register.php');
	}
	elseif($password != $confirm_password)
	{
			#$error = 'Password must contain uppercase,lowercase,number,special char';
		$_SESSION['error'] = 'ERROR: Password not match';
		header('Location: register.php');
			#echo "ERROR: Both the password cannot match!!!";
	}
	else
	{

		$sql = "SELECT email FROM user_table WHERE `email` = '$email'";
		$sql2 = "INSERT INTO user_table(`fullname`, `email`, `password`, `gender`, `type`) VALUES ('$fullname','$email','$password', '$gender','$type')";

		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		if($row >= 1)
		{
			$_SESSION['error'] = 'This email already registered';
			header('Location: register.php');
		} 
		else 
		{
			$act2 = $db->query($sql2);
			$_SESSION['success'] = 'User registration successful...';
			
// $sql = "SELECT * FROM user_table WHERE `email` = '$email'";



			header('Location: login.php');
			#header('Location: register.php');
		}
	}



	#echo $id. ' '. $name . ' '.$email. ' '.$pass. ' '. $confirm. ' '.$type;


?>