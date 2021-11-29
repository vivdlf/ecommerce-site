<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("location: index.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html lan="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Home </title>
  <!--FavIcon-->
  <link rel="shortcut icon" type="image/jpg" href="https://assets.website-files.com/614f0d68de16650e3a327379/617a9bbc92a074084e96486d_fleex_favicon-pink.png" />
  <!--Font Awesome Link-->
  <script src="https://kit.fontawesome.com/e0b8e6b716.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

  <!--Custom CSS-->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!--Navbar-->
  <nav class="navbar" id="navbar">
    <div class="navbar-center">

      <!--Drop Down Icon
      <span class="nav-icon">
        <i class="fas fa-bars icon"></i>
      </span>-->
      <?php
      // Initialize the session
      session_start();

      // Check if the user is logged in, if not then redirect him to login page
      if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true) {
       echo '  <div class="dropdown ">
        <a class="  btn btn-primary btn-lg dropdown-toggle" class="nav-icon" href="#" role="button" id="LinkDropdownDemo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: Transparent;
        background-repeat:no-repeat;
        border: none !important;
        cursor:pointer;
        overflow: hidden;
        outline:none !important;
        box-shadow: none;
   
">
          <i class="fas fa-bars icon"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="LinkDropdownDemo">
          <a class="dropdown-item" href="#target">Shop</a>
          <a class="dropdown-item" href="reset-password.php">Reset Password</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </div>';
      }
      ?>
      <!--Drop Down Content-->
    


      <img id="lo" src="https://assets.website-files.com/614f0d68de16650e3a327379/614f13fd428b2b50eaae3190_logo_white.svg" height=50px width=100px alt="store log">
      <div class="cart-btn">
        <span class="nav-icon">
          <i class="fas fa-cart-plus icon"></i>
        </span>
        <div class="cart-items">0</div>
      </div>
    </div>
  </nav>
  <!--End of Navbar-->

  <!--Landing Page-->

  <header class="hero">

    <!--<div class="fullscreen-bg">
      <video autoplay muted style=" height:auto; width:100%;  display: absolute; margin: 0 auto; object-fit: cover;" id=" videoBG">
        <source id="header-video" src="https://github.com/yoanalmeida/Fleex/raw/main/FLEEX.mp4" type="video/mp4">
      </video>
    </div>-->

    <div class="overlay" class="banner">
      <h1 class="banner-title">Refresh your space</h1>
      <button class="banner-btn">Shop our Home Goods Collection</button>
    </div>

  </header>

  <!--End of Landing Page-->
  <!--Product Section-->
  <section class="products" id="target">
    <div class="section-title">
      <h2>Our Products</h2>
    </div>
    <div class="products-center">
    </div>
  </section>
  <!--End of Product Section-->

  <!--Cart-->
  <div class="cart-overlay">
    <div class="cart">
      <span class="close-cart">
        <i class="fas fa-window-close"></i>
      </span>
      <h2 style="font-size:24px; font-weight: bold;">Your Cart</h2>
      <div class="cart-content">
      </div>

      <div class="cart-footer">
        <h4 style="font-size:16px; font-weight: bold;">Merchandise Subtotal : $ <span class="cart-subtotal">0</span>
        </h4>
        <h4 style="font-size:16px; font-weight: bold;">Estimated Tax : $ <span class=" cart-tax">0</span>
        </h4>
        <h3 style="font-size:22px; font-weight: bold;">Your total : $ <span class="cart-total">0</span>
        </h3>
        <button class="clear-cart banner-btn">Clear Cart</button>
        <div class="divider" style="height:20px;"></div>
        <button id="myButton" class="banner-btn">Checkout</button>
      </div>
    </div>
  </div>
  <!--End of Cart-->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="app.js"></script>
  <script src="script.js"></script>


</body>

</html>