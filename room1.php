<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$error = "";
$shake = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = trim($_POST['answer']);

    if (strtolower($answer) == "shadow") {
        header("Location: room2.php");
        exit;
    } else {
        $error = "Incorrect answer. Try again.";
        $shake = "shake";
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
    <div class="room <?php echo $shake; ?>">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
        <h3>Room 1 Puzzle</h3>

        <p>Solve this riddle to continue:</p>
        <blockquote>I follow you by day but vanish at night. What am I?</blockquote>

        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="POST">
            Your Answer: <input type="text" name="answer" required>
            <input type="submit" value="Submit">
        </form>

        <br>
        <a href="hint.php?room=1">Need a hint? (−10 points)</a>
        <p>Current Score: <?php echo $_SESSION['score']; ?></p>
    </div>
</body>
</html>
