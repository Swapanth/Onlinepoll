<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="poll.css">
    <title>Poll Questionnaire</title>
</head>
<body>
    <div class="container">
        <h1>Poll Questions</h1>
        
        <?php
        if (isset($_GET['poll_ID']) && isset($_GET['student_ID'])) {
            $poll_ID = $_GET['poll_ID'];
            $student_ID = $_GET['student_ID'];
        } else {
            echo "poll_ID or student_ID is not set in the GET data.";
            exit;
        }

        // Connect to the database (modify the connection details accordingly)
        $connection = mysqli_connect('localhost', 'root', '', 'webdevolpment');

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Query the database to retrieve questions and options for the specified poll_ID
        $query = "SELECT question, option1, option2, option3, option4 FROM createpoll WHERE poll_ID = ?";
        $stmt = mysqli_stmt_init($connection);

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $poll_ID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo '<form action="pollresponse.php" method="post">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<p class="question">' . $row['question'] . '</p>';
                    
                    echo '<label class="option"><input type="radio" name="answer" value="' . $row['option1'] . '"> ' . $row['option1'] . '</label><br>';
                    echo '<label class="option"><input type="radio" name="answer" value="' . $row['option2'] . '"> ' . $row['option2'] . '</label><br>';
                    echo '<label class="option"><input type="radio" name="answer" value="' . $row['option3'] . '"> ' . $row['option3'] . '</label><br>';
                    echo '<label class="option"><input type="radio" name="answer" value="' . $row['option4'] . '"> ' . $row['option4'] . '</label><br>';
                    
                }
                echo '<input type="hidden" name="student_ID" value="' . $student_ID . '">';
                echo '<input type="hidden" name="poll_ID" value="' . $poll_ID . '">';
                echo '<input type="submit" class="submit-button" value="Submit">';
                echo '</form>';
            } else {
                echo "No poll questions found for the specified Poll ID.";
            }
        } else {
            echo "Query preparation error.";
        }

        // Close the database connection
        mysqli_stmt_close($stmt);
        ?>
    </div>
</body>
</html>
