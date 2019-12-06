
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../layout/css/bootstrap.min.css">
<title>Untitled Document</title>
</head>
<body>
<div class="container page-header well" align="center">
<img src="images/logo.png">
<h1 align="center">Welcome &nbsp;&nbsp;
Admin Registration</h1>
<div align="center">
<form action="admin_reg_check.php" method="POST" id="login" name="adminRegistration" enctype="multipart/form-data">
	<div class="form-group">
		<input type="text" style="font-size:18px; width:200px" class="input-lg" name="email" id="email" placeholder="Email as username" required autofocus>
	</div>

	<div class="form-group">
		<input type="password" class="input-lg" name="password" style="font-size:18px; width:200px" id="password" placeholder="Password" required>
 	</div>

 	<div class="form-group">
		<input type="password" class="input-lg" name="confirmPassword" style="font-size:18px; width:200px" id="password" placeholder="Confirm Password" required>
 	</div>

 	<div class="form-group">
		<button class="btn btn-large btn-lg btn-success" type="submit" name="submit" id="submit">Register</button>
	</div><br><br>
	Already registered??
	 <a href="adminLoginForm.php">Login Here </a>


</form>
</div>
</div>

<!-- <?php 

		// if(isset($_SESSION['error'])){
		// 	echo '<li>'. $_SESSION['error'] . '</li>';
		// } 

?> -->

</body>
</html>