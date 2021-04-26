<?php
    include('server.php');
?>


<html>
    <head>
        <title>Upper Body</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
         
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><div class="error success">
                            <a><?php if (isset($_SESSION["username"])) {
                                    echo "<a href='#'>About Us</a>";
                                } else {
                                    echo "<a href='login.php'>Login</a>";
                                }
                            ?>
                            </a>
                        </div></li>
                    <li><div class="error success">
                            <a><?php if (isset($_SESSION["username"])) {
                                    echo "<a style='color:white';> <strong>". $_SESSION['username']."  "."</strong></a>";
                                    
                                    echo "<a href='index.php?logout='1' style='color: red'>Logout</a>";
                                } else {
                                    echo "<a href='#'>About Us</a>";
                                }
                            ?>
                            </a><?php if (isset($_SESSION['success'])): ?>
                            <?php                              
                                unset($_SESSION['success']);
                            ?><?php endif ?>
                        </div></li>
                </ul>
            </div>
        </div>
        
         <section class="header">
         <div class="side-menu" id="side-menu">
             <ul>
                 
                 <li><a href="Upperbody.php">Upper Body</a>
                
                 </li>
                 <li><a href="Pants.php">Lower Body</a> 
                 </li>
                 <li><a href="Footwear.php">Shoes</a> 
                 </li>
               
             </ul> 
             
             
             
         </div>
             
             
             
         </div>

              <h2>Upper body</h2>
      
          <div class="row">
              <div class="col-md-3">
                  <div class="product-top">
                      <a href="hoodie.php"><img src="images/product1.jpg"></a>
                      <div class="overlay-right">
                          <button type="button" class="btn btn-secondary" title="Add to Cart">
                              <a href="/Clothing/cart/index.php"><i class="fa fa-shopping-cart"></i></a>
                          </button>
                          </div>
                          <div class="product-bottom text-center">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-half"></i>
                              <h3>Hoodie</h3>
                              <h5>RM70.00</h5>
                          </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="product-top">
                      <a href="product1.php"><img src="images/cyberpunktee.jpg"></a>
                      <div class="overlay-right">
                          <button type="button" class="btn btn-secondary" title="Add to Cart">
                              <a href="/Clothing/cart/index.php"><i class="fa fa-shopping-cart"></i></a>
                          </button>
                          </div>
                          <div class="product-bottom text-center">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Cyberpunk 2077 T-shirt</h3>
                              <h5>RM50.00</h5>
                          </div>
                  </div>
              </div>
          </div>
      </div>
    
</section>
        
        <!----------Footer-------->
        <section class ="footer">
      <div class="container text-center">
          <div class="row">
          <div class="col-md-3">
          <h1>Links</h1>
          <p>Privacy Policy</p>
          <p>Terms and Conditions</p>
          <p>Return Policy</p>
          </div> 
              </div>
              <hr>
              <p class="copyright">Tang Wey Ean/Tan Shuen Chen</p>
      </div>
  </section>
        
    </body>