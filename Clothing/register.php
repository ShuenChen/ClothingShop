<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register an account</title>
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
                    <li><a href="/Clothing/Cart/index.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
                    
                    <li><div>
                            
                                <a href='#'>About Us
                                
                            
                            </a><?php if (isset($_SESSION['success'])): ?>
                            <?php                              
                                unset($_SESSION['success']);
                            ?><?php endif ?>
                        </div></li>
                </ul>
            </div>
        </div>
  <div class="header">
  	<h2>Sign Up</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Log in</a>
  	</p>
  </form>
</body>
</html>