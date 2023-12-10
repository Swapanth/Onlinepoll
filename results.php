<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="poll.css">
    <title>Poll Results</title>
    <style>
        .results {
            width: 400px;
            margin: 3px auto;
        }

        .bar {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            
        }

        .label {
            width: 100px;
            text-align: left;
            padding-right: 10px;
        }

        .bar-inner {
            background-color: red;
            height: 20px;
            line-height: 20px;
            color: #fff;
            text-align: left;
            transition: width 0.5s; /* Add smooth transition */
        }
    </style>
</head>
<body>
    <div class="container">
        
        
        <?php
        if (isset($_GET['poll_ID'])) {
            $currentPollID = $_GET['poll_ID'];
        } else {
            echo "poll_ID is not set in the GET data.";
        }

        // Connect to the database (modify the connection details accordingly)
        $connection = mysqli_connect('localhost', 'root', '', 'webdevolpment');

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Create an array to store the option mapping for the current poll_ID
        $optionMapping = [];

        // Query the database to retrieve unique responses for the current poll_ID
        $query = "SELECT DISTINCT answer FROM pollresponse WHERE poll_ID = ?";
        $stmt = mysqli_stmt_init($connection);

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $currentPollID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                // Map the response to an option dynamically
                $optionMapping[] = $row['answer'];
            }
        } else {
            echo "Query preparation error.";
        }

        // Close the database connection
        mysqli_stmt_close($stmt);

        // Create variables to count responses for each option
        $optionCounts = array_fill(0, count($optionMapping), 0);

        // Query the database to retrieve responses for the current poll_ID
        $query = "SELECT answer FROM pollresponse WHERE poll_ID = ?";
        $stmt = mysqli_stmt_init($connection);

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $currentPollID);
            mysqli_stmt_execute($stmt);
            $responsesResult = mysqli_stmt_get_result($stmt);

            while ($responseRow = mysqli_fetch_assoc($responsesResult)) {
                $answer = $responseRow['answer'];

                // Map the actual response to the dynamically created option
                $optionNumber = array_search($answer, $optionMapping);
                if ($optionNumber !== false) {
                    $optionCounts[$optionNumber]++;
                }
            }
        } else {
            echo "Query preparation error.";
        }

        // Close the database connection
        mysqli_stmt_close($stmt);

        // Create a variable to store the poll question
        $pollQuestion = '';

        // Query the database to retrieve the question for the current poll_ID
        $queryQuestion = "SELECT question FROM createpoll WHERE poll_ID = ?";
        $stmtQuestion = mysqli_stmt_init($connection);

        if (mysqli_stmt_prepare($stmtQuestion, $queryQuestion)) {
            mysqli_stmt_bind_param($stmtQuestion, "i", $currentPollID);
            mysqli_stmt_execute($stmtQuestion);
            $questionResult = mysqli_stmt_get_result($stmtQuestion);

            // Fetch the question
            if ($questionRow = mysqli_fetch_assoc($questionResult)) {
                $pollQuestion = $questionRow['question'];
            }
        }

        // Close the database connection
        mysqli_stmt_close($stmtQuestion);
        ?>

        <h2>Results for Poll ID: <?php echo $currentPollID; ?></h2>
        <p><?php echo $pollQuestion; ?></p>

        <div class="results">
            <?php
            $totalResponses = array_sum($optionCounts);

            foreach ($optionMapping as $index => $option) {
                $optionCount = $optionCounts[$index];
                $percentage = ($totalResponses > 0) ? ($optionCount / $totalResponses) * 100 : 0;

                echo '<div class="bar">
                    <div class="label">' . $option . '</div>
                    <div class="bar-inner" style="width:' . $percentage . '%;">' . round($percentage, 2) . '%</div>
                </div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
