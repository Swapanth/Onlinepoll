<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST["roll_number"];
    $password = $_POST["password"];

    if ($roll_number === "teacher" && $password === "teacher_password") {
        $_SESSION['teacher'] = true;
        echo "<script>alert('Teacher login successful.');</script>";
        header("Location: poll.php");
    } else {
        $sql = "SELECT id, password FROM students WHERE roll_number = '$roll_number'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION['student_id'] = $row["id"];
                echo "<script>alert('Login successful.');</script>";
                header("Location: poll.php");
            } else {
                echo "<script>alert('Invalid login credentials.');</script>";
            }
        } else {
            echo "<script>alert('Invalid login credentials.');</script>";
        }
    }

    $conn->close();
}
?>
