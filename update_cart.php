<?php
	require'db.php';  
	session_start();
	$multi_id_qty_array= $_POST['product'];
	$result = count($multi_id_qty_array);
	//echo "count no : " . $result."<br>";
	//$product_qty = $_POST['product'];
	//$product_array_id = array_column($temp,'product_id');
	//$product_qty = array_column($temp,'quantity');
	

	// foreach($multi_id_qty_array as $k => $value)
	// {
	// 	echo $k."-> " .$value ."<br>";
	// }

	// foreach($_SESSION['shopping_cart'] as $k => $value)
	// {
	// 	echo $k."-> " ;
	// 	foreach($value as $sp => $ho)
	// 	{
	// 		echo $sp."-> " .$ho ."<br>";
	// 	}
	// 	echo"<br>"."<br>";
	// }
	// $orange= array(
	// 	  "Ankit" => array(  
          
 //        // Subject and marks are  
 //        // the key value pair  
 //        "C" => 95,  
 //        "DCO" => 85,  
 //    ),  
          
 //    // Ram will act as key  
 //    "Ram" => array(  
          
 //        // Subject and marks are  
 //        // the key value pair  
 //        "C" => 78,  
 //        "DCO" => 98,  
 //    )

	// );
 //    foreach($orange as $name=>$info)
 //    {
    	
 //    	// if($name == "Ram")
 //    	// {
 //    	 	// unset($orange[$name]);
 //    	// 	echo "NAME: ".$name."<br>";
 //    	// }
 //    	// echo "NAME: ".$name."<br>";
 //    	foreach($info as $sub=>$marks)
 //    	{
 //    		if($sub == "DCO")
 //    	    {
 //    	    	echo "helloo I am here !!!1";
 //    		   //unset($orange[$name][$sub]);
 //    	    	$orange[$name][$sub]=1000;
 //    	    }
 //    	}
 //    }
 //    // if($name == "Ram")
 //    // 	{
 //    // 		unset($orange[$name]);
 //    // 	}
	// print_r($orange);
	// echo "<br>"."<br>";



	if(isset($_POST['update']))
	{
		if(isset($_SESSION['shopping_cart']))
		{
			//$count=0;
			foreach ($multi_id_qty_array as $id => $quantity) {
				//unset($multi_id_qty_array['$id']);
				echo $id."-> " .$quantity ."<br>";

			
		
				$product_array_id = array_column($_SESSION['shopping_cart'],'product_id');

			 	$find_key = array_search($id, $product_array_id);
				 //echo "find key : ".$find_key."<br>";
			
           		// $store = $_SESSION['shopping_cart'];
				foreach($_SESSION['shopping_cart'] as $key => $sub_array)
				{
					//echo $k."-> " ."<br>";
					if($key == $find_key)
					{
				
				
					 //echo "K = " .$k."  Find_key =  " .$find_key."<br>";
						foreach($sub_array as $attrib => $value)
						{
							if($attrib == 'quantity')
							{
								// $store[$k][$attrib]=5;
								// if('quantity' == 0)
								// {
								// 	unset($_SESSION['shopping_cart'][$key]);
								// 	break;
								// }
								// else
								// {
									$_SESSION['shopping_cart'][$key][$attrib] = $quantity;
									//echo $attrib."--->".$value."<br>";
									break;
								// }
								
							}
						}
					}

				}
					//print updated cart
					// foreach($store as $first_key=>$second_key)
					// {
					// 	foreach ($second_key as $third_key => $fourth_key) {
					// 		echo $third_key."--->".$fourth_key."<br>";
					// 	}
					// 	echo "<br><br>";
					// // }
					// 	//$count++;
				
					// 	echo"<br>"."<br>";
					// }
			
			}
			//echo'<script>window.location="view_cart.php"</script>';
			header('Location: view_cart.php');
		}
					// foreach($_SESSION['shopping_cart'] as $first_key=>$second_key)
					// {
					// 	foreach ($second_key as $third_key => $fourth_key) {
					// 		echo $third_key."--->".$fourth_key."<br>";
					// 	}
					// 	echo "<br><br>";
					// // }
					// 	//$count++;
				
					// 	echo"<br>"."<br>";
					//}
		//echo'<script>window.location="view_cart.php"</script>';
	}

?>
<?php
// if(array_key_exists($key,$product_array_id))
			// {
			// 	echo "here I am !!!!!";

				// $find_key = array_search($key, $product_array_id);
				// echo "find key : ".$find_key."<br>";
			
				//$count = count($_SESSION['shopping_cart']);


				// $product_array = array(
				// 'product_id' => $id,
				// 'product_name' => $_POST['hidden_name'],
				// 'price' => $_POST['hidden_price'],
				// 'quantity' => $quantity
				// );
				// $_SESSION['shopping_cart'][$count] = 	$product_array;
				// $count++;


				// foreach ($product_array as $key) {
				// 	echo $key['product_id']."-> ".$key['quantity']."<br>";
				// }

				//$_SESSION['shopping_cart'][$count] = 	$product_array;

				// $count = count($_SESSION['shopping_cart']);
				// $product_array = array(
				// 'product_id' => $_GET['id'],
				// 'product_name' => $_POST['hidden_name'],
				// 'price' => $_POST['hidden_price'],
				// 'quantity' => $_POST['quantity']
				// );
				// $_SESSION['shopping_cart'][$count] = 	$product_array;

				// echo '<script>alert("Product added to the cart successfully")</script>';
				// echo'<script>window.location="view_cart.php"</script>';

			// }
			// else
			// {
			// 	//echo "key not exist"."<br>";
			// }

?>