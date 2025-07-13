<?php
session_start();
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($user === "" || $pass === "") {
        $error = "All fields are required.";
    } else {
        $lines = file("users.txt", FILE_IGNORE_NEW_LINES);
        $exists = false;

        foreach ($lines as $line) {
            list($storedUser, ) = explode(":", $line);
            if ($user == $storedUser) {
                $exists = true;
                break;
            }
        }

        if ($exists) {
            $error = "Username already taken.";
        } else {
            file_put_contents("users.txt", "$user:$pass\n", FILE_APPEND);
            $success = "Registration successful. You can now <a href='index.php'>log in</a>.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - The PHP Vault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-in" style="max-width: 500px; margin: 80px auto; padding: 30px; background-color: #1e1e1e; border-radius: 15px; box-shadow: 0 0 20px #00ffff;">
        <h1>The PHP Vault</h1>
        <h2>Register</h2>

        <form method="POST">
            <input type="text" name="username" placeholder="Choose a Username" required><br><br>
            <input type="password" name="password" placeholder="Choose a Password" required><br><br>
            <input type="submit" value="Register">
        </form>

        <?php if (!empty($error)): ?>
            <p style="color: #ff4444; font-weight: bold;"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p style="color: #00ff99; font-weight: bold;"><?php echo $success; ?></p>
        <?php endif; ?>

        <p>Already have an account? <a href="index.php">Log in here</a></p>
    </div>
</body>
</html>
