<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['user'];
$score = $_SESSION['score'] ?? 0;

// Read current scores
$scores = [];
if (file_exists("scores.txt")) {
    $lines = file("scores.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $parts = explode(":", trim($line));
        if (count($parts) === 2) {
            list($user, $scr) = $parts;
            $scores[$user] = (int)$scr;
        }
    }
}

// Update score if it's higher or a new user
if (!isset($scores[$username]) || $score > $scores[$username]) {
    $scores[$username] = $score;

    // Save updated scores to the file
    $fileContent = "";
    foreach ($scores as $user => $scr) {
        $fileContent .= "$user:$scr\n";
    }
    file_put_contents("scores.txt", $fileContent);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Final Room - The PHP Vault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-in" style="max-width:600px; margin: 40px auto; padding: 20px;">
        <h1>Congratulations, <?php echo htmlspecialchars($username); ?>!</h1>
        <h2>You have successfully escaped The PHP Vault!</h2>

        <p>Your final score is: <strong><?php echo $score; ?></strong></p>

        <div style="margin-top: 30px;">
            <p><a href="leaderboard.php">View Leaderboard</a></p>
            <p><a href="menu.php">Back to Menu</a></p>
            <p><a href="logout.php">Log Out</a></p>
        </div>
    </div>
</body>
</html>
