<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = isset($_POST['score']) ? intval($_POST['score']) : 0;

    // First, check if username is posted (guest or override)
    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } elseif (isset($_SESSION['username'])) {
        // If not posted, but logged in via session
        $username = $_SESSION['username'];
    } else {
        // Default to guest
        $username = 'guest';
    }

    $stmt = $conn->prepare("INSERT INTO user_game_sessions (username, score) VALUES (?, ?)");
    $stmt->bind_param("si", $username, $score);

    if ($stmt->execute()) {
        echo "Score saved for $username!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
