<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "user_auth";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$fullname = $_POST['fullname'];
$business = $_POST['business'];
$contact = $_POST['contact'];
$location = $_POST['location'];
$userid = $_POST['userid'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

// Insert user data
$sql = "INSERT INTO users (fullname, business, contact, location, userid, password) VALUES ('$fullname', '$business', '$contact', '$location', '$userid', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration Successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
