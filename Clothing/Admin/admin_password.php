<?php
if(isset($_POST["submit"])){

    include("conn.php");
	$id = $_POST['id'];
	$name = $_POST['name'];
	$pass = $_POST['password'];
	$repass = $_POST['re-password'];
	
	$sql1 = "SELECT admin_id FROM admin WHERE admin_name='$name' ANd admin_id='$id'";
	
	if ($result = mysqli_query($con,$sql1))
	{
		$rowcount = mysqli_num_rows($result);
	}
	if ($rowcount == 1)
	{	
		if($pass !== $repass){
			
		echo "<script> alert('Password not match');
			 window.history.back();
			 </script>";
		}
		else{
			$sql = "UPDATE admin SET admin_password='$repass'
			WHERE admin_name ='$name'";

			if(!mysqli_query($con,$sql))
			{
			die("Error" . mysqli_error($con));
			}
    
			echo "<script>
			alert('Password Changed Sucessfully');
			window.location.href = 'Admin Login Page.php';
			</script>";
			}
	}
	else
	{
		echo"<script>alert('User not found !');
		window.history.back();</script>";
	}
	}
?>
