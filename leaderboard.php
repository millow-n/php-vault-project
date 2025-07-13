<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$leaderboard = [];

// Load scores from scores.txt if it exists
if (file_exists("scores.txt")) {
    $lines = file("scores.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $parts = explode(":", trim($line));
        if (count($parts) === 2) {
            list($user, $score) = $parts;
            $leaderboard[] = [
                'user' => $user,
                'score' => (int)$score
            ];
        }
    }

    // Sort scores from highest to lowest
    usort($leaderboard, function($a, $b) {
        return $b['score'] - $a['score'];
    });
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard - The PHP Vault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fade-in" style="max-width: 700px; margin: 40px auto; padding: 30px;">
        <h1>Leaderboard</h1>

        <?php if (empty($leaderboard)): ?>
            <p>No scores recorded yet.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leaderboard as $entry): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($entry['user']); ?></td>
                            <td><?php echo htmlspecialchars($entry['score']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <p><a href="menu.php">Back to Home</a></p>
    </div>
</body>
</html>
