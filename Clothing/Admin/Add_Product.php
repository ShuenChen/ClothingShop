<!DOCTYPE HTML>
<html>
	<head>
            <title>Add New Product</title>
	</head>
        <link rel="stylesheet" href="user.css">
	<link rel="stylesheet" href="admin.css">
	<body>
    <div class="sidenav">
    <a href="Display.php">Display Member</a>
    <a href="Add_Product.php">Add Product</a>
	<a href="View_Product.php">View Product</a>
    <a href="View Customer Order.php">Customer Order</a>
	<a href="Logout_Page.php">LogOut</a>
	</div>
	<div class="box">
		<h2>Add New Product</h2><br>
                <form action="Insert_Product.php" method="post" enctype="multipart/form-data">
			
			<div class="inputBox">
				<input type="text" name="name" required="required">
				<label>Product Name</label>
			</div>
			
			<div class="inputBox">
				<input type="text" name="price" required="required">
				<label>Price</label>
			</div> 
			
			<div class="inputBox">
				<label>Product Description</label><br><br>
				<textarea name="description" required="required"></textarea><br><br>
			</div>
			
			<div class="inputBox">
				<label>Product Picture</label><br><br>
				<input type = "file" name = "Item_Pic" required = "requried">
			</div>

			<center>
                            <input type="submit" value="Add" name="submit">
			</center>
		</form>
	</div>
	</body>
</html>
