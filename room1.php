<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// check if answer was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = trim($_POST['answer']);

    if ($answer == "shadow") {
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
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    <h3>Room 1 Puzzle</h3>

    <p>Solve this riddle to continue:</p>
    <blockquote>
        I follow you by day but vanish at night. What am I?
    </blockquote>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        Your Answer: <input type="text" name="answer" required>
        <input type="submit" value="Submit">
    </form>

    <br>
    <a href="hint.php?room=1">Need a hint? (−10 points)</a>
</body>
</html>
