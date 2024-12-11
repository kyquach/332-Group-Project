
# CPSC 332 Group Project: Expense Tracker


#### System Requirements:

- PHP 7.4 or higher
- MySQL 8.0 or higher
- A web broswer
- Terminal
- VS code (or any other text editor)


## Setup Instructions

1. **Clone the Repository**: Download the project files to your local machine.
2. **Start MySQL Database Service**: Open the terminal and run:
```bash
brew services start mysql
```
If you installed MySQL via other means, use:
```bash
mysql.server start
```
3. **Run the PHP Development Server**: Navigate to the project directory in the terminal and run:
```bash
php -S localhost:8080
```
4. **Access the Project**: Open your browser and visit:
```
http://localhost:8080/expense_tracker.php
```

## Usage

- Use the Expense form to create a new expense entry.
- Use the Category form to create new categories.
- View all categories and expenses in the respective tables.
- Use the Delete buttons to remove an existing expense or category by its ID.   
