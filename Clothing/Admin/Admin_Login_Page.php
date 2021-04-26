<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="admin.css">
	</head>
	<body>
		<div class="box">
			<h2>Admin Login</h2>
			<form action="Admin_login.php"  method="post">
				<div class="inputBox">
					<input type="text" name="name" required="required">
					<label>Admin Name</label>
				</div>
				
				<div class="inputBox">
					<input type="Password" name="password" required="required">
					<label>Password</label>
				</div>
			<center>	
				<input type="submit" name="login" value="LOGIN">
                                <br><br>
				<a href='/Clothing/index.php' style="color:white">Main Page</a><br><br>
			</center>
			</form>	
		</div>
	</body>
</html>
