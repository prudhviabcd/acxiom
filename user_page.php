<?php
session_start();
include('../db.php');
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="vendor-page">

    <!-- Top Navigation -->
    <div class="vendor-header">
        <button class="nav-btn" onclick="window.location.href='user_portal.php'">Home</button>
        <h2>Vendor</h2>
        <button class="logout-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Category Tabs -->
    <div class="vendor-tabs">
        <button class="tab-btn active">Vendor</button>
        <button class="tab-btn">Florist</button>
    </div>

    <!-- Vendor Boxes -->
    <div class="vendor-container">
        <div class="vendor-box">
            <h3>Vendor 1</h3>
            <p>Contact Details</p>
            <button class="shop-btn">Shop Item</button>
        </div>

        <div class="vendor-box">
            <h3>Vendor 2</h3>
            <p>Contact Details</p>
            <button class="shop-btn">Shop Item</button>
        </div>

        <div class="vendor-box">
            <h3>Vendor 3</h3>
            <p>Contact Details</p>
            <button class="shop-btn">Shop Item</button>
        </div>

        <div class="vendor-box">
            <h3>Vendor 4</h3>
            <p>Contact Details</p>
            <button class="shop-btn">Shop Item</button>
        </div>
    </div>

</div>
</body>
</html>
