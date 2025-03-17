<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    
    // Redirect to welcome page
    header("Location: welcome.php");
} else {
    echo "Invalid Username or Password!";
}

$conn->close();
