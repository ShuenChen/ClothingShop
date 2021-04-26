<?php 
include("conn.php");
$id = intval($_GET['id']);
$result = mysqli_query ($con,"DELETE FROM products WHERE product_id=$id");
mysqli_close($con);
	echo "<script>
    alert('Delete Product Sucessfully');
    window.location.href = 'View_Product.php';
    </script>";

?>