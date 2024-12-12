
# CPSC 332 Group Project: Expense Tracker


#### System Requirements:

- PHP 7.4 or higher
- MySQL 8.0 or higher
- A web broswer
- Terminal
- VS code (or any other text editor)


## Setup Instructions

1. **Clone the Repository**: Download the project files to your local machine.

2. **Create MySQL database instance**: Open the terminal and run:

3. **Configure security for MySQL installation**: Open the terminal and run:

```bash
mysql_secure_installation
```
- Select configuration options:
```
Validate password? N
Create a database password.
Confirm password.
Remove anonymous user? Y
Disallow root login remotely? Y
Remove test database? Y
Reload priveleges? Y
```
4. **Sign into database**: Run the following command:

```bash
mysql -u root -p
```
   
   
5. **Start MySQL Database Service**: Open the terminal and run:

```bash
brew services start mysql
```
  If you installed MySQL via other means, use:
  
```bash
mysql.server start
```
- Once MySQL is running in the command line, enter the following SQL command to instantiate the database:

```SQL
CREATE DATABASE expense_tracker;
USE expense_tracker;
```

6. **Add database name and password to the config file**: Use the password you created in step 3.

- File: config/db.php

```php
<?php
// Database configuration
$host = 'localhost';  // Use localhost or 127.0.0.1
$username = 'root'; // MySQL username (typically 'root')
$password = ''; // MySQL password (set in step 3)
$database = 'expense_tracker'; // Name of the database
```

  
7. **Create the Database**: Run the script to create the database:

```
php create_database.php
``` 

8. **Run the PHP Development Server**: Navigate to the project directory in the terminal and run:

```bash
php -S localhost:8080
```

9. **Access the Project**: Open your browser and visit:

```
http://localhost:8080/expense_tracker.php
```

## Usage

- Use the Expense form to create a new expense entry.
- Use the Category form to create new categories.
- View all categories and expenses in the respective tables.
- Use the Delete buttons to remove an existing expense or category by its ID.   
