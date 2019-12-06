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
				<a href="index.html"><img src="images/mylogo.png"  alt="logo" /></a>
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