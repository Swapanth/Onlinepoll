<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $student_ID = $_POST["student_ID"];
    $student_password = $_POST["student_password"];
    $poll_ID = $_POST["poll_ID"];}

    // Connect to the "development" database
    $db_connection = mysqli_connect('localhost', 'root', '', 'webdevolpment');

    if ($db_connection) {
        $student_ID = mysqli_real_escape_string($db_connection, $student_ID);
        $student_password = mysqli_real_escape_string($db_connection, $student_password);

        // Query the "faculty_details" table with the correct column name
        $query = "SELECT * FROM studentdetails WHERE student_ID='$student_ID' AND student_password='$student_password'";
        $result = mysqli_query($db_connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // User exists, log in successful
           
            header("Location: poll.php?student_ID=" . urlencode($student_ID) . "&poll_ID=" . urlencode($poll_ID));
exit;
        } else {
            // Invalid login credentials
            echo "Invalid Student ID or password.";
        }

        mysqli_close($db_connection);
    } else {
        // Database connection error
        echo "Database connection error: " . mysqli_connect_error();
    }

?>
