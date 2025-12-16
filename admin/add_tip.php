<?php
include '../includes/db.php';
$tip = $conn->real_escape_string($_POST['tip']);
$conn->query("INSERT INTO tips (tip) VALUES ('$tip')");
header('Location: index.php');
$conn->close();
?>