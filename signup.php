<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkStmt = $conn->prepare("SELECT id FROM userInfo WHERE LOWER(username) = LOWER(?)");
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->store_result();
 
    if ($checkStmt->num_rows > 0) {
        echo "This username already used!";
    }else{
        $stmt = $conn->prepare("INSERT INTO userInfo (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            echo "success";
        } else {
            echo "Error creating account!";
        }
    }
}
?>
