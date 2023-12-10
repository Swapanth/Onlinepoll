<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST["roll_number"];
    $password = $_POST["password"];

    if ($roll_number == "8712131582" && $password == "123") {
        $_SESSION['teacher'] = true;
        echo "<script>alert('Teacher login successful.');</script>";
        header("Location:add_question.php");
    } else {
        echo "<script>alert('Invalid teacher login credentials.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="teacherlogin.php" method="post">
        <input type="text" name="roll_number" placeholder="Roll Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
     </form>
</body>
</html>