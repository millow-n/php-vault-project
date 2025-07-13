<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Get the current room
$room = isset($_GET['room']) ? $_GET['room'] : null;


if (!isset($_SESSION['hint_used'])) {
    $_SESSION['hint_used'] = [];
}

// only deduct if  haven’t used hint for this room yet
if (!isset($_SESSION['hint_used'][$room])) {
    $_SESSION['score'] -= 10;
    $_SESSION['hint_used'][$room] = true;
}
// hint for room 1
$hintText = "";

if ($room == 1) {
    $hintText = "I appear when light is around, but disappear in the dark.";
} elseif ($room == 2) {
    $hintText = "It repeats what you say in a hollow space.";
} else {
    $hintText = "You leave these behind when walking in snow or sand.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hint for Room <?php echo htmlspecialchars($room); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Hint for Room <?php echo htmlspecialchars($room); ?></h2>
    <p><strong><?php echo $hintText; ?></strong></p>

    <p>You lost 10 points for using a hint. Your current score is: 
        <?php echo $_SESSION['score']; ?>
    </p>

    <a href="room<?php echo htmlspecialchars($room); ?>.php">Back to Room</a>
</body>
</html>
