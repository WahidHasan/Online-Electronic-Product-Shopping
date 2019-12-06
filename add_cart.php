<?php  
require'db.php';
	session_start();
	$p_id = $_GET['id'];
	$quantity = $_POST['quantity'];

	if(isset($_POST['submit1']))
	{
		if(isset($_SESSION['shopping_cart']))
		{
			$product_array_id = array_column($_SESSION['shopping_cart'],'product_id');
			if(!in_array($_GET['id'], $product_array_id))
			{
				$count = count($_SESSION['shopping_cart']);
				$product_array = array(
				'product_id' => $_GET['id'],
				'product_name' => $_POST['hidden_name'],
				'price' => $_POST['hidden_price'],
				'quantity' => $_POST['quantity']
				);
				$_SESSION['shopping_cart'][$count] = 	$product_array;

				echo '<script>alert("Product added to the cart successfully")</script>';
				echo'<script>window.location="view_cart.php"</script>';

			}

			else
			{
				echo '<script>alert("Product Already Added")</script>';
				echo'<script>window.location="index.php"</script>';
			}
		}
		else
		{
			$product_array = array(
				'product_id' => $_GET['id'],
				'product_name' => $_POST['hidden_name'],
				'price' => $_POST['hidden_price'],
				'quantity' => $_POST['quantity']
			);

			$_SESSION['shopping_cart'][0] =$product_array;

			echo '<script>alert("Product added to the cart successfully")</script>';
			echo'<script>window.location="view_cart.php"</script>';
		}
		//header('Location: view_cart.php');
	}
	if(isset($_GET['action']))
	{
		if($_GET['action'] == "delete")
		{
			foreach($_SESSION['shopping_cart'] as $keys => $values)
			{
				if($values['product_id'] == $_GET['id'])
				{
					unset($_SESSION['shopping_cart'][$keys]);
					echo '<script>alert("Product Removed")</script>';
					echo '<script>window.location="view_cart.php"</script>';
				}
			}
		}
	}

?>	
	


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 


 </body>
 </html>



 			