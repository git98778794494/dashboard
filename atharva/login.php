<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_auth";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userid = $_POST['userid'];
$password = $_POST['password'];

// Check user in database
$sql = "SELECT * FROM users WHERE userid='$userid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login Successful!";
    } else {
        echo "Invalid Password!";
    }
} else {
    echo "User Not Found!";
}

$conn->close();
?>
