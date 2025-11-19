<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users WHERE id=$user_id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - UAC Forest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>UAG - ACCESS and ASCENSION Portal</h1>
        <p>Adherent Status: <b><?= htmlspecialchars($user['username']) ?></b></p>
        <p>Commit to the Vision. Review the Core Directives below.</p>

        <div class="error" style="background-color: #ffe0e0; border: 3px solid #cc0000; color: #cc0000;">
            <center>
                <h2 style="color: #cc0000; margin-top: 5px;">THE DOCTRINE OF PURITY</h2>
            </center>
            <hr style="border-top: 2px solid #cc0000;">

            <p style="font-size: 13px; margin: 0 0 10px 0; padding: 0;">
                <b>CORE DOCTRINE ALERT:</b> The **unoptimized regions** are an obstacle to the <b>Infallible Path of Access</b>. Purity demands immediate conversion into ordered, accessible resource matrices across the entire operational grid.
            </p>

            <hr style="border-top: 1px dotted #cc0000; margin: 15px 0;">
            <p style="font-size: 14px; text-align: center; color: #800000;">
                <b>ASCENSION TRACK:</b> Adherent status is temporary. Individuals demonstrating <b>Absolute Dedication</b> and verifiable performance metrics are swiftly elevated to the **Architect Level (Admin)**. Your work is your worth.
            </p>
            
            <p style="text-align: right; font-size: 11px; color: #800000; margin-top: 10px;">
                — The Architects of Access (Directive 7-G)
            </p>
        </div>
        <a href="uag-manifesto.html">Click here to read more about us and our mission.</a> 
        <div class="button-group">
            <a href="profile.php?id=<?= $user_id ?>" class="button">View My Profile</a>

            <a href="logout.php" class="button">Renounce Status (Logout)</a>
        </div>

        <p style="margin-top: 30px; font-size: 11px; color: #808080;">
            *Adherent accounts cannot access the Master Plan.
        </p>
        <!--Admins can access the plans in /action-plan.php section-->
    </div>
</body>
</html>