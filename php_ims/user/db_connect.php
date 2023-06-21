<?php
// Database configuration
$link=mysqli_connect("localhost", "root", "@jane2024") or die(mysqli_error($link));
mysqli_select_db($link,"inventory_system") or die(mysqli_error($link));
// $dbHost     = "localhost";
// $dbUsername = "root";
// $dbPassword = "@jane2024";
// $dbName     = "inventory_system";

// // Create database connection
// $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// // Check connection
// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }
// //echo "Connected successfully";
?>