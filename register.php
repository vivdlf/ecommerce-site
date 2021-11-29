<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
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
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="images/image-2.jpeg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="https://assets.website-files.com/614f0d68de16650e3a327379/61505e1afcc784409915d1c7_Orange.svg" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Register, it's easy!</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                <!--Username-->


                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" placeholder="Username" name=" username" class="form-control" value="<?php echo $username; ?>">
                                    <span class="login-card-footer-text" class="help-block" style="color:red;"><?php echo $username_err; ?></span>
                                </div>

                                <!--Password-->
                                <div class="form-group mb-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
                                    <span class="login-card-footer-text" class="help-block" style="color:red;"><?php echo $password_err; ?></span>
                                </div>

                                <div class="form-group mb-4 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <label for="password" class="sr-only">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                                    <span class="login-card-footer-text" class="help-block" style="color:red;"><?php echo $confirm_password_err; ?></span>
                                </div>


                                <!--Sign up & Register Button-->

                                <div class="form-group">
                                    <input class="btn btn-block login-btn mb-4" class="btn btn-primary" type="submit" class="btn btn-primary" value="Register">
                                </div>
                            </form>

                            <p class="login-card-footer-text">Already have an account? <a href="index.php" class="text-reset">Login here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Copyright © 2021 Fleex</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>