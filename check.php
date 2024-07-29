<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST["quantity"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO commands (quantity, name, email)
            VALUES ('$quantity', '$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Purchase successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>