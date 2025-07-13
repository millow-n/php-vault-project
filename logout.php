<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logged Out - The PHP Vault</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="4;url=index.php">
</head>
<body>
<div class="fade-in logout-glow" style="max-width: 600px; margin: 100px auto; padding: 30px; background-color: #1e1e1e; border-radius: 20px; box-shadow: 0 0 15px #00ffff; text-align: center;">
        <h1 style="color: #00ffff;">Thank You for Playing!</h1>
        <h2>You've successfully logged out of The PHP Vault.</h2>
        <p>We hope you enjoyed the challenge.</p>
        <p>You’ll be redirected to the login page shortly.</p>
        <p>If not, <a href="index.php">click here to return</a>.</p>
    </div>
</body>
</html>
