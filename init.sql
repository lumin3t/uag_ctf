CREATE DATABASE IF NOT EXISTS uag_db;
USE uag_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

INSERT INTO users (username, password, role) VALUES 
('rover', 'forest123', 'user'),
('someone', 'something', 'user'),
('surandar', 'passwordofsurandar', 'user'),
('guest', 'guestpass', 'user'),
('rangeradmin', 'admin@123@', 'admin');