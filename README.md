
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
3. **Name database and provide credentials**: Update the variables in the configuration file.

- File: config/db.php

```php
<?php
// Database configuration
$host = 'localhost';  // Use localhost or 127.0.0.1
$username = 'root'; // MySQL username (typically 'root')
$password = ''; // MySQL password (update this as necessary)
$database = ''; // Name of the database to create
```
  
4. **Create the Database**: Run the script to create the database:

```
php create_database.php
``` 

5. **Run the PHP Development Server**: Navigate to the project directory in the terminal and run:

```bash
php -S localhost:8080
```

6. **Access the Project**: Open your browser and visit:

```
http://localhost:8080/expense_tracker.php
```

## Usage

- Use the Expense form to create a new expense entry.
- Use the Category form to create new categories.
- View all categories and expenses in the respective tables.
- Use the Delete buttons to remove an existing expense or category by its ID.   
