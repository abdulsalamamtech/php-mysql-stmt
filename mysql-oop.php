<?php

// MYSQL OOP

// Below are some examples of how to use MySQL prepared 
// statements in PHP for SELECT, INSERT, UPDATE, 
// and DELETE operations:

// In MySQLi, we use the bind_param() method to bind 
// the parameters to the prepared statement, and the 
// execute() method to execute the query. The result 
// variables are bound using bind_result(), and the 
// fetched results are retrieved using fetch().

// Remember to handle potential errors and sanitize 
// user inputs to ensure the security and integrity 
// of your application's data.


// Select using MySQLi Prepared Statement:
// Assume we have a database connection established already
$mysqli = new mysqli("localhost", "username", "password", "mydatabase");

// Sample data
$user_id = 1;

// Prepare the statement
$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");

// Bind parameters
$stmt->bind_param('i', $user_id);

// Execute the query
$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $name, $email);

// Fetch the results
$stmt->fetch();

// #GET SINGLE ROW
// Use the data
echo "User ID: " . $id . ", Name: " . $name;

// #GET ALL ROWS
// Fetch and process rows
while ($stmt->fetch()) {
    echo "User ID: " . $id . ", Name: " . $name . ", Email: " . $email . "<br>";
}

// NOTE

// The bind_result() method is used to bind 
// variables to the result set columns returned 
// by a SELECT query when using prepared statements.

// The fetch() method is used to fetch the next 
// row from the result set returned by a SELECT 
// query when using prepared statements.




// Insert using MySQLi Prepared Statement:
// Assume we have a database connection established already
$mysqli = new mysqli("localhost", "username", "password", "mydatabase");

// Sample data
$name = "John Doe";
$email = "john@example.com";

// Prepare the statement
$stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");

// Bind parameters
$stmt->bind_param('ss', $name, $email);

// Execute the query
$stmt->execute();

// Get the last inserted ID
$lastInsertId = $mysqli->insert_id;

// Use the last inserted ID if needed
echo "New user ID: " . $lastInsertId;




// Update using MySQLi Prepared Statement:
// Assume we have a database connection established already
$mysqli = new mysqli("localhost", "username", "password", "mydatabase");

// Sample data
$user_id = 1;
$new_name = "Updated John Doe";

// Prepare the statement
$stmt = $mysqli->prepare("UPDATE users SET name = ? WHERE id = ?");

// Bind parameters
$stmt->bind_param('si', $new_name, $user_id);

// Execute the query
$stmt->execute();




// Delete using MySQLi Prepared Statement:
// Assume we have a database connection established already
$mysqli = new mysqli("localhost", "username", "password", "mydatabase");

// Sample data
$user_id = 1;

// Prepare the statement
$stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");

// Bind parameters
$stmt->bind_param('i', $user_id);

// Execute the query
$stmt->execute();




// GET SELECTED RESULT AS AN ASSOCIATIVE ARRAY
// If you want to fetch all the results as 
// an associative array without using bind_result() 
// and fetch(), you can use the get_result() method 
// along with the fetch_assoc() method in MySQLi. 
// This approach works when using MySQLi with the 
// "mysqlnd" driver, which is usually available in 
// most modern PHP installations.

// Here's how you can fetch all the results as an 
// associative array:

// Assume we have a database connection established already
$mysqli = new mysqli("localhost", "username", "password", "mydatabase");

// Prepare the statement
$stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE age > ?");

// Bind parameters
$ageThreshold = 18;
$stmt->bind_param('i', $ageThreshold);

// Execute the query
$stmt->execute();

// Get the result set as a mysqli_result object
$result = $stmt->get_result();

// Fetch all rows as an associative array
$users = $result->fetch_all(MYSQLI_ASSOC);

// Now $users is an array containing all the rows fetched from the database
// Each row is represented as an associative array with column names as keys

// Example: Print the data
foreach ($users as $user) {
    echo "User ID: " . $user['id'] . ", Name: " . $user['name'] . ", Email: " . $user['email'] . "<br>";
}


// NOTE
// In this approach, we first use get_result() to 
// obtain the result set as a mysqli_result object. 
// Then, we use the fetch_all(MYSQLI_ASSOC) method 
// on the result object to fetch all the rows as 
// an associative array. Each row in the array is 
// represented as an associative array, where the 
// keys are the column names from the database table.

// Please note that the fetch_all() method requires 
// the "mysqlnd" driver to be installed and enabled 
// in your PHP environment. If the "mysqlnd" driver 
// is not available, you'll need to use the 
// traditional bind_result() and fetch() approach 
// to fetch rows one by one.