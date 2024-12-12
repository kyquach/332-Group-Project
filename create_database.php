<?php
// Include the database connection
include('config/db.php');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$create_db_sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $create_db_sql)) {
    echo "Database '$database' created successfully or already exists.\n";
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Select the database
mysqli_select_db($conn, $database);

// Create Categories table
$create_categories_table = "
CREATE TABLE IF NOT EXISTS Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
)";
if (mysqli_query($conn, $create_categories_table)) {
    echo "Table 'Categories' created successfully or already exists.\n";
} else {
    die("Error creating 'Categories' table: " . mysqli_error($conn));
}

// Create Expenses table
$create_expenses_table = "
CREATE TABLE IF NOT EXISTS Expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title TEXT NOT NULL,
    category_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT,
    expense_date DATE NOT NULL,
    FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE CASCADE
)";
if (mysqli_query($conn, $create_expenses_table)) {
    echo "Table 'Expenses' created successfully or already exists.\n";
} else {
    die("Error creating 'Expenses' table: " . mysqli_error($conn));
}

// Close connection
mysqli_close($conn);

echo "Database setup complete!";
?>
