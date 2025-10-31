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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="admin-dashboard-vertical">

    <!-- Header -->
    <div class="admin-header">
        <button class="nav-btn" onclick="window.location.href='home.php'">Home</button>
        <h2 class="admin-title">Admin Dashboard</h2>
        <button class="nav-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Main Panel -->
    <div class="admin-panel">
        <div class="admin-row">
            <div class="label-box">Membership</div>
            <div class="button-group">
                <button class="action-btn">Add</button>
                <button class="action-btn">Update</button>
            </div>
        </div>

        <div class="admin-row">
            <div class="label-box">User Management</div>
            <div class="button-group">
                <button class="action-btn">Add</button>
                <button class="action-btn">Update</button>
            </div>
        </div>
    </div>

</div>
</body>
</html>
