<?php
include '../includes/db.php';
$id = (int)$_GET['id'];
$conn->query("DELETE FROM articles WHERE id=$id");
header('Location: index.php');
$conn->close();
?>