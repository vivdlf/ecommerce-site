<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.php");
  exit;
}


//need to get the current user's ID from Session array
$id = $_SESSION["id"];
echo ("User ID is ". $id);

// attempt insert query execution
$sql = "INSERT INTO orders(
    user_id
)
VALUES(
    '$id'
)";

if (mysqli_query($mysqli, $sql)) {
    echo nl2br("\nRecords added successfully to orders table.");

 } else {
     echo nl2br("\nERROR: Failed to execute $sql. " . mysqli_error($mysqli));
 }
$gId = " SELECT order_id FROM orders WHERE user_id = $id";
$result = $mysqli->query($gId);
$row = $result->fetch_assoc();
$ans = $row['order_id'];
echo nl2br("\nOrder ID is " .$ans);


$temp = $_SESSION["Items"];

foreach ($temp as $key => $value) {
    echo nl2br("\nValue Title is ".$value->Title);
    $prTitle = $value->Title;
    $prID;

    switch ($prTitle) {
        case 'Queen Panel Bed':
            $prID = 1;
            break;
        case 'King Panel Bed':
            $prID = 2;
            break;
        case 'Single Panel Bed':
            $prID = 3;
            break;
        case 'Twin Panel Bed':
            $prID = 4;
            break;
        case 'Fridge':
            $prID = 5;
            break;
        case 'Dresser':
            $prID = 6;
            break;
        case 'Couch':
            $prID = 7;
            break;
        case 'Table':
            $prID = 8;
            break;
    }

    
    //echo nl2br("\nProduct ID is ". $prID);
    // attempt insert query execution
     $sql = "INSERT INTO order_item(
        order_id,
        product_id,
        quantity
     )
    VALUES(
        '$ans',
        '$prID',
        '$value->Amount'
     )";

     if (mysqli_query($mysqli, $sql)) {
         echo nl2br("\nRecords added successfully to order_item table.");
     } else {
         echo nl2br("\nERROR: Failed to execute $sql. " . mysqli_error($mysqli));
     }
  
}







?>