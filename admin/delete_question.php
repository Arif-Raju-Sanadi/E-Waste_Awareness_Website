<?php
include '../includes/db.php';
$id = (int)$_GET['id'];
$conn->query("DELETE FROM quiz_questions WHERE id=$id");
header('Location: index.php');
$conn->close();
?>