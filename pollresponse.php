<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["answer"]) && isset($_POST["student_ID"]) && isset($_POST["poll_ID"])) {
        $student_ID = $_POST["student_ID"];
        $poll_ID = $_POST["poll_ID"];
        $selected_answer = $_POST["answer"];
        
        // Connect to the database (modify the connection details accordingly)
        $connection = mysqli_connect('localhost', 'root', '', 'webdevolpment');
        
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the INSERT statement
        $query = "INSERT INTO pollresponse (student_ID, poll_ID, answer) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "iis", $student_ID, $poll_ID, $selected_answer);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.html");
                exit(); // You should exit after a successful redirect.
            } else { 
                echo "Error: " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "Query preparation error: " . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    } else {
        echo "Incomplete data. Please fill out the form completely.";
    }
} else {
    echo "Invalid request method.";
}
?>
