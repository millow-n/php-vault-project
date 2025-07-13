<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Menu - The PHP Vault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-in" style="max-width:600px; margin: 40px auto; padding: 20px;">
        <h1>Welcome to The PHP Vault</h1>
        <h2>Hello, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>

        <p>Choose an option below to continue:</p>

        <ul>
            <li><a href="room1.php">Start Game</a></li>
            <li><a href="leaderboard.php">View Leaderboard</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</body>
</html>
