<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_name = $_POST['faculty_name'];
    $faculty_ID = $_POST['faculty_ID'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_password = $_POST['faculty_password'];

    $conn = new mysqli('localhost', 'root', '', 'webdevolpment');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO facultydetails (faculty_name, faculty_ID, faculty_email, faculty_password) VALUES (?,?,?,?)");
    $stmt->bind_param("siss", $faculty_name, $faculty_ID, $faculty_email, $faculty_password);

    if ($stmt->execute()) {
        header("Location: index.html");
        exit; // Terminate script to prevent further output
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
