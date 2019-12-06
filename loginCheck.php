<?php
	require 'db.php';
	
	$useremail = $_POST['userEmail'];
	$userpassword = $_POST['userPassword'];
	//$_SESSION['url'] = $_SERVER['REQUEST_URI'];//show current page url
	
	// $rememberMe = $_POST['rememberMe'];

	
	if(!filter_var($useremail,FILTER_VALIDATE_EMAIL))
	{
		echo "email error";
		//$_SESSION['error'] = 'ERROR: Invalid EMAIL format';
		// header('Location: loginCheck.php');
	}

	else
	{
		$sql = "SELECT * FROM user_table WHERE `email` = '$useremail' AND `password` = '$userpassword'";
		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		foreach ($act as $key) {
			$name = $key['fullname'];
			#$type = $key['type'];
		}
	
		if($row >= 1)
		{


			// if($rememberme == 'check')
			// {

			// }

			session_start();
			$_SESSION['useremail'] = $useremail;
			// $_SESSION['userpassword'] = $useremail;
			// $_SESSION['fullname'] = $name;

				setcookie('cookieName',$useremail,time() + 86400);
				// setcookie('id',$id,time() + 86400);
				// setcookie('name',$name,time() + 86400);
				if(isset($_SESSION['visited'])) {
   					$url = $_SESSION['visited']; // holds url for last page visited.

					header("Location: $url");
				}
				// else
				// {
				// 	header("Location: index.php");
				// }
			//header('Location: index.php');
		}
		else
		{
			//$_SESSION['error'] = 'Id / Password is not match';
			// header('Location: login.php');
		}
	}
	
?>
	