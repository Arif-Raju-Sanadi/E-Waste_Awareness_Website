<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
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
    <h1>E-Waste Quiz</h1>
    <p>10 random questions – different every time!</p>

    <form id="quizForm">
    <?php
    $sql = "SELECT * FROM quiz_questions ORDER BY RAND() LIMIT 10";
    $res = $conn->query($sql);
    $n = 1;
    while ($q = $res->fetch_assoc()) {
        echo "<div class='question'>";
        echo "<p><strong>$n.</strong> " . htmlspecialchars($q['question']) . "</p>";
        for ($i=1;$i<=4;$i++) {
            $opt = "option$i";
            echo "<label><input type='radio' name='q$n' value='$i'> " . htmlspecialchars($q[$opt]) . "</label><br>";
        }
        echo "<input type='hidden' name='correct$n' value='{$q['correct_option']}'>";
        echo "</div>";
        $n++;
    }
    $conn->close();
    ?>
    <button type="button" onclick="calculateScore()">Submit Quiz</button>
    </form>
    <p id="score"></p>
</section>

<div id="chatbot">
    <div id="chatOutput"></div>
    <input type="text" id="userInput" placeholder="Ask about e-waste…">
    <button onclick="sendMessage()">Send</button>
</div>

<script src="js/script.js"></script>
</body>
</html>