<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST["roll_number"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (roll_number, password) VALUES ('$roll_number', '$password')";
    if ($conn->query($sql) === true) {
        echo "<script>alert('Registration successful. Please log in.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
