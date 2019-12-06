<?php
//include("check_session.php");
require'db.php';
session_start();
if(isset($_SESSION['email'])){
    $session = $_SESSION['email'];
    //echo $session;
}
//error_reporting(0);
if(isset($_POST['submit']))
{
$product_id = $_POST['product_id'];
echo "hellooooo............";
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];
$date= date("d-m-y");

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	{
    
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../images/".$pic_name);
     echo $product_id.' '.$product_name.' '.$product_type.' '.$pic_name.' '.$brand .' ' .$price.' '.$quantity.' '.$details.' '.$tags;
     //header('Location: add_product.php')

    $sql = "SELECT p_id FROM product_table WHERE `p_id` = 'product_id' OR `p_image` = '$pic_name'";
		
    $sql2 = "INSERT INTO `product_table`(`p_id`, `p_name`,`p_type`, `p_image`, `brand`, `price`, `quantity`, `date`, `p_details`, `p_tag`) VALUES ('$product_id','$product_name','$product_type','$pic_name','$brand','$price','$quantity','$date','$details','$tags')";

    $act = $db->query($sql);
    $row = mysqli_num_rows($act);

    if($row >= 1)
    {
     // $_SESSION['error'] = 'This product is already inserted';
      header('Location: add_product.php');
    } 
    else 
    {
      $act2 = $db->query($sql2);
     // $_SESSION['success'] = 'Product add successfully...';
      header('Location: add_product.php');
      #header('Location: register.php');
    }
 
}
else
{

}
}else
{}
//mysqli_close($db);
}
//echo $product_id.' '.$product_name.' '.$product_type.' '.$pic_name.' '.$brand .' ' .$price.' '.$quantity.' '.$details.' '.$tags;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
 
   	<?php include("include/header.php");?>
   	<div class="container-fluid">
	  <?php include("include/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1><span class="glyphicon glyphicon-tag"></span> Product / Add Product  </h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
      <div class="well">
        <form action="add_product.php" method="POST" name="form" enctype="multipart/form-data">
        <p>Id</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_id" id="product_id" autofocus style="width:100%" placeholder="Product Id" required >

        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" autofocus style="width:100%" placeholder="Product Name" required>

        <p>Description</p>
        <textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>

        <p>Add Image</p>
        <div style="background-color:#CCC">
            <input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" required>
        </div>
      </div>

      <div class="well">
        <h3>Pricing</h3>
        <p>Price</p>
        <div class="input-group">
          <div class="input-group-addon">TK</div>
            <input type="text" class="form-control" name="price" id="price"  placeholder="0.00" required>
          </div><br>
          <h3>Quantity</h3>
          <div class="input-group">
            <div class="input-group-addon">#</div>
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="0">
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="well">
          <h3>Category</h3>  
          <p>Product type</p>
          <input type="text" name="product_type" id="product_type" class="form-control" placeholder="Mobile, Laptop" required><br>

          <p>Vendor / Brand</p>
          <input type="text" name="brand" id="brand" class="form-control" placeholder="LG, APPLE etc" required><br>

          <p>Other tags</p>
          <input type="text" name="tags" id="tags" class="form-control" placeholder="Summer, etc">
        </div>          
      </div>

      <div align="center">
        <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
        <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px"> Add Product</button>
      </div>
    </form>
 
	</div>
</div></div></div>

<?php 

    // if(isset($_SESSION['error'])){
    //   echo '<li>'. $_SESSION['error'] . '</li>';
    // }
    // else
    // {
    //   echo '<li>' . $_SESSION['success'] . '</li>';
    // }

?>


</body>
</html>