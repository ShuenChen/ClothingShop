<?php
session_start();

if(isset($_SESSION['staffname'])){
	
	session_destroy();
	
	echo"<script>location.href='Admin_Login_Page.php'</script>";
}
else{
	echo"<script>location.href='Admin_Login_Page.php'</script>";
}
?>