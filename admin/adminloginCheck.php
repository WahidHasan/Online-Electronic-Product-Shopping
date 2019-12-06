<?php

//session_regenerate_id(true);
require'db.php';

$userEmail = $_POST['email'];
$password = $_POST['password'];


	
if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL))
{
	echo 'ERROR: Invalid EMAIL format';
	header('Location: adminLoginForm.php');
}

else
	{
		$sql = "SELECT `id` FROM admin_table WHERE `email` = '$userEmail' AND `password` = '$password'";
		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		/*foreach ($act as $key) {
			$name = $key['name'];
			#$type = $key['type'];
		}*/
	
		if($row >= 1)
		{
			session_start();
			$_SESSION['email'] = $userEmail;

			header('Location: index.php');
		}
		else
		{
			$_SESSION['error'] = 'Id / Password is not match';
			header('Location: adminLoginForm.php');
		}
	}

?>