<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
$uid = isset($_GET['uid']) ? (int)$_GET['uid'] : $_SESSION['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$uid"));

if (!$user) {
    die("User not found");
}

$permit_number = "FP-" . str_pad($uid, 6, '0', STR_PAD_LEFT);
$renewal_date = date('Y-m-d', strtotime('-' . rand(0, 30) . ' days'));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile - UAC Forest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Forest Permit Profile</h1>
        
        <table class="profile-table">
            <tr>
                <td><strong>Username:</strong></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
            </tr>
            <tr>
                <td><strong>Forest Permit #:</strong></td>
                <td><?= $permit_number ?></td>
            </tr>
            <tr>
                <td><strong>Account Level:</strong></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
            </tr>
            <tr>
                <td><strong>Last Renewal:</strong></td>
                <td><?= $renewal_date ?></td>
            </tr>
        </table>
        
        <?php if ($user['role'] === 'admin'): ?>
            <div class="admin-note">
                <strong>System note:</strong> Admin accounts have access to the UAC Ranger Operations Console.
            </div>
        <?php endif; ?>
        
        <p><a href="home.php">← Back to Home</a></p>
    </div>
</body>
</html>