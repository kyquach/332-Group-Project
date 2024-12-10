<?php
    //$db_name_from_user                            Take from user_input or automatically create a database?
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    //$db_name = $db_name_from_user                 Use to automate user database generation and connection
    $db_name = "expensesdb";
    $conn = "";

    //Exception Handling
    try{
        //Datebase connection
        $conn = mysqli_connect($db_server,
                            $db_user, 
                           $db_pass, 
                           $db_name); 
    }
    //If there is an error, echo could not connect.
        catch(mysqli_sql_exception){
                echo "Could not connect!";
        }
    //Establish that user is connected to the database
    if ($conn) {
        echo "You are connected!";
    } 
    
    
    ?> 