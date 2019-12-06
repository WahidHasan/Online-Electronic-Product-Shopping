<?php 
	require'db.php';
	session_start();

	$_SESSION['visited']=$_SERVER['HTTP_REFERER'];
	//echo $_SESSION['url']."AND".$_SERVER['HTTP_REFERER']."<br>";


?> 
<!DOCTYPE HTML>
<head>
<title>Preview</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/global.css">
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
   <!--  <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="index.html">Home</a> >>>> <a href="#">Electronics</a></p>
    	    </div>
    		<div class="clear"></div>
    	</div>
	</div> -->
<!-- 	<div class="container"> -->
		<h3 align="center">Shopping Details</h3>
		<form action="update_cart.php" method="POST">
			<table class="table table-bordered" align="center" style="width: 100%">
				<tr>
		
					<th width="20%">Product Name</th>
					<th width="10%">Quantity</th>
					<th width="10%">Price</th>
					<th width="10%">Total</th>
					<th width="5%">Action</th>
				</tr>
				<?php
					if(!empty($_SESSION['shopping_cart']))
					{
						$total = 0;
						$i = 0;
						foreach($_SESSION['shopping_cart'] as $keys => $values)
						{
				?>

				<tr>

					<?php $temp = $values['product_id']; ?>
					<!-- <input type="hidden" name="product[<?php echo $temp; ?>]" > -->

					<td><?php echo $values['product_name']; ?></td>
					<!-- <input type="hidden" name="product[<?php echo $temp; ?>]" value="<?php echo $values['product_name']; ?>"> -->

					<td><?php echo $values['quantity']; ?></td>

					<td><?php echo $values['price']; ?></td>
					<!-- <input type="hidden" name="product[<?php echo $temp; ?>]" value="<?php echo $values['price']; ?>"> -->

					<td><?php echo number_format($values['quantity'] * $values['price'] ,2); ?></td>
					<td><a href="add_cart.php?action=delete&id=<?php  echo $values['product_id']; ?>"><span class="text-danger">Remove</span></a></td>
				</tr>

				<?php 
					
					$total = $total + ($values['quantity'] * $values['price']);
					$i++;
					}

				?>

				 <tr>
				 	<td colspan="3" align="right">Total</td>
				 	<td align="right"><b>BDT: </b> <?php echo number_format($total); ?></td>
				 </tr>

				<?php } ?>
			</table>
			<!-- <input type="submit" name="update" value="Update Cart" id="update_btn"> -->
		</form><br>
		<h5>*Delivary Charge 60 Tk Only, so Your final cost is <b style="color: Red;"><?php echo $total+60; ?></b> Tk</h3></h5>
		<h3 align="center">User Details</h3>
		<form action="order_page.php" method="POST" onsubmit="return confirm('Do you really want to submit the form?');" >
			<table  align="center" style="width: 100%">
				<tr>
					<th>User Id </th>
					<td><?php 	if(isset($_COOKIE['cookieName'])){
    								echo $_COOKIE['cookieName'];
   									 //echo $_COOKIE['cookieName'];
						}
						else
						{
							 $_SESSION['visited']=basename($_SERVER['PHP_SELF']);
							echo '<script>alert("You must login first...")</script>';
							echo'<script>window.location="login.php"</script>';
						}

						?>
							
					</td>
				</tr>
				<?php 
					if(isset($_COOKIE['cookieName']))
					{
						?>
					    <tr>
					    	<th>Name </th>
					    	<td><?php 
					    		if(isset($_GET['name']))
								{
									$user_name = $_GET['name'];
									echo '<input type="text" name="user_name" value="'.$user_name.'" min="3" placeholder="Name" required>';
								}
								else
								{
									echo '<input type="text" name="user_name" min="3" placeholder="Name" required>';
								}

					    	 ?></td>
					    	<!-- <td><input type="text" name="user_name" min="3" placeholder="Name" required></td> -->
					    </tr>
					    <tr>
					    	<th>Division </th>

					    	<td><select name="division" required>
								<option value="">Select</option>
								<option value="Dhaka">Dhaka</option>
								<option value="Chottogram">Chottogram</option>
								<option value="Sylhet">Sylhet</option>
								<option value="Barisal">Barisal</option>
								<option value="Rajshahi">Rajshahi</option>
								<option value="Khulna">Khulna</option>
								<option value="Mymenshing">Mymenshing</option>
								<option value="Rangpur">Rangpur</option>
								<option value="Comilla">Comilla</option>
							</select></td>
					    </tr>
					     <tr>
					    	<th>Address </th>

					    	<td><?php 
					    		if(isset($_GET['address']))
								{
									$address = $_GET['address'];
									echo '<input type="text" name="address" value="'.$address.'" placeholder="Where you recieve product" required>';
								}
								else
								{
									echo '<input type="text" name="address" placeholder="Where you recieve product" required>';
								}

					    	 ?></td>

					    	<!-- <td><input type="text" name="address" placeholder="Where you recieve product" required></td> -->
					    </tr>
					     <tr>
					    	<th>Mobile </th>

					    	<td><?php 
					    		if(isset($_GET['mobile']))
								{
									$mobile = $_GET['mobile'];
									echo '<input type="tel" name="mobile" value="'.$mobile.'" pattern="[0-9]{11}" min="11" max="11" placeholder="Must be 11 digits" required>';
								}
								else
								{
									echo '<input type="tel" name="mobile" pattern="[0-9]{11}" min="11" max="11" placeholder="Must be 11 digits" required>';
								}

					    	 ?></td>	


					    	<!-- <td><input type="tel" name="mobile" pattern="[0-9]{11}" min="11" max="11" placeholder="Must be 11 digits" required></td> -->
					    </tr>
					    <tr>
					    	<th>Confirm Password</th>
					    	<td><input type="Password" name="confirm_password" placeholder="Login Password" required></td>
					    </tr>
					<?php } ?>
			</table><br>
			<input type="submit" name="order" value="Place Order" id="update_btn"><br>
		</form><br>

		<?php  
			// $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			// if(strpos($fullUrl, "password=not_matched")==true)
			// {
			// 	echo "<p>Password Not Matched !!!</p>";
			// 	exit();
			// }

			if(!isset($_GET['password']))
			{
				exit();
			}
			else
			{
				$passwordCheck = $_GET['password'];

				if($passwordCheck == "not_matched")
				{
					echo "<p>Password Not Matched !!!</p>";
				 	exit();
				}
			}
		?>

		<!-- <button id="cont_shopping_btn"><a href="#" style="text-decoration: none; color: white;">Place Order</a></button> -->
		<!-- <button><a href="#">Update Cart</a></button>-->
		<!-- <button id="checkout_btn"><a href="#" style="text-decoration: none; color: white;">Proceed to Checkout</a></button> -->


<!-- 	</div> -->

</div>



  <!--  <div class="footer">
   	  	<div class="wrap">	
	    	 <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
				</div>

				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>

				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>

				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
		
				</div>

			</div>			
        </div>
        <div class="copy_right">
				<p>&copy; 2013 home_shoppe. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		   </div>
    </div>
   
    <a href="#" id="toTop"><span id="toTopHover"> </span></a> -->
</body>
<!-- <script type="text/javascript">
	
	function show_alert() {
  		alert("xxxxxx");
	}
</script> -->
</html>

