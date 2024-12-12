<?php
class DataAccessLayer
{
    public function deleteExpenseById($connection, $expenseId) {
        $query = "DELETE FROM Expenses WHERE id='$expenseId'";
        $result = $connection->query($query) or die("Error: Delete Expense failed.".$connection->error);
        return $result;
    }

    public function deleteCategoryById($connection, $categoryId) {
        $query = "DELETE FROM Categories WHERE id='$categoryId'";
        $result = $connection->query($query) or die("Error: Delete Category failed.".$connection->error);
        return $result;
    }
}