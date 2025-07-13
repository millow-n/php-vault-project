<?php
session_start();
$error = "";
$successLogin = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    $lines = file("users.txt");

    foreach ($lines as $line) {
        list($storedUser, $storedPass) = explode(":", trim($line));
        if ($user == $storedUser && $pass == $storedPass) {
            $_SESSION['user'] = $user;
            $_SESSION['score'] = 100;
            $successLogin = true;
            break;
        }
    }

    if (!$successLogin) {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - The PHP Vault</title>
    <link rel="stylesheet" href="style.css">
    <?php if ($successLogin): ?>
    <meta http-equiv="refresh" content="2;url=menu.php">
    <?php endif; ?>
</head>
<body>
    <div class="fade-in" style="max-width: 500px; margin: 80px auto; padding: 30px; background-color: #1e1e1e; border-radius: 15px; box-shadow: 0 0 20px #00ffff;">
        <?php if (!$successLogin): ?>
            <h1>The PHP Vault</h1>
            <h2>Login</h2>

            <form method="POST">
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" value="Login">
            </form>

            <?php if (!empty($error)): ?>
                <p style="color: #ff4444; font-weight: bold;"><?php echo $error; ?></p>
            <?php endif; ?>

            <p>Don't have an account? <a href="register.php">Register here</a></p>
        <?php else: ?>
            <h2 style="color:#00ff99;"> Login Successful!</h2>
            <p>Redirecting to the main menu...</p>
        <?php endif; ?>
    </div>
</body>
</html>
