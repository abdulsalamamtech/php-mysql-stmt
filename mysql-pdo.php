<?php

// MYSQL PDO

// Below are some examples of how to use MySQL prepared 
// statements in PHP for SELECT, INSERT, UPDATE, 
// and DELETE operations:

// Using prepared statements helps prevent 
// SQL injection attacks and enhances the 
// security of your application. Always remember 
// to properly sanitize and validate user inputs 
// before binding them to the prepared statement 
// to ensure the integrity of your data.



// Select using Prepared Statement:
// Assume we have a database connection established already
$db = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");

// Sample data
$user_id = 1;

// Prepare the statement
$stmt = $db->prepare("SELECT * FROM users WHERE id = :user_id");

// Bind parameters
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

// Execute the query
$stmt->execute();

// Fetch the results
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Use the data
echo "User ID: " . $user['id'] . ", Name: " . $user['name'];



// Insert using Prepared Statement:
// Assume we have a database connection established already
$db = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");

// Sample data
$name = "John Doe";
$email = "john@example.com";

// Prepare the statement
$stmt = $db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");

// Bind parameters
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);

// Execute the query
$stmt->execute();

// Get the last inserted ID
$lastInsertId = $db->lastInsertId();

// Use the last inserted ID if needed
echo "New user ID: " . $lastInsertId;




// update using Prepared Statement:
// Assume we have a database connection established already
$db = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");

// Sample data
$user_id = 1;
$new_name = "Updated John Doe";

// Prepare the statement
$stmt = $db->prepare("UPDATE users SET name = :new_name WHERE id = :user_id");

// Bind parameters
$stmt->bindParam(':new_name', $new_name, PDO::PARAM_STR);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

// Execute the query
$stmt->execute();





// Delete using Prepared Statement:
// Assume we have a database connection established already
$db = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");

// Sample data
$user_id = 1;

// Prepare the statement
$stmt = $db->prepare("DELETE FROM users WHERE id = :user_id");

// Bind parameters
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

// Execute the query
$stmt->execute();
