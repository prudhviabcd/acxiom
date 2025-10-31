<?php
session_start();
include('../db.php');

if (!isset($_SESSION['vendor'])) {
    header("Location: login.php");
    exit();
}

// You can later fetch this data from your database
$products = [
    ['name' => 'Vendor 1', 'email' => 'vendor1@email.com', 'address' => 'Hyderabad', 'status' => 'Active'],
    ['name' => 'Vendor 2', 'email' => 'vendor2@email.com', 'address' => 'Delhi', 'status' => 'Pending'],
    ['name' => 'Vendor 3', 'email' => 'vendor3@email.com', 'address' => 'Mumbai', 'status' => 'Inactive']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Status</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="status-page">

    <!-- Header Bar -->
    <div class="status-header">
        <button class="nav-btn" onclick="window.location.href='vendor_portal.php'">Home</button>
        <h2 class="header-title">Product Status</h2>
        <button class="nav-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Table Layout -->
    <div class="status-table">
        <div class="status-row header">
            <div class="status-col">Name</div>
            <div class="status-col">E-Mail</div>
            <div class="status-col">Address</div>
            <div class="status-col">Status</div>
            <div class="status-col">Update</div>
            <div class="status-col">Delete</div>
        </div>

        <?php foreach ($products as $row): ?>
        <div class="status-row">
            <div class="status-col"><?php echo $row['name']; ?></div>
            <div class="status-col"><?php echo $row['email']; ?></div>
            <div class="status-col"><?php echo $row['address']; ?></div>
            <div class="status-col"><?php echo $row['status']; ?></div>
            <div class="status-col"><button class="update-btn">Update</button></div>
            <div class="status-col"><button class="delete-btn">Delete</button></div>
        </div>
        <?php endforeach; ?>
    </div>

</div>
</body>
</html>
