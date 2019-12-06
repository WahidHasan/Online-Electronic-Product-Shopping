<?php 
	require'db.php';
	session_start();
	$search = $_GET['search'];

if(isset($_COOKIE['cookieName'])){
    $cookie = $_COOKIE['cookieName'];
    echo $_COOKIE['cookieName'];
}
// 	if(isset($_SESSION['useremail'])) {
	
//    header('Location: loginCheck.php');
// }

// else echo "No session found";


?>
<!DOCTYPE HTML>
<head>
<title>Preview</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/global.css">
<script src="js/slides.min.jquery.js"></script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div>
			<div class="account_desc">
				<ul>
					<?php 
						if(isset($_COOKIE['cookieName']))
						{
							echo '<li><a href="#">'.$_COOKIE['cookieName']. '</a></li>'; 
							echo '<li><a href="logout.php">Logout</a></li>';
							echo '<li><a href="#">Delivery</a></li>';
							echo '<li><a href="#">Checkout</a></li>';
							echo '<li><a href="#">My Account</a></li>';
						}
						else
						{
							echo '<li><a href="register.php">Registration</a></li>';
							echo '<li><a href="login.php">Login</a></li>';
							echo '<li><a href="#">Delivery</a></li>';
							echo '<li><a href="#">Checkout</a></li>';
							echo '<li><a href="#">My Account</a></li>';

						}
					?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/mylogo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p>Welcome to our Online Store! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - $0.00
			  	   	<ul class="dropdown">
							<li>you have no items in your Shopping cart</li>
					</ul></div></p>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="index.php">Home</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form method="GET" action="search_result.php">
	     			<input type="text" value="Search" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     	
   </div>
   <div class="main">
    <div class="content">
    	<div class="content_top">
    		<b><p><h3>Search For: <?php echo $search ?></h3></p></b>
    		
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
	
			
			<?php

			$sql = "SELECT * FROM product_table WHERE `p_type` = '$search' OR `p_tag` = '$search' OR `brand` = '$search'";
			$act = $db->query($sql);
			$row = mysqli_num_rows($act);
			if($row < 1)
			{
				echo "<br>"."No product match with your search key !!!!";
			}
			while ($data =$act -> fetch_assoc()) {
				
			?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="preview.php?id=<?php echo $data['p_id'] ?> && cat=<?php echo $data['p_type'] ?>"><img src="images/<?php echo $data['p_image'] ?>" alt="" /></a>
				<h2><?php echo $data['p_name'] ?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">Tk: <?php echo $data['price'] ?></span></p>
					    </div>
					    <div class="add-cart">								
							<h4><a href="preview.php?id=<?php echo $data['p_id'] ?>">Add to Cart</a></h4>
						</div>
						<div class="clear"></div>
					</div>
					 
			</div>
		<?php } ?>
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
				<!--	<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>-->
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="login.php">Sign In</a></li>
							<li><a href="index.php">View Cart</a></li>
						
					
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+01725659585</span></li>
							<li><span>+01954532456</span></li>
						</ul>
		
				</div>
			</div>			
        </div>
        <div class="copy_right">
		<!--		<p>&copy; 2013 home_shoppe. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p> -->
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

