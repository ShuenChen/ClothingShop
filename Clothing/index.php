<?php
    include('server.php');
?>
<html>
    <head>
        <title>Phenox Clothing store</title>
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
                    <li><a href="/Clothing/cart/index.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
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
   
    <div class="slider">
   <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slide1.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/slide2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/slide3.png" class="d-block w-100">
    </div>
      <div class="carousel-item">
      <img src="images/slide4.jpg" class="d-block w-100">
    </div>
  </div>
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
    <li data-target="#slider" data-slide-to="3"></li>
  </ol>
</div>
   </div>
            
        </section>
        
 <!-----FEATURED CATEGORIES--->
 
 <section class="featured-categories">
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <a href="Footwear.php"><img src="images/category1.jpg"></a>
             </div>
             <div class="col-md-4">
                 <a href="Pants.php"><img src="images/category2.jpg"></a>
             </div>
             <div class="col-md-4">
                 <a href="Upperbody.php"><img src="images/category3.jpg"></a>
             </div>
             
         </div>
     </div>
 </section>
 
  <!----POPULAR PRODUCTS----->
 
  <section class="on-sale">
      <div class="container">
          <div class="tile-box">
              <h2>Popular Products</h2>
      </div>
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
                      <a href="product.php"><img src="images/product2.jpg"></a>
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
                              <h3>Adidas Originals NMD R1 'Japan'</h3>
                              <h5>RM650.00</h5>
                          </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="product-top">
                      <a href="product6.php"><img src="images/airmax3.jpg"></a>
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
                              <h3>Nike Air Max Alpha Savage</h3>
                              <h5>RM200.00</h5>
                          </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="product-top">
                      <a href="product4.php"><img src="images/samjogger1.jpg"></a>
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
                              <h3>Samurai Joggers</h3>
                              <h5>RM100.00</h5>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
 
  
  <!-----Website Features------>
  
  <section class="website-features">
      <div class="container">
       <div class="row">
       <div class="col-md-3">
        <img src ="images/feature1.png">
        <div class="feature-text">
                 <p><b>Pay by credit cards </b>and also online payments.</p>
       </div> 
       </div>
           <div class="col-md-3">
        <img src ="images/feature2.png">
        <div class="feature-text">
                 <p><b>Delivery services </b>are available.</p>
       </div> 
      </div>
  </section>
  


  
  <!-----------FOOTER------------------>
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
        
        
        <script>
            function openmenu()
            {
              document.getElementById("side-menu").style.display="block";  
              document.getElementById("menu-butn").style.display="none";
              document.getElementById("close-butn").style.display="block";
            }
            function closemenu()
            {
              document.getElementById("side-menu").style.display="none";  
              document.getElementById("menu-butn").style.display="block";
              document.getElementById("close-butn").style.display="none";
            }
        </script>
        
    </body>
</html>
