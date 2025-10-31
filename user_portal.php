<?php
session_start();
include('../db.php');
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Portal</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="user-portal">

    <div class="user-header">
        <h2>WELCOME USER</h2>
    </div>

    <div class="user-body">

        <div class="user-dropdown">
            <label for="category">Drop Down</label>
            <select id="category" name="category">
                <option value="Catering">Catering</option>
                <option value="Florist">Florist</option>
                <option value="Decoration">Decoration</option>
                <option value="Lighting">Lighting</option>
            </select>
        </div>

        <div class="user-buttons">
            <button onclick="window.location.href='vendor.php'">Vendor</button>
            <button onclick="window.location.href='cart.php'">Cart</button>
            <button onclick="window.location.href='guest_list.php'">Guest List</button>
            <button onclick="window.location.href='order_status.php'">Order Status</button>
            <button class="logout" onclick="window.location.href='logout.php'">LogOut</button>
        </div>
    </div>
</div>
</body>
</html>
