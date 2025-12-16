<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="ewaste.html">E-Waste</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="tips.php">Tips</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="admin/index.php">Admin</a></li>
        </ul>
    </nav>
</header>

<section>
    <h1>Articles</h1>
    <?php
    $sql = "SELECT * FROM articles ORDER BY id DESC";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        while ($r = $res->fetch_assoc()) {
            echo '<h2>' . htmlspecialchars($r['title']) . '</h2>';
            echo '<p>' . nl2br(htmlspecialchars($r['content'])) . '</p><hr>';
        }
    } else {
        echo '<p>No articles yet.</p>';
    }
    $conn->close();
    ?>
</section>

<div id="chatbot">
    <div id="chatOutput"></div>
    <input type="text" id="userInput" placeholder="Ask about e-waste…">
    <button onclick="sendMessage()">Send</button>
</div>

<script src="js/script.js"></script>
</body>
</html>