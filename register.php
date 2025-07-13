<?php
// when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($user !== "" && $pass !== "") {
        // store in users.txt
        $line = "$user:$pass\n";
        file_put_contents("users.txt", $line, FILE_APPEND);

        echo "<p>Registration successful. <a href='index.php'>Go to Login</a></p>";
    } else {
        echo "<p>Both fields required.</p>";
    }
}
?>

<h2>Register for The PHP Vault</h2>
<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
</form>
