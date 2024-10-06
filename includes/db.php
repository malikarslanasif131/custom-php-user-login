<?php
$host = 'localhost';  // Database host
$dbname = 'php_user_management';  // Database name
$user = 'root';  // Database user
$password = '';  // Database password

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>