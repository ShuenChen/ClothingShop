<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="user.css">
	</head>
	<body>
	<br>
	<br>
	<br>
    <div class="sidenav">
    <a href="Display.php">Display Member</a>
    <a href="Add_Product.php">Add Product</a>
	<a href="View_Product.php">View Product</a>
    <a href="View_Customer_Order.php">Customer Order</a>
	<a href="Logout_age.php">LogOut</a>
	</div>
        <div class="main">
            <center><h1>Display Member</h1>
			<form action="user_search.php" method="POST">
			<input type="text" name="search" placeholder="Search">
			<button type="submit" name="submit-search">Search</button></center>
			<br>
			<br>
			<br>
		<center><table  class='zebra'>
		<th>Customer ID</th>
		<th>Customer Name</th>
		<th>Customer Email</th>
	  <?php
			
			include("conn.php");
			
			if(isset($_POST['submit-search'])){
			$search = mysqli_real_escape_string($con,$_POST['search']);
			$sql = "SELECT * FROM customer WHERE user_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_id LIKE '%$search%' ";
			$result = mysqli_query($con,$sql);
			$queryResults = mysqli_num_rows($result);
			
			if($queryResults > 0){
				while ($row = mysqli_fetch_assoc($result))
				{
					echo"<tr><td>".$row["user_id"]."</td>";
					echo"<td>".$row["user_email"]."</td>";
					echo"<td>".$row["user_name"]."</td>";
			}
			echo"</table>";
			echo"</center>";
			}else{
				echo"0 result";
			}
			mysqli_close($con);
			}
			?>
			
			
	</div>
		
	</body>
</html>
