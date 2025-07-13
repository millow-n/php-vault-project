<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = trim($_POST['answer']);

    if (strtolower($answer) == "shadow") {
        header("Location: room2.php");
        exit;
    } else {
        $error = "Incorrect answer. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room 1 - The Vault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="room">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
        <h3>Room 1 Puzzle</h3>
        <p><strong>Riddle:</strong> I follow you by day but vanish at night. What am I?</p>

        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="POST">
            <input type="text" name="answer" placeholder="Your Answer" required><br>
            <input type="submit" value="Submit">
        </form>

        <p><a href="hint.php?room=1">Need a Hint? (−10 points)</a></p>
        <p>Current Score: <?php echo $_SESSION['score']; ?></p>
    </div>
</body>
</html>
