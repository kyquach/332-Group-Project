<?php
// Include the database connection
include('config/db.php');

// Handle adding a new expense
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_expense'])) {
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $expense_date = $_POST['expense_date'];

    $create_expense_sql = "INSERT INTO Expenses (title, category_id, amount, description, expense_date) 
            VALUES ('$title', '$category_id', '$amount', '$description', '$expense_date')";

    if (mysqli_query($conn, $create_expense_sql)) {
        $expense_message = "New expense added successfully!";
    } else {
        $expense_message = "Error: " . mysqli_error($conn);
    }
}

// Handle adding a new category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $category_sql = "INSERT INTO Categories (name, description) 
                     VALUES ('$name', '$description')";

    if (mysqli_query($conn, $category_sql)) {
        $category_message = "New category added successfully!";
    } else {
        $category_message = "Error: " . mysqli_error($conn);
    }
}


// Fetch categories for the dropdown and table
$categories_sql = "SELECT * FROM Categories";
$categories_result = mysqli_query($conn, $categories_sql);

// Fetch expenses
$expenses_sql = "SELECT Expenses.id, Expenses.title, Categories.name AS category, Expenses.amount, Expenses.description, Expenses.expense_date 
                 FROM Expenses 
                 JOIN Categories ON Expenses.category_id = Categories.id";
$expenses_result = mysqli_query($conn, $expenses_sql);
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

        <!-- Display Categories -->
        <div class='table-card'>
            <h2>Categories</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through and dispay categories
                    if (mysqli_num_rows($categories_result) > 0):
                        while ($row = mysqli_fetch_assoc($categories_result)):
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="delete_script.php?categoryId=<?php echo $row['id']?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; else: ?>
                    <tr>
                        <td colspan="3">No categories found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Display Expenses -->
        <div class='table-card'>
            <h2>Expenses</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($expenses_result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($expenses_result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo '$' . number_format($row['amount'], 2); ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['expense_date']; ?></td>
                        <td>
                            <a href="edit_expense.php?expenseId=<?php echo $row['id']?>" class="edit-btn">Edit</a>
                            <a href="delete_script.php?expenseId=<?php echo $row['id']?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5">No expenses found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Add Expense Form -->
        <div class='form-container'>
            <div class='form-wrapper'>
                <h2>Add Expense</h2>
                <!-- Display Messages -->
                <?php if (isset($expense_message)): ?>
                <p class="message"><?php echo $expense_message; ?></p>
                <?php endif; ?>

                <form method="POST" action="expense_tracker.php">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"></input>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <div>
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" required>
                            <?php
                            // Fetch categories again for display (must fetch again because categories_result is empty here)
                            $categories_result = mysqli_query($conn, $categories_sql);
                            if (mysqli_num_rows($categories_result) > 0):
                                while ($row = mysqli_fetch_assoc($categories_result)):
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php endwhile; else: ?>
                            <option value=''>No categories found.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" name="amount" id="amount" required>
                    </div>
                    <div>
                        <label for="expense_date">Date</label>
                        <input type="date" name="expense_date" id="expense_date" required>
                    </div>
                    <button type="submit" name="add_expense">Add Expense</button>
                </form>
            </div>
            <!-- Add Category Form -->
            <div class='form-wrapper'>
                <h2>Add Category</h2>
                <!-- Display Messages -->
                <?php if (isset($category_message)): ?>
                <p class="message"><?php echo $category_message; ?></p>
                <?php endif; ?>
                <form method="POST" action="expense_tracker.php">
                    <div>
                        <label for="name">Category Name:</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label for="description">Description:</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <button type="submit" name="add_category">Add Category</button>
                </form>
            </div>
        </div>
        <?php
        // Close the connection
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>