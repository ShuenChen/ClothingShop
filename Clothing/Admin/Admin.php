<!DOCTYPE html>
<html>
	<head>
     <link rel="stylesheet" type="text/css" href="user.css">
	 <title>Admin</title>
	 <?php
	 session_start();
	 ?>
	</head>
	<div class="sidenav">
    <a href="Display.php">Display Member</a>
    <a href="Add_Product.php">Add Product</a>
	<a href="View_Product.php">View Product</a>
    <a href="View_Customer_Order.php">Customer Order</a>
	<a href="Logout_Page.php">LogOut</a>
	</div>
	<body>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
			<center><h1 style="font-size: 100px;">Welcome <?php echo $_SESSION['adminname'];?></h1></center>
			</form>	
		</div>
	</body>
</html>
