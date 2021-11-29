<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fleex</title>
    <!--FavIcon-->
    <link rel="shortcut icon" type="image/jpg" href="https://assets.website-files.com/614f0d68de16650e3a327379/617a9bbc92a074084e96486d_fleex_favicon-pink.png" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <!--Font Awesome Link-->
    <script src="https://kit.fontawesome.com/e0b8e6b716.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #F2E5D5;">
    <!--Navbar-->
    <nav class="navbar" id="navbarr">
        <div class="navbar-center">
            <span class="nav-icon back-button">
                <span class="back-btn" style="font-size:20px;">
                    <i class="fas fa-arrow-left"> </i>
                    &nbsp <strong>Back</strong>
                </span>
            </span>


        </div>
    </nav>
    <!--End of Navbar-->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="images/image-5.jpeg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="https://assets.website-files.com/614f0d68de16650e3a327379/61505e1afcc784409915d1c7_Orange.svg" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Forgot your password? <br> It's easy to reset, don't worry.</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                <!--Password-->


                                <div class="form-group mb-4 <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                    <label for="password" class="sr-only"> New Password</label>
                                    <input type="password" name="new_password" class="form-control" class="form-control" placeholder="New Password" value="<?php echo $password; ?>">
                                    <span class="login-card-footer-text" class="help-block" style="color:red;"><?php echo $new_password_err; ?></span>
                                </div>

                                <div class="form-group mb-4 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <label for="password" class="sr-only">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                    <span class="login-card-footer-text" class="help-block" style="color:red;"><?php echo $confirm_password_err; ?></span>
                                </div>


                                <!--Sign up & Register Button-->

                                <div class="form-group">
                                    <input class="btn btn-block login-btn mb-4" type="submit" class="btn btn-primary" value="Reset">
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap  JavaScript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="checkout.js"></script>
</body>

</html>