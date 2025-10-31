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
<div class="admin-dashboard">

    <!-- Header Section -->
    <div class="admin-header">
        <button class="nav-btn" onclick="window.location.href='home.php'">Home</button>
        <h2 class="admin-title">Admin Dashboard</h2>
        <button class="nav-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Main Container -->
    <div class="admin-container">
        <!-- Membership Section -->
        <div class="admin-section">
            <h3>Membership</h3>
            <div class="admin-buttons">
                <button class="action-btn">Add</button>
                <button class="action-btn">Update</button>
            </div>
        </div>

        <!-- User Management Section -->
        <div class="admin-section">
            <h3>User Management</h3>
            <div class="admin-buttons">
                <button class="action-btn">Add</button>
                <button class="action-btn">Update</button>
            </div>
        </div>
    </div>

</div>
</body>
</html>
