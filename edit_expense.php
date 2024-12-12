<?php
// Include the database connection
include('config/db.php');

// Fetch categories for the dropdown and table
$categories_sql = "SELECT * FROM Categories";
$categories_result = mysqli_query($conn, $categories_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Expense Tracker</title>
    <style></style>
</head>

<body>
    <div class='header'>
        <h1>Expense Tracker</h1>
    </div>
    <div class='container'>

        <!-- Add Expense Form -->
        <div class='form-container'>
            <div class='form-wrapper'>
                <h2>Edit Expense</h2>
                <!-- Display Messages -->
                <?php if (isset($expense_message)): ?>
                <p class="message"><?php echo $expense_message; ?></p>
                <?php endif; ?>


                <?php
                $id = $_GET['expenseId'];
                $fetch_query = "SELECT * FROM Expenses WHERE id='$id'";
                $fetch_query_run = mysqli_query($conn, $fetch_query);

                if ($fetch_query_run) {
                    foreach($fetch_query_run as $row) {
                ?>
                <form method="POST" action="update_script.php">
                <input type="hidden" value="<?php echo $row['id']; ?>" name="expense_id" id="expense_id"></input>
                    <div>
                        <label for="title">Title</label>
                        <input type="text" value="<?php echo $row['title']; ?>" name="title" id="title"></input>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <input name="description" value="<?php echo $row['description']; ?>"
                            id="description"></input>
                    </div>
                    <div>
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" required>
                        <?php
                        // Fetch categories for the dropdown and table
                        if (mysqli_num_rows($categories_result) > 0):
                                while ($_row = mysqli_fetch_assoc($categories_result)):
                            ?>
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $_row['name']; ?></option>
                            <?php endwhile; else: ?>
                            <option value=''>No categories found.</option>
                            <?php endif; ?>
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="amount">Amount</label>
                        <input type="number" value="<?php echo $row['amount']; ?>" step="0.01" name="amount" id="amount"
                            required>
                    </div>
                    <div>
                        <label for="expense_date">Date</label>
                        <input type="date" value="<?php echo $row['expense_date']; ?>" name="expense_date"
                            id="expense_date" required>
                    </div>
                    <button type="submit" name="save_expense">Save changes</button>
                </form>
                <?php
                        }
                    } else {
                        echo " No record found";
                    }
                ?>

            </div>

        </div>
        <?php
        // Close the connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>