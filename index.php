<?php
	require_once __DIR__ . '/vendor/autoload.php';
	session_start();
	require'db.php';
	
	//$_SESSION['visited']=$_SERVER['HTTP_REFERER'];
	//echo $_SESSION['url']."AND".$_SERVER['HTTP_REFERER']."<br>";

if(isset($_COOKIE['cookieName'])){
    $cookie = $_COOKIE['cookieName'];
    //echo $_COOKIE['cookieName'];
}
/*<?php echo basename($_SERVER['PHP_SELF']); ?>*/
// 	if(isset($_SESSION['useremail'])) {
	
//    header('Location: loginCheck.php');
// }

// else echo "No session found";

?>
<!DOCTYPE HTML>
<head>
<title>gearZ </title>
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
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">+8801725279621</span></span></p>
			</div>
			<div class="account_desc">
				<ul>
					<?php 
						if(isset($_COOKIE['cookieName']))
						{
							echo '<li><a href="#">'.$_COOKIE['cookieName']. '</a></li>'; 
							echo '<li><a href="logout.php">Logout</a></li>';
							// echo '<li><a href="#">Delivery</a></li>';
							// echo '<li><a href="#">Checkout</a></li>';
							echo '<li><a href="#">My Account</a></li>';
						}
						else
						{
							echo '<li><a href="register.php">Registration</a></li>';
							echo '<li><a href="login.php">Login</a></li>';
							// echo '<li><a href="#">Delivery</a></li>';
							// echo '<li><a href="#">Checkout</a></li>';
							echo '<li><a href="#">My Account</a></li>';

						}
					?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="images/mylogo.png"  alt="" /></a>
			</div>

	     	<div class="clear"></div>
			<div class="cart">
			  	<form method="POST" action="view_cart.php">
			  		<!-- <input type="submit" name="view_cart" id="view_btn" value="Cart"> -->
			  		<button type="submit" id="view_btn" style="color: white; background-color: #B81D22; border-color: #B81D22;">Cart</button>
			  	</form>
			</div>
			
	 <div class="clear"></div>
  	</div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.php">Home</a></li>
			    	<li><a href="particular_product.php?cat=Mobile">Mobile</a></li>
			    	<li><a href="particular_product.php?cat=Laptop">Laptop</a></li>
			    	<li><a href="particular_product.php?cat=Electronics">Electronics</a></li>
			    	<li><a href="particular_product.php?cat=Accessories">Accessories</a></li>
			<!--    	<li><a href="particular_product.php?cat=Style">Life Styles</a></li>
			    	<li><a href="particular_product.php?cat=Sale">Sale</a></li>-->
			    	<li><a href="particular_product.php?cat=New">New Arrivals</a></li>
			<!--    	<li><a href="contact.html">Contact</a></li>-->
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     	</div>	     
	<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul class="list-links">
				  	<h3 class="list-links-title">Brands</h3>
				     
				      <li><a href="brand_product.php?brand=Acer">Acer</a></li>
				      <li><a href="brand_product.php?brand=Asus">Asus</a></li>
				      <li><a href="brand_product.php?brand=Canon">Canon</a></li>
				    
				
				      <li><a href="brand_product.php?brand=LG">LG</a></li>
				      <li><a href="brand_product.php?brand=Mi">Mi</a></li>
				      
				      <li><a href="brand_product.php?brand=Samsung">Samsung</a></li>
				      <li><a href="brand_product.php?brand=Sony">Sony</a></li>
				       
				        
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="#"><img src="images/slide-1-image.png" alt="learn more" /></a>									    
									  </div>
						             	<div class="slider-text">
		                                 <h1>Shop<br><span>NOW</span></h1>
		                                 <h2>Your choice, Your priority</h2>
									   <div class="features_list">
									   <!-- 	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>	 -->						               
							            </div>
							          <!--    <a href="preview.php" class="button">Shop Now</a> -->
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
						             	<div class="slide">
						             		<div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 40% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services</h4>							               
							            </div>
							             <a href="preview.php" class="button">Shop Now</a>
					                   </div>		
						             	 <div class="slider-img">
									     <a href="preview.php"><img src="images/slide-3-image.jpg" alt="learn more" /></a>
									  </div>						             					                 
									  <div class="clear"></div>				
				                  </div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									     <a href="preview.php"><img src="images/slide-2-image.jpg" alt="learn more" /></a>
									  </div>
									  <div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 10% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="preview.php" class="button">Shop Now</a>
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3>New Products</h3>
    		</div>
    		<!--<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>-->
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
			
			<?php

			$sql = "SELECT * FROM product_table";
			$act = $db->query($sql);
			//$row = mysqli_num_rows($act);

			while ($data =$act -> fetch_assoc()) {
			?>

			<div class="grid_1_of_4 images_1_of_4">
				<form method="POST" action="">
				<a href="preview.php?id=<?php echo $data['p_id'] ?> && cat=<?php echo $data['p_type'] ?>"><img src="images/<?php echo $data['p_image'] ?>" alt="<?php echo $data['p_name'] ?>" width="150" height="150"/></a>
				<!--<div class="product_descriptin"><h2><?php echo $data['p_name'] ?> </h2></div> -->
				<h2><?php echo $data['p_name'] ?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Tk: <?php echo $data['price'] ?></span></p>
					    </div>
					    <div class="add-cart">								
							<h4><a href="preview.php?id=<?php echo $data['p_id'] ?> && cat=<?php echo $data['p_type'] ?>">Add to Cart</a></h4>
						</div>
						<div class="clear"></div>
					</div>
				</form> 
			</div>
		<?php } ?>
		</div>

    </div>
</div>
</div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
				<!--		<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>-->
						
					</div>
				<div class="col_1_of_4 span_1_of_4">
			<!--		<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>-->
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="login.php">Sign In</a></li>
							<li><a href="view_cart.php">View Cart</a></li>
						<!--	<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>-->
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+8801725279621</span></li>
							<li><span>+880133-000000</span></li>
						</ul>
					<!--	<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div> -->
				</div>
			</div>			
        </div>
        
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

