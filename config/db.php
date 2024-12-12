<?php
// Database configuration
$host = 'localhost';  // Use localhost or 127.0.0.1
$username = 'root'; // MySQL username (typically 'root')
$password = ''; // MySQL password (update this as necessary)
$database = ''; // Name of the database to create

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
