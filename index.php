<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    $found = false;
    $lines = file("users.txt");

    foreach ($lines as $line) {
        list($storedUser, $storedPass) = explode(":", trim($line));
        if ($user == $storedUser && $pass == $storedPass) {
            $_SESSION['user'] = $user;
            $_SESSION['score'] = 100; // start score
            header("Location: room1.php");
            exit;
        }
    }

    $error = "Invalid username or password.";
}
?>

<h2>Login to The PHP Vault</h2>
<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
<p style="color:red;"><?php echo $error; ?></p>
<p>Don't have an account? <a href="register.php">Register here</a></p>
