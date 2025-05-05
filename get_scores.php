<?php
session_start();
include 'db.php';

$response = [
  "topScores" => [],
  "userHighScore" => 0
];

$result = $conn->query("SELECT username, high_score FROM userInfo ORDER BY high_score DESC LIMIT 3");
while ($row = $result->fetch_assoc()) {
  $response["topScores"][] = $row;
}

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $stmt = $conn->prepare("SELECT high_score FROM userInfo WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->bind_result($userHighScore);
  $stmt->fetch();
  $response["userHighScore"] = $userHighScore;
}

echo json_encode($response);
?>
