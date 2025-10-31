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
    <title>Products</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="products-page">

    <!-- Header -->
    <div class="top-bar">
        <button class="home-btn" onclick="window.location.href='user_portal.php'">Home</button>
        <h2>Vendor Name</h2>
        <button class="logout-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Category Heading -->
    <div class="products-heading">
        <button class="tab-btn active">Products</button>
    </div>

    <!-- Product Cards -->
    <div class="product-container">
        <div class="product-card">
            <h3>Product 1</h3>
            <p>Price: ₹1000</p>
            <button class="cart-btn">Add to Cart</button>
        </div>

        <div class="product-card">
            <h3>Product 2</h3>
            <p>Price: ₹1200</p>
            <button class="cart-btn">Add to Cart</button>
        </div>

        <div class="product-card">
            <h3>Product 3</h3>
            <p>Price: ₹1500</p>
            <button class="cart-btn">Add to Cart</button>
        </div>

        <div class="product-card">
            <h3>Product 4</h3>
            <p>Price: ₹1800</p>
            <button class="cart-btn">Add to Cart</button>
        </div>
    </div>

</div>
</body>
</html>
