<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.php");
  exit;
}
$temp = $_POST["ip"];
$temp1 = $_POST["io"];
$temp = json_decode($temp);
$temp1 = json_decode($temp1);

$_SESSION["Total"]=$temp;
$_SESSION["Items"] = $temp1;

?>