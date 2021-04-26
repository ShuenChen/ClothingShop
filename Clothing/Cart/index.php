<?php

/* (A) INIT + GET PRODUCTS */
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "core.php";
$_CC->extend("Products");
$products = $_CC->Products->getAll();
include('server.php');
/* (2) OUTPUT HTML */ ?>
<!DOCTYPE html>
<html>
  <head>
      
    <title>
      Phenox Store Item list
    </title>
  <link rel="stylesheet" href="\Clothing\style.css">
    <link rel="stylesheet" href="public/theme.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <script src="public/cart.js"></script>
  </head>
  <body>
      <div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-butn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-butn" onclick="closemenu()"></i>
            
            
            <a href="/Clothing/index.php"> <img src="/Clothing/images/logo.jpg" class="logo"></a>    
        </div>
            <div class="menu-bar">
                <ul>
                    <li><a href="/Clothing/index.php">Home</a></li>
                    <li><div class="error success">
                            <a><?php if (isset($_SESSION["username"])) {
                                    echo "<a href='#'>About Us</a>";
                                } else {
                                    echo "<a href='/Clothing/login.php'>Login</a>";
                                }
                            ?>
                            </a>
                        </div></li>
                    <li><div class="error success">
                            <a><?php if (isset($_SESSION["username"])) {
                                    echo "<a style='color:white';> <strong>". $_SESSION['username']."  "."</strong></a>";
                                    
                                    echo "<a href='/Clothing/cart/index.php?logout='1' style='color: red'>Logout</a>";
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
      
      
      
    <header id="scHead">
      Phenox Store Item list
      <!-- [CART BUTTON] -->
      <div id="scCartIcon" onclick="cart.toggle();">
        &#128722; <span id="scCartCount">0</span>
      </div>
    </header>

    <!-- [PRODUCTS] -->	
    <div id="scProduct"><?php
      if (is_array($products)) {
        foreach ($products as $id => $row) { ?>
          <div class="pdt">
            <img class="pImg" src="public/<?= $row['product_image'] ?>"/>
            <h3 class="pName"><?= $row['product_name'] ?></h3>
            <div class="pPrice">RM<?= $row['product_price'] ?></div>
            <div class="pDesc"><?= $row['product_description'] ?></div>
            <input class="pAdd bRed" type="button" value="Add to cart" onclick="cart.add(<?= $row['product_id'] ?>);"/>
          </div>
        <?php }
      } else {
        echo "No products found.";
      }
      ?></div>

    <!-- [CART] -->
    <div id="scCart" class="ninja"></div>
    
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
</html>