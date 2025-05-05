CREATE DATABASE IF NOT EXISTS typing_game;
USE typing_game;

CREATE TABLE IF NOT EXISTS userInfo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(10),
    high_score INT DEFAULT 0
);
