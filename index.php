<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Tracker</title>
</head>
<body>
    <?php
        include("database_functions.php");
        echo "Welcome";
    ?>
    <br><br>

    <button>Add Expense</button>
    <button>Delete Expense</button>
    <button>Edit Expense</button>

    <br><br>

    <h2>Expenses</h2>
    <?php
    try{
        // fetch data from Expenses
        $query = "SELECT * FROM Expenses";
        $result = mysqli_query($conn, $query);

        // display the results if any rows exist
        
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Expense Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['expense_name']}</td>
                        <td>{$row['expense_amount']}</td>
                        <td>{$row['expense_date']}</td>
                      </tr>";
            }
            
            echo "</table>";
        }
        } catch(mysqli_sql_exception $e) {
            echo "<p>No expenses to show.</p>";
        }
    ?>
</body>
</html>
