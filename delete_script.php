<?php
include('config/db.php');
include_once "DataAccessLayer.php";

if (isset($_GET['expenseId'])){
    $recordId = $_GET['expenseId'];
    $dal = new DataAccessLayer();
    $delete = $dal->deleteExpenseById($conn,$recordId);
    if ($delete){
        echo '<script>alert("Expense deleted successfully!")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
}

if (isset($_GET['categoryId'])){
    $recordId = $_GET['categoryId'];
    $dal = new DataAccessLayer();
    $delete = $dal->deleteCategoryById($conn,$recordId);
    if ($delete){
        echo '<script>alert("Category deleted successfully!")</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
}