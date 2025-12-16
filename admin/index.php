<?php 
// FIXED PATH - This works from admin/ folder
$conn_path = '../includes/db.php';
if (!file_exists($conn_path)) {
    die("ERROR: Database file not found at $conn_path");
}
include $conn_path; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="../index.html">← Home</a></li>
            <li><a href="index.php">Admin</a></li>
        </ul>
    </nav>
</header>

<section style="max-width: 900px;">
    <h1>✅ Admin Panel - Working!</h1>
    <div class="success">Database Connected Successfully!</div>

    <?php
    // TEST ARTICLES
    echo "<h2>📝 Articles</h2>";
    $res = $conn->query("SELECT * FROM articles ORDER BY id DESC LIMIT 5");
    echo "<p><strong>Total Articles:</strong> " . $res->num_rows . "</p>";
    if ($res->num_rows > 0) {
        while ($r = $res->fetch_assoc()) {
            echo "<p>✅ " . htmlspecialchars($r['title']) . " <a href='delete_article.php?id={$r['id']}' onclick=\"return confirm('Delete?')\" style='color:red'>[Delete]</a></p>";
        }
    }

    // TEST TIPS
    echo "<h2>💡 Tips</h2>";
    $res = $conn->query("SELECT * FROM tips ORDER BY id DESC LIMIT 5");
    echo "<p><strong>Total Tips:</strong> " . $res->num_rows . "</p>";
    if ($res->num_rows > 0) {
        while ($r = $res->fetch_assoc()) {
            echo "<p>✅ " . htmlspecialchars($r['tip']) . " <a href='delete_tip.php?id={$r['id']}' onclick=\"return confirm('Delete?')\" style='color:red'>[Delete]</a></p>";
        }
    }

    // TEST QUESTIONS
    echo "<h2>❓ Quiz Questions</h2>";
    $res = $conn->query("SELECT * FROM quiz_questions ORDER BY id DESC LIMIT 5");
    echo "<p><strong>Total Questions:</strong> " . $res->num_rows . "</p>";
    if ($res->num_rows > 0) {
        while ($r = $res->fetch_assoc()) {
            echo "<p>✅ " . htmlspecialchars($r['question']) . " <a href='delete_question.php?id={$r['id']}' onclick=\"return confirm('Delete?')\" style='color:red'>[Delete]</a></p>";
        }
    }
    ?>

    <hr>
    <h2>➕ Add New Content</h2>
    
    <h3>Add Article</h3>
    <form action="add_article.php" method="post" style="margin-bottom: 20px;">
        <input type="text" name="title" placeholder="Article Title" required style="width: 300px;">
        <textarea name="content" placeholder="Article Content" rows="3" required style="width: 400px;"></textarea><br>
        <button type="submit">Add Article</button>
    </form>

    <h3>Add Tip</h3>
    <form action="add_tip.php" method="post" style="margin-bottom: 20px;">
        <input type="text" name="tip" placeholder="Tip text (e.g., 'Recycle old phones')" required style="width: 400px;">
        <button type="submit">Add Tip</button>
    </form>

    <h3>Add Question</h3>
    <form action="add_question.php" method="post">
        <input type="text" name="question" placeholder="Question?" required style="width: 400px;"><br><br>
        <input type="text" name="option1" placeholder="Option 1 (Correct)" required style="width: 300px;">
        <input type="text" name="option2" placeholder="Option 2" required style="width: 300px;"><br><br>
        <input type="text" name="option3" placeholder="Option 3" required style="width: 300px;">
        <input type="text" name="option4" placeholder="Option 4" required style="width: 300px;"><br><br>
        <input type="number" name="correct_option" min="1" max="4" placeholder="Correct option (1-4)" required style="width: 200px;">
        <button type="submit">Add Question</button>
    </form>

</section>

<?php $conn->close(); ?>
</body>
</html>