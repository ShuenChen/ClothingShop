<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Product</title>
		<link rel="stylesheet" href="admin.css">
	</head>
	<body>
	`	<?php
			include("conn.php");
			$id = intval($_GET["id"]);
			$result = mysqli_query($con, "SELECT * FROM products WHERE product_id=$id");
			while ($row = mysqli_fetch_array($result))
			{
		?>
		<form action="update_product.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row["product_id"];?>">
		<div class="box">
		<h1>Update Product</h1><br>
			<center>
			<?php if ($row['product_image'] == "")
			{
				echo '<img src="default.png">';
			}
			else{
				echo '<img style="width:50px"src="upload/'.$row['product_image'].'">';
			}?>
			<div class="inputBox">
			<label>Name</label><br>
			<input type ="text" name ="name" value="<?php echo $row["product_name"];?>" readonly >
			</div>
			
			<div class="inputBox">
			<input type="text" name="price" value="<?php echo $row["product_price"];?>">
			<label>Price</label>
			</div>
			
			<div class="inputBox">
			<label>Product Description</label><br><br>
			<textarea style="width:300px; height:200px;" name="description" value="<?php echo $row["product_description"];?>"><?php echo $row["product_description"];?></textarea><br><br>
			</div>
			
			<input type="submit" name="update" value="Update"/>
			<input type="button" value="Back" onclick="window.location.href='View_Product.php'">
			</center>
			</div>
		</div>
		</form>
		<?php
			}
		?>
	</body>
</html>