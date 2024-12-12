<?php
// Database configuration
$host = 'localhost';  // Use localhost or 127.0.0.1
$username = 'root';
$password = 'project332';
$database = 'expense_tracker'; // Name of the database

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
