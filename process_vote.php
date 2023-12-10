<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['student_id'])) {
    $question_id = $_POST["question_id"];
    $selected_option_id = $_POST["selected_option_id"];
    $student_id = $_SESSION['student_id'];

    // Check if the student has already voted for this question
    $check_sql = "SELECT * FROM votes WHERE student_id = '$student_id' AND question_id = '$question_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 0) {
        // Update the vote count for the selected option
        $update_sql = "UPDATE poll_options SET votes = votes + 1 WHERE id = '$selected_option_id'";
        $conn->query($update_sql);

        // Record the student's vote in the 'votes' table to prevent multiple votes
        $record_sql = "INSERT INTO votes (student_id, question_id) VALUES ('$student_id', '$question_id')";
        $conn->query($record_sql);

        echo "<script>alert('Vote submitted successfully.');</script>";
    } else {
        echo "<script>alert('You have already voted for this question.');</script>";
    }
}

$conn->close();
?>
