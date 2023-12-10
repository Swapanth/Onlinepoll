<!DOCTYPE html>
<html>
<head>
    <title>Add Poll Question</title>
</head>
<body>
    <h1>Add Poll Question</h1>

    <?php
    session_start();

    if (isset($_SESSION['teacher'])) {
        // Teacher is logged in
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include('connect.php');

            $question_text = $_POST["question_text"];
            $teacher_roll_number = "8712131582"; // Replace with your actual teacher's roll number

            // Insert the question into the poll_questions table
            $sql_question = "INSERT INTO poll_questions (question_text, teacher_roll_number) VALUES ('$question_text', '$teacher_roll_number')";

            if ($conn->query($sql_question) === true) {
                // Get the question ID of the inserted question
                $question_id = $conn->insert_id;

                // Check if options are provided
                if (isset($_POST['options']) && is_array($_POST['options'])) {
                    $options = $_POST['options'];

                    // Insert each option into the poll_options table
                    foreach ($options as $option_text) {
                        $sql_option = "INSERT INTO poll_options (question_id, option_text) VALUES ($question_id, '$option_text')";
                        if (!$conn->query($sql_option)) {
                            echo "Error: " . $sql_option . "<br>" . $conn->error;
                        }
                    }
                }

                echo "<script>alert('Question and options added successfully.');</script>";
            } else {
                echo "Error: " . $sql_question . "<br>" . $conn->error;
            }

            $conn->close();
        }

        // Form to add a new poll question and options
        echo "<form action='add_question.php' method='post'>";
        echo "<input type='text' name='question_text' placeholder='Enter the question' required>";
        echo "<input type='text' name='options[]' placeholder='Enter an option' required>";
        echo "<input type='text' name='options[]' placeholder='Enter another option' required>";
        // Add more input fields for additional options as needed
        echo "<input type='submit' value='Add Question'>";
        echo "</form>";
    } else {
        // Teacher is not logged in
        echo "<p>Teacher login required.</p>";
    }
    ?>

    <p><a href="teacher.php">Back to Teacher Panel</a></p>
</body>
</html>
