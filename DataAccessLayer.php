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

    // NOT BEING USED YET
    public function getAllExpenses($connection) {
        // Fetch expenses
        $query = "SELECT Expenses.id, Expenses.title, Categories.name AS category, Expenses.amount, Expenses.description, Expenses.expense_date 
        FROM Expenses 
        JOIN Categories ON Expenses.category_id = Categories.id";
        $result = mysqli_query($conn, $query);
        // $query = "SELECT * FROM expense_tracker";
        // $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
}