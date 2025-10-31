<?php
session_start();
include('../db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="admin-home">

    <!-- Header Section -->
    <div class="admin-header">
        <button class="nav-btn" onclick="window.location.href='home.php'">Home</button>
        <h2 class="admin-title">Welcome Admin</h2>
        <button class="nav-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Center Box -->
    <div class="admin-home-box">
        <h3>Welcome Admin</h3>
        <div class="admin-buttons-row">
            <button class="main-btn" onclick="window.location.href='maintain_user.php'">Maintain User</button>
            <button class="main-btn" onclick="window.location.href='maintain_vendor.php'">Maintain Vendor</button>
        </div>
    </div>

</div>
</body>
</html>
