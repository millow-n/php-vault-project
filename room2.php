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

    if (strtolower($answer) == "echo") {
        header("Location: room3.php");
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
    <title>Room 2 - Puzzle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="room <?php echo $shake; ?>">
        <h2>Room 2 Puzzle</h2>
        <p><strong>Riddle:</strong> I speak without a mouth and hear without ears. I have nobody, but I come alive with wind. What am I?</p>

        <?php if ($error): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="answer" placeholder="Your Answer" required><br>
            <input type="submit" value="Submit">
        </form>

        <p><a href="hint.php?room=2">Need a Hint? (−10 points)</a></p>
        <p>Current Score: <?php echo $_SESSION['score']; ?></p>
    </div>
</body>
</html>
