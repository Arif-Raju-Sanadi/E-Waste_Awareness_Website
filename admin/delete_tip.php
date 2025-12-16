<?php
include '../includes/db.php';
$id = (int)$_GET['id'];
$conn->query("DELETE FROM tips WHERE id=$id");
header('Location: index.php');
$conn->close();
?>