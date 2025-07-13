<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// user data
$username = $_SESSION['user'];
$score = $_SESSION['score'] ?? 0;

// Save to scores.txt
$entry = "$username|$score\n";
file_put_contents("scores.txt", $entry, FILE_APPEND);

// reset game
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Escape Complete!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🎉 Congratulations, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>You escaped successfully.</p>
    <p>Your final score: <strong><?php echo $score; ?></strong></p>

    <a href="leaderboard.php">View Leaderboard</a><br>
    <a href="index.php">Return to Login</a>
</body>
</html>
