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
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="cart-page">

    <!-- Header -->
    <div class="top-bar">
        <button class="home-btn" onclick="window.location.href='user_portal.php'">Home</button>
        <button class="nav-btn" onclick="window.location.href='products.php'">View Product</button>
        <button class="nav-btn">Request Item</button>
        <button class="nav-btn">Product Status</button>
        <button class="logout-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Heading -->
    <h2 class="cart-heading">Shopping Cart</h2>

    <!-- Cart Table -->
    <div class="cart-table">
        <div class="cart-row cart-header">
            <div class="cart-col">Image</div>
            <div class="cart-col">Name</div>
            <div class="cart-col">Price</div>
            <div class="cart-col">Quantity</div>
            <div class="cart-col">Total Price</div>
            <div class="cart-col">Action</div>
        </div>

        <div class="cart-row">
            <div class="cart-col"><img src="../images/sample1.png" class="cart-img"></div>
            <div class="cart-col">Product Name</div>
            <div class="cart-col">₹100</div>
            <div class="cart-col">2</div>
            <div class="cart-col">₹200</div>
            <div class="cart-col"><button class="remove-btn">Remove</button></div>
        </div>
    </div>

    <!-- Total Section -->
    <div class="total-section">
        <h3>Grand Total: ₹200/-</h3>
        <div class="total-buttons">
            <button class="delete-btn">Delete All</button>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

</div>
</body>
</html>
