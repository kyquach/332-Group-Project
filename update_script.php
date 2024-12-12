<?php
// Include database connection
include('config/db.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $expense_id = $_POST['expense_id'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $expense_date = $_POST['expense_date'];

    // Ensure expense ID is provided
    if (isset($expense_id) && !empty($expense_id)) {
        // SQL query to update the expense
        $update_sql = "
        UPDATE Expenses 
        SET 
            title = '$title', 
            category_id = '$category_id', 
            amount = '$amount', 
            description = '$description', 
            expense_date = '$expense_date'
        WHERE id = $expense_id";

        // Execute the query
        if (mysqli_query($conn, $update_sql)) {
            // Show success message and redirect back to the main page
            echo '<script>alert("Expense updated successfully!")</script>';
            echo '<script>window.location.href="index.php";</script>';
            exit();
        } else {
            // Show error message and redirect back to the main page
            echo '<script>alert("Updated failed.")</script>';
            echo '<script>window.location.href="index.php";</script>';
            exit();
        }
    } else {
        // Show missing ID message and redirect back to the main page
        echo '<script>alert("Expense ID is required for update!")</script>';
        echo '<script>window.location.href="index.php";</script>';
        exit();
    }
}

// Close the connection
mysqli_close($conn);
?>
