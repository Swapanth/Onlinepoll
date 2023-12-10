<?php
 


$conn = new mysqli('localhost', 'root', '', 'webdevolpment');


$student_name = $_POST['student_name'];
$student_ID = $_POST['student_ID'];
$student_email = $_POST['student_email'];
$student_password = $_POST['student_password'];

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO studentdetails (student_name, student_ID, student_email, student_password) VALUES (?,?,?,?)");
    $stmt->bind_param("siss", $student_name, $student_ID, $student_email, $student_password);

    if ($stmt->execute()) {
        header("Location: index.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
