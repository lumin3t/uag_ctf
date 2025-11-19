<?php
session_start();
include 'includes/db.php';

if (isset($_SESSION['id'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if username exists
    $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username already exists";
    } else {
        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
        if (mysqli_query($conn, $query)) {
            header("Location: login.php?registered=1");
            exit();
        } else {
            $error = "Registration failed";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - UAG Forest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register for UAG - ACCESS and ASCENSION Portal</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <table class="form-table">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register" class="button"></td>
                </tr>
            </table>
        </form>
        <p><a href="index.php">← Back to Home</a></p>
    </div>
</body>
</html>