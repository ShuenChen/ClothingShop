<?php
//Connect with MYSQL
 $conn = mysqli_connect('localhost','root','','admin');
 
 //Select Database
 mysqli_select_db($conn,'products');
 
 //Update Query
 $sql = "UPDATE products SET name='$_POST[name]',quantity='$_POST[quantity]',description='$_POST[description]','WHERE ID='$_POST[id]'";

 if(mysqli_query($conn, $sql))
 {
     header("Location:EditProducts.php");
 
 }
 else
     echo "Product was not updated!";
 
 ?>
         