<?php
$poll_ID = $_POST['poll_ID'];
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];

$conn = new mysqli('localhost', 'root', '', 'webdevolpment');
echo $poll_ID,$question,$option1,$option2,$option3,$option4;

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO createpoll  (poll_ID,question,option1,option2,option3,option4) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isssss",$poll_ID,$question,$option1,$option2,$option3,$option4);

    
    if ($stmt->execute()) {
        header("Location: index.html");
    } else { 
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>