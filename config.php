<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'us-cdbr-east-04.cleardb.com');
define('DB_USERNAME', 'b29224117890cd');
define('DB_PASSWORD', '2556331d');
define('DB_NAME', 'heroku_acb619cffe4521e');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
die("ERROR: Could not connect. " . $mysqli->connect_error);
}


?>
