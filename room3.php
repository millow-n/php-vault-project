<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = trim($_POST['answer']);

    if (strtolower($answer) == "footsteps") {
        header("Location: final.php");
        exit;
    } else {
        $error = "Incorrect answer. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room 3 - Puzzle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="room">
        <h2>Room 3 Puzzle</h2>
        <p><strong>Riddle:</strong> The more you take, the more you leave behind. What am I?</p>

        <?php if ($error): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="answer" placeholder="Your Answer" required><br>
            <input type="submit" value="Submit">
        </form>

        <p><a href="hint.php?room=3">Need a Hint? (−10 points)</a></p>
        <p>Current Score: <?php echo $_SESSION['score']; ?></p>
    </div>
</body>
</html>
