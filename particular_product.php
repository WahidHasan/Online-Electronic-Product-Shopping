<?php
	require'db.php';
	session_start();
	$value = $_GET['cat'];

if(isset($_COOKIE['cookieName'])){
    $cookie = $_COOKIE['cookieName'];
   // echo $_COOKIE['cookieName'];
}
// 	if(isset($_SESSION['useremail'])) {
	
//    header('Location: loginCheck.php');
// }

// else echo "No session found";


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
	<!--<nav class="navbar navbar-light bg-light">
 		 <a class="navbar-brand" href="#">Navbar</a>
	</nav> -->
	<div class="wrap">
	<?php include'header.php';  ?>
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
    		<div class="heading">
    			<h3><?php echo $value; ?></h3>

    		</div>
    		<!--<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>-->
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
		<?php
			$sql = "SELECT * FROM product_table WHERE `p_type` = '$value' OR `p_tag` = '$value'";
			$act = $db->query($sql);
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
							<h4><a href="preview.php?id=<?php echo $data['p_id'] ?> && cat=<?php echo $data['p_type'] ?>">Add to Cart</a></h4>
						</div>
						<div class="clear"></div>
					</div>
					 
			</div>
		<?php } ?>
		</div>


			
	
	

	<!--<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
			<div class="grid_1_of_4 images_1_of_4">
				<a href="preview.html"><img src="images/feature-pic1.jpg" alt="" /></a>
				<h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$620.87</span></p>
					    </div>
					    <div class="add-cart">								
							<h4><a href="preview.html">Add to Cart</a></h4>
						</div>
						<div class="clear"></div>
					</div>
					 
			</div>
		</div> -->


</body>
</html>