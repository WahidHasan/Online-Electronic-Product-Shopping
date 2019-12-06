<?php 
	require'db.php';
	session_start();
	//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
	$_SESSION['visited']=$_SERVER['HTTP_REFERER'];
	
	$id = $_GET['id'];
	$cat = $_GET['cat'];

if(isset($_COOKIE['cookieName'])){
    $cookie = $_COOKIE['cookieName'];
    //echo $_COOKIE['cookieName'];
}


// 	if(isset($_SESSION['useremail'])) {
	
//    header('Location: loginCheck.php');
// }

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
	<?php
		$sql = "SELECT * FROM product_table WHERE `p_id` = '$id'";
		$act = $db->query($sql);
		$i = 1;
		while ($data =$act -> fetch_assoc()) {
	?>



 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<!--<p><a href="index.html">Home</a> >>>> <a href="#">Electronics</a></p>-->
    	    </div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container">
									<a href="#"><img src="images/<?php echo $data['p_image'] ?>" width= "250" height= 250/></a>
							<!--		<a href="#" target="_blank"><img src="images/productslide-2.jpg" alt=" " /></a>
									<a href="#" target="_blank"><img src="images/productslide-3.jpg" alt=" " /></a>					
									<a href="#" target="_blank"><img src="images/productslide-4.jpg" alt=" " /></a>
									<a href="#" target="_blank"><img src="images/productslide-5.jpg" alt=" " /></a>
									<a href="#" target="_blank"><img src="images/productslide-6.jpg" alt=" " /></a>-->
								</div>
							<!--	<ul class="pagination">
									<li><a href="#"><img src="images/thumbnailslide-1.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-2.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-3.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-4.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-5.jpg" alt=" " /></a></li>
									<li><a href="#"><img src="images/thumbnailslide-6.jpg" alt=" " /></a></li>
								</ul>-->
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">

				<form method="post" action="add_cart.php?action=add&id=<?php echo $data['p_id']; ?>"
										
					<div class="price">
						<p>Price: <span><?php echo $data['price'] ?></span></p>
					</div>
					<div class="available">
						<p>Available Options :</p>
					
					Quantity:
					<input type="number" min="1" max="30" name="quantity" required>
						
					</div>
					<input type="hidden" name="hidden_name" value="<?php echo $data['p_name'] ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $data['price'] ?>">
					<div class="share-desc">
			<!--		<div class="share">
							<p>Share Product :</p>
							<ul>
					    		<li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
					    		<li><a href="#"><img src="images/twitter.png" alt="" /></a></li>					    
			    			</ul>
						</div>-->
						<!-- <div class="button"><span><a href="add_cart.php?action=add&id<?php echo $data['p_id'] ?>" name="add_to_cart">Add to Cart</a></span></div> -->
						<!--<button type="submit" name="submit1" class="btn btn-info btn-lg">Add to Cart</button>-->
						<input type="submit" name="submit1" class="btn btn-danger" value="Add Cart">					
						<div class="clear"></div>
					</div>
				</form>

				</div>
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li>Product Details</li>

					<div class="clear"></div>
				</ul>
				<div class="resp-tabs-container">
					<div class="product-desc">
						<p><?php echo $data['p_details'] ?></p>	
					</div>

				</div>
			</div>
		</div>
	</div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
   <div class="content_bottom">
    		<div class="heading">
    		<h3>Related Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
   <div class="section group">
   			<?php
				$sql = "SELECT * FROM product_table WHERE `p_type` = '$cat'";
				$act = $db->query($sql);

				$i = 1;
				while ($data =$act -> fetch_assoc()) {
			?>


				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?id=<?php echo $data['p_id'] ?> && cat=<?php echo $data['p_type'] ?>"><img src="images/<?php echo $data['p_image'] ?>" alt=""></a>					
					<div class="price" style="border:none">
					       		<div class="add-cart" style="float:none">								
									<h4><a href="preview.php?id=<?php echo $data['p_id'] ?> && cat= <?php echo $data['p_type'] ?>">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<?php } ?>
			</div>
        </div>
				
 		</div>
 	</div>
    </div>
</div>
<?php } ?>
   <div class="footer">
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
   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

