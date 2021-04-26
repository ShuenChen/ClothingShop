<!DOCTYPE html>
<html>
	<head>
		<title>View Products</title>
                <link rel="stylesheet" type="text/css" href="view.css">
                <link rel="stylesheet" type="text/css" href="user.css">
	</head>
	<body>
    <div class="sidenav">
    <a href="Display.php">Display Member</a>
    <a href="Add_Product.php">Add Product</a>
	<a href="View_Product.php">View Product</a>
    <a href="View_Customer_Order.php">Customer Order</a>
	<a href="Logout_Page.php">LogOut</a>
	</div>
	<center>
	<form action="product_search.php" method="POST">
	<input type="text" name="search" placeholder="Search">
	<button type="submit" name="submit-search">Search</button>
	</center>
		<?php
			include("conn.php");
			
			$sql = "SELECT * FROM products";
			$result = mysqli_query($con,$sql);
			$queryResults = mysqli_num_rows($result);
			
			
			if($queryResults > 0){
				while ($row = mysqli_fetch_assoc($result))
				{
					
			echo '<div class="box">';			
			
			if ($row['product_image'] == "")
			{
				echo '<img src="default.png">';
			}
			else{
				echo '<img widt:500px float: left src="upload/'.$row['product_image'].'">';
			}
			echo '<br><h3>'.$row['product_name'].'</h3>';
			echo ''.$row['product_price'].'<br><br>';
			echo'<input type="button" value="Edit" onclick="window.location.href=\'edit_product.php?id='.$row['product_id'].'\'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo'<input type="button" value="Delete" onclick="window.location.href=\'delete_product.php?id='.$row['product_id'].'\'">';
			echo '</div>';
				}
			}
                        ?>
</body>
</html>