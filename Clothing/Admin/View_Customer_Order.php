<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="user.css">
	</head>
	 <div class="sidenav">
      <a href="Manage.php">Manage User</a>
      <a href="Add_Product.php">Add Product</a>
	  <a href="View_Product.php">View Product</a>
      <a href="View_Customer_Order.php">Customer Order</a>
	  <a href="Logout_Page.php">LogOut</a>
	</div>
	<body>
	<center><h1>View Customer Order</h1>
	<form action="order_search.php" method="POST">
	<input type="text" name="search" placeholder="Search">
	<button type="submit" name="submit-search">Search</button></center>
	<br>
	<br>
	<br>
		<center><table  class='zebra'>
		<th>Customer Name</th>
		<th>Customer Email</th>
		<th>Order Date</th>
		<th>Order Quantity</th>
		<th>Product Name</th>
		<th>Price</th>
		
		<?php
			
			include("conn.php");
			
			$sql = "SELECT order_name,order_email,order_date,quantity,product_name,product_price from orders t1 inner join orders_items t2 on t1.order_id=t2.order_id inner join products t3 on t2.product_id=t3.product_id";
			$result = mysqli_query($con,$sql);
			$queryResults = mysqli_num_rows($result);
			
			
			if($queryResults > 0){
				while ($row = mysqli_fetch_assoc($result))
				{
					echo"<tr><td>".$row["order_name"]."</td>";
					echo"<td>".$row["order_email"]."</td>";
					echo"<td>".$row["order_date"]."</td>";
					echo"<td>".$row["quantity"]."</td>";
					echo"<td>".$row["product_name"]."</td>";
					echo"<td>".$row["product_price"]."</td>";
			}
			echo"</table>";
			echo"</center>";
			}else{
				echo"0 result";
			}
			mysqli_close($con);
			
			?>
	</body>
</html>
