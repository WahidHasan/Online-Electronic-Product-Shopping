<?php
session_start();
session_destroy();
if (isset($_COOKIE['cookieName'])){
		
		setcookie('cookieName',$useremail,time() - 86400);
	}
header("Location: index.php");
?>