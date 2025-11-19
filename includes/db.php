<?php
$host = 'localhost';
$user = 'root';
$pass = 'password'; //Your password here 
$db   = 'uag_db';

// Add retry logic
$max_retries = 5;
$retry_delay = 2;

for ($i = 0; $i < $max_retries; $i++) {
    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn) {
        break;
    }
    if ($i < $max_retries - 1) {
        sleep($retry_delay);
    }
}

if (!$conn) {
    die("Database connection failed after $max_retries attempts: " . mysqli_connect_error());
}
?>