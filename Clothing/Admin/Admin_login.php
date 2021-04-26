<?php

if (isset($_POST["login"])){
	
	include("conn.php");
	
	$name = $_POST['name'];
	$pass = $_POST['password'];
	
	$sql = "SELECT * FROM admin WHERE admin_name='$name' AND admin_password='$pass'";
	
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
		
		if($row['admin_name']==$name && $row['admin_password'])
		{
		session_start();
		$_SESSION['adminname'] = $name;
		echo"<script>alert('Welcome $name');
		window.location.href = 'Admin.php'</script>";
		}
		else
		{
		echo"<script>alert('Username or Password is incorrect!');
		window.history.back();</script>";
		}
}
?>