<?php
if(isset($_POST["update"])){
    include("conn.php");
	
    $query = "UPDATE products SET product_price = '" . $_POST["price"] . "', product_description = '" . $_POST["description"] . "' WHERE product_id = '" . $_POST["id"] ."'";
    
    if(!mysqli_query($con,$query)){
        die("Error" . mysqli_error($con));
    }
    
    echo "<script>
    alert('Product Edited');
    window.location.href = 'View_Product.php';
    </script>";
}
?>