<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.php");
  exit;
}
$temp = $_SESSION["Total"];
$temp1 = $_SESSION["Items"];

//echo var_dump($temp["Total Number of Items"]);
//echo var_dump($temp1);
foreach ($temp as $key => $value) {
  // echo "$key is $value";
}



?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Checkout</title>
  <!--FavIcon-->
  <link rel="shortcut icon" type="image/jpg" href="https://assets.website-files.com/614f0d68de16650e3a327379/617a9bbc92a074084e96486d_fleex_favicon-pink.png" />
  <!--Font Awesome Link-->
  <script src="https://kit.fontawesome.com/e0b8e6b716.js" crossorigin="anonymous"></script>
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--Custom CSS-->
  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

  <div class="container">

    <div class="py-5 text-center">
      <!--Navbar-->
      <nav class="navbar" id="navbarr">
        <div class="navbar-center">
          <span class="nav-icon back-button">
            <span class="back-btn">
              <i class="fas fa-arrow-left"> </i>
              &nbsp <strong>Back</strong>
            </span>
          </span>
          <img id="lo" src="https://assets.website-files.com/614f0d68de16650e3a327379/614f13fd428b2b50eaae3190_logo_white.svg" height=50px width=100px alt="store log">

        </div>
      </nav>
      <!--End of Navbar-->

      <h2>Checkout</h2>
      <p class="lead">Please enter the necessary details.</p>
    </div>


    <!--Cart Details-->
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">
            <?php
            $temp = $_SESSION["Total"];

            foreach ($temp as $key => $value) {
              if ($key == "Total Number of Items")
                echo $value;
            }
            ?>
          </span>
        </h4>
        <ul class="list-group mb-3">
         <!--Items -->
         <?php
          $temp = $_SESSION["Items"];

          foreach ($temp as $key => $value) {
           //echo $value->Title;
            echo '
               <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">'.$value->Title. '</h6>
                      <small class="text-muted">Qty ' . $value->Amount . '</small>
                    </div>
                    <span class="text-muted">$ ' . $value->Price * $value->Amount . '</span>
              </li>
             ';
          }
         ?>
         <!--End of Items-->
          <li class="list-group-item d-flex justify-content-between">
            <strong> <span style="color:blue;">Merchandise SubTotal</span></strong>
            <strong style="color:blue;" style="color:blue;">$
              <?php
              $temp = $_SESSION["Total"];

              foreach ($temp as $key => $value) {
                if ($key == "Cart Subtotal")
                  echo $value;
              }
              ?>
            </strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong> <span style="color:blue;">Estimated Tax (GST)</span></strong>
            <strong style="color:blue;">$
              <?php
              $temp = $_SESSION["Total"];

              foreach ($temp as $key => $value) {
                if ($key == "Cart Tax")
                  echo $value;
              }
              ?>
            </strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong> <span style="color:red;">Total </span> </strong>
            <strong style="color:red;">$
              <?php
              $temp = $_SESSION["Total"];

              foreach ($temp as $key => $value) {
                if ($key == "Cart Total")
                  echo $value;
              }
              ?>
            </strong>
          </li>
        </ul>
      </div>

      <!--End of Cart Details-->
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form target="_blank" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" >
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required>
                <option value="">Choose...</option>
                <option>Australia</option>
                <option>Belize</option>
                <option>Canada</option>
                <option>Dominican Republic</option>
                <option>El Salvador</option>
                <option>France</option>
                <option>Guatemala</option>
                <option>Germany</option>
                <option>Honduras</option>
                <option>Iran</option>
                <option>Jamaica</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="paypal">Paypal</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" style="background-color: #8C583A; border:none;">Continue to checkout</button>
        </form>
      </div>
    </div>

  </div>

  <!-- Bootstrap  JavaScript
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <script src="checkout.js"></script>
</body>

</html>