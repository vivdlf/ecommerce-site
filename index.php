<!DOCTYPE html>
<html lan="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Our Home Goods</title>
  <!--Font Awesome Link-->
  <script src="https://kit.fontawesome.com/e0b8e6b716.js" crossorigin="anonymous"></script>
  <!--Custom CSS-->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!--Navbar-->
  <nav class="navbar">
    <div class="navbar-center">
      <span class="nav-icon">
        <i class="fas fa-bars"></i>
      </span>
      <img src="images/logo.svg" height=140px alt="store log">
      <div class="cart-btn">
        <span class="nav-icon">
          <i class="fas fa-cart-plus"></i>
        </span>
        <div class="cart-items">0</div>
      </div>
    </div>
  </nav>
  <!--End of Navbar-->

  <!--Landing Page-->
  <header class="hero">
    <div class="banner">
      <h1 class="banner-title">Refresh your space</h1>
      <button class="banner-btn">Shop our Home Goods Collection</button>
    </div>
  </header>
  <!--End of Landing Page-->
  <!--Product Section-->
  <section class="products">
    <div class="section-title">
      <h2>Our Products</h2>
    </div>
    <div class="products-center">
      <!--Single Product
  <article class="product">
    <div class="img-container">
      <img src="images/product-1.jpeg" alt="Product" class="product-img"/>
      <button class="bag-btn" data-id="1">
        <i class="fas fa-shopping-cart"></i>
        Add to Cart
      </button>
    </div>
    <h3>Queen Bed</h3>
    <h4>$16</h4>
  </article>
  End of Single Product-->


    </div>
  </section>
  <!--End of Product Section-->

  <!--Cart-->
  <div class="cart-overlay">
    <div class="cart">
      <span class="close-cart">
        <i class="fas fa-window-close"></i>
      </span>
      <h2>Your Cart</h2>
      <div class="cart-content">
        <!--Cart Item
      <div class="cart-item">
        <img src="images/product-1.jpeg" alt="Product">
        <div>
          <h4>Queen Bed</h4>
          <h5>$16</h5>
          <span class="remove-item">remove</span>
        </div>

        <div>
          <i class="fas fa-chevron-up"></i>
          <p class="item-amount">1</p>
          <i class="fas fa-chevron-down"></i>
        </div>
      </div>
      End of Cart Item-->
      </div>

      <div class="cart-footer">
        <h3>Your total : $ <span class="cart-total">0</span>
        </h3>
        <button class="clear-cart banner-btn">Clear Cart</button>
        <div class="divider" style="height:20px;"></div>
        <button onclick="location.href = 'checkout.php';" class="banner-btn">Checkout</button>
      </div>
    </div>
  </div>
  <!--End of Cart-->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="app.js"></script>


</body>

</html>