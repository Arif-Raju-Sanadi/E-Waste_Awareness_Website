<?php
include '../includes/db.php';
$q  = $conn->real_escape_string($_POST['question']);
$o1 = $conn->real_escape_string($_POST['option1']);
$o2 = $conn->real_escape_string($_POST['option2']);
$o3 = $conn->real_escape_string($_POST['option3']);
$o4 = $conn->real_escape_string($_POST['option4']);
$c  = (int)$_POST['correct_option'];

$conn->query("INSERT INTO quiz_questions
    (question,option1,option2,option3,option4,correct_option)
    VALUES ('$q','$o1','$o2','$o3','$o4',$c)");
header('Location: index.php');
$conn->close();
?>