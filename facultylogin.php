<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_ID = $_POST["faculty_ID"];
    $password = $_POST["password"];
    $classroom_id = $_POST["classroom_id"];
    $fixedCode = "1234"; // The fixed Classroom ID code

    //  $query1 = "SELECT * FROM studentdetails WHERE student_ID='$student_ID' AND student_password='$password'";
    if ($classroom_id !== $fixedCode) {
        echo "Invalid Classroom ID. Please enter the correct code.";
        exit;
    }

    // Connect to the "development" database
    $db_connection = mysqli_connect('localhost', 'root', '', 'webdevolpment');

    if ($db_connection) {
        $faculty_ID = mysqli_real_escape_string($db_connection, $faculty_ID);
        $password = mysqli_real_escape_string($db_connection, $password);

        // Query the "faculty_details" table with the correct column name
        $query = "SELECT * FROM facultydetails WHERE faculty_ID='$faculty_ID' AND faculty_password='$password'";
        $result = mysqli_query($db_connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // User exists, log in successful
            header("Location: createpoll.html");
            exit;
        } else {
            // Invalid login credentials
            echo "Invalid Faculty ID or password.";
        }

        mysqli_close($db_connection);
    } else {
        // Database connection error
        echo "Database connection error: " . mysqli_connect_error();
    }
}
?>
