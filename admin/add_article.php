<?php
include '../includes/db.php';
$title   = $conn->real_escape_string($_POST['title']);
$content = $conn->real_escape_string($_POST['content']);
$conn->query("INSERT INTO articles (title,content) VALUES ('$title','$content')");
header('Location: index.php');
$conn->close();
?>