<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Log in your account</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-butn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-butn" onclick="closemenu()"></i>
            
            
            <a href="index.php"> <img src="images/logo.jpg" class="logo"></a>
            
        </div>
            <div class="menu-bar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="/Clothing/cart/index.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
        </div>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not a member yet? <a href="register.php">Sign up</a>  
  	</p>
        
        <p>
            Sign in as an admin here. <a href="\Clothing\Admin\Admin_Login_Page.php">Admin login</a>
        </p>
  </form>
</body>
</html>