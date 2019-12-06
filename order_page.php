<?php
	require'db.php';
	session_start();
	date_default_timezone_set('Asia/Dhaka');
	$timestamp = time();
	$time = date("M,d,Y , h:i:s A", $timestamp);
	//echo $time;

	$_SESSION['visited']=$_SERVER['HTTP_REFERER'];

	$useremail = $_COOKIE['cookieName'];

	$user_name = $_POST['user_name'];
	$division = $_POST['division'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$confirm_password = $_POST['confirm_password'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <div class="wrap">
	<?php include'header.php';  ?>

	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="index.php">Home</a></li>
			<!--		<li><a href="particular_product.php">Mobile></a></li>
			    	<li><a href="particular_product.php">Laptop</a></li>
			    	<li><a href="particular_product.php">Electronics</a></li>
			    	<li><a href="particular_product.php">Accessories</a></li>
			    	<li><a href="particular_product.php">Life Styles</a></li>
			    	<li><a href="particular_product.php">Sale</a></li>
			    	<li><a href="particular_product.php">New Arrivals</a></li> 
			    	<li><a href="contact.html">Contact</a></li>-->
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	 	 </div>	     	
   	</div>

  	<div class="main">

  		<?php
	if(isset($_POST['order']))
	{
		$sql = "SELECT * FROM user_table WHERE `email` = '$useremail'";
		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		foreach ($act as $key) {
			$password = $key['password'];
			#$type = $key['type'];
		}
	
		if($row >= 1)
		{
			if($password == $confirm_password)
			{
				$order_id = mt_rand(000000,999999);
				//echo "Order Id: ".$order_id;
					

					if(!empty($_SESSION['shopping_cart']))
					{
						$sql = "INSERT INTO delivary_details(`order_id`, `user_id`, `name`,`division`, `address`,`mobile`) VALUES ('$order_id','$useremail','$user_name', '$division','$address','$mobile')";
						 $act = $db->query($sql);

						$quantity_count = 0;

						$total = 0;
						$i = 0;
						foreach($_SESSION['shopping_cart'] as $keys => $values)
						{

				

							$product_id = $values['product_id']; 


					 		$quantity = $values['quantity']; 
					 		$quantity_count += $quantity;

							$price = $values['price']; 

					  		$total = ($values['quantity'] * $values['price']);  //single product cost 
					
					  		$sql2 = "INSERT INTO order_details(`order_id`, `product_id`,`user_id`,`quantity`, `price`, `total`) VALUES ('$order_id','$product_id','$useremail','$quantity', '$price','$total')";
							
							 $act = $db->query($sql2);

							$total_cost = $total + ($values['quantity'] * $values['price']);
							$i++;
						}

						$item_count = count($_SESSION['shopping_cart']);
						//echo "item: ".$item_count.", Quantity: ".$quantity_count;
						// Total cost 
				  

				  			//($total_cost); 

				 	 	$sql3 = "INSERT INTO order_table(`order_id`, `user_id`, `item`, `total_quantity`, `total_cost`,`time`) VALUES ('$order_id','$useremail','$item_count', '$quantity_count','$total_cost','$time')";
				 	 	 $act = $db->query($sql3);

				 	 	 echo "<br><br><b>Order Accepted, Your Order No is: ".$order_id."</b><br>";
			
				 	} 	
				 
			}
			
			else
			{
				// echo "Password not match!!!try again....";
				header("Location: checkout.php?password=not_matched&name=$user_name&division=$division&address=$address&mobile=$mobile");
			}

		}
	}
	
	
		
?>

  	</div>

</body>