<?php
// Retrieve the form data
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];

// Insert the data into the database table
// Replace the database connection details and table name with your own
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO table_of_commands (quantity, name, email) VALUES (:quantity, :name, :email)");

// Bind the parameters
$stmt->bindParam(':quantity', $quantity);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);

// Execute the statement
$stmt->execute();

// Close the database connection
$conn = null;

// Return a success response
$response = array('success' => true, 'message' => 'Form submitted successfully');
echo json_encode($response);
?>