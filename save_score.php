<?php
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $score = intval($_POST['score'] ?? 0);

    if ($username === '') {
        echo "Missing username";
        exit();
    }

    $stmt = $conn->prepare("SELECT high_score FROM userInfo WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($score > intval($user['high_score'])) {
            $update = $conn->prepare("UPDATE userInfo SET high_score = ? WHERE username = ?");
            $update->bind_param("is", $score, $username);
            $update->execute();
            echo "New high score saved!";
        } 
        else {
            echo "Not a new high score.";
        }
    } else {
        echo "User not found!";
        exit();
    }
    
}
?>
