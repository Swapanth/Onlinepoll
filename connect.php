<?php
$host = "localhost";
$username = "root";
$password = ""; // You might need to set a password here if you have one
$database = "online_poll"; // Replace with your actual database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

