<?php
$scores = [];

if (file_exists("scores.txt")) {
    $lines = file("scores.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($user, $score) = explode('|', $line);
        $scores[] = ['user' => $user, 'score' => (int)$score];
    }

    // Sort by score, descending
    usort($scores, function($a, $b) {
        return $b['score'] - $a['score'];
    });
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Leaderboard</h2>
    <?php if (empty($scores)) : ?>
        <p>No scores yet.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Rank</th>
                <th>Player</th>
                <th>Score</th>
            </tr>
            <?php foreach ($scores as $index => $entry): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($entry['user']); ?></td>
                <td><?php echo $entry['score']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
