<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>UAG - ACCESS and ASCENSION Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to UAG - ACCESS and ASCENSION Portal</h1>
        <p>Please log in to continue.</p>
        <div class="button-group">
            <a href="login.php" class="button">Login</a>
            <a href="register.php" class="button">Register</a>
        </div>
    </div>
</body>
</html>